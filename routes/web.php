<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index'])
    ->name('books.index');

Route::get('/books/create', [BookController::class, 'create'])
    ->name('books.create');

Route::post('/books', [BookController::class, 'store'])
    ->name('books.store');

Route::get('/books/featured', [BookController::class, 'featured'])
    ->name('books.featured');

Route::get('/books/{id}', [BookController::class, 'show'])
    ->name('books.show');

Route::get('/books/filter/{genre?}', function ($genre = null) {
    if ($genre) {
        return redirect()->route('books.index', [
            'genre' => $genre
        ]);
    }

    return redirect()->route('books.index');
})->name('books.filter');