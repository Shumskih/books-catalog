@extends('layouts.app')

@section('title', 'Create new author')

@section('content')
    <div class="row justify-content-center">
        <h1 class="text-center mt-5 justify-content-center">Add New Author</h1>
    </div>

    @include('includes.errors')

    <div class="row justify-content-center">
        <form class="mt-5 col-xl-4 col-lg-8 col-md-9 col-sm-11 col-11" method="post" action="{{ route('author.store') }}">

            @include('includes.author-form')

        </form>
    </div>
@endsection
