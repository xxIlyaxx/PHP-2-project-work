@extends('admin.layouts.main')
@section('pageTitle', 'Edit description')
@section('content')
    <h1>@yield('pageTitle')</h1>
    @include('errors')
    <form action="{{ route('admin/save-description') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" cols="30" rows="10"
                      class="form-control">{{ $description }}</textarea>
        </div>
        <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>
        <input type="submit" value="Save" class="btn btn-success">
    </form>
@endsection