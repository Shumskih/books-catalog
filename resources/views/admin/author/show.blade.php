@extends('layouts.app')

@section('title', $author->surname.', '.$author->name)

@section('content')
    <h1 class="mt-5 mb-5 text-center">{{ $author->surname.', '.$author->name }}</h1>
    <h3 class="text-center mb-5">Books:</h3>
    <div class="row justify-content-center">
        <table class="table table-hover col-lg-8 col-11 col-sm-11 col-md-8 col-xl-8">
            <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @if($author->books->count() > 0)
                @foreach($author->books as $book)
                    <tr>
                        <td>
                            <img src="/uploads/{{ $book->cover }}" alt="" width="50" height="50" class="mr-2"> {{ $book->title }}
                        </td>
                        <td>
                            <a href="{{ route('book.show', ['id' => $book->id]) }}"
                               class="btn btn-outline-secondary">Show</a>
                            <a href="{{ route('book.edit', ['id' => $book->id]) }}"
                               class="btn btn-outline-info">Edit</a>
                            <a href="{{ route('book.delete', ['id' => $book->id]) }}"
                               class="btn btn-outline-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td>
                        No Books
                    </td>
                </tr>
            @endif
            </tbody>
        </table>
    </div>
    <div class="row justify-content-center mt-5">
        <a href="{{ route('authors') }}" class="btn btn-outline-dark">Back</a>
    </div>
@endsection
