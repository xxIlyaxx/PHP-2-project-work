@extends('layouts.main')
@section('pageTitle', 'Photos')

@section('content')
    <h1>Photos</h1>
    @forelse($photos as $photo)
        <div class="col-md-4">
            <div class="thumbnail">
                <img src="{{ asset($photo->photo) }}" width="300">
                <div class="caption">
                    <p>{{ $photo->description }}</p>
                </div>
            </div>
        </div>
    @empty
        <p>No photos</p>
    @endforelse
@endsection
