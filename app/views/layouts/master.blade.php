<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Project Thuiszorg')</title>
    {{ HTML::style('css/base.css'); }}
</head>
<body>
	<header></header>
    
	<div>
    	@yield('content')
	</div>

	<footer></footer>
</body>
</html>