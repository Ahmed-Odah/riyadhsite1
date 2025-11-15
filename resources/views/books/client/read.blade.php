<div class="container mx-auto p-4">
    <h1 class="text-lg sm:text-xl md:text-2xl font-bold mb-4 text-center">
        {{ $book->title }}
    </h1>

    <div class="rounded-xl overflow-hidden shadow-lg border h-[80vh] md:h-[900px]">
        <iframe
            src="{{ asset('pdfjs/web/viewer.html') }}?file={{ urlencode(asset('storage/pdfs/' . $book->file)) }}#toolbar=0"
            class="w-full h-full border-0"
            allowfullscreen
            style="display:block; width:100%; height:100%;"
        ></iframe>
    </div>
</div>
