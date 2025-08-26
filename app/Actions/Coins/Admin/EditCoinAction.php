<?php
namespace App\Actions\Coins\Admin;

use App\Models\Coin;
use App\Models\RelatedCoin;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\Log;

class EditCoinAction
{
    use AsAction;

    public function handle(Request $request, Coin $coin)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'country' => 'required|string|max:255',
            'image' => 'nullable|image',
            'related_id' => 'nullable|array',
            'related_title.*' => 'nullable|string|max:255',
            'related_image.*' => 'nullable|image',
            'new_related_coin' => 'nullable|exists:coins,id', // إضافة التحقق للعملة الجديدة
        ]);

        try {
            // تحديث العملة الأساسية
            $coin->title = $request->title;
            $coin->description = $request->description;
            $coin->country = $request->country;

            if ($request->hasFile('image')) {
                $coin->image = $request->file('image')->store('coins', 'public');
            }

            $coin->save();

            // تحديث العملات المشابهة الحالية
            if ($request->has('related_id')) {
                foreach ($request->related_id as $relatedId) {
                    $relatedCoin = RelatedCoin::find($relatedId);
                    if ($relatedCoin) {
                        $relatedCoin->title = $request->input("related_title.$relatedId");

                        if ($request->hasFile("related_image.$relatedId")) {
                            $relatedCoin->image = $request->file("related_image.$relatedId")->store('coins/related', 'public');
                        }

                        $relatedCoin->save();
                    }
                }
            }

            // إضافة عملة مشابهة جديدة إذا تم اختيار واحدة
            if ($request->filled('new_related_coin')) {
                $newRelatedId = $request->input('new_related_coin');

                // تحقق أنها ليست مضافة مسبقًا
                if (!$coin->relatedCoins->contains($newRelatedId)) {
                    $coin->relatedCoins()->attach($newRelatedId);
                }
            }

            return redirect()->route('dashboard')->with('success', 'تم تحديث العملة بنجاح');

        } catch (\Exception $e) {
            Log::error('خطأ أثناء تحديث العملة: ' . $e->getMessage());
            return back()->with('error', 'حدث خطأ أثناء التحديث، يرجى المحاولة مرة أخرى.');
        }
    }
}
