<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateAuthor;
use App\Models\Author;

class AuthorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $authors = Author::latest()->paginate(10);

        return view('authors.index')->with('authors', $authors);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.author.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \App\Http\Requests\CreateAuthor $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateAuthor $request)
    {
        Author::create($this->validateRequest($request));

        return redirect()->route('authors');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $author = Author::find($id);

        return view('authors.show')->with('author', $author);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $author = Author::find($id);

        return view('admin.author.edit')->with('author', $author);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \App\Http\Requests\CreateAuthor $request
     * @param int                             $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CreateAuthor $request, $id)
    {
        Author::updateOrCreate(['id'=>$id], $this->validateRequest($request));

        return redirect()->route('authors');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $author = Author::find($id);
        $author->delete();

        return redirect()->route('authors');
    }

    private function validateRequest(CreateAuthor $request)
    {
        return $request->validated();
    }
}
