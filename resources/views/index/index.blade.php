@extends('layouts.app')

@section('title', 'Authors')

@section('content')
    @if(Session::has('denied'))
        <p class="alert alert-danger mt-3">{{ Session::get('denied') }}</p>
    @endif

    @foreach ($authors as $author)
        <div class="row justify-content-xl-center">
            <h5 class="mt-5">{{ $author->surname }}, {{ $author->name }}</h5>
        </div>
        <div class="row justify-content-center">
            <ul class="list-group col-xl-8">
                @if(count($author->books) > 0)
                    @foreach($author->books as $book)
                        <li class="list-group-item"><img @if($book->cover) src="/uploads/{{ $book->cover }}"
                                                         @else src="https://fakeimg.pl/350x200/?text=No Image"
                                                         @endif alt=""
                                                         width="25" height="25" class="mr-2">{{ $book->title }}</li>
                    @endforeach
                @else
                    <li class="list-group-item">No Books</li>
                @endif
            </ul>
        </div>
    @endforeach

    <div class="row justify-content-center mt-5">
        {{ $authors->links() }}
    </div>
@endsection
