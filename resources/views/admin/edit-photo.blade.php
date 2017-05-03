@extends('admin.layouts.main')
@section('pageTitle', $pageTitle)
@section('content')
    <h1>@yield('pageTitle')</h1>
    <form action="{{ route('admin/save-photo') }}" method="POST" enctype="multipart/form-data">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="description">Name</label>
            <input type="text" name="description" id="description" value="{{ $photo->description }}" class="form-control">
        </div>
        <div class="form-group">
            <input type="file" name="photo" id="photo">
        </div>
        <input type="hidden" name="id" value="{{ $photo->id }}">
        <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>
        <input type="submit" value="Save" class="btn btn-success">
    </form>
@endsection
