@extends('layout.master')
@section('content')
    <div x-data="{ open: false, image: '', visible: 8 }" class="relative bg-gray-50 min-h-screen">
        <!-- العنوان -->
        <div class="py-16 px-4 sm:px-10 lg:px-20">
            <h1 class="text-4xl sm:text-5xl font-extrabold text-center text-gray-800 mt-20 mb-12">
                عملات عالمية نادرة
            </h1>
        </div>



        <!-- شبكة الصور -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                @foreach($coins as $index => $coin)
                    <div
                        x-show="{{ $index }} < visible"
                        class="bg-white rounded-3xl border border-gray-200 shadow-lg hover:shadow-2xl transition duration-500 overflow-hidden group"
                    >
                        <button @click="open = true; image = @js(asset('storage/' . $coin->image))" class="block w-full">
                            <img src="{{ asset('public/storage/' . $coin->image) }}"
                                 alt="{{ $coin->title }}"
                                 class="w-full h-64 sm:h-72 md:h-64 lg:h-72 object-cover transform group-hover:scale-105 transition duration-500" />
                        </button>

                        <div class="p-5 text-right">
                            <h2 class="text-lg sm:text-xl font-bold text-gray-900 truncate">{{ $coin->title }}</h2>
                            <p class="text-gray-600 mt-2 text-sm sm:text-base">{{ $coin->description }}</p>
                        </div>

                        <div class="p-5 text-right">
                            <a href="{{ route('coins.show', $coin->id) }}"
                               class="inline-block w-full text-center sm:w-auto bg-gradient-to-r from-blue-600 to-blue-500 text-black font-semibold px-5 py-3 rounded-2xl shadow-md hover:shadow-lg hover:from-blue-700 hover:to-blue-600 transition-all duration-300">
                                عرض التفاصيل
                            </a>
                        </div>
                    </div>
                @endforeach
            </div>

            <!-- زر عرض المزيد -->
            <div class="text-center mt-12" x-show="visible < {{ count($coins) }}">
                <button @click="visible += 8"
                        class="bg-gray-800 text-white font-semibold px-8 py-3 rounded-2xl shadow-lg hover:bg-gray-900 hover:scale-105 transition-all duration-300">
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
