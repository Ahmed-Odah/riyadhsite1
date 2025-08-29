@extends('layout.master')
@section('content')

    <div x-data="{ showBack: false, open: false }" class="bg-gray-50 min-h-screen py-24 px-4 sm:px-6 lg:px-20 flex flex-col items-center space-y-16">

        {{-- بطاقة العملة الرئيسية --}}
        <div class="max-w-4xl w-full perspective">
            <div
                @click="showBack = !showBack; open = true"
                class="relative w-full h-96 cursor-pointer transform transition-transform duration-500"
                :class="{'rotate-y-180': showBack}"
            >
                {{-- الوجه --}}
                @if($coin->image)
                    <img src="{{ asset('public/storage/' . $coin->image) }}"
                         alt="{{ $coin->title }}"
                         class="absolute w-full h-full object-cover rounded-3xl backface-hidden shadow-xl">
                @endif

                {{-- الظهر --}}
                @if($coin->back_image)
                    <img src="{{ asset('public/storage/' . $coin->back_image) }}"
                         alt="{{ $coin->title }} - Back"
                         class="absolute w-full h-full object-cover rounded-3xl backface-hidden rotate-y-180 shadow-xl">
                @endif
            </div>

            {{-- العنوان --}}
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mt-6 mb-4 text-center">{{ $coin->title }}</h1>

            {{-- الوصف --}}
            @if($coin->description)
                <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-6 text-justify">
                    {{ $coin->description }}
                </p>
            @endif

            {{-- الدولة --}}
            <p class="text-sm md:text-base text-gray-600 mb-6 text-center font-medium tracking-wide">
                الدولة: {{ $coin->country }}
            </p>
        </div>

        {{-- خط فاصل --}}
        <div class="w-full max-w-6xl border-t border-gray-200"></div>

        {{-- العملات المشابهة --}}
        @if($coin->relatedCoins->count() > 0)
            <div class="max-w-6xl w-full px-4 sm:px-6 lg:px-20">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    @foreach($coin->relatedCoins as $related)
                        <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition duration-300 overflow-hidden group">
                            @if($related->image)
                                <img src="{{ asset('public/storage/' . $related->image) }}"
                                     alt="{{ $related->title }}"
                                     class="w-full h-64 object-cover">
                            @endif
                            <div class="p-5 text-right">
                                <h3 class="text-lg md:text-xl font-semibold text-gray-900 truncate mb-1">
                                    {{ $related->title }}
                                </h3>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        {{-- نافذة تكبير الصور --}}
        <div x-show="open"
             x-transition.opacity
             class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4"
             @click="open = false">
            <div @click.stop class="relative w-full max-w-3xl">
                <img :src="showBack ? '{{ asset('public/storage/' . $coin->back_image) }}' : '{{ asset('storage/' . $coin->image) }}'"
                     class="w-full h-auto max-h-[70vh] object-contain rounded-xl shadow-2xl mx-auto">
                <button @click="open = false" class="absolute top-3 right-3 text-white text-3xl font-extrabold">&times;</button>
            </div>
        </div>

    </div>

    {{-- CSS --}}
    <style>
        .perspective {
            perspective: 1000px;
        }
        .backface-hidden {
            backface-visibility: hidden;
        }
        .rotate-y-180 {
            transform: rotateY(180deg);
        }
    </style>

@endsection
