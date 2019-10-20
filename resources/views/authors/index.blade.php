@extends('layouts.app')

@section('title', 'All Authors')

@section('content')
    <h1 class="mt-5 mb-5 text-center">List Of Authors</h1>
    @if (Auth::user()->isAdmin())
        <div class="row justify-content-center mb-5">
            <a href="{{ route('author.create') }}">Create new author</a>
        </div>
    @endif
    <div class="row justify-content-center">
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Authors</th>
                @if (Auth::user()->isAdmin())
                    <th scope="col">Actions</th>
                @endif
            </tr>
            </thead>
            <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>
                        {{ $author->surname }}, {{ $author->name }} <strong>({{ $author->books->count() }}
                            )</strong>
                    </td>
                    @if (Auth::user()->isAdmin())
                        <td>
                            <a href="{{ route('author.show', ['id' => $author->id]) }}"
                               class="btn btn-outline-secondary">Show</a>
                            <a href="{{ route('author.edit', ['id' => $author->id]) }}"
                               class="btn btn-outline-info">Edit</a>
                            <a href="{{ route('author.delete', ['id' => $author->id]) }}"
                               class="btn btn-outline-danger">Delete</a>
                        </td>
                    @endif
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex flex-column">
        @foreach($authors as $author)
            <div class="p-2">
                <a href="/author/{{ $author->id }}">{{ $author->surname }}, {{ $author->name }}</a>
            </div>
        @endforeach
    </div>
    <div class="row justify-content-center mt-5">
        {{ $authors->links() }}
    </div>
@endsection
