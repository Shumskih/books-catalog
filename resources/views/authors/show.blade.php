@extends('layouts.app')

@section('title', $author->surname.', '.$author->name)

@section('content')
    <h1 class="mt-5 text-center">{{ $author->surname.', '.$author->name }}</h1>
    @if (Auth::user()->isAdmin())
    <div class="d-flex flex-row justify-content-center pb-1 mb-5">
        <a href="{{ route('author.edit', ['id' => $author->id]) }}"
           class="btn btn-outline-info mr-1">Edit</a>
        <a href="{{ route('author.delete', ['id' => $author->id]) }}"
           class="btn btn-outline-danger">Delete</a>
    </div>
    @endif
    <h3 class="text-center mb-5">Books:</h3>
    <div class="row justify-content-center">

            @if($author->books->count() > 0)
                <div class="card-columns">
                    @foreach($author->books as $book)
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
                    @else
                        <tr>
                            <td>
                                No Books
                            </td>
                        </tr>
                </div>
            @endif
    </div>
    <div class="row justify-content-center mt-5">
        <a href="{{ URL::previous() }}" class="btn btn-outline-dark">Back</a>
    </div>
@endsection
