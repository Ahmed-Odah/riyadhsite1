<?php

namespace App\Actions\Coins\Admin;

use App\Models\Coin;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\Log;

class CreateAction
{
    use AsAction;

    public function handle(Request $request)
    {
        // تحقق من البيانات قبل الحفظ
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image' => 'nullable|image',        // صورة الوجه
            'back_image' => 'nullable|image',   // صورة الظهر
            'country' => 'required|string|max:255',
            'related_title' => 'nullable|array',
            'related_title.*' => 'nullable|string|max:255',
            'related_image' => 'nullable|array',
            'related_image.*' => 'nullable|image',
        ]);

        try {
            // صورة الوجه
            $imagePath = $request->file('image')
                ? $request->file('image')->store('coins', 'public')
                : null;

            // صورة الظهر في مجلد فرعي coins/back
            $backImagePath = $request->file('back_image')
                ? $request->file('back_image')->store('coins/back', 'public')
                : null;

            // إنشاء العملة
            $coin = Coin::create([
                'title' => $validated['title'],
                'description' => $validated['description'] ?? null,
                'image' => $imagePath,
                'back_image' => $backImagePath,
                'country' => $validated['country'],
            ]);

            // العملات المشابهة
            if (!empty($validated['related_title'])) {
                foreach ($validated['related_title'] as $index => $relatedTitle) {
                    if (!empty($relatedTitle)) {
                        $relatedImage = isset($validated['related_image'][$index]) && $validated['related_image'][$index]
                            ? $validated['related_image'][$index]->store('coins/related', 'public')
                            : null;

                        $coin->relatedCoins()->create([
                            'title' => $relatedTitle,
                            'image' => $relatedImage,
                        ]);
                    }
                }
            }

        } catch (\Exception $e) {
            Log::error('خطأ في إضافة العملة: ' . $e->getMessage());
        }

        return redirect()->route('coin-index')
            ->with('success', 'تم إضافة العملة بنجاح');
    }
}
