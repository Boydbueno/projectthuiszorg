<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Project Thuiszorg')</title>
    {{ HTML::style('css/base.css') }}
	{{ HTML::script('scripts/modernizr.js') }}
</head>
<body>
	<header>
		
	</header>
    
	<section class="content">
    	@yield('content')
	</section> <!-- End Content -->

	<footer></footer>

</body>
</html>