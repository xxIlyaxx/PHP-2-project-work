@extends('admin.layouts.main')
@section('pageTitle', $album->name)
@section('content')
    <h1>{{ $album->name }}</h1>
    <img src="{{ asset($album->cover) }}" alt="{{ $album->name }}">
    {!! Markdown::parse($album->description) !!}
    <a href="{{ route('admin/edit-album') }}?album={{ $album->id }}">Edit album</a>
    <a href="{{ route('admin/edit-song') }}?album={{ $album->id }}">Add song</a>
    <div>
        @if ($album->songs)
            <h1>Songs</h1>
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>id</th>
                    <th>name</th>
                    <th>Duration</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($album->songs as $song)
                    <tr>
                        <td>{{ $song->id }}</td>
                        <td>{{ $song->name }}</td>
                        <td>{{ $song->minutes }}:{{ $song->seconds }}</td>
                        <td>
                            <a href="{{ route('admin/edit-song')}}?song={{ $song->id }}"
                               class="glyphicon glyphicon-pencil"></a>
                            <a href="{{ route('admin/remove-song')}}?song={{ $song->id }}"
                               class="glyphicon glyphicon-remove"></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h2>No songs</h2>
        @endif
    </div>
@endsection