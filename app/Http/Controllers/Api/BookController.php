<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use \Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BookController extends Controller
{
    public function index()
    {
        $books = Book::all();

        if(!$books) {
            return Response::HTTP_NO_CONTENT;
        }
        return $books;
    }

    public function show($id)
    {
        $book = Book::find($id);

        if(!$book) {
            return Response::HTTP_NO_CONTENT;
        }
        return $book;

    }

    public function update(Request $request, $id)
    {
        Book::find($id)->update($request->all());
        return response('Updated', Response::HTTP_ACCEPTED);
    }

    public function destroy($id)
    {
        Book::find($id)->delete();
        return response(null, Response::HTTP_NO_CONTENT);
    }
}
