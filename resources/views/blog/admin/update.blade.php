@extends('admin.layout.dashboard')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow text-right">
        <h2 class="text-2xl font-bold mb-6">تعديل المدونة</h2>

        <form action="{{ route('admin.blog.update', $blog->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block mb-1 font-medium">عنوان المدونة</label>
                <input dir="rtl" value="{{ $blog->title }}" type="text" id="title" name="title"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-1 font-medium">وصف المدونة</label>
                <textarea dir="rtl" id="description" name="description" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                          required>{{ $blog->description }}</textarea>
            </div>

            <div class="mb-4">
                <label for="url" class="block mb-1 font-medium">رابط المدونة</label>
                <input dir="rtl" value="{{ $blog->url }}" type="url" id="url" name="url"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                       placeholder="https://example.com" required>
            </div>

            @if($blog->image)
                <div class="mb-2">
                    <label class="block mb-1 font-medium">الصورة الحالية:</label>
                    <img src="{{ asset('public/storage/' . $blog->image) }}" class="h-24 rounded">
                </div>
            @endif

            <div class="mb-6">
                <label for="image" class="block mb-1 font-medium">صورة الغلاف (اختياري)</label>
                <input dir="rtl" type="file" id="image" name="image" accept="image/*"
                       class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            <div class="text-right">
                <button type="submit"
                        class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition w-full">
                    تحديث المدونة
                </button>
            </div>
        </form>
    </div>
@endsection
