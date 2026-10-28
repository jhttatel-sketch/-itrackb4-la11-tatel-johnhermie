
@extends('layouts.app')

@section('title', 'Edit Book')

@section('content')

<h2 class="mb-4">Edit Book</h2>

<form method="POST" action="{{ route('books.update', $book) }}">

    @csrf
    @method('PUT')

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>

        <input
            type="text"
            name="title"
            id="title"
            class="form-control"
            value="{{ old('title', $book->title) }}"
        >

        @error('title')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="author" class="form-label">Author</label>

        <input
            type="text"
            name="author"
            id="author"
            class="form-control"
            value="{{ old('author', $book->author) }}"
        >

        @error('author')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="year" class="form-label">Year</label>

        <input
            type="number"
            name="year"
            id="year"
            class="form-control"
            value="{{ old('year', $book->year) }}"
        >

        @error('year')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <div class="mb-3">
        <label for="genre_id" class="form-label">Genre</label>

        <select name="genre_id" id="genre_id" class="form-select">

            <option value="">Choose a genre</option>

            @foreach ($genres as $genre)
                <option
                    value="{{ $genre->id }}"
                    @selected(old('genre_id', $book->genre_id) == $genre->id)
                >
                    {{ $genre->name }}
                </option>
            @endforeach

        </select>

        @error('genre_id')
            <div class="text-danger mt-1">{{ $message }}</div>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">
        Update Book
    </button>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">
        Cancel
    </a>

</form>

@endsection
