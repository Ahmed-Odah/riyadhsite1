<?php

namespace App\Actions\Books\client;

use App\Models\Book;
use Lorisleiva\Actions\Concerns\AsAction;

class BooksClientIndexAction
{
    use AsAction;

    public function handle()
    {
        // أول 10 كتب منشورة
        $books = Book::where('is_pending', 0)->take(10)->get();

        // أول 10 كتب تحت الطباعة
        $pendingBooks = Book::where('is_pending', 1)->take(10)->get();

        return view('books.client.index', compact('books', 'pendingBooks'));
    }
}
