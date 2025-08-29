@extends('layout.master')
@section('content')

    <div x-data="{ showBack: false, modalOpen: false, modalBack: false }"
         class="bg-gray-50 min-h-screen py-48 px-4 sm:px-6 lg:px-20 flex flex-col items-center space-y-16">
        {{-- بدلنا py-36 إلى py-48 عشان المحتوى ينزل لتحت أكثر --}}

        {{-- البطاقة الصغيرة --}}
        <div class="max-w-4xl w-full perspective cursor-pointer mt-20" @click="modalOpen = true">
            {{-- بدلنا mt-10 إلى mt-20 --}}
            <div class="flip-card-inner relative w-full h-96 transition-transform duration-500" :class="{'rotate-y-180': showBack}" @click.stop="showBack = !showBack">

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
        <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mt-16 mb-4 text-center">{{ $coin->title }}</h1>
        {{-- بدلنا mt-12 إلى mt-16 عشان ينزل العنوان أكثر --}}

        @if($coin->description)
            <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-6 text-justify">{{ $coin->description }}</p>
        @endif

        <p class="text-sm md:text-base text-gray-600 mb-6 text-center font-medium tracking-wide">الدولة: {{ $coin->country }}</p>

        {{-- خط فاصل --}}
        <div class="w-full max-w-6xl border-t border-gray-200"></div>

        {{-- العملات المشابهة --}}
        @if($coin->relatedCoins->count() > 0)
            <div class="max-w-6xl w-full px-4 sm:px-6 lg:px-20 mt-16">
                {{-- بدلنا mt-10 إلى mt-16 --}}
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($coin->relatedCoins as $related)
                        <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition duration-300 overflow-hidden group">
                            @if($related->image)
                                <img src="{{ asset('public/storage/' . $related->image) }}" alt="{{ $related->title }}" class="w-full h-64 object-cover">
                            @endif
                            <div class="p-5 text-right">
                                <h3 class="text-lg md:text-xl font-semibold text-gray-900 truncate mb-1">{{ $related->title }}</h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- نافذة تكبير الصور --}}
        <div x-show="modalOpen" x-transition.opacity class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4">
            <div @click.away="modalOpen = false" @click.stop class="relative w-full max-w-3xl perspective cursor-pointer mt-28" @click="modalBack = !modalBack">
                {{-- بدلنا mt-20 إلى mt-28 --}}
                <div class="flip-card-inner relative w-full h-[70vh] transition-transform duration-500" :class="{'rotate-y-180': modalBack}">
                    <img src="{{ asset('public/storage/' . $coin->image) }}" class="flip-card-front absolute w-full h-full object-contain backface-hidden rounded-xl shadow-2xl">
                    <img src="{{ asset('public/storage/' . $coin->back_image) }}" class="flip-card-back absolute w-full h-full object-contain backface-hidden rotate-y-180 rounded-xl shadow-2xl">
                </div>
                <button @click="modalOpen = false" class="absolute top-3 right-3 text-white text-3xl font-extrabold">&times;</button>
            </div>
        </div>

    </div>

    {{-- CSS --}}
    <style>
        .perspective {
            perspective: 1000px;
        }
        .flip-card-inner {
            transform-style: preserve-3d;
        }
        .flip-card-front, .flip-card-back {
            backface-visibility: hidden;
            position: absolute;
            width: 100%;
            height: 100%;
        }
        .flip-card-back {
            transform: rotateY(180deg);
        }
        .rotate-y-180 {
            transform: rotateY(180deg);
        }
    </style>

@endsection
