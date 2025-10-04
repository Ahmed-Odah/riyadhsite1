@extends('layout.master')

@section('content')
    <div class="bg-gray-100 min-h-screen py-12 px-6 flex justify-center">
        <div class="a4-container bg-white rounded-2xl shadow-xl p-12 relative mt-20 w-full max-w-4xl">

            {{-- شريط علوي --}}
            <div class="w-full h-16 bg-gradient-to-r from-indigo-500 to-blue-500 rounded-t-xl flex items-center justify-center shadow-md mb-10">
                <span class="text-black text-xl font-bold">تفاصيل المدونة</span>
            </div>

            {{-- العنوان --}}
            <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-8 mt-6 tracking-wide">
                {{ $blog->title }}
            </h1>

            {{-- الصورة --}}
            @if($blog->image)
                <div class="flex justify-center mb-8">
                    <img src="{{ asset('public/storage/' . $blog->image) }}"
                         alt="{{ $blog->title }}"
                         class="rounded-xl shadow-lg transform hover:scale-105 transition duration-300 max-h-[500px] object-contain">
                </div>
            @endif

            {{-- المحتوى --}}
            <div class="text-gray-700 text-lg leading-relaxed" style="line-height:1.8; font-size:17px;">
                {!! nl2br(e($blog->content ?? $blog->description)) !!}
            </div>

            {{-- زر الرجوع --}}
            <div class="flex justify-center mt-12">
                <a href="{{ route('blog.blog') }}"
                   class="bg-gray-700 text-white px-6 py-3 rounded-xl hover:bg-gray-800 transition duration-300">
                    ← العودة للمدونات
                </a>
            </div>
        </div>
    </div>

    <style>
        @media print {
            body { background: none; }
            .a4-container { box-shadow: none; margin: 0; width: auto; min-height: auto; padding: 0; }
        }
    </style>
@endsection
