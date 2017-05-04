@extends('layouts/main')
@section('pageTitle', 'Group name')

@section('content')
    <h1>Circus Maximus Fansite</h1>
    {!! Markdown::parse($description) !!}
@endsection