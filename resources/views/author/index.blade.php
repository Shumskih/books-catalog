@extends('layouts.app')

@section('title', 'Authors')

@section('content')
    <div class="container">
        @foreach ($authors as $author)
            <h5 class="mt-5">{{ $author->surname }}, {{ $author->name }}</h5>
            <ul class="list-group">
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
        @endforeach
    </div>
    <div class="row justify-content-center mt-5">
        {{ $authors->links() }}
    </div>
@endsection
