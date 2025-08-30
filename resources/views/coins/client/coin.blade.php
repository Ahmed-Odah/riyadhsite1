@extends('layout.master')
@section('content')
    <div x-data="{ open: false, image: '', visible: 8 }" class="relative bg-gray-50 min-h-screen">
        <!-- العنوان -->
        <div class="py-8 px-3 sm:px-6 lg:px-10">
            <h1 class="text-2xl sm:text-3xl font-extrabold text-center text-gray-800 mt-10 mb-8">
                عملات عالمية نادرة
            </h1>

            <!-- شبكة الصور -->
            <div class="grid grid-cols-2 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-6 gap-4">
                @foreach($coins as $index => $coin)
                    <div
                        x-show="{{ $index }} < visible"
                        class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-md transition duration-300 overflow-hidden group w-full max-w-[150px] mx-auto"
                    >
                        <button @click="open = true; image = @js(asset('storage/' . $coin->image))" class="block w-full">
                            <img src="{{ asset('public/storage/' . $coin->image) }}"
                                 alt="{{ $coin->title }}"
                                 class="w-full h-32 object-cover transform group-hover:scale-105 transition duration-300" />
                        </button>

                        <div class="p-2 text-right">
                            <h2 class="text-sm font-bold text-gray-900 truncate">{{ $coin->title }}</h2>
                            <p class="text-gray-600 mt-1 text-xs line-clamp-2">{{ $coin->description }}</p>
                        </div>

                        <div class="p-2 text-right">
                            <a href="{{ route('coins.show', $coin->id) }}"
                               class="inline-block w-full text-center bg-gradient-to-r from-blue-600 to-blue-500 text-white font-medium px-2 py-1 rounded-lg shadow hover:shadow-md hover:from-blue-700 hover:to-blue-600 transition-all duration-300 text-xs">
                                عرض
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- زر عرض المزيد -->
            <div class="text-center mt-6" x-show="visible < {{ count($coins) }}">
                <button @click="visible += 8"
                        class="bg-gray-800 text-white font-semibold px-4 py-2 rounded-xl shadow hover:bg-gray-900 hover:scale-105 transition-all duration-300 text-xs">
                    عرض المزيد
                </button>
            </div>
        </div>

        <!-- نافذة تكبير الصورة -->
        <div x-show="open" class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50">
            <div class="relative">
                <button @click="open = false" class="absolute top-1 right-1 text-white text-2xl font-bold hover:text-gray-300">&times;</button>
                <img :src="image" class="max-w-full max-h-screen rounded-xl shadow-2xl" />
            </div>
        </div>
    </div>
@endsection
