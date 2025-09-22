@extends('layout.master')

@section('content')
    <!-- الهيدر مع الخلفية -->
    <div class="relative bg-gray-900">
        <!-- صورة الخلفية -->
        <div class="h-[60vh] w-full">
            <img src="{{ asset('public/storage/header.jpg') }}"
                 alt="الخلفية"
                 class="w-full h-full object-cover opacity-80">
        </div>

        <!-- طبقة شفافة عشان يوضح النص -->
        <div class="absolute inset-0 bg-black bg-opacity-40"></div>

        <!-- المنيو واللوجو -->
        <div class="absolute top-0 left-0 w-full">
            <div class="flex items-center justify-between px-10 py-4 text-white">
                <!-- اللوجو -->
                <div class="text-2xl font-bold">
                    RiyadhSite
                </div>

                <!-- القائمة -->
                <ul class="flex space-x-6 rtl:space-x-reverse">
                    <li><a href="#" class="hover:text-yellow-400">الرئيسية</a></li>
                    <li><a href="#" class="hover:text-yellow-400">عنّا</a></li>
                    <li><a href="#" class="hover:text-yellow-400">تصويري</a></li>
                    <li><a href="#" class="hover:text-yellow-400">معرض اللوحات</a></li>
                    <li><a href="#" class="hover:text-yellow-400">اتصل بنا</a></li>
                </ul>
            </div>
        </div>

        <!-- النص داخل الهيدر -->
        <div class="absolute inset-0 flex items-center justify-center">
            <h1 class="text-4xl md:text-6xl font-extrabold text-white drop-shadow-lg">
                مرحباً بكم في موقعنا
            </h1>
        </div>
    </div>

    <!-- باقي الصفحة -->
    <div class="container mx-auto py-20">
        <h2 class="text-3xl font-bold text-center mb-10">المحتوى هنا</h2>
        <p class="text-center text-gray-600">هذا مجرد مثال لباقي الصفحة...</p>
    </div>
@endsection
