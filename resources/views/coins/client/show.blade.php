@extends('layout.master')
@section('content')

    <div x-data="{ modalOpen: false, selectedCoin: null }"
         class="bg-gray-50 min-h-screen py-24 px-4 sm:px-6 lg:px-20 flex flex-col items-center space-y-16">

        {{-- البطاقة الرئيسية --}}
        <div class="max-w-4xl w-full cursor-pointer"
             @click="modalOpen = true; selectedCoin = @js($coin)">
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
                             @click="modalOpen = true; selectedCoin = @js($related)">
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

        {{-- مودال عرض الصورة مع قلبها --}}
        <div x-show="modalOpen" x-transition.opacity
             class="fixed inset-0 z-50 flex items-center justify-center">

            {{-- خلفية سوداء --}}
            <div class="absolute inset-0 bg-black bg-opacity-90" @click="modalOpen = false"></div>

            {{-- الصورة --}}
            <div @click.stop x-data="{ modalBack: false }"
                 class="relative flex items-center justify-center"
                 style="max-width: 70vw; max-height: 70vh;"> {{-- تم تصغير الحجم من 90 إلى 70 --}}

                <div class="relative transition-transform duration-500 flex items-center justify-center"
                     :class="{'rotate-y-180': modalBack}"
                     @click="modalBack = !modalBack">

                    {{-- الوجه --}}
                    <template x-if="!modalBack">
                        <img :src="'/public/storage/' + selectedCoin?.image"
                             class="object-contain max-w-full max-h-full rounded-2xl shadow-2xl">
                    </template>

                    {{-- الظهر --}}
                    <template x-if="modalBack">
                        <img :src="'/public/storage/' + selectedCoin?.back_image ?? selectedCoin?.image"
                             class="object-contain max-w-full max-h-full rounded-2xl shadow-2xl">
                    </template>

                </div>

                {{-- زر إغلاق --}}
                <button @click="modalOpen = false"
                        class="absolute top-3 right-3 text-white text-4xl font-extrabold hover:text-gray-300">&times;</button>
            </div>
        </div>


    </div>

    {{-- CSS --}}
    <style>
        .rotate-y-180 { transform: rotateY(180deg); transition: transform 0.5s; }
    </style>

@endsection
