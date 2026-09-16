@extends('layouts.app')

@section('title', $teacher['name'])

@section('content')

<div class="card">

    <div class="card-body">

        <h3 class="card-title">{{ $teacher['name'] }}</h3>

        <p><strong>Department:</strong> {{ $teacher['department'] }}</p>

        <p><strong>Subject:</strong> {{ $teacher['subject'] }}</p>

        <a href="{{ route('teachers.index') }}" class="btn btn-primary">
            Back to the list
        </a>

    </div>

</div>

@endsection