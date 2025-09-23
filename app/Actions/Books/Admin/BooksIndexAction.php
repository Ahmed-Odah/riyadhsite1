<?php

namespace App\Actions\Books\Admin;

use App\Models\Book;
use Lorisleiva\Actions\Concerns\AsAction;

class BooksIndexAction
{
    use AsAction;

    public function handle()
    {
        // جميع الكتب المنشورة (is_pending = 0)
        $books = Book::where('is_pending', 0)->get();

        // جميع الكتب تحت الطباعة (is_pending = 1)

        // تمرير المتغيرات للـ View
        return view('books.admin.index', compact('books', 'pendingBooks'));
    }
}
