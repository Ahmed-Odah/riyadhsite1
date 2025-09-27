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
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            'cover_url' => 'nullable|file|mimes:pdf|max:10240', // PDF حتى 10MB
        ]);

        $data = [
            'title' => $request->get('title'),
            'description' => $request->get('description'),
        ];

        // رفع صورة الغلاف إذا وُجدت
        if ($request->hasFile('image')) {
            $data['image'] = $request->file('image')->store('images', 'public');
        }

        // رفع ملف PDF إذا وُجد
        if ($request->hasFile('cover_url')) {
            $data['cover_url'] = $request->file('cover_url')->store('pdfs', 'public');
        }

        // تحديث المدونة
        $blog->update($data);

        return redirect()->route('admin.blog.index')->with('success', 'تم تحديث المدونة بنجاح');
    }
}
