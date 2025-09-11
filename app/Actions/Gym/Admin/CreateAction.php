<?php

namespace App\Actions\Gym\Admin;

use App\Models\Gym;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\Log;

class CreateAction
{
    use AsAction;

    public function handle(Request $request)
    {
        try {
            $coverPaths = []; // لتخزين مسارات الصور
            $pdfPath = null;

            // رفع الصور (أكثر من وحدة)
            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $path = $image->store('images', 'public');
                    $coverPaths[] = $path;
                }
            }

            // رفع ملف PDF
            if ($request->hasFile('cover_url')) {
                $pdfPath = $request->file('cover_url')->store('pdfs', 'public');
            }

            Gym::create([
                'title'       => $request->get('title'),
                'description' => $request->get('description'),
                'image'       => json_encode($coverPaths), // نخزن الصور كـ JSON
                'cover_url'   => $pdfPath,
            ]);

            return back()->with('success', 'تم إضافة الكتاب بنجاح');

        } catch (\Exception $e) {
            Log::error('خطأ في إضافة الكتاب: ' . $e->getMessage());

            return back()->with('error', 'حدث خطأ أثناء إضافة الكتاب، يرجى المحاولة مرة أخرى.');
        }
    }
}
