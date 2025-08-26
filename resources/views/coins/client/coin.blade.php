@extends('layout.master')
@section('content')
    <div x-data="{ open: false, image: '', visible: 8 }" class="relative">

        <!-- العنوان -->
        <div class="bg-gray-50 min-h-screen py-16 px-4 sm:px-10 lg:px-20">
            <h1 class="text-3xl md:text-4xl font-extrabold text-center text-gray-800 mt-20">عملات عالمية نادرة</h1>

            <!-- شبكة الصور -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8 mt-12">
                @foreach($coins as $index => $coin)
                    <div x-show="{{ $index }} < visible"
                         class="bg-white rounded-3xl shadow-2xl hover:shadow-3xl transform hover:-translate-y-2 transition duration-500 overflow-hidden group">

                        <!-- صورة العملة -->
                        <button @click="open = true; image = '{{ asset('public/storage/' . $coin->image) }}'" class="block w-full">
                            <img src="{{ asset('public/storage/' . $coin->image) }}"
                                 alt="{{ $coin->title }}"
                                 class="w-full h-64 md:h-72 object-cover rounded-t-3xl group-hover:scale-105 transition-transform duration-500">
                        </button>

                        <!-- محتوى العملة -->
                        <div class="p-6 text-right">
                            <h2 class="text-lg md:text-xl font-semibold text-gray-900 truncate mb-2">{{ $coin->title }}</h2>
                            <p class="text-sm md:text-base text-gray-600 line-clamp-3">{{ $coin->description }}</p>

                            <!-- زر عرض التفاصيل -->
                            <a href="{{ route('coins.show', $coin->id) }}"
                               class="mt-4 inline-block bg-gradient-to-r from-yellow-400 via-orange-500 to-red-500 text-white px-5 py-2 rounded-full shadow-lg hover:shadow-xl hover:scale-105 transition-transform duration-300 font-semibold">
                                عرض التفاصيل
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- زر عرض المزيد -->
            <div class="text-center mt-10" x-show="visible < {{ count($coins) }}">
                <button @click="visible += 8"
                        class="bg-gray-800 text-white px-8 py-3 rounded-full hover:bg-gray-900 shadow-lg hover:shadow-xl transition duration-300 font-semibold">
                    عرض المزيد
                </button>
            </div>
        </div>

    </div>
@endsection
