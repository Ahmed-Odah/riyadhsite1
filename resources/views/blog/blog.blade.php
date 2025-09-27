<?php

namespace App\Actions\Blog;

use App\Models\Blog;
use Illuminate\Http\Request;
use Lorisleiva\Actions\Concerns\AsAction;

class BlogUpdateAction
{
    use AsAction;

    public function handle(Request $request, Blog $blog)
    {
        // ✅ التحقق من المدخلات
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'url' => 'required|url|max:500', // رابط المدونة
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'url' => $request->get('url'), // حفظ الرابط
        ];

        // رفع الصورة إذا وُجدت
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // تحديث المدونة
        $blog->update($data);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.blog.index')->with('success', 'تم تحديث المدونة بنجاح');
    }
}
