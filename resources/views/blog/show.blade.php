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

            {{-- المحتوى --}}
            <div class="prose prose-lg text-gray-700 leading-relaxed max-w-none mb-6" style="line-height:1.8; font-size:16px;">
                {!! nl2br(e($blog->content ?? $blog->description)) !!}
            </div>

            {{-- الصورة --}}
            @if($blog->image)
                <div class="flex justify-center mb-6">
                    <img src="{{ asset('public/storage/' . $blog->image) }}"
                         alt="{{ $blog->title }}"
                         class="rounded-xl shadow-lg transform hover:scale-105 transition duration-500 max-h-[160px] w-auto object-contain border border-gray-200">
                </div>
            @endif

            {{-- زر المشاركة --}}
            <div class="flex justify-end mt-8 relative items-center gap-4">
                <button id="shareBtn"
                        class="bg-indigo-600 hover:bg-indigo-700 text-white px-6 py-2 rounded-xl font-semibold shadow-md transition duration-300 flex items-center gap-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 12v.01M12 4v.01M20 12v.01M12 20v.01M4.93 4.93l.01.01M19.07 19.07l.01.01M19.07 4.93l.01.01M4.93 19.07l.01.01"/>
                    </svg>
                    مشاركة
                </button>

                {{-- قائمة المشاركة أفقية --}}
                <div id="shareMenu" class="hidden absolute top-full mt-2 right-0 bg-white border rounded-xl shadow-2xl p-2 flex gap-2 z-50">
                    <a href="https://api.whatsapp.com/send?text={{ urlencode(route('blogs.show', $blog->id)) }}"
                       target="_blank"
                       class="flex items-center gap-1 px-3 py-2 hover:bg-green-100 rounded font-semibold text-green-600 transition">
                        <i class="fab fa-whatsapp"></i> واتساب
                    </a>
                    <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('blogs.show', $blog->id)) }}"
                       target="_blank"
                       class="flex items-center gap-1 px-3 py-2 hover:bg-blue-100 rounded font-semibold text-blue-600 transition">
                        <i class="fab fa-facebook"></i> فيسبوك
                    </a>
                    <a href="https://www.instagram.com/"
                       target="_blank"
                       class="flex items-center gap-1 px-3 py-2 hover:bg-pink-100 rounded font-semibold text-pink-500 transition">
                        <i class="fab fa-instagram"></i> إنستجرام
                    </a>
                    <a href="https://www.snapchat.com/add/"
                       target="_blank"
                       class="flex items-center gap-1 px-3 py-2 hover:bg-yellow-100 rounded font-semibold text-yellow-400 transition">
                        <i class="fab fa-snapchat"></i> سناب
                    </a>
                </div>
            </div>

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

            {{-- لا تنسى إضافة FontAwesome لأيقونات المنصات --}}
            {{-- <script src="https://kit.fontawesome.com/your-kit-id.js" crossorigin="anonymous"></script> --}}



            {{-- شريط سفلي زخرفي --}}
            <div class="w-full h-4 bg-gradient-to-r from-indigo-400 to-blue-400 rounded-b-xl mt-10"></div>
        </div>
    </div>

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
