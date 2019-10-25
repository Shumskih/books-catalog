<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{

    public function searchAuthors(Request $request)
    {
        $authors = DB::table('authors')
                     ->where('name', 'like', '%' . $request->keywords . '%')
                     ->orWhere('surname', 'like', '%' . $request->keywords . '%')
                     ->get();

        return response()->json($authors);
    }

    public function searchBooks(Request $request)
    {
        $books = DB::table('books')
                   ->where('title', 'like', '%' . $request->keywords . '%')
                   ->orWhere('description', 'like', '%' . $request->keywords . '%')
                   ->get();

        return response()->json($books);
    }
}
