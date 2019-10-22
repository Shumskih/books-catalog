@extends('layouts.app')

@section('title', 'All Books')

@section('content')
    <h1 class="mt-5 mb-5 text-center">List Of Books</h1>
    @if (Auth::user()->isAdmin())
        <div class="row justify-content-center mb-5">
            <a href="{{ route('book.create') }}">Create new book</a>
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="card-columns">
            @foreach ($books as $book)
                <div class="card">
                    <a href="/book/{{ $book->id }}" class="text-dark">
                        <img @if($book->cover) src="/storage/{{ $book->cover }}"
                             @else src="https://fakeimg.pl/350x200/?text=No Image" @endif alt="{{ $book->title }}"
                             class="card-img-top">
                    </a>
                    <div class="card-body">
                        <h5 class="card-title">
                            <a href="/book/{{ $book->id }}" class="text-dark">{{ $book->title }}</a>
                        </h5>
                        <p class="card-text">
                            <small class="text-muted">
                                @foreach($book->authors as $author)
                                    <a href="/author/{{ $author->id }}" class="text-muted">{{ $author->surname }}
                                        , {{ $author->name }}</a>
                                @endforeach
                            </small>
                        </p>
                        <p class="card-text">
                            <a href="/book/{{ $book->id }}" class="text-black-50">{{ $book->description }}</a>
                        </p>
                    </div>
                    @if (Auth::user()->isAdmin())
                        <div class="d-flex flex-row justify-content-center pb-1">
                            <a href="{{ route('book.edit', ['id' => $book->id]) }}"
                               class="btn btn-outline-info mr-1">Edit</a>
                            <a href="{{ route('book.delete', ['id' => $book->id]) }}"
                               class="btn btn-outline-danger">Delete</a>
                        </div>
                    @endif
                </div>
            @endforeach
        </div>
    </div>
    <div class="row justify-content-center col-xl-12 mt-5">
        {{ $books->links() }}
    </div>
@endsection
