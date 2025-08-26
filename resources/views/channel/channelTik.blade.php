@extends('layout.master')
@section('content')
    <div class="bg-gradient-to-r from-pink-500 to-purple-600 min-h-screen flex items-center justify-center px-4">
        <div class="max-w-4xl w-full bg-white rounded-3xl shadow-2xl p-10 text-center transform hover:scale-105 transition duration-500 relative overflow-hidden">

            <!-- تأثيرات خلفية -->
            <div class="absolute top-0 left-0 w-64 h-64 bg-pink-400 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse"></div>
            <div class="absolute bottom-0 right-0 w-64 h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-xl opacity-30 animate-pulse"></div>

            <!-- شعار القناة (مصغر) -->
            <img src="public/RiyadhAlmoiqayd.jpeg" alt="قناة تيك توك" class="mx-auto w-24 h-24 rounded-full shadow-lg mb-6 border-4 border-white">

            <!-- عنوان القناة -->
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4 ">
                تابعني على تيك توك!
            </h1>

            <!-- وصف القناة -->
            <p class="text-gray-700 text-lg md:text-xl mb-6">
                فيديوهات ممتعة ومسلية، نصائح سريعة وأفكار إبداعية!
                اضغط على الرابط وكن جزءًا من مجتمعنا الآن!
            </p>

            <!-- زر متابعة تيك توك -->
            <a href="https://www.tiktok.com/@riyadhalmokayad?_t=ZS-8yLbZwQ1ELY&_r=1" target="_blank"
               class="inline-block bg-black text-white px-8 py-4 rounded-2xl text-lg font-bold hover:bg-gray-800 transform hover:scale-110 transition duration-300 shadow-xl hover:shadow-2xl relative overflow-hidden">

                تابع الآن على تيك توك
                <!-- أيقونة تيك توك تظهر عند hover -->
                <span class="absolute top-0 left-0 w-full h-full flex items-center justify-center opacity-0 hover:opacity-100 transition duration-300">
                🎵
            </span>
            </a>

            <!-- مثال فيديو تيك توك (اختياري) -->
            <div class="mt-10">
                <iframe class="w-full h-64 md:h-96 rounded-2xl shadow-lg"
                        src="https://www.tiktok.com/embed/آخر_فيديو_أو_قناتك_ID"
                        title="TikTok video player"
                        frameborder="0"
                        allow="autoplay; clipboard-write; encrypted-media; picture-in-picture"
                        allowfullscreen>
                </iframe>
            </div>

            <!-- نص تشجيعي -->
            <p class="mt-6 text-gray-600 italic text-lg">
                اضغط على "تابع الآن على تيك توك" لتصلك أحدث الفيديوهات مباشرة! 🎵✨
            </p>
        </div>
    </div>
@endsection
