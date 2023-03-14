<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [\App\Http\Controllers\BookController::class, 'index'])
    ->name('book.index');

Auth::routes();

Route::get('/book', [\App\Http\Controllers\BookController::class, 'index'])
    ->name('book.index');
Route::get('/author', [\App\Http\Controllers\AuthorController::class, 'index'])
    ->name('author.index');
Route::resource('rating', \App\Http\Controllers\RatingController::class);

// Get Book Data based on author id
Route::get('getBook/{id}', function ($id) {
    $book_id = \App\Models\Book::where('author_id', $id)->get();
    return response()->json($book_id);
});
