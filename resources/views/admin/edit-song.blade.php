@extends('admin.layouts.main')
@section('pageTitle', $pageTitle)
@section('content')
    <h1>@yield('pageTitle')</h1>
    @include('errors')
    <form action="{{ route('admin/save-song') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ $song->name }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="min">Minutes</label>
            <input type="number" name="min" id="min" min="0" value="{{ $song->minutes }}" class="form-control">
        </div>
        <div class="form-group">
            <label for="sec">Seconds</label>
            <input type="number" name="sec" id="sec" value="{{ $song->seconds }}" min="0" max="59" class="form-control">
        </div>
        <input type="hidden" name="id" value="{{ $song->id }}">
        <input type="hidden" name="album_id" value="{{ $album->id }}">
        <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>
        <input type="submit" value="Save" class="btn btn-success">
    </form>
@endsection