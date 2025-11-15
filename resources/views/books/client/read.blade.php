<div class="container mx-auto p-4">
    <h1 class="text-xl md:text-2xl font-bold mb-4">{{ $book->title }}</h1>

    <div class="rounded-xl overflow-hidden shadow-lg border h-[70vh] md:h-[800px]">
        <iframe
            src="{{ route('books.pdf', $book->id) }}"
            class="w-full h-full border-0"
            allowfullscreen
            webkitallowfullscreen
            mozallowfullscreen>
        </iframe>
    </div>
</div>




