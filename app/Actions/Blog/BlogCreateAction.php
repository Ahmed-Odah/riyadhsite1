<?php

namespace App\Actions\Blog;

use App\Models\Blog;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class BlogCreateAction
{
    use AsAction;

    public function handle(Request $request)
    {
        // ✅ التحقق من البيانات
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url|max:500', // إضافة التحقق من الرابط
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048', // تحقق من الصورة
        ]);

        // رفع الصورة إذا وُجدت
        $image = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image')->store('images', 'public');
        }

        // إنشاء المدونة
        Blog::query()->create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'url' => $request->get('url'), // حفظ الرابط
            'image' => $image,
        ]);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.blog.create.view')->with('success', 'تم حفظ المدونة بنجاح');
    }
}
