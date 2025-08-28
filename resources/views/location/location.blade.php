@extends('layout.master')

@section('content')
    <div class="bg-gray-50 min-h-screen py-16 px-6 lg:px-20">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mb-12">
            🗺️ خريطة الموقع
        </h1>

        <!-- شبكة خريطة الموقع -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- قسم -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl text-2xl">
                        🏠
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800">الصفحة الرئيسية</h2>
                </div>
                <p class="text-gray-600 text-sm">العودة للواجهة الرئيسية للموقع.</p>
                <a href="{{ url('/') }}" class="block mt-4 text-sm font-medium text-blue-600 hover:underline">اذهب الآن →</a>
            </div>

            <!-- قسم -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-green-100 text-green-600 rounded-xl text-2xl">
                        📚
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800">المقالات</h2>
                </div>
                <p class="text-gray-600 text-sm">اكتشف المقالات والمواضيع المميزة.</p>
                <a href="{{ url('/blogs') }}" class="block mt-4 text-sm font-medium text-green-600 hover:underline">تصفح →</a>
            </div>

            <!-- قسم -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-purple-100 text-purple-600 rounded-xl text-2xl">
                        🖼️
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800">المعرض</h2>
                </div>
                <p class="text-gray-600 text-sm">شاهد الصور والأعمال الفنية.</p>
                <a href="{{ url('/gallery') }}" class="block mt-4 text-sm font-medium text-purple-600 hover:underline">عرض المعرض →</a>
            </div>

            <!-- قسم -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-red-100 text-red-600 rounded-xl text-2xl">
                        📞
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800">اتصل بنا</h2>
                </div>
                <p class="text-gray-600 text-sm">طرق التواصل مع فريقنا.</p>
                <a href="{{ url('/contact') }}" class="block mt-4 text-sm font-medium text-red-600 hover:underline">تواصل معنا →</a>
            </div>

            <!-- قسم -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-yellow-100 text-yellow-600 rounded-xl text-2xl">
                        ℹ️
                    </div>
                    <h2 class="text-lg font-semibold text-gray-800">من نحن</h2>
                </div>
                <p class="text-gray-600 text-sm">تعرف على رؤيتنا ورسالتنا.</p>
                <a href="{{ url('/about') }}" class="block mt-4 text-sm font-medium text-yellow-600 hover:underline">تعرف أكثر →</a>
            </div>
        </div>
    </div>
@endsection
