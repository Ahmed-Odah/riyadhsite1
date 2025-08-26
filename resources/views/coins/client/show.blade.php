<div x-data="{ open: false, image: '' }" class="bg-gray-50 min-h-screen py-24 px-4 sm:px-6 lg:px-20 flex flex-col items-center space-y-16">

    {{-- بطاقة العملة الرئيسية --}}
    <div class="max-w-4xl w-full bg-gradient-to-r from-blue-50 to-white rounded-3xl shadow-lg p-6 transform hover:scale-105 transition-transform duration-300">
        {{-- صورة العملة --}}
        @if($coin->image)
            <button @click="open = true; image='{{ asset('public/storage/' . $coin->image) }}'" class="w-full">
                <img src="{{ asset('public/storage/' . $coin->image) }}"
                     alt="{{ $coin->title }}"
                     class="w-full h-48 md:h-56 object-cover rounded-2xl mb-4 shadow-md hover:scale-105 transition-transform duration-300">
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

    {{-- نافذة تكبير الصور --}}
    <div x-show="open"
         x-transition.opacity
         class="fixed inset-0 bg-black bg-opacity-70 flex items-center justify-center z-50 p-4"
         @click="open = false">
        <div @click.stop class="relative w-full max-w-3xl">
            <img :src="image"
                 class="w-full h-auto max-h-[70vh] object-contain rounded-xl shadow-2xl mx-auto">
            <button @click="open = false" class="absolute top-3 right-3 text-white text-3xl font-extrabold">&times;</button>
        </div>
    </div>

</div>
