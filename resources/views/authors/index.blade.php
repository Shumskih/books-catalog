@extends('layouts.app')

@section('title', 'All Authors')

@section('content')
    <h1 class="mt-5 mb-5 text-center">List Of Authors</h1>
    @if (Auth::user()->isAdmin())
        <div class="row justify-content-center mb-5">
            <a href="{{ route('author.create') }}">Create new author</a>
        </div>
    @endif
    <div class="d-flex flex-column col-xl-6 col-lg-10 col-md-12 col-sm-12 mx-auto">
        @foreach($authors as $author)
            <div class="d-flex flex-column flex-sm-row p-1 mx-auto mx-sm-0 line mb-2 mb-sm-0">
                <div class="mr-auto">
                    <a href="/author/{{ $author->id }}"
                       class="text-secondary">{{ $author->surname }} {{ $author->name }}
                        <strong>({{ $author->books->count() }})</strong></a>
                </div>
                <div class="mx-auto mx-sm-0">
                    <a href="{{ route('author.show', ['id' => $author->id]) }}"
                       class="btn btn-outline-secondary btn-sm mr-1 d-none d-md-inline-block">Show</a>
                    @if (Auth::user()->isAdmin())
                        <a href="{{ route('author.edit', ['id' => $author->id]) }}"
                           class="btn btn-outline-info btn-sm mr-1">Edit</a>
                        <a href="{{ route('author.delete', ['id' => $author->id]) }}"
                           class="btn btn-outline-danger btn-sm mr-1">Delete</a>
                    @endif
                </div>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center mt-5">
        {{ $authors->links() }}
    </div>
@endsection
