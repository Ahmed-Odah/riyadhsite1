<div class="bg-gradient-to-br from-gray-50 via-white to-gray-100 min-h-screen py-24 px-8 sm:px-16 lg:px-32">
    <h1 class="text-4xl sm:text-5xl font-extrabold mb-12 text-center text-gray-900 tracking-tight">
        شهاداتي ودوراتي
    </h1>

    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
        @foreach($certificates as $certificate)
            <div class="bg-white rounded-3xl border border-gray-200 shadow-2xl hover:shadow-3xl hover:border-indigo-400 transition-all duration-500 flex flex-col overflow-hidden group transform hover:-translate-y-1">

                <!-- Image with hover zoom -->
                <div class="relative cursor-zoom-in overflow-hidden rounded-t-3xl" onclick="openModal('{{ asset('storage/' . $certificate->image) }}')">
                    <img
                        src="{{ $certificate->image ? asset('public/storage/' . $certificate->image) : asset('1.jpg') }}"
                        alt="صورة الشهادة"
                        class="w-full aspect-[4/3] object-cover object-center transition duration-700 transform group-hover:scale-110"
                    />
                    <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition duration-500 rounded-t-3xl"></div>
                </div>

                <!-- Text content -->
                <div class="p-6 flex flex-col flex-grow">
                    <h2 class="text-lg sm:text-xl font-bold text-gray-900 mb-2 truncate" title="{{ $certificate->title }}">
                        {{ $certificate->title }}
                    </h2>
                    <p class="text-gray-600 text-sm sm:text-base mb-4 line-clamp-3">
                        {{ $certificate->description }}
                    </p>
                    <a href="{{ route('certificate.read', $certificate->id) }}"
                       class="mt-auto inline-block text-center bg-gradient-to-r from-indigo-800 to-indigo-600 hover:from-indigo-900 hover:to-indigo-700 text-white text-sm sm:text-base font-semibold py-3 rounded-2xl shadow-lg hover:shadow-2xl transition-all duration-500">
                        عرض الشهادة
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- Modal for enlarged image -->
<div id="imageModal" class="fixed inset-0 bg-black bg-opacity-90 hidden items-center justify-center z-50 p-6">
    <div class="relative max-w-6xl w-full">
        <span class="absolute top-4 right-4 text-white text-4xl cursor-pointer z-50 hover:text-gray-300" onclick="closeModal()">&times;</span>
        <img id="modalImage" class="w-full h-auto rounded-2xl shadow-2xl object-contain mx-auto max-h-[90vh] max-w-[90vw]" src="" alt="شهادة">
    </div>
</div>

<script>
    function openModal(src) {
        document.getElementById('imageModal').classList.remove('hidden');
        document.getElementById('modalImage').src = src;
    }
    function closeModal() {
        document.getElementById('imageModal').classList.add('hidden');
        document.getElementById('modalImage').src = '';
    }
</script>
