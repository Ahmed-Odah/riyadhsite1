@extends('layout.master')
@section('content')
    <div x-data="{ open: false, image: '' }" class="relative">
        <!-- العنوان -->
        <div class="bg-gray-50 min-h-screen py-16 px-4 sm:px-10 lg:px-20">
            <h1 class="text-3xl font-extrabold text-center text-gray-800 mt-20">تصميم درج  </h1>

            <!-- شبكة الصور -->
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-11">
                @foreach($gyms as $gym)
                    <div class="bg-white rounded-2xl border border-gray-200 shadow hover:shadow-md transition duration-300 overflow-hidden">
                        <button @click="open = true; image = @js(asset('public/storage/' . $gym->image))" class="block w-full">
                            <img src="{{ asset('public/storage/' . $gym->image) }}"
                                 alt="{{ $gym->title }}"
                                 class="w-full h-64 object-cover hover:scale-105 transition duration-300" />
                        </button>

                        <div class="p-4 text-right">
                            <h2 class="text-lg font-semibold text-gray-900 truncate">{{ $gym->title }}</h2>
                            <p class="text-sm text-gray-600 mt-1">{{ $gym->description }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>


@endsection

