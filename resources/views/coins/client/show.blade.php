@extends('layout.master')
@section('content')

    <div x-data="{ modalOpen: false, selectedImage: null }"
         class="bg-gray-50 min-h-screen py-24 px-4 sm:px-6 lg:px-20 flex flex-col items-center space-y-16">

        {{-- البطاقة الرئيسية --}}
        <div class="max-w-4xl w-full perspective cursor-pointer"
             @click="modalOpen = true; selectedImage = '{{ asset('storage/' . $coin->image) }}'">
            <div class="relative w-full h-96 transition-transform duration-500">
                @if($coin->image)
                    <img src="{{ asset('public/storage/' . $coin->image) }}"
                         alt="{{ $coin->title }}"
                         class="absolute w-full h-full object-cover rounded-3xl shadow-xl">
                @endif
            </div>
        </div>

        {{-- العنوان والوصف والدولة --}}
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mt-6 mb-4 text-center">{{ $coin->title }}</h1>

        @if($coin->description)
            <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-6 text-justify">{{ $coin->description }}</p>
        @endif

        <p class="text-sm md:text-base text-gray-600 mb-6 text-center font-medium tracking-wide">
            الدولة: {{ $coin->country }}
        </p>

        {{-- خط فاصل --}}
        <div class="w-full max-w-6xl border-t border-gray-200"></div>

        {{-- العملات المشابهة --}}
        @if($coin->relatedCoins->count() > 0)
            <div class="max-w-6xl w-full px-4 sm:px-6 lg:px-20">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($coin->relatedCoins as $related)
                        <div class="cursor-pointer"
                             @click="modalOpen = true; selectedImage = '{{ asset('storage/' . $related->image) }}'">
                            <div class="relative w-full h-64 transition-transform duration-500">
                                @if($related->image)
                                    <img src="{{ asset('public/storage/' . $related->image) }}"
                                         alt="{{ $related->title }}"
                                         class="absolute w-full h-full object-cover rounded-2xl shadow-lg">
                                @endif
                            </div>
                            <div class="p-3 text-center mt-2">
                                <h3 class="text-lg font-semibold text-gray-900 truncate">{{ $related->title }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- مودال عرض الصورة --}}
        <div x-show="modalOpen" x-transition.opacity
             class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-50 p-4"
             @click="modalOpen = false">
            <div @click.stop class="relative max-w-[90vw] max-h-[90vh] flex items-center justify-center">
                <img :src="selectedImage"
                     class="max-h-[90vh] max-w-[90vw] object-contain rounded-2xl shadow-2xl" />
                <button @click="modalOpen = false"
                        class="absolute top-3 right-3 text-white text-4xl font-extrabold hover:text-gray-300">&times;</button>
            </div>
        </div>

    </div>

@endsection
