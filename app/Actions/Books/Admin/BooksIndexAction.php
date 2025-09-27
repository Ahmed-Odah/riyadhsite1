<?php

namespace App\Actions\Books\Admin;

use App\Models\Book;
use Lorisleiva\Actions\Concerns\AsAction;

class BooksIndexAction
{
    use AsAction;

    public function handle()
    {
        // جلب الكتب المنشورة (is_pending = 0)
        $publishedBooks = Book::where('is_pending', 0)
            ->orderBy('created_at', 'desc')
            ->get();

        // جلب الكتب قيد الطبع (is_pending = 1)
        $pendingBooks = Book::where('is_pending', 1)
            ->orderBy('created_at', 'desc')
            ->get();

        // تمرير البيانات للـBlade
        return view('books.admin.index', compact('publishedBooks', 'pendingBooks'));
    }
}
