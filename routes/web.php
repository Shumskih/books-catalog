<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\Facades\Route;

Route::get('/', 'MainPageController@index')->name('index');

Route::group(
    [
        'prefix'     => 'admin',
        'middleware' => ['auth', 'role', 'verified'],
    ], function () {
    // authors
    Route::get('/authors', 'AuthorController@index')->name('authors');
    Route::get('/author/create', 'AuthorController@create')->name('author.create');
    Route::post('/author/store', 'AuthorController@store')->name('author.store');
    Route::get('/author/delete/{id}', 'AuthorController@destroy')->name('author.delete');
    Route::get('/author/edit/{id}', 'AuthorController@edit')->name('author.edit');
    Route::post('/author/update/{id}', 'AuthorController@update')->name('author.update');
    Route::get('/author/{id}', 'AuthorController@show')->name('author.show');

    //books
    Route::get('/books', 'BookController@index')->name('books');
    Route::get('/book/create', 'BookController@create')->name('book.create');
    Route::post('/book/store', 'BookController@store')->name('book.store');
    Route::get('/book/delete/{id}', 'BookController@destroy')->name('book.delete');
    Route::get('/book/edit/{id}', 'BookController@edit')->name('book.edit');
    Route::post('/book/update/{id}', 'BookController@update')->name('book.update');
    Route::get('/book/{id}', 'BookController@show')->name('book.show');
});


Auth::routes(['verify' => true]);

Route::get('mailable', function () {
    $user = App\User::find(1);
    $book = App\Models\Book::find(37);

    return new App\Mail\BookAddedMail($user, $book);
});
