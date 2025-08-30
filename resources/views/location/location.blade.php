@extends('layout.master')

@section('content')
    <div class="bg-gray-50 min-h-screen py-16 px-6 lg:px-20">
        <h1 class="text-4xl font-extrabold text-center text-gray-800 mt-20 mb-12">
            ️ خريطة الموقع
        </h1>



        <!-- شبكة خريطة الموقع -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

            <!-- الرئيسية -->
            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl text-2xl"></div>
                    <h2 class="text-lg font-semibold text-gray-800">الرئيسية</h2>
                </div>
                <p class="text-gray-600 text-sm">العودة للواجهة الرئيسية.</p>
                <a href="{{ url('/') }}" class="block mt-4 text-sm font-medium text-blue-600 hover:underline">اذهب الآن →</a>
            </div>




            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl text-2xl"></div>
                    <h2 class="text-lg font-semibold text-gray-800">عني</h2>
                </div>
                <p class="text-gray-600 text-sm">العودة للواجهة الرئيسية.</p>
                <a href="{{ url('/') }}" class="block mt-4 text-sm font-medium text-blue-600 hover:underline">اذهب الآن →</a>
            </div>


            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl text-2xl"></div>
                    <h2 class="text-lg font-semibold text-gray-800">مؤلفاتي</h2>
                </div>
                <p class="text-gray-600 text-sm">العودة للواجهة الرئيسية.</p>
                <a href="{{ url('/') }}" class="block mt-4 text-sm font-medium text-blue-600 hover:underline">اذهب الآن →</a>
            </div>

            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl text-2xl"></div>
                    <h2 class="text-lg font-semibold text-gray-800">تصويري</h2>
                </div>
                <p class="text-gray-600 text-sm">العودة للواجهة الرئيسية.</p>
                <a href="{{ url('/') }}" class="block mt-4 text-sm font-medium text-blue-600 hover:underline">اذهب الآن →</a>
            </div>

            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl text-2xl"></div>
                    <h2 class="text-lg font-semibold text-gray-800">صوو الديكورات</h2>
                </div>
                <p class="text-gray-600 text-sm">العودة للواجهة الرئيسية.</p>
                <a href="{{ url('/') }}" class="block mt-4 text-sm font-medium text-blue-600 hover:underline">اذهب الآن →</a>
            </div>


            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl text-2xl"></div>
                    <h2 class="text-lg font-semibold text-gray-800">معرض اللوحات</h2>
                </div>
                <p class="text-gray-600 text-sm">العودة للواجهة الرئيسية.</p>
                <a href="{{ url('/') }}" class="block mt-4 text-sm font-medium text-blue-600 hover:underline">اذهب الآن →</a>
            </div>


            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl text-2xl"></div>
                    <h2 class="text-lg font-semibold text-gray-800">الشهادات والدورات</h2>
                </div>
                <p class="text-gray-600 text-sm">العودة للواجهة الرئيسية.</p>
                <a href="{{ url('/') }}" class="block mt-4 text-sm font-medium text-blue-600 hover:underline">اذهب الآن →</a>
            </div>

            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl text-2xl"></div>
                    <h2 class="text-lg font-semibold text-gray-800">المدونة</h2>
                </div>
                <p class="text-gray-600 text-sm">العودة للواجهة الرئيسية.</p>
                <a href="{{ url('/') }}" class="block mt-4 text-sm font-medium text-blue-600 hover:underline">اذهب الآن →</a>
            </div>


            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl text-2xl"></div>
                    <h2 class="text-lg font-semibold text-gray-800">عملات عالمية</h2>
                </div>
                <p class="text-gray-600 text-sm">العودة للواجهة الرئيسية.</p>
                <a href="{{ url('/') }}" class="block mt-4 text-sm font-medium text-blue-600 hover:underline">اذهب الآن →</a>
            </div>

            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl text-2xl"></div>
                    <h2 class="text-lg font-semibold text-gray-800">ملخصات الكتب </h2>
                </div>
                <p class="text-gray-600 text-sm">العودة للواجهة الرئيسية.</p>
                <a href="{{ url('/') }}" class="block mt-4 text-sm font-medium text-blue-600 hover:underline">اذهب الآن →</a>
            </div>

            <div class="bg-white shadow-md rounded-2xl p-6 hover:shadow-lg transition">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-12 h-12 flex items-center justify-center bg-blue-100 text-blue-600 rounded-xl text-2xl"></div>
                    <h2 class="text-lg font-semibold text-gray-800">قنواتي</h2>
                </div>
                <p class="text-gray-600 text-sm">العودة للواجهة الرئيسية.</p>
                <a href="{{ url('/') }}" class="block mt-4 text-sm font-medium text-blue-600 hover:underline">اذهب الآن →</a>
            </div>












        </div>
    </div>
@endsection
