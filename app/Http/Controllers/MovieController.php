<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MovieController extends Controller
{
    // Private helper
    private function movies()
    {
        return [
            1 => [
                'id' => 1,
                'title' => 'Avengers: Endgame',
                'year' => 2019,
                'genre' => 'Action / Superhero',
                'description' => 'The Avengers assemble for one final battle against Thanos.'
            ],

            2 => [
                'id' => 2,
                'title' => 'Spider-Man: No Way Home',
                'year' => 2021,
                'genre' => 'Action / Adventure',
                'description' => 'Spider-Man asks Doctor Strange for help after his identity is revealed.'
            ],

            3 => [
                'id' => 3,
                'title' => 'Interstellar',
                'year' => 2014,
                'genre' => 'Science Fiction',
                'description' => 'A team travels through a wormhole to save humanity.'
            ],

            4 => [
                'id' => 4,
                'title' => 'Your Name',
                'year' => 2016,
                'genre' => 'Anime / Romance',
                'description' => 'Two teenagers mysteriously swap bodies and change each other’s lives.'
            ],

            5 => [
                'id' => 5,
                'title' => 'Parasite',
                'year' => 2019,
                'genre' => 'Drama / Thriller',
                'description' => 'A poor family slowly enters the lives of a wealthy household.'
            ],
        ];
    }

    // LIST PAGE
    public function index()
    {
        return view('movies.index', [
            'movies' => $this->movies()
        ]);
    }

    // EMPTY METHODS
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    // DETAIL PAGE
    public function show(string $id)
    {
        $movies = $this->movies();

        if (!isset($movies[$id])) {
            abort(404);
        }

        return view('movies.show', [
            'movie' => $movies[$id]
        ]);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }

    // CUSTOM ROUTE
    public function featured()
    {
        $movies = $this->movies();

        return view('movies.show', [
            'movie' => $movies[1]
        ]);
    }
}