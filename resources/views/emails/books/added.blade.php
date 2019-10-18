<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<p>Hello, {{ $user->name }}!</p>

<p>New Book added!</p>

<div>
    <img src="http://127.0.0.1:8000/storage/{{ $book->cover }}" alt="" style="width: 200px;height: 150px">
</div>
<h5>
    @foreach($book->authors as $author)
        {{ $author->surname }}, {{ $author->name }}
    @endforeach
</h5>
<h3>{{ $book->title }}</h3>
<p>{{ $book->description }}</p>
<a href="http://127.0.0.1:8000/admin/book/{{ $book->id }}">View book</a>
</body>
</html>
