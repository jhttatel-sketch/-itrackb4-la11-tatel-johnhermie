<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request)
    {
        $books = $this->books();

        $genre = $request->query('genre');
        $year = $request->query('year');

        if ($genre) {
            $books = array_filter($books, function ($book) use ($genre) {
                return $book['genre'] === $genre;
            });
        }

        if ($year) {
            $books = array_filter($books, function ($book) use ($year) {
                return $book['year'] == $year;
            });
        }

        return view('books.index', [
            'books' => $books,
            'genre' => $genre,
            'year' => $year
        ]);
    }

    public function create()
    {
        return view('books.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|max:100',
            'author' => 'required|max:100',
            'year' => 'required|numeric|min:1000|max:2100',
            'genre' => 'required|in:Fantasy,Romance,Technology,Drama,Adventure'
        ]);

        $books = $this->books();

        $newId = empty($books)
            ? 1
            : max(array_column($books, 'id')) + 1;

        $validated['id'] = $newId;

        $books[] = $validated;

        $this->saveBooks($books);

        return redirect()
            ->route('books.index')
            ->with('success', 'Book added successfully!');
    }

    public function show($id)
    {
        $books = $this->books();

        if (!isset($books[$id - 1])) {
            abort(404);
        }

        $book = null;

        foreach ($books as $item) {
            if ($item['id'] == $id) {
                $book = $item;
                break;
            }
        }

        if ($book === null) {
            abort(404);
        }

        return view('books.show', [
            'book' => $book
        ]);
    }

    public function featured()
    {
        $books = $this->books();

        $featured = null;

        foreach ($books as $book) {
            if ($book['id'] == 6) {
                $featured = $book;
                break;
            }
        }

        if ($featured === null) {
            abort(404);
        }

        return view('books.featured', [
            'book' => $featured
        ]);
    }

    private function books()
    {
        $path = storage_path('app/books.json');

        if (!file_exists($path)) {
            return [];
        }

        $data = file_get_contents($path);

        return json_decode($data, true);
    }

    private function saveBooks(array $books)
    {
        $path = storage_path('app/books.json');

        file_put_contents(
            $path,
            json_encode($books, JSON_PRETTY_PRINT)
        );
    }
}