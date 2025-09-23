@extends("layout.master")
@section("content")



    <div>
        @include('components.hero')
    </div>

    <div>
        @include('components.about')
    </div>



    <div>
        @include('components.section')
    </div>

    <div>
        @include('components.gallery')
    </div>


    <x-books.books :books="$books" />

    <div>
        @include('components.certificate')
    </div>

    <div>
        @include('components.serves')
    </div>




    <div>
        <x-blog :blogs="$blogs" />
    </div>



    <div>
        @include('components.faq')
    </div>


@endsection
