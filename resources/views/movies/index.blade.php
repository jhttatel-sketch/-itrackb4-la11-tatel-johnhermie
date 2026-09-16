@extends('layouts.app')

@section('title', 'All Movies')

@section('content')

<h2 class="mb-4">Movie List</h2>

<table class="table table-bordered table-striped">

    <tr>
        <th>#</th>
        <th>Movie Title</th>
        <th>Year</th>
    </tr>

    @forelse ($movies as $movie)

    <tr>
        <td>{{ $loop->iteration }}</td>

        <td>
            <a href="{{ route('movies.show', $movie['id']) }}">
                {{ $movie['title'] }}
            </a>
        </td>

        <td>{{ $movie['year'] }}</td>
    </tr>

    @empty

    <tr>
        <td colspan="3">No movies found.</td>
    </tr>

    @endforelse

</table>

@endsection