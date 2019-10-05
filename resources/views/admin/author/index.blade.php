@extends('layouts.app')

@section('title', 'All Authors')

@section('content')
    <h1 class="mt-5 mb-5 text-center">List Of Authors</h1>
    <div class="row justify-content-center mb-5">
        <a href="{{ route('author.create') }}">Create new author</a>
    </div>
    <div class="row justify-content-center">
        <table class="table table-hover col-lg-8 col-11 col-sm-11 col-md-8 col-xl-8">
            <thead>
            <tr>
                <th scope="col">Authors</th>
                <th scope="col">Actions</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($authors as $author)
                <tr>
                    <td>
                        {{ $author->surname }}, {{ $author->name }} <strong>({{ $author->books->count() }}
                            )</strong>
                    </td>
                    <td>
                        <a href="{{ route('author.show', ['id' => $author->id]) }}"
                           class="btn btn-outline-secondary">Show</a>
                        <a href="{{ route('author.edit', ['id' => $author->id]) }}"
                           class="btn btn-outline-info">Edit</a>
                        <a href="{{ route('author.delete', ['id' => $author->id]) }}"
                           class="btn btn-outline-danger">Delete</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-center col-xl-12 mt-5">
        {{ $authors->links() }}
    </div>
@endsection
