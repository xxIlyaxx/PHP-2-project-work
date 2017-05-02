@extends('layouts.main')
@section('pageTitle', $album->name)

@section('content')
    <h1>{{ $album->name }}</h1>
    <img src="{{ asset($album->cover) }}" alt="Cover of the {{ $album->name }}">
    <p> {{ $album->description }}</p>
    <ol>
        @foreach($album->songs as $song)
            <li>{{ $song->name }} {{ $song->minutes }}:{{ $song->seconds }}</li>
        @endforeach
    </ol>
@endsection
