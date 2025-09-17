<?php

namespace App\Actions\Bedrooms\Admin;

use App\Models\bedroom;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\Log;

class CreateAction
{
    use AsAction;

    public function handle(Request $request)
    {
        try {
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $imagePath = $image->store('images', 'public');

                    Bedroom::create([
                        'description' => $request->get('description'),
                        'image'       => $imagePath,
                    ]);
                }
            }

            return back()->with('success', 'تم إضافة الصور بنجاح');

        } catch (\Exception $e) {
            Log::error('خطأ في إضافة الصور: ' . $e->getMessage());

            return back()->with('error', 'حدث خطأ أثناء إضافة الصور، يرجى المحاولة مرة أخرى.');
        }
    }
}
