@extends('layout.master')
@section('content')

    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8 mt-16"> {{-- هنا أضفت mt-16 --}}
        <div class="flex justify-center flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between gap-8">

            <div class="w-full">
                <!-- عرض 3 أعمدة جنب بعض -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                    @foreach($blogs as $blog)
                        <div class="group border rounded-2xl p-4 shadow hover:shadow-lg transition">
                            <div class="flex items-center mb-4">
                                <img src="{{ asset('public/storage/' . $blog->image) }}" alt="blogs tailwind section" class="rounded-2xl w-full object-cover h-64">
                            </div>
                            <h3 class="text-xl text-gray-900 font-medium leading-8 mb-2 group-hover:text-indigo-900">{{ $blog->title }}</h3>
                            <p class="text-gray-500 leading-6 transition-all duration-500 mb-4">
                                {{ $blog->description }}
                            </p>

                            <div class="flex items-center gap-4">
                                {{-- اقرأ أكثر --}}
                                <a href="{{ $blog->url }}" target="_blank" class="flex items-center gap-2 text-lg text-indigo-900 font-semibold">
                                    <svg width="15" height="12" viewBox="0 0 15 12" fill="none" class="rotate-180" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M1.25 6L13.25 6M9.5 10.5L13.4697 6.53033C13.7197 6.28033 13.8447 6.15533 13.8447 6C13.8447 5.84467 13.7197 5.71967 13.4697 5.46967L9.5 1.5" stroke="#312E81" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    <span>اقرأ أكثر</span>
                                </a>

                                {{-- زر مشاركة --}}
                                <button onclick="copyBlogLink('{{ $blog->url }}')" class="flex items-center gap-2 text-lg text-gray-700 hover:text-indigo-900 font-semibold">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8s-9-3.582-9-8 4.03-8 9-8 9 3.582 9 8z"/>
                                    </svg>
                                    شارك
                                </button>
                            </div>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>
    </div>

    <script>
        function copyBlogLink(url) {
            navigator.clipboard.writeText(url)
                .then(() => {
                    alert("تم نسخ رابط المدونة: " + url);
                })
                .catch(err => {
                    console.error('فشل النسخ: ', err);
                });
        }
    </script>

@endsection
