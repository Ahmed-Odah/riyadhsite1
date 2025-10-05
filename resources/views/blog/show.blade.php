@extends('layout.master')
@section('content')

    @if(isset($blog))
        <meta property="og:type" content="website">
        <meta property="og:url" content="{{ route('blogs.show', $blog->id) }}">
        <meta property="og:title" content="{{ $blog->title }}">
        <meta property="og:description" content="{{ $blog->description ?? Str::limit(strip_tags($blog->content), 150) }}">
        <meta property="og:image" content="{{ $blog->image ? asset('storage/' . $blog->image) : asset('default-image.jpg') }}">
        <meta property="og:image:width" content="1200">
        <meta property="og:image:height" content="630">
        <meta property="og:image:alt" content="{{ $blog->title }}">
    @endif

    <div class="bg-gray-50 min-h-screen py-16 px-4 sm:px-10 lg:px-20">
        <div class="a4-container bg-white rounded-2xl shadow-2xl p-6 sm:p-8 relative w-full max-w-3xl border border-gray-100 mt-20">

            {{-- عنوان المدونة --}}
            <h1 class="text-3xl sm:text-4xl font-extrabold text-center text-gray-800 mb-4 leading-tight mt-2">
                {{ $blog->title }}
            </h1>

            {{-- التاريخ --}}
            @if($blog->created_at)
                <p class="text-center text-gray-500 text-sm mb-6">
                    نُشرت بتاريخ {{ $blog->created_at->format('Y/m/d') }}
                </p>
            @endif

            {{-- المحتوى --}}
            <div class="prose prose-lg sm:prose-xl text-gray-700 leading-relaxed max-w-full mb-6">
                {!! nl2br(e($blog->content ?? $blog->description)) !!}
            </div>

            {{-- الصورة --}}
            @if($blog->image)
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('public/storage/' . $blog->image) }}"
                         alt="{{ $blog->title }}"
                         class="rounded-xl shadow-lg transform hover:scale-105 transition duration-500 max-w-full h-auto object-contain border border-gray-200">
                </div>
            @endif

            {{-- زر المشاركة --}}
            <div class="flex justify-center mt-8 relative">
                <button id="shareBtn"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl font-semibold shadow-md transition duration-300 flex items-center gap-2">
                    <i class="fas fa-share"></i> مشاركة
                </button>

                {{-- قائمة المشاركة أفقية أسفل الزر --}}
                <div id="shareMenu" class="hidden absolute top-full mt-2 left-1/2 -translate-x-1/2 bg-white border rounded-xl shadow-2xl p-2 flex flex-wrap gap-2 z-50">
                    <a href="https://api.whatsapp.com/send?text={{ urlencode(route('blogs.show', $blog->id)) }}"
                       target="_blank"
                       class="flex items-center gap-2 px-3 py-2 hover:bg-green-100 rounded font-semibold text-green-600 transition">
                        <i class="fab fa-whatsapp"></i> <span class="ml-1">WhatsApp</span>
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blogs.show', $blog->id)) }}"
                       target="_blank"
                       class="flex items-center gap-2 px-3 py-2 hover:bg-blue-100 rounded font-semibold text-blue-600 transition">
                        <i class="fab fa-facebook"></i> <span class="ml-1">Facebook</span>
                    </a>
                    <a href="https://www.instagram.com/"
                       target="_blank"
                       class="flex items-center gap-2 px-3 py-2 hover:bg-pink-100 rounded font-semibold text-pink-500 transition">
                        <i class="fab fa-instagram"></i> <span class="ml-1">Instagram</span>
                    </a>
                    <a href="https://www.snapchat.com/add/"
                       target="_blank"
                       class="flex items-center gap-2 px-3 py-2 hover:bg-yellow-100 rounded font-semibold text-yellow-400 transition">
                        <i class="fab fa-snapchat"></i> <span class="ml-1">Snapchat</span>
                    </a>
                </div>
            </div>

            {{-- شريط سفلي زخرفي --}}
            <div class="w-full h-4 bg-gradient-to-r from-indigo-400 to-blue-400 rounded-b-xl mt-10"></div>
        </div>
    </div>

    {{-- جافاسكريبت للمشاركة --}}
    <script>
        const shareBtn = document.getElementById('shareBtn');
        const shareMenu = document.getElementById('shareMenu');

        shareBtn.addEventListener('click', () => {
            shareMenu.classList.toggle('hidden');
        });

        document.addEventListener('click', (e) => {
            if (!shareBtn.contains(e.target) && !shareMenu.contains(e.target)) {
                shareMenu.classList.add('hidden');
            }
        });
    </script>

    {{-- خطوط وأسلوب عام --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-papT1I+fC...==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
