<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Book;
use App\Models\Genre;

class BookSeeder extends Seeder
{
    public function run(): void
    {
        // Create the lookup table records first.
        $fantasy = Genre::create(['name' => 'Fantasy']);
        $romance = Genre::create(['name' => 'Romance']);
        $technology = Genre::create(['name' => 'Technology']);
        $drama = Genre::create(['name' => 'Drama']);
        $adventure = Genre::create(['name' => 'Adventure']);

        // Create books using the actual genre IDs.
        Book::create([
            'title' => 'Anime',
            'author' => 'Jjun Amaro',
            'year' => 1888,
            'genre_id' => $fantasy->id,
            'is_featured' => false,
            'description' => 'A fantasy book.',
        ]);

        Book::create([
            'title' => 'Holly',
            'author' => 'Justine Tacorda',
            'year' => 1892,
            'genre_id' => $romance->id,
            'is_featured' => false,
            'description' => 'A romance book.',
        ]);

        Book::create([
            'title' => 'Wordtech',
            'author' => 'Ronnie Vargas',
            'year' => 1983,
            'genre_id' => $technology->id,
            'is_featured' => false,
            'description' => 'A technology book.',
        ]);

        Book::create([
            'title' => 'Blank',
            'author' => 'Lhorenz Magtibay',
            'year' => 1985,
            'genre_id' => $drama->id,
            'is_featured' => false,
            'description' => null,
        ]);

        Book::create([
            'title' => 'Eimreh',
            'author' => 'Eimreh San',
            'year' => 2009,
            'genre_id' => $adventure->id,
            'is_featured' => false,
            'description' => 'An adventure book.',
        ]);

        Book::create([
            'title' => 'The Last Chapter',
            'author' => 'John Tatel',
            'year' => 2020,
            'genre_id' => $fantasy->id,
            'is_featured' => true,
            'description' => 'A featured book.',
        ]);
    }
}
