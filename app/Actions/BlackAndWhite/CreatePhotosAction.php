<?php

namespace App\Actions\BlackAndWhite;

use App\Models\BlackAndWhite;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\Log;

class CreatePhotosAction
{
    use AsAction;

    public function handle(Request $request)
    {
        try {
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $file) {
                    $filePath = $file->store('images', 'public');

                    BlackAndWhite::query()->create([
                        'image' => $filePath,
                        'title' => $request->get('title'),          // نفس العنوان لكل صورة
                        'description' => $request->get('description'), // نفس الوصف لكل صورة
                    ]);
                }
            }

            return back()->with('success', 'تم حفظ الصور بنجاح');

        } catch (\Exception $e) {
            Log::error('خطأ في حفظ الصور: ' . $e->getMessage());

            return back()->with('error', 'حدث خطأ أثناء حفظ الصور، يرجى المحاولة مرة أخرى.');
        }
    }
}
