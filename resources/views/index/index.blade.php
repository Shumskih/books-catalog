@extends('layouts.app')

@section('title', 'Authors')

@section('content')
    @if(Session::has('denied'))
        <p class="alert alert-danger mt-3">{{ Session::get('denied') }}</p>
    @endif

    @foreach ($authors as $author)
        <div class="row justify-content-xl-center">
            <h5 class="mt-5"><a href="/author/{{ $author->id }}" class="text-secondary">{{ $author->surname }}
                    , {{ $author->name }}</a></h5>
        </div>
        <div class="row justify-content-center">
            <ul class="list-group col-xl-8">
                @if(count($author->books) > 0)
                    @foreach($author->books as $book)
                        <li class="list-group-item">
                            <a href="/book/{{ $book->id }}">
                                <img @if($book->cover) src="/storage/{{ $book->cover }}"
                                     @else src="https://fakeimg.pl/350x200/?text=No Image"
                                     @endif alt=""
                                     width="25" height="25" class="mr-2">{{ $book->title }}
                            </a>
                        </li>
                    @endforeach
                @else
                    <li class="list-group-item">Author has no Books</li>
                @endif
            </ul>
        </div>
    @endforeach

    <div class="row justify-content-center mt-5">
        {{ $authors->links() }}
    </div>
@endsection
