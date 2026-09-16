@extends('layouts.app')

@section('title', $movie['title'])

@section('content')

<div class="card">

    <div class="card-body">

        <h2>{{ $movie['title'] }}</h2>

        <p><strong>Year:</strong> {{ $movie['year'] }}</p>

        <p><strong>Genre:</strong> {{ $movie['genre'] }}</p>

        <p>{{ $movie['description'] }}</p>

        <a href="{{ route('movies.index') }}" class="btn btn-primary">
            Back to Movie List
        </a>

    </div>

</div>

@endsection