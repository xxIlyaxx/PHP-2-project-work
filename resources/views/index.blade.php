@extends('layouts/main')
@section('pageTitle', 'Group name')

@section('content')
    <h1>Group name</h1>
    {!! Markdown::parse($description) !!}
@endsection