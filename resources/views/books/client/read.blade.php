    <div class="container mx-auto p-6">
        <h1 class="text-2xl font-bold mb-4">{{ $book->title }}</h1>

        <div class="rounded-xl overflow-hidden shadow-lg border">
            <iframe
                src="{{ route('books.pdf', $book->id) }}"
                width="100%"
                height="800px"
                class="w-full">
            </iframe>
        </div>
    </div>

    <div class="container mx-auto p-6 max-w-7xl ">
        <h1 style="text-align: center;" class="text-3xl font-extrabold mb-8 text-gray-900 dark:text-gray-100">
            {{ $book->title }}
        </h1>

        <div
            class="rounded-xl shadow-xl border border-gray-300 dark:border-gray-700 overflow-hidden"
            style="height: 1000px;">

            <iframe
                src="{{ asset('/public/pdfjs/web/viewer.html') }}?file={{ urlencode(route('books.pdf', $book->id)) }}#toolbar=0&download=false&print=false"
                width="100%"
                height="100%"
                class="w-full h-full border-0"
                sandbox="allow-scripts allow-same-origin allow-forms allow-popups">
            </iframe>
        </div>
    </div>
