@extends('admin.layout.dashboard')

@section('content')
    <div class="max-w-3xl mx-auto mt-10 bg-white p-8 rounded-3xl shadow-xl text-right space-y-8">

        <h2 class="text-3xl font-bold text-gray-900 text-center">تعديل العملة</h2>

        <form action="{{ route('coin-update', $coin->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            {{-- العنوان --}}
            <div class="space-y-2">
                <label for="title" class="block font-medium text-gray-700">عنوان العملة</label>
                <input dir="rtl" value="{{ $coin->title }}" type="text" id="title" name="title"
                       class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
            </div>

            {{-- الوصف --}}
            <div class="space-y-2">
                <label for="description" class="block font-medium text-gray-700">وصف العملة</label>
                <textarea dir="rtl" id="description" name="description" rows="4"
                          class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">{{ $coin->description }}</textarea>
            </div>

            {{-- الدولة --}}
            <div class="space-y-2">
                <label for="country" class="block font-medium text-gray-700">الدولة</label>
                <input dir="rtl" value="{{ $coin->country }}" type="text" id="country" name="country"
                       class="w-full border border-gray-300 rounded-xl px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-400 transition">
            </div>

            {{-- الصور الأساسية --}}
            <div class="space-y-4">
                @if($coin->image)
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('public/storage/' . $coin->image) }}" class="h-24 rounded-xl shadow">
                        <span class="text-gray-600 font-medium">الصورة الحالية للوجه</span>
                    </div>
                @endif
                <input type="file" name="image" accept="image/*,application/pdf"
                       class="w-full border border-gray-300 rounded-xl px-3 py-2 cursor-pointer hover:border-blue-400 hover:shadow-md transition hover:scale-105">

                @if($coin->back_image)
                    <div class="flex items-center gap-4">
                        <img src="{{ asset('public/storage/' . $coin->back_image) }}" class="h-24 rounded-xl shadow">
                        <span class="text-gray-600 font-medium">الصورة الحالية للظهر</span>
                    </div>
                @endif
                <input type="file" name="back_image" accept="image/*,application/pdf"
                       class="w-full border border-gray-300 rounded-xl px-3 py-2 cursor-pointer hover:border-blue-400 hover:shadow-md transition hover:scale-105">
            </div>

            {{-- العملات المشابهة الحالية --}}
            @if($coin->relatedCoins->count() > 0)
                <div class="space-y-4">
                    <h3 class="font-semibold text-lg text-gray-800">العملات المشابهة الحالية</h3>
                    @foreach($coin->relatedCoins as $related)
                        <div class="border border-gray-200 rounded-2xl p-4 shadow-sm space-y-3">
                            <input type="hidden" name="related_id[]" value="{{ $related->id }}">

                            <input type="text" name="related_title[{{ $related->id }}]" value="{{ $related->title }}"
                                   class="w-full border border-gray-300 rounded-xl px-3 py-2" placeholder="عنوان العملة">

                            @if($related->image)
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset('public/storage/' . $related->image) }}" class="h-20 rounded-xl shadow">
                                    <span class="text-gray-600 font-medium">صورة الوجه الحالية</span>
                                </div>
                            @endif
                            <input type="file" name="related_image[{{ $related->id }}]" accept="image/*,application/pdf"
                                   class="w-full border border-gray-300 rounded-xl px-3 py-2 cursor-pointer hover:border-blue-400 hover:shadow-md transition hover:scale-105">

                            @if(isset($related->back_image))
                                <div class="flex items-center gap-4">
                                    <img src="{{ asset('public/storage/' . $related->back_image) }}" class="h-20 rounded-xl shadow">
                                    <span class="text-gray-600 font-medium">صورة الظهر الحالية</span>
                                </div>
                            @endif
                            <input type="file" name="related_back_image[{{ $related->id }}]" accept="image/*,application/pdf"
                                   class="w-full border border-gray-300 rounded-xl px-3 py-2 cursor-pointer hover:border-blue-400 hover:shadow-md transition hover:scale-105">
                        </div>
                    @endforeach
                </div>
            @endif

            {{-- إضافة عملة مشابهة جديدة --}}
            <div class="border border-gray-200 rounded-2xl p-6 shadow-sm space-y-4">
                <h3 class="font-semibold text-lg text-gray-800">إضافة عملة مشابهة جديدة</h3>
                <input type="text" name="new_related_title" placeholder="عنوان العملة" class="w-full border border-gray-300 rounded-xl px-3 py-2">
                <input type="file" name="new_related_image" accept="image/*,application/pdf"
                       class="w-full border border-gray-300 rounded-xl px-3 py-2 cursor-pointer hover:border-blue-400 hover:shadow-md transition hover:scale-105">
                <input type="file" name="new_related_back_image" accept="image/*,application/pdf"
                       class="w-full border border-gray-300 rounded-xl px-3 py-2 cursor-pointer hover:border-blue-400 hover:shadow-md transition hover:scale-105">
            </div>

            {{-- زر الحفظ --}}
            <div>
                <button type="submit" class="w-full bg-green-600 text-white px-6 py-3 rounded-xl hover:bg-green-700 transition font-semibold">
                    تحديث العملة
                </button>
            </div>

        </form>
    </div>
@endsection
