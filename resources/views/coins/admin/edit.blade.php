@extends('admin.layout.dashboard')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white p-6 rounded shadow text-right">
        <h2 class="text-2xl font-bold mb-6">تعديل العملة</h2>

        <form action="{{ route('coin-update', $coin->id) }}" method="POST" enctype="multipart/form-data">
            @csrf

            {{-- العنوان --}}
            <div class="mb-4">
                <label for="title" class="block mb-1 font-medium">عنوان العملة</label>
                <input dir="rtl" value="{{ $coin->title }}" type="text" id="title" name="title"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            {{-- الوصف --}}
            <div class="mb-4">
                <label for="description" class="block mb-1 font-medium">وصف العملة</label>
                <textarea dir="rtl" id="description" name="description" rows="4"
                          class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400"
                          required>{{ $coin->description }}</textarea>
            </div>

            {{-- الدولة --}}
            <div class="mb-4">
                <label for="country" class="block mb-1 font-medium">الدولة</label>
                <input dir="rtl" value="{{ $coin->country }}" type="text" id="country" name="country"
                       class="w-full border border-gray-300 rounded px-3 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400" required>
            </div>

            {{-- الصورة الأساسية --}}
            @if($coin->image)
                <div class="mb-2">
                    <label class="block mb-1 font-medium">الصورة الحالية:</label>
                    <img src="{{ asset('public/storage/' . $coin->image) }}" class="h-24 rounded">
                </div>
            @endif

            <div class="mb-6">
                <label for="image" class="block mb-1 font-medium">رفع صورة جديدة (اختياري)</label>
                <input dir="rtl" type="file" id="image" name="image" accept="image/*"
                       class="w-full border rounded px-3 py-2">
            </div>

            {{-- العملات المشابهة الحالية --}}
            @if($coin->relatedCoins->count() > 0)
                <div class="mb-6">
                    <label class="block mb-2 font-medium">العملات المشابهة الحالية</label>
                    @foreach($coin->relatedCoins as $related)
                        <div class="mb-4 border p-3 rounded">
                            <input type="hidden" name="related_id[]" value="{{ $related->id }}">

                            <label class="block mb-1">عنوان العملة</label>
                            <input type="text" name="related_title[{{ $related->id }}]" value="{{ $related->title }}"
                                   class="w-full mb-2 border rounded px-2 py-1">

                            @if($related->image)
                                <label class="block mb-1">الصورة الحالية</label>
                                <img src="{{ asset('public/storage/' . $related->image) }}" class="h-24 rounded mb-2">
                            @endif

                            <label class="block mb-1">رفع صورة جديدة (اختياري)</label>
                            <input type="file" name="related_image[{{ $related->id }}]" accept="image/*" class="w-full">
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- إضافة عملة مشابهة جديدة بالكامل --}}
            <div class="mb-6 border p-4 rounded">
                <h3 class="font-semibold mb-3">إضافة عملة مشابهة جديدة</h3>

                <div class="mb-4">
                    <label for="new_related_title" class="block mb-1 font-medium">عنوان العملة</label>
                    <input type="text" id="new_related_title" name="new_related_title"
                           class="w-full border border-gray-300 rounded px-3 py-2" placeholder="أدخل عنوان العملة">
                </div>

                <div class="mb-4">
                    <label for="new_related_image" class="block mb-1 font-medium">صورة العملة</label>
                    <input type="file" id="new_related_image" name="new_related_image" accept="image/*"
                           class="w-full border border-gray-300 rounded px-3 py-2">
                </div>
            </div>

            {{-- زر الحفظ --}}
            <div class="text-right">
                <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded hover:bg-green-700 transition w-full">
                    تحديث العملة
                </button>
            </div>
        </form>
    </div>
@endsection
