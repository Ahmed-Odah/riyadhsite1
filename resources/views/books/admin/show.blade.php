@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="bg-white p-6 rounded-xl shadow relative">

            <!-- حالة قيد الطبع -->
            @if($book->is_pending)
                <div class="absolute top-4 left-4 bg-yellow-500 text-white px-3 py-1 rounded-lg shadow text-sm font-bold">
                    📚 قيد الطبع
                </div>
            @endif

            <!-- عنوان -->
            <h1 class="text-3xl font-bold mb-4">{{ $book->title }}</h1>

            <!-- صورة الغلاف -->
            @if($book->image)
                <img src="{{ asset('storage/' . $book->image) }}"
                     class="w-full h-96 object-cover mb-4 rounded-lg shadow">
            @endif

            <!-- المحتوى -->
            <p class="prose leading-relaxed">
                {!! nl2br(e($book->content)) !!}
            </p>
        </div>
    </div>
@endsection
