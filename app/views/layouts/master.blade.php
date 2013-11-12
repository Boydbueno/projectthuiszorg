<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Project Thuiszorg')</title>
    {{ HTML::style('css/base.css') }}
    {{ HTML::style('css/vendor/unsemantic/unsemantic-grid-responsive-tablet.css')}}
	{{ HTML::script('scripts/modernizr.js') }}
</head>
<body>
	
	<div class="grid-container">
	    
		<section class="content">
	    	@yield('content')
		</section> <!-- End Content -->

		<footer></footer>

	</div>
	
</body>
</html>