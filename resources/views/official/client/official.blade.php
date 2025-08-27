@extends('layout.master')
@section('content')
    <div x-data="{ open: false, image: '' }" class="relative">
        <!-- العنوان -->
        <div class="bg-gray-50 min-h-screen py-16 px-4 sm:px-10 lg:px-20">
            <h1 class="text-3xl font-extrabold text-center text-gray-800 mt-20">صور رسمية</h1>

            <!-- شبكة الصور -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-11">
                @foreach($officials as $official)
                    <div class="bg-white rounded-2xl border border-gray-200 shadow hover:shadow-md transition duration-300 overflow-hidden">
                        <button @click="open = true; image = @js(asset('public/storage/' . $official->image))" class="block w-full">
                            <img src="{{ asset('public/storage/' . $official->image) }}"
                                 alt="{{ $official->title }}"
                                 class="w-full h-full object-cover hover:scale-105 transition duration-300" />
                        </button>

                        <div class="p-4 text-right">
                            <h2 class="text-lg font-semibold text-gray-900 truncate">{{ $official->title }}</h2>
                            <p class="text-sm text-gray-600 mt-1">{{ $official->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        <!-- نافذة التكبير -->
        <div x-show="open"
             x-transition.opacity
             style="background-color: rgba(0, 0, 0, 0.5);"
             class="fixed inset-0 flex items-center justify-center z-50 p-4"
             @click="open = false">
            <div @click.stop class="relative flex items-center justify-center">
                <!-- الصورة وسط ومصغرة -->
                <img :src="image"
                     class="max-w-3xl w-full max-h-[80vh] object-contain rounded-lg shadow-lg mx-auto">

                <!-- زر الإغلاق -->
                <button @click="open = false"
                        class="absolute top-2 right-2 text-white text-3xl font-bold hover:text-gray-300">
                    &times;
                </button>
            </div>
        </div>

    </div>
@endsection
