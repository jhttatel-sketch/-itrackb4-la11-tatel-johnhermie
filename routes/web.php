<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/featured', [BookController::class, 'featured'])->name('books.featured');
Route::get('/books/filter/{genre?}', [BookController::class, 'filter'])->name('books.filter');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show'); 