<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<div class="container">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">
                <a href="{{ route('home') }}" class="navbar-brand">Group name</a>
            </div>
        </div>
        <a href="{{ route('biography') }}">Biography</a>
        <a href="{{ route('albums') }}">Albums</a>
    </nav>
@yield('content')
</div>
</body>
</html>