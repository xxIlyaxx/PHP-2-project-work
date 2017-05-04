@extends('layouts.main')
@section('pageTitle', 'Albums')

@section('content')
    <h1>Albums</h1>
    @forelse($albums as $album)
        <div class="media">
            <div class="media-left media-middle">
                <img src="{{ asset($album->cover) }}" alt="{{ $album->name }}" class="media-object" width="200">
            </div>
            <div class="media-body">
                <h2 class="media-heading">{{ $album->name }}</h2>
                {!! Markdown::parse($album->description) !!}
                <a href="{{ route('album', ['slug' => $album->slug]) }}">More</a>
            </div>
        </div>
    @empty
        <p>No albums</p>
    @endforelse
@endsection
