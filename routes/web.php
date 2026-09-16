<?php
use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MovieController;
Route::get('/', function () {
    return view('welcome');
});

Route::get('/books', [BookController::class, 'index'])->name('books.index');
Route::get('/books/featured', [BookController::class, 'featured'])->name('books.featured');
Route::get('/books/filter/{genre?}', [BookController::class, 'filter'])->name('books.filter');
Route::get('/books/{id}', [BookController::class, 'show'])->name('books.show'); 
Route::get('/teachers/featured', [TeacherController::class, 'featured'])
    ->name('teachers.featured');

Route::resource('teachers', TeacherController::class)
    ->only(['index', 'show']);


 Route::get('/movies/featured', [MovieController::class, 'featured'])
    ->name('movies.featured');

Route::resource('movies', MovieController::class)
    ->only(['index', 'show']);