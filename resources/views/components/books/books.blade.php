<div class="bg-gray-50 min-h-screen py-20 px-6 sm:px-12 lg:px-24">
    <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-14 mt-20">مؤلفاتي</h1>

    {{-- 📚 الكتب المتاحة --}}
    <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">الكتب المتاحة</h2>
    <div class="max-w-full mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 px-4 lg:px-12 xl:px-20 mb-16">
        @foreach($books->where('is_pending', 0) as $book)
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-lg transition-shadow duration-300 flex flex-col">
                <div class="relative overflow-hidden rounded-t-xl">
                    <img
                        src="{{ $book->image ? asset('public/storage/' . $book->image) : asset('1.jpg') }}"
                        alt="غلاف الكتاب"
                        class="w-full h-120 object-cover object-center transition-transform duration-500 hover:scale-105"
                    />
                </div>
                <div class="p-5 flex flex-col flex-grow">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2 truncate text-right" title="{{ $book->title }}">
                        {{ $book->title }}
                    </h2>
                    <p class="text-gray-600 text-sm mb-6 line-clamp-5 text-right">
                        {{ $book->description }}
                    </p>
                    <a href="{{ route('book.read', $book->id) }}"
                       class="mt-auto bg-indigo-900 hover:bg-indigo-600 text-white text-sm font-medium py-2 rounded-md text-center transition-colors duration-300">
                        عرض الكتاب
                    </a>
                </div>
            </div>
        @endforeach
    </div>

    {{-- 🖨 الكتب قيد الطبع --}}
    <h2 class="text-2xl font-bold text-gray-800 mb-8 text-right">الكتب قيد الطبع</h2>
    <div class="max-w-full mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 px-4 lg:px-12 xl:px-20">
        @foreach($books->where('is_pending', 1) as $book)
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-lg transition-shadow duration-300 flex flex-col">
                <div class="relative overflow-hidden rounded-t-xl">
                    <img
                        src="{{ $book->image ? asset('public/storage/' . $book->image) : asset('1.jpg') }}"
                        alt="غلاف الكتاب"
                        class="w-full h-120 object-cover object-center transition-transform duration-500 hover:scale-105 hover:opacity-50"
                    />

                    <div class="absolute top-3 right-3 bg-yellow-500 text-white text-xs font-semibold px-3 py-1 rounded-lg shadow-md">
                        قيد الطبع
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-grow">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2 truncate text-right" title="{{ $book->title }}">
                        {{ $book->title }}
                    </h2>
                    <p class="text-gray-600 text-sm mb-6 line-clamp-5 text-right">
                        {{ $book->description }}
                    </p>
                    <span class="mt-auto text-white text-sm font-medium py-2 rounded-md text-center transition-colors duration-300"
                          style="background-color: #b8860b;">
    قيد الطبع
</span>

                </div>
            </div>
        @endforeach
    </div>
</div>
