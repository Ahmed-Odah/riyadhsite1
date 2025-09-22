<?php

namespace App\Actions\Books\Admin;

use App\Models\Book;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class BooUpdateViewAction
{
    use AsAction;

    public function handle(Request $request, Book $book)
    {
        // ✅ تحقق من المدخلات
        $request->validate([
            'title'       => 'required|string|max:255',
            'description' => 'required|string',
            'is_pending'  => 'nullable|boolean',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'cover_url'   => 'nullable|mimes:pdf|max:10000',
        ]);

        $data = [
            'title'       => $request->get('title'),
            'description' => $request->get('description'),
            'is_pending'  => $request->boolean('is_pending'), // ✅ تحديث الحقل الجديد
        ];

        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        if ($request->hasFile('cover_url')) {
            $data['cover_url'] = $request->file('cover_url')->store('pdfs', 'public');
        }

        $book->update($data);

        return redirect()->route('dashboard')->with('success', 'تم تحديث الكتاب بنجاح');
    }
}
