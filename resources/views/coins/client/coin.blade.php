@extends('layout.master')
@section('content')
    <div x-data="{ open: false, image: '', visible: 8 }" class="relative bg-gray-50 min-h-screen">
        <!-- العنوان -->
        <div class="py-12 px-4 sm:px-10 lg:px-20">
            <h1 class="text-3xl sm:text-4xl font-extrabold text-center text-gray-800 mt-16 mb-10">
                عملات عالمية نادرة
            </h1>

            <!-- شبكة الصور -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5 gap-6">
                @foreach($coins as $index => $coin)
                    <div
                        x-show="{{ $index }} < visible"
                        class="bg-white rounded-2xl border border-gray-200 shadow-md hover:shadow-xl transition duration-500 overflow-hidden group w-full max-w-xs mx-auto"
                    >
                        <button @click="open = true; image = @js(asset('storage/' . $coin->image))" class="block w-full">
                            <img src="{{ asset('public/storage/' . $coin->image) }}"
                                 alt="{{ $coin->title }}"
                                 class="w-full h-48 sm:h-56 md:h-48 lg:h-56 object-cover transform group-hover:scale-105 transition duration-500" />
                        </button>

                        <div class="p-4 text-right">
                            <h2 class="text-base sm:text-lg font-bold text-gray-900 truncate">{{ $coin->title }}</h2>
                            <p class="text-gray-600 mt-1 text-sm">{{ $coin->description }}</p>
                        </div>

                        <div class="p-4 text-right">
                            <a href="{{ route('coins.show', $coin->id) }}"
                               class="inline-block w-full text-center sm:w-auto bg-gradient-to-r from-blue-600 to-blue-500 text-white font-semibold px-4 py-2 rounded-xl shadow hover:shadow-lg hover:from-blue-700 hover:to-blue-600 transition-all duration-300 text-sm">
                                عرض التفاصيل
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- زر عرض المزيد -->
            <div class="text-center mt-10" x-show="visible < {{ count($coins) }}">
                <button @click="visible += 8"
                        class="bg-gray-800 text-white font-semibold px-6 py-2 rounded-2xl shadow-lg hover:bg-gray-900 hover:scale-105 transition-all duration-300 text-sm">
                    عرض المزيد
                </button>
            </div>
        </div>

        <!-- نافذة تكبير الصورة -->
        <div x-show="open" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">
            <div class="relative">
                <button @click="open = false" class="absolute top-2 right-2 text-white text-3xl font-bold hover:text-gray-300">&times;</button>
                <img :src="image" class="max-w-full max-h-screen rounded-2xl shadow-2xl" />
            </div>
        </div>
    </div>
@endsection
