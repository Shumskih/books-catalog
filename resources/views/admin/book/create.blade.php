@extends('layouts.app')

@section('title', 'Create new book')

@section('content')
    <div class="row justify-content-center">
        <h1 class="text-center mt-5 col-sm-12 col-12 justify-content-center">Add New Book</h1>
    </div>

    @include('includes.errors')

    <div class="row justify-content-center">
        <form class="mt-5 col-xl-6 col-lg-8 col-sm-10 col-12" method="post" action="{{ route('book.store') }}" enctype="multipart/form-data">

            @include('includes.book-form')

        </form>
    </div>
@endsection
