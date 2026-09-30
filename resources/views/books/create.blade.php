@extends('layouts.app')

@section('title', 'Add Book')

@section('content')

<h2 class="mb-4">Add New Book</h2>

<form method="POST" action="{{ route('books.store') }}">

    @csrf

    <div class="mb-3">
        <label for="title" class="form-label">Title</label>

        <input
            type="text"
            name="title"
            id="title"
            class="form-control"
            value="{{ old('title') }}"
        >

        @error('title')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="author" class="form-label">Author</label>

        <input
            type="text"
            name="author"
            id="author"
            class="form-control"
            value="{{ old('author') }}"
        >

        @error('author')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="year" class="form-label">Year</label>

        <input
            type="number"
            name="year"
            id="year"
            class="form-control"
            value="{{ old('year') }}"
        >

        @error('year')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>


    <div class="mb-3">
        <label for="genre" class="form-label">Genre</label>

        <select name="genre" id="genre" class="form-select">

            <option value="">Choose a genre</option>

            <option value="Fantasy" @selected(old('genre') === 'Fantasy')>
                Fantasy
            </option>

            <option value="Romance" @selected(old('genre') === 'Romance')>
                Romance
            </option>

            <option value="Technology" @selected(old('genre') === 'Technology')>
                Technology
            </option>

            <option value="Drama" @selected(old('genre') === 'Drama')>
                Drama
            </option>

            <option value="Adventure" @selected(old('genre') === 'Adventure')>
                Adventure
            </option>

        </select>

        @error('genre')
            <div class="text-danger mt-1">
                {{ $message }}
            </div>
        @enderror
    </div>


    <button type="submit" class="btn btn-primary">
        Add Book
    </button>

    <a href="{{ route('books.index') }}" class="btn btn-secondary">
        Cancel
    </a>

</form>

@endsection