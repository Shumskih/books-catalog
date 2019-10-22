<?php

namespace App\Http\Controllers;

use App\Events\NewBookAddedEvent;
use App\Http\Requests\CreateBook;
use App\Http\Requests\UploadImage;
use App\Mail\BookAddedMail;
use App\Models\Author;
use App\Models\Book;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;

class BookController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::latest()->paginate(6);

        return view('books.index')->with('books', $books);
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
     * @param \App\Http\Requests\CreateBook $cbRequest
     *
     * @return \Illuminate\Http\Response
     */
    public function store(CreateBook $cbRequest)
    {
        $book    = Book::create($this->validateRequest($cbRequest));
        $authors = request()->get('author');
        foreach ($authors as $author) {
            $book->authors()->attach($author);
        }
        $this->storeImage($book);

        $user = User::find(Auth::user()->getAuthIdentifier());
        event(new NewBookAddedEvent($user, $book));

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

        return view('books.show')->with('book', $book);
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
     * @param \App\Http\Requests\CreateBook $cbRequest
     * @param int                           $id
     *
     * @return \Illuminate\Http\Response
     */
    public function update(CreateBook $cbRequest, $id)
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

        $book->update($this->validateRequest($cbRequest));
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

    private function validateRequest(CreateBook $cbRequest)
    {
        return $cbRequest->validated();
    }

    private function storeImage($book)
    {
        if (request()->hasFile('cover')) {
            $imageName = time() . '.' . request()->cover->extension();
            Storage::disk('local')->put($imageName, File::get(request()->cover));

            $book->update([
                'cover' => $imageName,
            ]);
        }
    }

    private function deleteImage($book)
    {
        Storage::delete($book->cover);
    }

    private function checkImageAndDelete($book)
    {
        if (request()->hasFile('cover') && file_exists('storage' . DIRECTORY_SEPARATOR . $book->cover)) {
            $this->deleteImage($book);
        }
    }
}
