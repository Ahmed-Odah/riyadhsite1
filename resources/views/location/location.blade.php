@extends('layout.master')

@section('content')
    <div class="bg-gray-50 min-h-screen py-16 px-6 lg:px-20">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-12">
            🗺️ خريطة الموقع
        </h1>

        <!-- شبكة خريطة الموقع -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- الرئيسية -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl text-2xl">🏠</div>
                    <h2 class="text-lg font-semibold text-gray-800">الرئيسية</h2>
                </div>
                <p class="text-gray-600 text-sm">العودة للواجهة الرئيسية.</p>
                <a href="{{ url('/') }}" class="block mt-4 text-sm font-medium text-blue-600 hover:underline">اذهب الآن →</a>
            </div>

            <!-- المقالات / المدونة -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-green-100 text-green-600 rounded-xl text-2xl">📚</div>
                    <h2 class="text-lg font-semibold text-gray-800">المقالات</h2>
                </div>
                <p class="text-gray-600 text-sm">مقالات ومواضيع متنوعة.</p>
                <a href="{{ url('/blogs') }}" class="block mt-4 text-sm font-medium text-green-600 hover:underline">تصفح →</a>
            </div>

            <!-- المعرض -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-purple-100 text-purple-600 rounded-xl text-2xl">🖼️</div>
                    <h2 class="text-lg font-semibold text-gray-800">المعرض</h2>
                </div>
                <p class="text-gray-600 text-sm">صور ولوحات فنية.</p>
                <a href="{{ url('/gallery') }}" class="block mt-4 text-sm font-medium text-purple-600 hover:underline">شاهد →</a>
            </div>

            <!-- الشهادات والدورات -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-indigo-100 text-indigo-600 rounded-xl text-2xl">🎓</div>
                    <h2 class="text-lg font-semibold text-gray-800">شهاداتي ودوراتي</h2>
                </div>
                <p class="text-gray-600 text-sm">إنجازات علمية ومهنية.</p>
                <a href="{{ url('/certificates') }}" class="block mt-4 text-sm font-medium text-indigo-600 hover:underline">عرض →</a>
            </div>

            <!-- تواصل معنا -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-red-100 text-red-600 rounded-xl text-2xl">📞</div>
                    <h2 class="text-lg font-semibold text-gray-800">تواصل معنا</h2>
                </div>
                <p class="text-gray-600 text-sm">طرق الاتصال بفريقنا.</p>
                <a href="{{ url('/contact') }}" class="block mt-4 text-sm font-medium text-red-600 hover:underline">تواصل →</a>
            </div>

            <!-- من نحن -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-yellow-100 text-yellow-600 rounded-xl text-2xl">ℹ️</div>
                    <h2 class="text-lg font-semibold text-gray-800">من نحن</h2>
                </div>
                <p class="text-gray-600 text-sm">تعرف على رؤيتنا ورسالتنا.</p>
                <a href="{{ url('/about') }}" class="block mt-4 text-sm font-medium text-yellow-600 hover:underline">اقرأ المزيد →</a>
            </div>

            <!-- الخدمات (لو عندك خدمات) -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-pink-100 text-pink-600 rounded-xl text-2xl">⚙️</div>
                    <h2 class="text-lg font-semibold text-gray-800">الخدمات</h2>
                </div>
                <p class="text-gray-600 text-sm">استعراض الخدمات المتاحة.</p>
                <a href="{{ url('/services') }}" class="block mt-4 text-sm font-medium text-pink-600 hover:underline">عرض الخدمات →</a>
            </div>

            <!-- سياسة الخصوصية -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-gray-100 text-gray-600 rounded-xl text-2xl">🔒</div>
                    <h2 class="text-lg font-semibold text-gray-800">سياسة الخصوصية</h2>
                </div>
                <p class="text-gray-600 text-sm">كيفية حماية بياناتك.</p>
                <a href="{{ url('/privacy') }}" class="block mt-4 text-sm font-medium text-gray-600 hover:underline">اعرف أكثر →</a>
            </div>

            <!-- الشروط والأحكام -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-orange-100 text-orange-600 rounded-xl text-2xl">📜</div>
                    <h2 class="text-lg font-semibold text-gray-800">الشروط والأحكام</h2>
                </div>
                <p class="text-gray-600 text-sm">القوانين والسياسات العامة.</p>
                <a href="{{ url('/terms') }}" class="block mt-4 text-sm font-medium text-orange-600 hover:underline">اقرأ الشروط →</a>
            </div>
        </div>
    </div>
@endsection
