<?php

namespace App\Http\Controllers;

use App\Models\Author;

class MainPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::all();
        return view('author.index')->with('authors', $authors);
    }

    public function admin()
    {
        return view('admin.index');
    }
}
