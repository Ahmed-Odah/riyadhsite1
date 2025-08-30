@extends('layout.master')
@section('content')

    <div x-data="{ showBack: false, modalOpen: false, selectedImage: null }"
         class="bg-gray-50 min-h-screen py-24 px-4 sm:px-6 lg:px-20 flex flex-col items-center space-y-16">

        {{-- البطاقة الرئيسية --}}
        <div class="max-w-4xl w-full perspective cursor-pointer"
             @click="modalOpen = true; selectedImage = '{{ asset('storage/' . $coin->image) }}'">
            <div class="flip-card-inner relative w-full h-96 transition-transform duration-500"
                 :class="{'rotate-y-180': showBack}"
                 @click.stop="showBack = !showBack">

                {{-- الوجه --}}
                @if($coin->image)
                    <img src="{{ asset('public/storage/' . $coin->image) }}"
                         alt="{{ $coin->title }}"
                         class="flip-card-front absolute w-full h-full object-cover rounded-3xl backface-hidden shadow-xl">
                @endif

                {{-- الظهر --}}
                @if($coin->back_image)
                    <img src="{{ asset('public/storage/' . $coin->back_image) }}"
                         alt="{{ $coin->title }} - Back"
                         class="flip-card-back absolute w-full h-full object-cover rounded-3xl backface-hidden rotate-y-180 shadow-xl"
                         @click="modalOpen = true; selectedImage = '{{ asset('storage/' . $coin->back_image) }}'">
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
                        <div class="perspective cursor-pointer"
                             @click="modalOpen = true; selectedImage = '{{ asset('storage/' . $related->image) }}'">
                            <div class="flip-card-inner relative w-full h-64 transition-transform duration-500"
                                 x-data="{ showBack: false }"
                                 :class="{'rotate-y-180': showBack}"
                                 @click.stop="showBack = !showBack">
                                @if($related->image)
                                    <img src="{{ asset('public/storage/' . $related->image) }}"
                                         alt="{{ $related->title }}"
                                         class="flip-card-front absolute w-full h-full object-cover rounded-2xl backface-hidden shadow-lg">
                                @endif
                                @if(isset($related->back_image))
                                    <img src="{{ asset('public/storage/' . $related->back_image) }}"
                                         alt="{{ $related->title }} - Back"
                                         class="flip-card-back absolute w-full h-full object-cover rounded-2xl backface-hidden rotate-y-180 shadow-lg"
                                         @click="modalOpen = true; selectedImage = '{{ asset('storage/' . $related->back_image) }}'">
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

        {{-- نافذة تكبير الصور (مودال) --}}
        <div x-show="modalOpen" x-transition.opacity
             class="fixed inset-0 bg-black bg-opacity-90 flex items-center justify-center z-50 p-4"
             @click="modalOpen = false">

            <div @click.stop class="relative max-w-5xl max-h-[90vh] flex items-center justify-center">
                <img :src="selectedImage"
                     class="max-h-[90vh] max-w-[90vw] object-contain rounded-2xl shadow-2xl" />
                {{-- زر إغلاق --}}
                <button @click="modalOpen = false"
                        class="absolute top-3 right-3 text-white text-4xl font-extrabold hover:text-gray-300">&times;</button>
            </div>
        </div>

    </div>

    {{-- CSS --}}
    <style>
        .perspective { perspective: 1000px; }
        .flip-card-inner { transform-style: preserve-3d; }
        .flip-card-front, .flip-card-back { backface-visibility: hidden; position: absolute; width: 100%; height: 100%; }
        .flip-card-back { transform: rotateY(180deg); }
        .rotate-y-180 { transform: rotateY(180deg); }
    </style>

@endsection
