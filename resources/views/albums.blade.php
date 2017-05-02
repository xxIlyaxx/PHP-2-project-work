@extends('layouts.main')
@section('pageTitle', 'Albums')

@section('content')
    <h1>Albums</h1>
    @forelse($albums as $album)
        <div class="panel panel-default">
            <div class="panel-heading">{{ $album->name }}</div>
            <div class="panel-body">
                <img src="{{ asset($album->cover) }}" alt="{{ $album->name }}">
                <p>{{ $album->description }}</p>
            </div>
            <div class="panel-footer">
                <a href="{{ route('album', ['slug' => $album->slug]) }}">More</a>
            </div>
        </div>
    @empty
        <p>No albums</p>
    @endforelse
@endsection
