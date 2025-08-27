<div class="bg-gray-50 min-h-screen py-20 px-6 sm:px-12 lg:px-24">
    <h1 class="text-4xl font-extrabold text-center text-gray-900 mb-14 mt-20">اخر مؤلفاتي</h1>

    <div class="max-w-full mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10 px-4 lg:px-12 xl:px-20">
        @foreach($books as $book)
            <div class="bg-white rounded-xl border border-gray-200 shadow-sm hover:shadow-lg transition-shadow duration-300 flex flex-col">
                <div class="relative overflow-hidden rounded-t-xl">
                    <img
                        src="{{ $book->image ? asset('public/storage/' . $book->image) : asset('1.jpg') }}"
                        alt="غلاف الكتاب"
                        class="w-full h-120 object-cover object-center transition-transform duration-500 hover:scale-105"
                    />

                    <div class="absolute top-3 right-3 bg-green-600 text-white text-xs uppercase font-semibold px-3 py-1 rounded-lg shadow-md">
                        جديد
                    </div>
                </div>
                <div class="p-5 flex flex-col flex-grow">
                    <h2 class="text-lg font-semibold text-gray-800 mb-2 truncate" title="{{ $book->title }}">
                        {{ $book->title }}
                    </h2>
                    <p class="text-gray-600 text-sm mb-6 line-clamp-5">
                        {{ $book->description }}
                    </p>
                    <!-- زر عرض الكتاب تمت إزالته -->
                </div>
            </div>
        @endforeach
    </div>
</div>
