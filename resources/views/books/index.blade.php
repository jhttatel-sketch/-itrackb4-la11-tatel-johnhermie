@extends('layouts.app')

@section('title', 'My Book List')

@section('content')

<h2>My Book List</h2>

<table class="table table-striped table-hover table-bordered mt-3">

    <thead class="table-dark">
        <tr>
            <th>No.</th>
            <th>Title</th>
            <th>Author</th>
            <th>Year</th>
            <th>Genre</th>
        </tr>
    </thead>

    <tbody>

        @forelse ($books as $book)
            <tr @if($book['year'] >= 2020) class="table-warning" @endif>

                <td>{{ $loop->iteration }}</td>

                <td>
                    <a href="{{ route('books.show', $book['id']) }}">
                        {{ $book['title'] }}
                    </a>
                </td>

                <td>{{ $book['author'] }}</td>

                <td>
                    {{ $book['year'] }}

                    @if($book['year'] >= 2020)
                        <span class="badge bg-success ms-2">Latest Book</span>
                    @endif
                </td>

                <td>{{ $book['genre'] }}</td>

            </tr>

        @empty
            <tr>
                <td colspan="5" class="text-center text-danger">
                    No books available!
                </td>
            </tr>
        @endforelse

    </tbody>

</table>

@endsection