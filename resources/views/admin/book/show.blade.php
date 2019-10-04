@extends('layouts.app')

@section('title', $book->title)

@section('content')
    <div class="container">
        <div class="row justify-content-center mt-5">
            <img @if($book->cover) src="/uploads/{{ $book->cover }}" @else src="https://fakeimg.pl/350x200/?text=No Image" @endif alt="..." class="img-thumbnail col-xl-4">
            <div class="col-xl-8">
                <div class="row col-xl-12">
                    <h1 class="">{{ $book->title }}</h1>
                </div>
                <div class="row col-xl-12">
                    <p>{{ $book->description }}</p>
                </div>
                <div class="row col-xl-12">
                    <span><strong>Authors: </strong></span>
                    @foreach($book->authors as $author)
                        <span class="col-sm-12">{{ $author->surname }}, {{ $author->name }}</span>
                    @endforeach
                </div>
                <div class="row col-sm-12">
                    <p><strong>Pages:</strong> {{ $book->num_of_pages }} </p>
                </div>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <a href="{{ route('books') }}" class="btn btn-outline-dark mr-1">Back</a>
            <a href="{{ route('book.edit', $book->id) }}" class="btn btn-outline-info mr-1">Edit</a>
            <a href="{{ route('book.delete', $book->id) }}" class="btn btn-outline-danger">Delete</a>
        </div>
    </div>
@endsection
