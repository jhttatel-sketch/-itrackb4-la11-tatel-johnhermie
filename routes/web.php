<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

// Welcome Page
Route::get('/', function () {
    return view('welcome');
});

// Book List
Route::get('/books', [BookController::class, 'index'])->name('books.index');

// Featured Book
Route::get('/books/featured', [BookController::class, 'featured'])->name('books.featured');

// Old filter route redirects to query string filter
Route::get('/books/filter/{genre?}', function ($genre = null) {
    if ($genre) {
        return redirect()->route('books.index', ['genre' => $genre]);
    }

    return redirect()->route('books.index');
})->name('books.filter');

// Book Details (ALWAYS LAST)
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show');