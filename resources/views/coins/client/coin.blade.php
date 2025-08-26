@extends('layout.master')
@section('content')
    <div x-data="{ open: false, image: '', visible: 8 }" class="relative">
        <!-- العنوان -->
        <div class="bg-gray-50 min-h-screen py-16 px-4 sm:px-10 lg:px-20">
            <h1 class="text-3xl font-extrabold text-center text-gray-800 mt-20">عملات عالمية نادرة</h1>

            <!-- شبكة الصور -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-11">
                @foreach($coins as $index => $coin)
                    <div
                        x-show="{{ $index }} < visible"
                        class="bg-white rounded-2xl border border-gray-200 shadow hover:shadow-md transition duration-300 overflow-hidden"
                    >
                        <button @click="open = true; image = @js(asset('storage/' . $coin->image))" class="block w-full">
                            <img src="{{ asset('public/storage/' . $coin->image) }}"
                                 alt="{{ $coin->title }}"
                                 class="w-full h-64 object-cover hover:scale-105 transition duration-300" />
                        </button>

                        <div class="p-4 text-right">
                            <h2 class="text-lg font-semibold text-gray-900 truncate">{{ $coin->title }}</h2>
                            <p class="text-sm text-gray-600 mt-1">{{ $coin->description }}</p>
                        </div>

                        <div class="p-4 text-right">
                            <a href="{{ route('coins.show', $coin->id) }}"
                               class="mt-3 inline-block bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                                عرض التفاصيل
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- زر عرض المزيد -->
            <div class="text-center mt-8" x-show="visible < {{ count($coins) }}">
                <button @click="visible += 8"
                        class="bg-gray-800 text-white px-6 py-2 rounded-lg hover:bg-gray-900 transition">
                    عرض المزيد
                </button>
            </div>
        </div>
    </div>
@endsection
