<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Rework')</title>
    {{ HTML::style('css/base.css') }}
    {{ HTML::style('css/vendor/unsemantic/unsemantic-grid-responsive-tablet.css')}}
	{{ HTML::script('scripts/modernizr.js') }}
</head>
<body>
	
	<div class="grid-container">

		<header class="block mainMenu mainTitle floatFix">
		    <img class="floatLeft" src="images/logo_small.png" alt="Rework" /><h1 class="floatLeft">Rework</h1>
		    	
	    	@if(Auth::check())

		    <nav>
		        <ul class="floatRight">
		            <li class="floatLeft"><a href="#" class="menuLink borderRight">Mijn Opdrachten</a></li>
		            <li class="floatLeft"><a href="#" class="menuLink borderRight">Instellingen</a></li>
		            <li class="floatLeft">{{ link_to_route("logout", "Uitloggen", array(), array("class" => "menuLink")) }}</li>
		        </ul>
		    </nav>

			@endif

		</header>
	    
		<section class="content">
	    	@yield('content')
		</section> <!-- End Content -->

	    <footer class="block marginTop description">
	    	<p>&copy; Rework 2013</p>
	    </footer>

	</div>
	
</body>
</html>