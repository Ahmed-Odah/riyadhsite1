@extends('layout.master')
@section('content')

    <div x-data="{ modalOpen: false, modalBack: false, selectedCoin: null }" class="bg-gray-50 min-h-screen py-24 px-4 sm:px-6 lg:px-20 flex flex-col items-center space-y-16">

        {{-- البطاقة الرئيسية --}}
        <div class="max-w-4xl w-full perspective cursor-pointer" @click="modalOpen = true; selectedCoin = @js($coin)">
            <div class="flip-card-inner relative w-full h-96 transition-transform duration-500">
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
                         class="flip-card-back absolute w-full h-full object-cover rounded-3xl backface-hidden rotate-y-180 shadow-xl">
                @endif
            </div>
        </div>

        {{-- العنوان والوصف والدولة --}}
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mt-6 mb-4 text-center">{{ $coin->title }}</h1>

        @if($coin->description)
            <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-6 text-justify">{{ $coin->description }}</p>
        @endif

        <p class="text-sm md:text-base text-gray-600 mb-6 text-center font-medium tracking-wide">الدولة: {{ $coin->country }}</p>

        {{-- خط فاصل --}}
        <div class="w-full max-w-6xl border-t border-gray-200"></div>

        {{-- العملات المشابهة --}}
        @if($coin->relatedCoins->count() > 0)
            <div class="max-w-6xl w-full px-4 sm:px-6 lg:px-20">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($coin->relatedCoins as $related)
                        <div class="perspective cursor-pointer" @click="modalOpen = true; selectedCoin = @js($related)">
                            <div class="flip-card-inner relative w-full h-64 transition-transform duration-500">
                                @if($related->image)
                                    <img src="{{ asset('public/storage/' . $related->image) }}"
                                         alt="{{ $related->title }}"
                                         class="flip-card-front absolute w-full h-full object-cover rounded-2xl backface-hidden shadow-lg">
                                @endif
                                @if(isset($related->back_image))
                                    <img src="{{ asset('public/storage/' . $related->back_image) }}"
                                         alt="{{ $related->title }} - Back"
                                         class="flip-card-back absolute w-full h-full object-cover rounded-2xl backface-hidden rotate-y-180 shadow-lg">
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

        {{-- نافذة تكبير الصور لجميع العملات --}}
        <div x-show="modalOpen" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4" @click="modalOpen = false">
            <div @click.stop class="relative w-full max-w-3xl perspective cursor-pointer" x-data="{ modalBack: false }" :key="selectedCoin?.id" @click="modalBack = !modalBack">
                <div class="flip-card-inner relative w-full h-[70vh] transition-transform duration-500" :class="{'rotate-y-180': modalBack}">
                    <template x-if="selectedCoin?.image">
                        <img :src="'/storage/' + selectedCoin.image" class="flip-card-front absolute w-full h-full object-contain backface-hidden rounded-xl shadow-2xl">
                    </template>
                    <template x-if="selectedCoin?.back_image">
                        <img :src="'/storage/' + selectedCoin.back_image" class="flip-card-back absolute w-full h-full object-contain backface-hidden rotate-y-180 rounded-xl shadow-2xl">
                    </template>
                </div>
                <button @click="modalOpen = false" class="absolute top-3 right-3 text-white text-3xl font-extrabold">&times;</button>
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
