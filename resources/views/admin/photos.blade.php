@extends('admin.layouts.main')
@section('pageTitle', 'Photos')
@section('content')
    <h1>@yield('pageTitle')</h1>
    <a href="{{ route('admin/edit-photo') }}">Add photo</a>
    <div>
        @if ($photos)
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>ID</th>
                    <th>Photo</th>
                    <th>Description</th>
                    <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($photos as $photo)
                    <tr>
                        <td>{{ $photo->id }}</td>
                        <td><img src="{{ asset($photo->photo) }}" alt="{{ $photo->description }}" height="60"></td>
                        <td>{{ $photo->description }}</td>
                        <td>
                            <a href="{{ route('admin/edit-photo')}}?photo={{ $photo->id }}"
                               class="glyphicon glyphicon-pencil"></a>
                            <a href="{{ route('admin/remove-photo')}}?photo={{ $photo->id }}"
                               class="glyphicon glyphicon-remove"></a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        @else
            <h2>No photos</h2>
        @endif
    </div>
@endsection
