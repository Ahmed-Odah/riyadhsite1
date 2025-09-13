<?php

namespace App\Actions\Terrace\Admin;

use App\Models\Terraces;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\Log;

class CreateAction
{
    use AsAction;

    public function handle(Request $request)
    {
        try {
            $pdfPath = null;

            if ($request->hasFile('cover_url')) {
                $pdfPath = $request->file('cover_url')->store('pdfs', 'public');
            }

            if ($request->hasFile('images')) {
                foreach ($request->file('images') as $image) {
                    $coverPath = $image->store('images', 'public');

                    Terraces::create([
                        'title' => $request->get('title'),
                        'description' => $request->get('description'),
                        'image' => $coverPath,
                        'cover_url' => $pdfPath,
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
