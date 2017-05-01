@extends('admin.layouts.main')
@section('pageTitle', $pageTitle)
@section('content')
<form action="{{ route('admin/save-album') }}" method="POST" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="name">Name</label>
        <input type="text" name="name" id="name" class="form-control" value="{{ $album->name }}">
    </div>
    <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" id="description" class="form-control" rows="10">{{ $album->description }}</textarea>
    </div>
    <div class="form-group">
        <label for="date">Date</label>
        <input type="date" name="date" id="date" class="form-control" value="{{ $album->date }}">
    </div>
    <div class="form-group">
        <label for="cover">Cover</label>
        <input type="file" name="cover" id="cover">
    </div>
    <input type="hidden" name="id" value="{{ $album->id }}">
    <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>
    <input type="submit" value="Send" class="btn btn-success">
</form>
@endsection