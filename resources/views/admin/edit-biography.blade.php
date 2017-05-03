@extends('admin.layouts.main')
@section('pageTitle', 'Edit biography')
@section('content')
    <h1>@yield('pageTitle')</h1>
    @include('errors')
    <form action="{{ route('admin/save-biography') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="biography">Biography</label>
            <textarea name="biography" id="biography" cols="30" rows="10"
                      class="form-control">{{ $biography }}</textarea>
        </div>
        <a href="{{ URL::previous() }}" class="btn btn-danger">Cancel</a>
        <input type="submit" value="Save" class="btn btn-success">
    </form>
@endsection