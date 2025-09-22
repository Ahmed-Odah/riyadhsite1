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
        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
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
