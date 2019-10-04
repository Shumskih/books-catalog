@extends('layouts.app')

@section('title', 'Edit Book:'.' '.$book->title)

@section('content')
    <div class="row justify-content-center">
        <h1 class="text-center mt-5 col-sm-12 col-12 justify-content-center">Edit: {{ $book->title }}</h1>
    </div>

    @include('includes.errors')

    <div class="row justify-content-center">
        <form class="mt-5 col-sm-12 col-12 col-lg-6 col-xl-6" method="post" action="{{ route('book.update', $book->id) }}" enctype="multipart/form-data">

            @include('includes.book-form')

        </form>
    </div>
@endsection
