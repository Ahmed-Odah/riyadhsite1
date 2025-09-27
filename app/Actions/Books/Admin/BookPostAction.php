<?php

namespace App\Actions\Books\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;
use Illuminate\Support\Facades\Log;

class BookPostAction
{
    use AsAction;

    public function handle(Request $request)
    {
        try {

            $coverPath = null;
            $pdfPath   = null;

            // ✅ رفع الصورة
            if ($request->hasFile('image')) {
                $coverPath = $request->file('image')->storeAs(
                    'images',
                    time() . '_' . $request->file('image')->getClientOriginalName(),
                    'public'
                );
            }

            // ✅ رفع الـ PDF
            if ($request->hasFile('cover_url')) {
                $pdfPath = $request->file('cover_url')->storeAs(
                    'pdfs',
                    time() . '_' . $request->file('cover_url')->getClientOriginalName(),
                    'public'
                );
            }

            // ✅ تخزين البيانات في قاعدة البيانات
            Book::create([
                'title'       => $request->get('title'),
                'description' => $request->get('description'),
                'image'       => $coverPath,
                'cover_url'   => $pdfPath,
                'is_pending'  => (int) $request->get('is_pending', 0),
            ]);

            return back()->with('success', 'تم إضافة الكتاب بنجاح');

        } catch (\Exception $e) {
            Log::error('خطأ في إضافة الكتاب: ' . $e->getMessage());

            return back()->with('error', 'حدث خطأ أثناء إضافة الكتاب، يرجى المحاولة مرة أخرى.');
        }
    }
}
