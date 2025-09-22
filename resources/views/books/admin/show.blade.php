@extends('layouts.app')

@section('content')
    <div class="max-w-4xl mx-auto px-4 py-8">
        <div class="bg-white p-6 rounded-xl shadow">
            <h1 class="text-3xl font-bold mb-4">{{ $book->title }}</h1>
            <img src="{{ $book->cover_url }}" class="w-full h-96 object-cover mb-4">
            <p class="prose leading-relaxed">
                {!! nl2br(e($book->content)) !!}
            </p>
        </div>
    </div>
@endsection
