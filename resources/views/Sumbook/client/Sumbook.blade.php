@extends('layout.master')
@section('content')
    <div class="bg-gray-50 min-h-screen py-16 px-4 sm:px-10 lg:px-20">
        <h1 class="text-3xl font-extrabold text-center text-gray-800 mt-20">ملخصات الكتب</h1>

        <!-- شبكة الصور -->
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6 mt-11">
            @foreach($sumbooks as $sumbook)
                <div class="bg-white rounded-2xl border border-gray-200 shadow hover:shadow-md transition duration-300 overflow-hidden flex flex-col">
                    <!-- الرابط يأخذك إلى صفحة الملخص -->
                    <a href="{{ route('sumbook.show', $sumbook->id) }}" target="_blank" class="block w-full">
                        <div class="relative w-full overflow-hidden" style="aspect-ratio: 3/4;">
                            <!-- 👆 نسبة الطول للعرض ثابتة (مثل كتاب) -->
                            <img src="{{ asset('public/storage/' . $sumbook->image) }}"
                                 alt="{{ $sumbook->title }}"
                                 class="absolute inset-0 w-full h-full object-cover hover:scale-105 transition duration-300 rounded-t-2xl" />
                        </div>
                    </a>

                    <div class="p-4 text-right flex-grow">
                        <h2 class="text-lg font-semibold text-gray-900 truncate">{{ $sumbook->title }}</h2>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection
