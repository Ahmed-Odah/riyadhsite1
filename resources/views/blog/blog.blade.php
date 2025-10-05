@extends('layout.master')
@section('content')

    <div class="bg-gray-50 pb-16 px-4 sm:px-6 lg:px-8">
        <h1 class="text-3xl font-extrabold text-center text-gray-800 mb-10 pt-3">المدونات</h1>

        <div class="mx-auto max-w-7xl">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                @foreach($blogs as $blog)
                    <div class="group bg-white border border-gray-200 rounded-2xl shadow hover:shadow-xl transition duration-300 overflow-hidden flex flex-col">

                        {{-- صورة المدونة --}}
                        <div class="relative w-full overflow-hidden" style="aspect-ratio: 3/2;">
                            <img src="{{ asset('public/storage/' . $blog->image) }}"
                                 alt="{{ $blog->title }}"
                                 class="absolute inset-0 w-full h-full object-cover transform group-hover:scale-105 transition duration-500">
                        </div>

                        {{-- محتوى المدونة --}}
                        <div class="p-5 flex flex-col justify-between flex-grow">
                            <h2 class="text-xl font-semibold text-gray-900 mb-3 line-clamp-2">{{ $blog->title }}</h2>
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">{{ Str::limit($blog->description, 120) }}</p>

                            <div class="flex justify-between items-center">
                                {{-- زر اقرأ أكثر --}}
                                <a href="{{ route('blogs.show', $blog->id) }}"
                                   class="inline-flex items-center gap-2 text-indigo-700 font-semibold hover:text-indigo-900 transition">
                                    <span>اقرأ أكثر</span>
                                    <svg width="18" height="14" viewBox="0 0 15 12" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.25 6H13.25M9.5 10.5L13.47 6.53C13.72 6.28 13.84 6.15 13.84 6C13.84 5.84 13.72 5.72 13.47 5.47L9.5 1.5"
                                              stroke="#312E81" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                </a>

                                {{-- زر مشاركة --}}
                                <button onclick="copyBlogLink('{{ route('blogs.show', $blog->id) }}')"
                                        class="flex items-center gap-2 text-gray-600 hover:text-indigo-900 font-semibold transition">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none"
                                         viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round"
                                              d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8
                                          4.03-8 9-8 9 3.582 9 8z"/>
                                    </svg>
                                    <span>شارك</span>
                                </button>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </div>

    <script>
        function copyBlogLink(url) {
            navigator.clipboard.writeText(url)
                .then(() => alert("✅ تم نسخ رابط المدونة:\n" + url))
                .catch(err => console.error('فشل النسخ:', err));
        }
    </script>

@endsection
