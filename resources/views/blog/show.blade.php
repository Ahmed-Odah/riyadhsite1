@extends('layout.master')

@section('content')
    <div class="bg-gray-50 min-h-screen py-14 px-6 flex justify-center">
        <div class="a4-container bg-white rounded-2xl shadow-2xl p-10 relative w-full max-w-3xl border border-gray-100">

            {{-- شريط علوي --}}
            <div class="w-full h-14 bg-gradient-to-r from-blue-600 to-indigo-600 rounded-xl flex items-center justify-center shadow-md mb-10">
                <span class="text-white text-lg font-semibold tracking-wide">تفاصيل المدونة</span>
            </div>

            {{-- العنوان --}}
            <h1 class="text-3xl md:text-4xl font-extrabold text-center text-gray-800 mb-6 leading-tight">
                {{ $blog->title }}
            </h1>

            {{-- التاريخ إن وُجد --}}
            @if($blog->created_at)
                <p class="text-center text-gray-500 text-sm mb-8">
                    نُشرت بتاريخ {{ $blog->created_at->format('Y/m/d') }}
                </p>
            @endif

            {{-- الصورة --}}
            @if($blog->image)
                <div class="flex justify-center mb-10">
                    <img src="{{ asset('public/storage/' . $blog->image) }}"
                         alt="{{ $blog->title }}"
                         class="rounded-xl shadow-md transform hover:scale-105 transition duration-300 max-h-[350px] w-auto object-contain border border-gray-200">
                </div>
            @endif

            {{-- المحتوى --}}
            <div class="prose prose-lg text-gray-700 leading-relaxed max-w-none" style="line-height:1.9; font-size:18px;">
                {!! nl2br(e($blog->content ?? $blog->description)) !!}
            </div>

            {{-- زر الرجوع --}}
            <div class="flex justify-center mt-12">
                <a href="{{ route('blogs') }}"
                   class="bg-gradient-to-r from-gray-700 to-gray-900 text-white px-8 py-3 rounded-xl hover:opacity-90 transition duration-300 font-semibold">
                    ← العودة إلى المدونات
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
