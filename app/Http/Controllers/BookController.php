<?php
namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BookController extends Controller
{
    public function index(Request $request)
    {
        DB::flushQueryLog();
        DB::enableQueryLog();

        $query = Book::query();

        $genre = $request->query('genre');
        $year = $request->query('year');

        if ($genre) {
            $query->where('genre_id', $genre);
        }

        if ($year) {
            $query->where('year', $year);
        }

        $books = $query->with('genre')->get();
        $queryCount = count(DB::getQueryLog());

        return view('books.index', [
            'books' => $books,
            'genre' => $genre,
            'year' => $year,
            'queryCount' => $queryCount,
        ]);
    }

    public function create()
    {
        $genres = Genre::all();

        return view('books.create', compact('genres'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'author' => 'required|max:100',
            'year' => 'required|numeric|min:1000|max:2100',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');

        Book::create($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book added successfully!');
    }

    public function show(Book $book)
    {
        $book->load('genre');

        return view('books.show', compact('book'));
    }

    public function edit(Book $book)
    {
        $genres = Genre::all();

        return view('books.edit', compact('book', 'genres'));
    }

    public function update(Request $request, Book $book)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'author' => 'required|max:100',
            'year' => 'required|numeric|min:1000|max:2100',
            'genre_id' => 'required|exists:genres,id',
        ]);

        $validated['is_featured'] = $request->boolean('is_featured');

        $book->update($validated);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book updated successfully!');
    }

    public function destroy(Book $book)
    {
        $book->delete();

        return redirect()
            ->route('books.index')
            ->with('success', 'Book deleted successfully!');
    }

    public function featured()
    {
        $book = Book::where('is_featured', true)->firstOrFail();

        return view('books.featured', compact('book'));
    }
}
