@extends('layouts.app')

@section('title', 'Featured Book')

@section('content')

<h2 class="mb-3">Featured Book</h2>

<div class="card shadow-sm" style="max-width:500px">

    <div class="card-header bg-dark text-white">
        <h4 class="mb-0">
            {{ $book['title'] }}
        </h4>
    </div>

    <div class="card-body p-0">

        <ul class="list-group list-group-flush">

            <li class="list-group-item">
                <strong>Author:</strong> {{ $book['author'] }}
            </li>

            <li class="list-group-item">
                <strong>Year:</strong> {{ $book['year'] }}
            </li>

            <li class="list-group-item">
                <strong>Genre:</strong> {{ $book['genre'] }}
            </li>

        </ul>

    </div>

</div>

<br>

<a href="{{ route('books.index') }}" class="btn btn-primary">
    ← Book List
</a>

@endsection