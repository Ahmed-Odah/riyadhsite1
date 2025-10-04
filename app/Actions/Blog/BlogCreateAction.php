<?php

namespace App\Actions\Blog;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;

class BlogCreateAction
{
    use AsAction;

    public function handle(Request $request)
    {
        // ✅ التحقق من البيانات فقط للعنوان والوصف والصورة
        $request->validate([
            'title' => 'required|string|max:255|unique:blogs,title',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // رفع الصورة إذا وُجدت باسم فريد
        $image = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $image = $file->storeAs('images', $imageName, 'public');
        }

        // إنشاء slug من العنوان
        $slug = Str::slug($request->get('title'));

        // إنشاء المدونة بدون الحاجة لحقل url
        Blog::query()->create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'slug' => $slug,
            'image' => $image,
        ]);

        // إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.blog.create.view')->with('success', 'تم حفظ المدونة بنجاح');
    }
}
