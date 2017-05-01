@extends('admin.layouts.main')
@section('content')
    <form action="{{ route('admin/save-biography') }}" method="POST">
        {{ csrf_field() }}
        <textarea name="biography" id="biography" cols="30" rows="10"></textarea>
        <input type="submit" value="Save">
    </form>
@endsection