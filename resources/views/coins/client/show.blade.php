@extends('layout.master')
@section('content')

    <div x-data="{ open: false, image: '' }" class="bg-gradient-to-b from-gray-100 via-white to-gray-50 min-h-screen py-24 px-4 sm:px-6 lg:px-20 flex flex-col items-center space-y-16">

        {{-- بطاقة العملة الرئيسية --}}
        <div class="max-w-3xl w-full bg-gradient-to-r from-yellow-100 via-white to-yellow-50 rounded-3xl shadow-2xl p-8 transform hover:scale-105 transition-transform duration-500">
            {{-- صورة العملة --}}
            @if($coin->image)
                <button @click="open = true; image = '{{ asset('public/storage/' . $coin->image) }}'" class="w-full">
                    <img src="{{ asset('public/storage/' . $coin->image) }}"
                         alt="{{ $coin->title }}"
                         class="w-full h-80 md:h-96 object-cover rounded-3xl mb-6 shadow-xl hover:scale-105 transition-transform duration-500">
                </button>
            @endif

            {{-- العنوان --}}
            <h1 class="text-3xl md:text-5xl font-extrabold text-gray-900 mb-4 text-center drop-shadow-lg">{{ $coin->title }}</h1>

            {{-- الوصف --}}
            @if($coin->description)
                <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-6 text-justify tracking-wide">
                    {{ $coin->description }}
                </p>
            @endif

            {{-- الدولة --}}
            <p class="text-sm md:text-base text-gray-800 mb-6 text-center font-semibold tracking-wider">
                الدولة: <span class="text-indigo-600">{{ $coin->country }}</span>
            </p>
        </div>

        {{-- خط فاصل --}}
        <div class="w-full max-w-6xl border-t-2 border-gray-300 opacity-50"></div>

        {{-- العملات المشابهة --}}
        @if($coin->relatedCoins->count() > 0)
            <div class="max-w-6xl w-full px-4 sm:px-6 lg:px-0">
                <h2 class="text-2xl font-bold text-gray-900 mb-6 text-center drop-shadow-md">عملات مشابهة</h2>
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-8">
                    @foreach($coin->relatedCoins as $related)
                        <div class="bg-white rounded-3xl shadow-xl hover:shadow-2xl transform hover:-translate-y-2 transition duration-500 overflow-hidden group relative">
                            <button @click="open = true; image = '{{ asset('public/storage/' . $related->image) }}'" class="w-full">
                                @if($related->image)
                                    <img src="{{ asset('public/storage/' . $related->image) }}"
                                         alt="{{ $related->title }}"
                                         class="w-full h-56 md:h-64 object-cover group-hover:scale-105 transition-transform duration-500 rounded-t-3xl">
                                @endif
                            </button>
                            <div class="p-5 text-right">
                                <h3 class="text-lg md:text-xl font-semibold text-gray-900 truncate mb-2 drop-shadow-sm">{{ $related->title }}</h3>
                                @if(!empty($related->description))
                                    <p class="text-sm md:text-base text-gray-600 line-clamp-2 tracking-wide">
                                        {{ $related->description }}
                                    </p>
                                @endif
                            </div>
                            {{-- تأثير ظل عند المرور --}}
                            <div class="absolute inset-0 bg-gradient-to-b from-transparent via-transparent to-yellow-50 opacity-0 group-hover:opacity-20 transition-opacity duration-500 rounded-3xl"></div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif

        <div x-data="{ open: false, image: '' }" class="min-h-screen flex flex-col items-center space-y-16">

            {{-- صورة العملة الرئيسية --}}
            @if($coin->image)
                <button @click="image='{{ asset('public/storage/' . $coin->image) }}'; open=true">
                    <img src="{{ asset('public/storage/' . $coin->image) }}"
                         alt="{{ $coin->title }}"
                         class="w-full max-w-3xl h-auto object-contain rounded-3xl shadow-xl mb-6 cursor-pointer">
                </button>
            @endif

            {{-- نافذة تكبير الصورة --}}
            <div x-show="open"
                 x-transition:enter="transition ease-out duration-300"
                 x-transition:enter-start="opacity-0 scale-90"
                 x-transition:enter-end="opacity-100 scale-100"
                 x-transition:leave="transition ease-in duration-200"
                 x-transition:leave-start="opacity-100 scale-100"
                 x-transition:leave-end="opacity-0 scale-90"
                 class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4"
                 style="display: none;"
                 @click="open = false">
                <div @click.stop class="relative max-w-5xl w-full">
                    <img :src="image" class="w-full h-auto max-h-[90vh] object-contain rounded-xl shadow-2xl">
                    <button @click="open = false" class="absolute top-3 right-3 text-white text-4xl font-extrabold">&times;</button>
                </div>
            </div>

        </div>


    </div>

@endsection
