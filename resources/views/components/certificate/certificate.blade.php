<div class="bg-gradient-to-br from-gray-50 via-white to-gray-100 min-h-screen py-20 px-6 sm:px-12 lg:px-24">
    <h1 class="text-3xl font-bold mb-6 text-center mt-20 text-gray-800">شهاداتي ودوراتي</h1>

    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
        @foreach($certificates as $certificate)
            <div class="bg-white rounded-2xl border border-gray-200 shadow-lg hover:shadow-2xl hover:border-indigo-400 transition duration-300 flex flex-col overflow-hidden group p-6">
                <!-- Image -->
                <div class="relative cursor-zoom-in overflow-hidden" onclick="openModal('{{ asset('storage/' . $certificate->image) }}')">
                    <img
                        src="{{ $certificate->image ? asset('public/storage/' . $certificate->image) : asset('1.jpg') }}"
                        alt="صورة الشهادة"
                        class="w-full aspect-[3/2] object-cover object-center transition duration-500 group-hover:scale-105 rounded-xl"
                    />
                </div>

                <!-- Text -->
                <div class="flex flex-col flex-grow mt-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-2 truncate" title="{{ $certificate->title }}">
                        {{ $certificate->title }}
                    </h2>
                    <p class="text-gray-700 text-sm mb-4 line-clamp-4">
                        {{ $certificate->description }}
                    </p>
                    <a href="{{ route('certificate.read', $certificate->id) }}"
                       class="mt-auto inline-block text-center bg-indigo-900 hover:bg-indigo-700 text-white text-sm font-semibold py-3 rounded-lg transition">
                        عرض الشهادة
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>

<!-- القسم الثاني -->
<div class="bg-gradient-to-br from-gray-50 via-white to-gray-100 py-20 px-6 sm:px-12 lg:px-24">
    <h1 class="text-3xl font-bold mb-6 text-center mt-20 text-gray-800">مشاريعي وأعمالي</h1>

    <div class="max-w-7xl mx-auto grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-10">
        @foreach($projects as $project)
            <div class="bg-white rounded-2xl border border-gray-200 shadow-lg hover:shadow-2xl hover:border-indigo-400 transition duration-300 flex flex-col overflow-hidden group p-6">
                <!-- Image -->
                <div class="relative cursor-zoom-in overflow-hidden" onclick="openModal('{{ asset('storage/' . $project->image) }}')">
                    <img
                        src="{{ $project->image ? asset('public/storage/' . $project->image) : asset('1.jpg') }}"
                        alt="صورة المشروع"
                        class="w-full aspect-[3/2] object-cover object-center transition duration-500 group-hover:scale-105 rounded-xl"
                    />
                </div>

                <!-- Text -->
                <div class="flex flex-col flex-grow mt-4">
                    <h2 class="text-xl font-bold text-gray-800 mb-2 truncate" title="{{ $project->title }}">
                        {{ $project->title }}
                    </h2>
                    <p class="text-gray-700 text-sm mb-4 line-clamp-4">
                        {{ $project->description }}
                    </p>
                    <a href="{{ route('project.read', $project->id) }}"
                       class="mt-auto inline-block text-center bg-indigo-900 hover:bg-indigo-700 text-white text-sm font-semibold py-3 rounded-lg transition">
                        عرض التفاصيل
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</div>
