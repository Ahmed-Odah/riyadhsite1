@extends('layout.master')
@section('content')
    <div class="">
        <x-books.books :books="$books" />

    </div>
@endsection

