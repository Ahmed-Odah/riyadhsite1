<?php

namespace App\Actions\Blog\Client;

use App\Models\Blog;
use Lorisleiva\Actions\Concerns\AsAction;

class BlogShowAction
{
    use AsAction;

    public function handle($id)
    {
        // جلب مدونة واحدة بناءً على الـ id
        return Blog::findOrFail($id);
    }

    public function asController($id)
    {
        // تمرير المدونة إلى صفحة العرض
        $blog = $this->handle($id);
        return view('blog.show', compact('blog'));
    }
}
