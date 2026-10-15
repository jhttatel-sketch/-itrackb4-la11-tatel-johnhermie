<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        Book::create([
            'title' => 'Anime',
            'author' => 'Jjun Amaro',
            'year' => 1888,
            'genre' => 'Fantasy',
            'is_featured' => false,
            'description' => 'A fantasy book.',
        ]);

        Book::create([
            'title' => 'Holly',
            'author' => 'Justine Tacorda',
            'year' => 1892,
            'genre' => 'Romance',
            'is_featured' => false,
            'description' => 'A romance book.',
        ]);

        Book::create([
            'title' => 'Wordtech',
            'author' => 'Ronnie Vargas',
            'year' => 1983,
            'genre' => 'Technology',
            'is_featured' => false,
            'description' => 'A technology book.',
        ]);

        Book::create([
            'title' => 'Blank',
            'author' => 'Lhorenz Magtibay',
            'year' => 1985,
            'genre' => 'Drama',
            'is_featured' => false,
            'description' => null,
        ]);

        Book::create([
            'title' => 'Eimreh',
            'author' => 'Eimreh San',
            'year' => 2009,
            'genre' => 'Adventure',
            'is_featured' => false,
            'description' => 'An adventure book.',
        ]);

        Book::create([
            'title' => 'The Last Chapter',
            'author' => 'John Tatel',
            'year' => 2020,
            'genre' => 'Fantasy',
            'is_featured' => true,
            'description' => 'A featured book.',
        ]);
    }
}