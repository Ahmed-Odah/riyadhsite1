<?php

namespace App\Actions\Books\client;

use App\Models\Book;
use Lorisleiva\Actions\Concerns\AsAction;

class BooksClientIndexAction
{
    use AsAction;

    public function handle()
    {
        $books = Book::query()->take(10)->get();

        return view('books.client.index', compact('books'));
    }
}
