@extends('admin.layout.dashboard')

@section('content')
    <div class="max-w-2xl mx-auto mt-10 bg-white p-6 rounded shadow text-right">
        <h2 class="text-2xl font-bold mb-6">تعديل الكتاب</h2>

        <form action="{{ route('book.update', $book->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="mb-4">
                <label for="title" class="block mb-1 font-medium">عنوان الكتاب</label>
                <input dir="rtl" value="{{ $book->title }}" type="text" id="title" name="title"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            <div class="mb-4">
                <label for="description" class="block mb-1 font-medium">وصف الكتاب</label>
                <textarea dir="rtl" id="description" name="description" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                          required>{{ $book->description }}</textarea>
            </div>

            @if($book->cover_url)
                <div class="mb-2">
                    <label class="block mb-1 font-medium">الملف الحالي:</label>
                    <a href="{{ asset('public/storage/' . $book->cover_url) }}" target="_blank" class="text-blue-600 underline">عرض الملف</a>
                </div>
            @endif

            <div class="mb-4">
                <label for="cover_url" class="block mb-1 font-medium">ملف PDF (اختياري)</label>
                <input dir="rtl" type="file" id="cover_url" name="cover_url" accept="application/pdf"
                       class="w-full border border-gray-300 rounded px-3 py-2">
            </div>

            @if($book->image)
                <div class="mb-2">
                    <label class="block mb-1 font-medium">الصورة الحالية:</label>
                    <img src="{{ asset('public/storage/' . $book->image) }}" class="h-24 rounded">
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
                    تحديث الكتاب
                </button>
            </div>
        </form>
    </div>
@endsection
