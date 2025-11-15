<div class="container mx-auto p-4">
    <h1 class="text-lg sm:text-xl md:text-2xl font-bold mb-4 text-center">
        {{ $book->title }}
    </h1>

    <div class="rounded-xl overflow-hidden shadow-lg border
                h-[75vh] sm:h-[80vh] md:h-[800px]">

        <iframe
            src="{{ route('books.pdf', $book->id) }}"
            class="w-full h-full border-0"
            style="display: block; width: 100%; height: 100%;"
            allow="fullscreen"
            allowfullscreen>
        </iframe>

    </div>
</div>


