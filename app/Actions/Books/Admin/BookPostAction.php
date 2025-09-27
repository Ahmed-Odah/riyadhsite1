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
            // ✅ التحقق من المدخلات
            $request->validate([
                'title'       => 'required|string|max:255',
                'description' => 'required|string',
                'is_pending'  => 'nullable|in:0,1',
                'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'cover_url'   => 'nullable|mimes:pdf|max:10000', // PDF فقط
            ]);

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
