<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>@yield('pageTitle')</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default">
        <div class="container">
            <div class="navbar-header">
                <a href="{{ route('admin') }}" class="navbar-brand">Admin panel</a>
            </div>
            <ul class="nav navbar-nav">
                <li class="{{ Request::is('admin/edit-description') ? 'active' : '' }}"><a
                            href="{{ route('admin/edit-description') }}">Description</a></li>
                <li class="{{ Request::is('admin/edit-biography') ? 'active' : '' }}"><a
                            href="{{ route('admin/edit-biography') }}">Biography</a></li>
                <li class="{{ Request::is('admin/albums') ? 'active' : '' }}"><a href="{{ route('admin/albums') }}">Albums</a>
                </li>
                <li class="{{ Request::is('admin/photos') ? 'active' : '' }}"><a href="{{ route('admin/photos') }}">Photos</a>
                </li>
                <li><a href="{{ route('home') }}">Main page</a></li>
            </ul>
        </div>
    </nav>
    @yield('content')
</div>
<script src="https://code.jquery.com/jquery-3.2.1.min.js"
        integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
        integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
        crossorigin="anonymous"></script>
</body>
</html>