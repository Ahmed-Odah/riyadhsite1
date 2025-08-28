@extends('layout.master')
@section('content')

    <div x-data="{ open: false, image: '' }" class="bg-gray-50 min-h-screen py-24 px-4 sm:px-6 lg:px-20 flex flex-col items-center space-y-16">

        {{-- بطاقة العملة الرئيسية --}}
        <div class="max-w-4xl w-full bg-gradient-to-r from-blue-50 to-white rounded-3xl shadow-2xl p-8 transform hover:scale-105 transition-transform duration-300">
            {{-- صورة العملة --}}
            @if($coin->image)
                <button @click="open = true; image='{{ asset('public/storage/' . $coin->image) }}'" class="w-full">
                    <img src="{{ asset('public/storage/' . $coin->image) }}"
                         alt="{{ $coin->title }}"
                         class="w-full h-96 object-cover rounded-3xl mb-6 shadow-xl hover:scale-105 transition-transform duration-300">
                </button>
            @endif

            {{-- العنوان --}}
            <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 text-center">{{ $coin->title }}</h1>

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
                            <button @click="open = true; image='{{ asset('public/storage/' . $related->image) }}'">
                                @if($related->image)
                                    <img src="{{ asset('public/storage/' . $related->image) }}"
                                         alt="{{ $related->title }}"
                                         class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                                @endif
                            </button>
                            <div class="p-5 text-right">
                                <h3 class="text-lg md:text-xl font-semibold text-gray-900 truncate mb-1">
                                    {{ $related->title }}
                                </h3>
                                @if(!empty($related->description))
                                    <p class="text-sm md:text-base text-gray-600 line-clamp-2">
                                        {{ $related->description }}
                                    </p>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
        @extends('layout.master')
        @section('content')

            <div x-data="{ open: false, flipped: false, imageFront: '', imageBack: '' }" class="bg-gray-50 min-h-screen py-24 px-4 sm:px-6 lg:px-20 flex flex-col items-center space-y-16">

                {{-- بطاقة العملة الرئيسية --}}
                <div class="max-w-4xl w-full bg-gradient-to-r from-blue-50 to-white rounded-3xl shadow-2xl p-8 transform hover:scale-105 transition-transform duration-300">
                    @if($coin->image)
                        <button @click="open = true; flipped = false; imageFront='{{ asset('public/storage/' . $coin->image) }}'; imageBack='{{ asset('public/storage/' . ($coin->back_image ?? $coin->image)) }}'" class="w-full">
                            <img src="{{ asset('public/storage/' . $coin->image) }}"
                                 alt="{{ $coin->title }}"
                                 class="w-full h-96 object-cover rounded-3xl mb-6 shadow-xl hover:scale-105 transition-transform duration-300">
                        </button>
                    @endif

                    <h1 class="text-4xl md:text-5xl font-extrabold text-gray-900 mb-4 text-center">{{ $coin->title }}</h1>

                    @if($coin->description)
                        <p class="text-gray-700 text-base md:text-lg leading-relaxed mb-6 text-justify">
                            {{ $coin->description }}
                        </p>
                    @endif

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
                                    <button @click="open = true; flipped = false; imageFront='{{ asset('public/storage/' . $related->image) }}'; imageBack='{{ asset('public/storage/' . ($related->back_image ?? $related->image)) }}'">
                                        @if($related->image)
                                            <img src="{{ asset('public/storage/' . $related->image) }}"
                                                 alt="{{ $related->title }}"
                                                 class="w-full h-64 object-cover group-hover:scale-105 transition-transform duration-300">
                                        @endif
                                    </button>
                                    <div class="p-5 text-right">
                                        <h3 class="text-lg md:text-xl font-semibold text-gray-900 truncate mb-1">{{ $related->title }}</h3>
                                        @if(!empty($related->description))
                                            <p class="text-sm md:text-base text-gray-600 line-clamp-2">{{ $related->description }}</p>
                                        @endif
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- نافذة تكبير الصورة مع flip --}}
                <div x-show="open"
                     x-transition.opacity
                     class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center z-50 p-4"
                     @click="open = false; flipped = false">
                    <div @click.stop class="relative w-full max-w-4xl [perspective:1000px]">

                        {{-- البطاقة --}}
                        <div class="w-full h-[500px] transition-transform duration-700 [transform-style:preserve-3d]"
                             :class="flipped ? '[transform:rotateY(180deg)]' : ''">

                            {{-- الوجه الأمامي --}}
                            <div class="absolute inset-0 bg-white rounded-3xl shadow-2xl flex flex-col items-center justify-center [backface-visibility:hidden]">
                                <img :src="imageFront" class="w-full h-80 object-cover rounded-3xl mb-4">
                                <h1 class="text-3xl font-extrabold text-gray-900 mb-4">{{ $coin->title }}</h1>
                                <button @click="flipped = true" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700">عرض الخلف</button>
                            </div>

                            {{-- الوجه الخلفي --}}
                            <div class="absolute inset-0 bg-gradient-to-br from-gray-50 to-gray-200 rounded-3xl shadow-2xl p-6 flex flex-col justify-between transform rotateY-180 [backface-visibility:hidden]">
                                <div class="overflow-auto">
                                    <h2 class="text-2xl font-bold text-gray-800 mb-3">{{ $coin->title }}</h2>
                                    <p class="text-gray-700 text-base leading-relaxed mb-3">
                                        {{ $coin->description ?? 'لا يوجد وصف متاح' }}
                                    </p>
                                    <p class="text-sm text-gray-600">الدولة: {{ $coin->country }}</p>
                                </div>
                                <div class="flex justify-between mt-4">
                                    <button @click="flipped = false" class="px-4 py-2 bg-red-600 text-white rounded-lg shadow hover:bg-red-700">رجوع للصورة</button>
                                    <button @click="open=false; flipped=false" class="px-4 py-2 bg-gray-500 text-white rounded-lg shadow hover:bg-gray-600">إغلاق</button>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

            </div>

@endsection
