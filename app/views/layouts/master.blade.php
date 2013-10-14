<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Project Thuiszorg')</title>
    {{ HTML::style('css/base.css'); }}
</head>
<body>
    @yield('content')
</body>
</html>