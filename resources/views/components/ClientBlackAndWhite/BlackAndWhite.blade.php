@extends('layout.master')
@section('content')
    <div x-data="{ open: false, image: '', visible: 12 }" class="relative">
        <!-- العنوان -->
        <div class="bg-gray-50 min-h-screen py-16 px-4 sm:px-10 lg:px-20">
            <h1 class="text-3xl font-extrabold text-center text-gray-800 mt-20">تصويري</h1>

            <!-- شبكة الصور -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-11">
                @foreach($clients as $index => $client)
                    <div x-show="{{ $index }} < visible"
                         class="bg-white rounded-2xl border border-gray-200 shadow hover:shadow-md transition duration-300 overflow-hidden">

                        <!-- عند الضغط نخزن الصورة -->
                        <button @click="open = true; image = '{{ asset('public/storage/' . $client->image) }}'"
                                class="block w-full">
                            <img src="{{ asset('public/storage/' . $client->image) }}"
                                 alt="{{ $client->title }}"
                                 class="w-full h-64 object-cover hover:scale-105 transition duration-300" />
                        </button>

                        <!-- النص -->
                        <div class="p-4 text-right">
                            <h2 class="text-lg font-semibold text-gray-900 truncate">{{ $client->title }}</h2>
                            <p class="text-sm text-gray-600 mt-1">{{ $client->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- زر عرض المزيد -->
            <div class="flex justify-center mt-8" x-show="visible < {{ count($clients) }}">
                <button @click="visible += 12"
                        class="px-6 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
                    عرض المزيد
                </button>
            </div>
        </div>

        <!-- نافذة التكبير -->
        <div x-show="open"
             x-transition.opacity
             class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50"
             @click="open = false">

            <div @click.stop class="relative bg-gray-900 rounded-xl shadow-lg overflow-hidden"
                 style="width: 500px; height: 400px;"> <!-- 👈 هنا حجم الفريم ثابت -->

                <!-- الصورة داخل فريم صغير -->
                <img :src="image" class="w-full h-full object-contain" />

                <!-- زر الإغلاق -->
                <button @click="open = false"
                        class="absolute top-2 right-2 text-white text-3xl font-bold">&times;</button>
            </div>
        </div>
    </div>
@endsection
