<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Symfony\Component\HttpFoundation\Response;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['prefix' => 'v1/books'], function () {
    //books
    Route::get('/list', 'Api\BookController@index');
    Route::get('/by-id/{id}', 'Api\BookController@show');
    Route::post('/update/{id}', 'Api\BookController@update');
    Route::delete('/{id}', 'Api\BookController@destroy');
});
