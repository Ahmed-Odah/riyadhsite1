<?php

namespace App\Actions\Blog;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Lorisleiva\Actions\Concerns\AsAction;

class BlogCreateAction
{
    use AsAction;

    /**
     * 🧩 الدالة الأساسية لإنشاء المقال يدويًا من لوحة التحكم
     */
    public function handle(Request $request)
    {
        // ✅ التحقق من البيانات مع منع التكرار
        $request->validate([
            'title' => 'required|string|max:255|unique:blogs,title',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
        ]);

        // 🖼️ رفع الصورة إذا وُجدت باسم فريد
        $image = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $imageName = time() . '_' . Str::slug(pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME)) . '.' . $file->getClientOriginalExtension();
            $image = $file->storeAs('images', $imageName, 'public');
        }

        // 🏷️ إنشاء slug من العنوان
        $slug = Str::slug($request->get('title'));

        // 🔗 إنشاء رابط المقال تلقائيًا بناءً على الـ slug
        $url = url('/blogs/' . $slug);

        // 📝 إنشاء المقال
        Blog::query()->create([
            'title' => $request->get('title'),
            'description' => $request->get('description'),
            'slug' => $slug,
            'url' => $url,
            'image' => $image,
        ]);

        // ✅ إعادة التوجيه مع رسالة نجاح
        return redirect()->route('admin.blog.create.view')->with('success', 'تم حفظ المدونة بنجاح');
    }

    /**
     * ⚙️ دالة استقبال منشورات فيسبوك تلقائيًا (للـ Webhook أو Zapier)
     */
    public function handleFromFacebook(Request $request)
    {
        $data = $request->validate([
            'fb_post_id'   => 'required|string',
            'title'        => 'nullable|string|max:255',
            'content'      => 'nullable|string',
            'image'        => 'nullable|url',
            'published_at' => 'nullable|date',
        ]);

        // 🚫 منع تكرار المنشور لو تم إرساله أكثر من مرة
        if (Blog::where('fb_post_id', $data['fb_post_id'])->exists()) {
            return response()->json(['ok' => true, 'message' => 'Already imported']);
        }

        // 🏷️ توليد slug فريد
        $slug = Str::slug($data['title'] ?? Str::random(10));

        // 🖼️ تحميل الصورة من فيسبوك (اختياري)
        $imagePath = null;
        if (!empty($data['image'])) {
            try {
                $imageContents = file_get_contents($data['image']);
                $fileName = 'fb_' . time() . '.jpg';
                Storage::disk('public')->put('images/' . $fileName, $imageContents);
                $imagePath = 'images/' . $fileName;
            } catch (\Exception $e) {
                $imagePath = null; // تجاهل الخطأ لو الصورة غير متاحة
            }
        }

        // ✏️ إنشاء المقال الجديد
        $blog = Blog::create([
            'title'        => $data['title'] ?? 'Facebook Post',
            'description'  => $data['content'] ?? '',
            'slug'         => $slug,
            'url'          => url('/blogs/' . $slug),
            'image'        => $imagePath,
            'fb_post_id'   => $data['fb_post_id'],
            'source'       => 'facebook',
            'published_at' => $data['published_at'] ?? now(),
        ]);

        return response()->json(['ok' => true, 'id' => $blog->id]);
    }
}
