@extends('layout.master')
@section('content')
    <div class="bg-gradient-to-r from-purple-500 to-pink-500 min-h-screen flex items-center justify-center px-4">
        <div class="max-w-4xl w-full bg-white rounded-3xl shadow-2xl p-10 text-center transform hover:scale-105 transition duration-500">

            <!-- شعار القناة -->
            <img src="public/RiyadhAlmoiqayd.jpeg" alt="قناة يوتيوب"
                 class="mx-auto w-20 h-20 md:w-24 md:h-24 rounded-full shadow-lg mb-6">

            <!-- عنوان القناة -->
            <h1 class="text-3xl md:text-4xl font-extrabold text-gray-900 mb-4">
                مرحبًا بكم في قناتي على اليوتيوب!
            </h1>

            <!-- وصف القناة -->
            <p class="text-gray-700 text-lg md:text-xl mb-6">
                هنا ستجدون محتوى رائع، فيديوهات تعليمية وممتعة، ونصائح قيمة في كل ما أقدمه.
                اشترك الآن وكن جزءًا من مجتمعنا!
            </p>

            <!-- زر الاشتراك -->
            <a href="https://youtube.com/@riyadhstar?feature=shared" target="_blank"
               class="inline-block bg-red-600 text-white px-6 py-3 rounded-xl text-lg font-semibold hover:bg-red-700 transition shadow-lg">
                اشترك الآن
            </a>

            <!-- فيديو من القناة (اختياري) -->
            <div class="mt-8">
                <iframe class="w-full h-64 md:h-96 rounded-2xl shadow-lg"
                        src="https://www.youtube.com/embed/آخر_فيديو_أو_قناتك_ID"
                        title="YouTube video player"
                        frameborder="0"
                        allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                        allowfullscreen>
                </iframe>
            </div>

            <!-- نص تشجيعي -->
            <p class="mt-6 text-gray-600 italic">
                تابعنا لتصلك كل الفيديوهات الجديدة أولاً بأول! 🎥✨
            </p>
        </div>
    </div>
@endsection
