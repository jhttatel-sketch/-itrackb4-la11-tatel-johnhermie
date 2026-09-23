@extends('layouts.app')

@section('title', 'Book List')

@section('content')

<h2>Book List</h2>

{{-- Active Filters --}}
@if($genre || $year)
    <div class="alert alert-info">
        <strong>Active Filters:</strong>

        @if($genre)
            Genre: <b>{{ $genre }}</b>
        @endif

        @if($year)
            | Year: <b>{{ $year }}</b>
        @endif
    </div>
@endif

{{-- Genre Filters --}}
<h5>Filter by Genre</h5>

<p>
    <a href="{{ route('books.index', ['genre'=>'Fantasy','year'=>$year]) }}" class="btn btn-outline-primary btn-sm">Fantasy</a>

    <a href="{{ route('books.index', ['genre'=>'Romance','year'=>$year]) }}" class="btn btn-outline-primary btn-sm">Romance</a>

    <a href="{{ route('books.index', ['genre'=>'Technology','year'=>$year]) }}" class="btn btn-outline-primary btn-sm">Technology</a>

    <a href="{{ route('books.index', ['genre'=>'Drama','year'=>$year]) }}" class="btn btn-outline-primary btn-sm">Drama</a>

    <a href="{{ route('books.index', ['genre'=>'Adventure','year'=>$year]) }}" class="btn btn-outline-primary btn-sm">Adventure</a>
</p>

{{-- Year Filters --}}
<h5>Filter by Year</h5>

<p>
    <a href="{{ route('books.index', ['year'=>1888,'genre'=>$genre]) }}" class="btn btn-outline-success btn-sm">1888</a>

    <a href="{{ route('books.index', ['year'=>1892,'genre'=>$genre]) }}" class="btn btn-outline-success btn-sm">1892</a>

    <a href="{{ route('books.index', ['year'=>1983,'genre'=>$genre]) }}" class="btn btn-outline-success btn-sm">1983</a>

    <a href="{{ route('books.index', ['year'=>1985,'genre'=>$genre]) }}" class="btn btn-outline-success btn-sm">1985</a>

    <a href="{{ route('books.index', ['year'=>2009,'genre'=>$genre]) }}" class="btn btn-outline-success btn-sm">2009</a>

    <a href="{{ route('books.index', ['year'=>2020,'genre'=>$genre]) }}" class="btn btn-outline-success btn-sm">2020</a>
</p>

{{-- Clear Filters --}}
<a href="{{ route('books.index') }}" class="btn btn-danger btn-sm mb-3">
    Clear Filters
</a>

<div class="card shadow-sm">
    <table class="table table-hover mb-0">

        <thead class="table-dark">
            <tr>
                <th>ID</th>
                <th>Title</th>
                <th>Author</th>
                <th>Year</th>
                <th>Genre</th>
            </tr>
        </thead>

        <tbody>
            @forelse ($books as $book)

                <tr>
                    <td>{{ $book['id'] }}</td>

                    <td>
                        <a href="{{ route('books.show', $book['id']) }}">
                            {{ $book['title'] }}
                        </a>
                    </td>

                    <td>{{ $book['author'] }}</td>

                    <td>{{ $book['year'] }}</td>

                    <td>{{ $book['genre'] }}</td>
                </tr>

            @empty

                <tr>
                    <td colspan="5" class="text-center">
                        No books found.
                    </td>
                </tr>

            @endforelse
        </tbody>

    </table>
</div>

@endsection