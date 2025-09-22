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
                'is_pending'  => 'required|in:0,1',
                'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
                'cover_url'   => 'nullable|mimes:pdf|max:10000',
            ]);

            $coverPath = null;
            $pdfPath   = null;

            if ($request->hasFile('image')) {
                $coverPath = $request->file('image')->store('books/images', 'public');
            }

            if ($request->hasFile('cover_url')) {
                $pdfPath = $request->file('cover_url')->store('books/pdfs', 'public');
            }

            // ✅ تخزين البيانات
            Book::create([
                'title'       => $request->get('title'),
                'description' => $request->get('description'),
                'is_pending'  => (int) $request->get('is_pending', 0),
                'image'       => $coverPath,
                'cover_url'   => $pdfPath,
            ]);

            return back()->with('success', 'تم إضافة الكتاب بنجاح');

        } catch (\Exception $e) {
            Log::error('خطأ في إضافة الكتاب: ' . $e->getMessage());

            return back()->with('error', 'حدث خطأ أثناء إضافة الكتاب، يرجى المحاولة مرة أخرى.');
        }
    }
}
