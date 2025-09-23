@extends('layout.master')
@section('content')
    <div class="">
        <x-books.books :books="$books" :pending-books="$pendingBooks" />
    </div>
@endsection
