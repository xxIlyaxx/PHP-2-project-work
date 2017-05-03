@extends('admin.layouts.main')
@section('pageTitle', 'Albums')
@section('content')
    <h1>@yield('pageTitle')</h1>
    <a href="{{ route('admin/edit-album') }}">Add album</a>
    @forelse($albums as $album)
        <div class="panel panel-default">
            <div class="panel-heading">
                {{ $album->name }}
            </div>
            <div class="panel-body">
                <div class="col-sm-2">
                    <img src="{{ asset($album->cover) }}" alt="Album photo" class="img-responsive">
                </div>
                <div class="col-sm-10">
                    <p>{{ $album->description }}</p>
                    <p>{{ $album->date }}</p>
                </div>
            </div>
            <div class="panel-footer">
                <a href="{{ route('admin/edit-album') }}?album={{ $album->id }}">Edit album</a>
                <a href="{{ route('admin/remove-album') }}?album={{ $album->id }}">Remove album</a>
                <a href="{{ route('admin/album', ['slug' => $album->slug]) }}">More</a>
            </div>
        </div>
    @empty
        <p>No albums</p>
    @endforelse
@endsection