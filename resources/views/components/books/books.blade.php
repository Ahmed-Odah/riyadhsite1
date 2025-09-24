<div class="bg-gray-50 min-h-screen py-20 px-6 sm:px-12 lg:px-24">
    <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-14 mt-10">مؤلفاتي</h1>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
        {{-- 📚 الكتب المتاحة --}}
        <div>
            <h2 class="text-2xl font-bold text-indigo-900 mb-8 text-center border-b-2 border-indigo-200 pb-2">الكتب المتاحة</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                @foreach($books->where('is_pending', 0) as $book)
                    <div class="bg-white rounded-xl border border-gray-200 shadow hover:shadow-lg transition duration-300 flex flex-col">
                        <div class="relative overflow-hidden rounded-t-xl">
                            <img
                                src="{{ $book->image ? asset('public/storage/' . $book->image) : asset('1.jpg') }}"
                                alt="غلاف الكتاب"
                                class="w-full h-60 object-cover object-center transition-transform duration-500 hover:scale-105"
                            />
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2 truncate" title="{{ $book->title }}">
                                {{ $book->title }}
                            </h2>
                            <p class="text-gray-600 text-sm mb-6 line-clamp-4">
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
        </div>

        {{-- 🖨 الكتب قيد الطبع --}}
        <div>
            <h2 class="text-2xl font-bold text-yellow-700 mb-8 text-center border-b-2 border-yellow-200 pb-2">الكتب قيد الطبع</h2>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-8">
                @foreach($books->where('is_pending', 1) as $book)
                    <div class="bg-white rounded-xl border border-gray-200 shadow hover:shadow-lg transition duration-300 flex flex-col">
                        <div class="relative overflow-hidden rounded-t-xl">
                            <img
                                src="{{ $book->image ? asset('public/storage/' . $book->image) : asset('1.jpg') }}"
                                alt="غلاف الكتاب"
                                class="w-full h-60 object-cover object-center transition-transform duration-500 hover:scale-105"
                            />
                            <div class="absolute top-3 right-3 bg-yellow-500 text-white text-xs font-semibold px-3 py-1 rounded-lg shadow-md">
                                قيد الطبع
                            </div>
                        </div>
                        <div class="p-5 flex flex-col flex-grow">
                            <h2 class="text-lg font-semibold text-gray-800 mb-2 truncate" title="{{ $book->title }}">
                                {{ $book->title }}
                            </h2>
                            <p class="text-gray-600 text-sm mb-6 line-clamp-4">
                                {{ $book->description }}
                            </p>
                            <span class="mt-auto bg-gray-400 text-white text-sm font-medium py-2 rounded-md text-center cursor-not-allowed">
                                قيد الطبع
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
