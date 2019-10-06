<?php

namespace App\Http\Controllers;

use App\Models\Author;
use App\Models\Book;
use Illuminate\Support\Facades\Session;

class BookController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->paginate(5);

        return view('admin.book.index')->with('books', $books);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();

        return view('admin.book.create')->with('authors', $authors);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        $book    = Book::create($this->validateRequest());
        $authors = request()->get('author');
        foreach ($authors as $author) {
            $book->authors()->attach($author);
        }
        $this->storeImage($book);

        return redirect()->route('book.show', $book->id);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $book = Book::find($id);

        return view('admin.book.show')->with('book', $book);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $book    = Book::find($id);
        $authors = Author::all();

        return view('admin.book.edit')->with(['book' => $book, 'authors' => $authors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int                      $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        $book = Book::find($id);
        foreach ($book->authors as $author) {
            $book->authors()->detach($author);
        }

        $authors = request()->get('author');
        foreach ($authors as $author) {
            $book->authors()->attach($author);
        }

        $this->checkImageAndDelete($book);

        $book->update($this->validateRequest());
        $this->storeImage($book);

        return redirect()->route('book.show', $book->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $book = Book::find($id);

        if ($book->cover) {
            $this->deleteImage($book);
        }

        $book->delete();

        return redirect()->route('books');
    }

    private function validateRequest()
    {
        return tap(request()->validate(
            [
                'title'        => 'required|min:1',
                'description'  => 'required|min:10',
                'num_of_pages' => 'required|numeric',
            ]
        ), function () {
            if (request()->hasFile('cover')) {
                request()->validate([
                    'cover' => 'file|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                ]);
            }
        });
    }

    private function storeImage($book)
    {
        if (request()->hasFile('cover')) {
            $imageName = time() . '.' . request()->cover->extension();
            $imageName = request()->cover->move(public_path('uploads'), $imageName);
            $imageName = explode(DIRECTORY_SEPARATOR, $imageName);
            $imageName = last($imageName);

            $book->update([
                'cover' => $imageName,
            ]);
        }
    }

    private function deleteImage($book)
    {
        unlink(public_path(DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $book->cover));
    }

    private function checkImageAndDelete($book)
    {
        if (request()->hasFile('cover') && file_exists('uploads' . DIRECTORY_SEPARATOR . $book->cover)) {
            unlink(public_path(DIRECTORY_SEPARATOR . 'uploads' . DIRECTORY_SEPARATOR . $book->cover));
        }
    }
}
