@extends('layouts.app')

@section('title', 'All Books')

@section('content')
    <h1 class="mt-5 mb-5 text-center">List Of Books</h1>
    <div class="row justify-content-center mb-5">
        <a href="{{ route('book.create') }}">Create new book</a>
    </div>
    <div class="row justify-content-center">
        <table class="table table-hover col-lg-10 col-11 col-sm-12 col-md-9 col-xl-10">
            <thead>
            <tr>
                <th scope="col">Cover</th>
                <th scope="col">Authors</th>
                <th scope="col">Title</th>
                <th scope="col">Pages</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($books as $book)
                <tr>
                    <td>
                        <img @if($book->cover) src="/uploads/{{ $book->cover }}"
                             @else src="https://fakeimg.pl/350x200/?text=No Image" @endif alt="" width="50" height="50">
                    </td>
                    <td>
                        @foreach($book->authors as $author)
                            {{ $author->surname }}, {{ $author->name }}
                        @endforeach
                        @if(count($book->authors) < 1)
                            ==//==
                        @endif
                    </td>
                    <td>
                        {{ $book->title }}
                    </td>
                    <td>
                        {{ $book->num_of_pages }}
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
            </tbody>
        </table>
    </div>
@endsection
