@extends('admin.layouts.main')
@section('pageTitle', 'Albums')
@section('content')
    <a href="{{ route('admin/edit-album') }}">Add album</a>
    @forelse($albums as $album)
        <div class="row">
            <h2>{{ $album->name }}</h2>
            <div class="col-sm-2">
                <img src="{{ asset($album->photo) }}" alt="Album photo" class="img-responsive">
            </div>
            <div class="col-sm-10">
                <p>{{ $album->description }}</p>
                <p>{{ $album->date }}</p>
            </div>
            <a href="{{ route('admin/edit-album') }}?album={{ $album->id }}">Edit album</a>
            <a href="{{ route('admin/album', ['slug' => $album->slug]) }}">More</a>
        </div>
    @empty
        <p>No albums</p>
    @endforelse
@endsection