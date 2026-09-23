<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BookController extends Controller
{
    // BOOK LIST + TWO FILTERS
    public function index(Request $request)
    {
        $books = $this->books();

        $genre = $request->query('genre');
        $year = $request->query('year');

        $filteredBooks = [];

        foreach ($books as $id => $book) {

            if ($genre && $book['genre'] != $genre) {
                continue;
            }

            if ($year && $book['year'] != $year) {
                continue;
            }

            $filteredBooks[$id] = $book;
        }

        return view('books.index', [
            'books' => $filteredBooks,
            'genre' => $genre,
            'year' => $year,
        ]);
    }

    // BOOK DETAILS
    public function show($id)
    {
        $books = $this->books();

        if (!isset($books[$id])) {
            abort(404);
        }

        return view('books.show', [
            'book' => $books[$id]
        ]);
    }

    // FEATURED BOOK
    public function featured()
    {
        $books = $this->books();

        return view('books.featured', [
            'book' => $books[6]
        ]);
    }

    // BOOK DATA
    private function books()
    {
        return [

            1 => [
                'id' => 1,
                'title' => 'Anime',
                'author' => 'Jjun Amaro',
                'year' => 1888,
                'genre' => 'Fantasy'
            ],

            2 => [
                'id' => 2,
                'title' => 'Holly',
                'author' => 'Justine Tacorda',
                'year' => 1892,
                'genre' => 'Romance'
            ],

            3 => [
                'id' => 3,
                'title' => 'Wordtech',
                'author' => 'Ronnie Vargas',
                'year' => 1983,
                'genre' => 'Technology'
            ],

            4 => [
                'id' => 4,
                'title' => 'Blank',
                'author' => 'Lhorenz Magtibay',
                'year' => 1985,
                'genre' => 'Drama'
            ],

            5 => [
                'id' => 5,
                'title' => 'Eimreh',
                'author' => 'Eimreh San',
                'year' => 2009,
                'genre' => 'Adventure'
            ],

            6 => [
                'id' => 6,
                'title' => 'The Last Chapter',
                'author' => 'John Tatel',
                'year' => 2020,
                'genre' => 'Fantasy'
            ],

        ];
    }
}