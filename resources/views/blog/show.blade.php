@extends('layout.master')
@section('content')
    <div class="bg-gray-100 min-h-screen py-10 px-4 flex justify-center">
        <div class="a4-container bg-white rounded-2xl shadow-2xl p-8 relative w-full max-w-3xl border border-gray-100 mt-20">



            {{-- عنوان المدونة --}}
            <h1 class="text-3xl md:text-4xl font-extrabold text-center text-gray-800 mb-4 leading-tight mt-2">
                {{ $blog->title }}
            </h1>

            {{-- التاريخ --}}
            @if($blog->created_at)
                <p class="text-center text-gray-500 text-sm mb-6">
                    نُشرت بتاريخ {{ $blog->created_at->format('Y/m/d') }}
                </p>
            @endif

            {{-- الصورة --}}
            @if($blog->image)
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('public/storage/' . $blog->image) }}"
                         alt="{{ $blog->title }}"
                         class="rounded-xl shadow-md transform hover:scale-105 transition duration-300 max-h-[160px] w-auto object-contain border border-gray-200">
                </div>

            @endif

            {{-- المحتوى --}}
            <div class="prose prose-lg text-gray-700 leading-relaxed max-w-none" style="line-height:1.8; font-size:16px;">
                {!! nl2br(e($blog->content ?? $blog->description)) !!}
            </div>

            {{-- زر الرجوع --}}
            <div class="flex justify-center mt-10">
                <a href="{{ route('blogs') }}"
                   class="bg-gradient-to-r from-gray-700 to-gray-900 text-white px-6 py-2 rounded-xl hover:opacity-90 transition duration-300 font-semibold">
                    ← العودة إلى المدونات
                </a>
            </div>

            {{-- شريط سفلي زخرفي --}}
            <div class="w-full h-4 bg-gradient-to-r from-indigo-400 to-blue-400 rounded-b-xl mt-10"></div>
        </div>
    </div>

    <style>
        body {
            background: #f0f2f5;
            font-family: 'Arial', sans-serif;
        }
        @media print {
            body { background: none; }
            .a4-container { box-shadow: none; margin: 0; width: auto; min-height: auto; padding: 0; }
        }
    </style>
@endsection
