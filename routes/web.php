<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books/featured', [BookController::class, 'featured'])
    ->name('books.featured');

Route::get('/books/filter/{genre?}', function ($genre = null) {
    if ($genre) {
        return redirect()->route('books.index', [
            'genre' => $genre,
        ]);
    }

    return redirect()->route('books.index');
})->name('books.filter');

Route::resource('books', BookController::class);