@extends('layouts.app')

@section('title', 'Edit Author:'.' '.$author->surname.', '.$author->surname)

@section('content')
    <div class="row justify-content-center">
        <h1 class="text-center mt-5 col-sm-12 col-12 justify-content-center">Edit: {{ $author->surname }}, {{ $author->name }}</h1>
    </div>

    @include('includes.errors')

    <div class="row justify-content-center">
        <form class="mt-5 col-sm-12 col-12 col-lg-6 col-xl-6" method="post" action="{{ route('author.update', $author->id) }}">
            @include('includes.author-form')

        </form>
    </div>
@endsection
