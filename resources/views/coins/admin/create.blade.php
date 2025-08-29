@extends('layout.master')
@section('content')

    <div x-data="{ modalOpen: false, modalBack: false, selectedCoin: null }" class="bg-gray-50 min-h-screen py-24 px-4 sm:px-6 lg:px-20 flex flex-col items-center space-y-16">

        {{-- البطاقة الرئيسية --}}
        <div class="max-w-4xl w-full perspective cursor-pointer transform transition duration-300 hover:scale-105"
             @click="
            modalOpen = true;
            selectedCoin = {
                id: {{ $coin->id }},
                title: '{{ $coin->title }}',
                image: '{{ $coin->image ? asset('storage/' . $coin->image) : '' }}',
                back_image: '{{ $coin->back_image ? asset('storage/' . $coin->back_image) : '' }}'
            };
            modalBack = false;
         ">
            <div class="flip-card-inner relative w-full h-96 transition-transform duration-500 shadow-lg rounded-3xl">
                @if($coin->image)
                    <img src="{{ asset('storage/' . $coin->image) }}"
                         alt="{{ $coin->title }}"
                         class="flip-card-front absolute w-full h-full object-cover rounded-3xl backface-hidden">
                @endif
                @if($coin->back_image)
                    <img src="{{ asset('storage/' . $coin->back_image) }}"
                         alt="{{ $coin->title }} - Back"
                         class="flip-card-back absolute w-full h-full object-cover rounded-3xl backface-hidden rotate-y-180">
                @endif
            </div>
        </div>

        {{-- معلومات العملة --}}
        <div class="max-w-4xl w-full text-center">
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4">{{ $coin->title }}</h1>
            @if($coin->description)
                <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-4">{{ $coin->description }}</p>
            @endif
            <p class="text-gray-600 font-medium tracking-wide mb-2">الدولة: <span class="text-gray-800 font-semibold">{{ $coin->country }}</span></p>
        </div>

        <div class="w-full max-w-6xl border-t border-gray-200"></div>

        {{-- العملات المشابهة --}}
        @if($coin->relatedCoins->count() > 0)
            <div class="max-w-6xl w-full px-4 sm:px-6 lg:px-20">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center">عملات مشابهة</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($coin->relatedCoins as $related)
                        <div class="perspective cursor-pointer transform transition duration-300 hover:scale-105"
                             @click="
                            modalOpen = true;
                            selectedCoin = {
                                id: {{ $related->id }},
                                title: '{{ $related->title }}',
                                image: '{{ $related->image ? asset('storage/' . $related->image) : '' }}',
                                back_image: '{{ $related->back_image ? asset('storage/' . $related->back_image) : '' }}'
                            };
                            modalBack = false;
                         ">
                            <div class="flip-card-inner relative w-full h-64 shadow rounded-2xl overflow-hidden">
                                @if($related->image)
                                    <img src="{{ asset('storage/' . $related->image) }}"
                                         alt="{{ $related->title }}"
                                         class="flip-card-front absolute w-full h-full object-cover backface-hidden">
                                @endif
                                @if(isset($related->back_image))
                                    <img src="{{ asset('storage/' . $related->back_image) }}"
                                         alt="{{ $related->title }} - Back"
                                         class="flip-card-back absolute w-full h-full object-cover backface-hidden rotate-y-180">
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

        {{-- نافذة تكبير الصور --}}
        <div x-show="modalOpen" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 p-4" @click="modalOpen = false">
            <div @click.stop class="relative w-full max-w-3xl perspective cursor-pointer">
                <div class="flip-card-inner relative w-full h-[70vh] transition-transform duration-500 rounded-xl overflow-hidden shadow-2xl" :class="{'rotate-y-180': modalBack}">
                    <template x-if="selectedCoin?.image">
                        <img :src="selectedCoin.image" class="flip-card-front absolute w-full h-full object-contain backface-hidden">
                    </template>
                    <template x-if="selectedCoin?.back_image">
                        <img :src="selectedCoin.back_image" class="flip-card-back absolute w-full h-full object-contain backface-hidden rotate-y-180">
                    </template>
                </div>
                <div class="flex justify-between items-center mt-4">
                    <button @click="modalBack = !modalBack" class="mx-auto bg-white text-gray-800 px-4 py-2 rounded-lg shadow-lg hover:bg-gray-100 transition">تقليب العملة</button>
                    <button @click="modalOpen = false" class="absolute top-3 right-3 text-white text-3xl font-extrabold">&times;</button>
                </div>
            </div>
        </div>

        {{-- مثال: ملف PDF أو مستند --}}
        <div class="max-w-4xl w-full mt-12 flex flex-wrap justify-center gap-6">
            <a href="/files/example.pdf" target="_blank" class="group relative w-40 h-40 bg-gray-100 rounded-xl shadow hover:shadow-2xl transform transition duration-300 hover:-translate-y-2 flex items-center justify-center">
                <svg class="w-16 h-16 text-gray-500 group-hover:text-blue-500 transition duration-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 0C5.372 0 0 5.372 0 12s5.372 12 12 12 12-5.372 12-12S18.628 0 12 0zm1 17h-2v-2h2v2zm0-4h-2V7h2v6z"/>
                </svg>
                <span class="absolute bottom-2 text-gray-700 font-medium text-sm text-center">PDF Example</span>
            </a>
        </div>

    </div>

    <style>
        .perspective { perspective: 1000px; }
        .flip-card-inner { transform-style: preserve-3d; transition: transform 0.5s; }
        .flip-card-front, .flip-card-back { backface-visibility: hidden; position: absolute; width: 100%; height: 100%; }
        .flip-card-back { transform: rotateY(180deg); }
        .rotate-y-180 { transform: rotateY(180deg); }
    </style>

@endsection
