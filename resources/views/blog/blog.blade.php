@extends('layout.master')
@section('content')

    <section class="py-24">
        <h1 class="text-3xl font-bold mb-6 text-center mt-20 ">المدونة </h1>
    {{--
    <div class="mx-auto max-w-7xl px-4 sm:px-6 lg:px-8">

        <div class="flex justify-center flex-wrap md:flex-wrap lg:flex-nowrap lg:flex-row lg:justify-between gap-8">

            <div class="w-full ">
                <!-- عرض 3 أعمدة جنب بعض -->
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">

                    @foreach($blogs as $blog)
                        <div class="group">
                            <div class="flex items-center mb-9">
                                <img src="{{ asset('public/storage/' . $blog->image) }}" alt="blogs tailwind section" class="rounded-2xl w-full object-cover h-118">
                            </div>
                            <h3 class="text-xl text-gray-900 font-medium leading-8 mb-4 group-hover:text-indigo-900">{{ $blog->title }}</h3>
                            <p class="text-gray-500 leading-6 transition-all duration-500 mb-8">
                                {{ $blog->description }}
                            </p>
                            <a href="javascript:;" class="cursor-pointer flex items-center gap-2 text-lg text-indigo-900 font-semibold">
                                <svg width="15" height="12" viewBox="0 0 15 12" fill="none" class="rotate-180" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M1.25 6L13.25 6M9.5 10.5L13.4697 6.53033C13.7197 6.28033 13.8447 6.15533 13.8447 6C13.8447 5.84467 13.7197 5.71967 13.4697 5.46967L9.5 1.5" stroke="#312E81" stroke-width="1.8" stroke-linecap="round" stroke-linejoin="round"/>
                                </svg>
                                <h1> إقرا آكثر</h1>
                            </a>
                        </div>
                    @endforeach

                </div>
            </div>

        </div>

    </div>
    </section>
    --}}


@endsection
