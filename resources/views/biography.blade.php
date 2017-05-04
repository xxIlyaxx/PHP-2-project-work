@extends('layouts/main')
@section('pageTitle', 'Biography')

@section('content')
    <h1>Biography</h1>
    {!! Markdown::parse($biography) !!}
@endsection