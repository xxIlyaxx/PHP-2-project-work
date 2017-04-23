@extends('layouts.main')

@section('content')
    <h1>Albums</h1>
    <a href="{{ route('album', ['name' => str_slug('Album name')]) }}">Album name</a>
@endsection
