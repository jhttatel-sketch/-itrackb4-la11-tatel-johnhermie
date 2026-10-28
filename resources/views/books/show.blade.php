
@extends('layouts.app')

@section('title', 'Book Details')

@section('content')

<h2 class="mb-4">Book Details</h2>

<div class="card">
    <div class="card-body">

        <h3>{{ $book->title }}</h3>

        <p><strong>ID:</strong> {{ $book->id }}</p>

        <p><strong>Author:</strong> {{ $book->author }}</p>

        <p><strong>Year:</strong> {{ $book->year }}</p>

        <p>
            <strong>Genre:</strong>
            {{ $book->genre->name ?? 'No genre assigned' }}
        </p>

        <a href="{{ route('books.index') }}" class="btn btn-secondary">
            Back to Books
        </a>

        <a href="{{ route('books.edit', $book) }}" class="btn btn-primary">
            Edit Book
        </a>

    </div>
</div>

@endsection
