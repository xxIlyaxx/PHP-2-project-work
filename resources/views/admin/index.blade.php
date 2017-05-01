@extends('admin.layouts.main')
@section('pageTitle', 'Admin panel')
@section('content')
    <div class="list-group">
        <a href="{{ route('admin/edit-description') }}" class="list-group-item">Edit description</a>
        <a href="{{ route('admin/edit-biography') }}" class="list-group-item">Edit biography</a>
        <a href="{{ route('admin/albums') }}" class="list-group-item">Albums</a>
        <a href="{{ route('admin/photos') }}" class="list-group-item">Photos</a>
    </div>
@endsection