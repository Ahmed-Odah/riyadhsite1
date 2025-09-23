<?php

namespace App\Actions\Books\Admin;

use App\Models\Book;
use Lorisleiva\Actions\Concerns\AsAction;

class BooksIndexAction
{
    use AsAction;

    public function handle()
    {
        $books = Book::where('is_pending', 0)->get();     // المنشورة
        $pendingBooks = Book::where('is_pending', 1)->get(); // تحت الطباعة

        return view('books.admin.index', compact('books', 'pendingBooks'));
    }
}
