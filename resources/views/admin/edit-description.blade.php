@extends('admin.layouts.main')
@section('content')
    <form action="{{ route('admin/save-description') }}" method="POST">
        {{ csrf_field() }}
        <textarea name="description" id="description" cols="30" rows="10"></textarea>
        <input type="submit" value="Save">
    </form>
@endsection