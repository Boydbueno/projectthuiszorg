<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Rework')</title>
    {{ HTML::style('css/public.css') }}
    {{ HTML::style('css/vendor/unsemantic/unsemantic-grid-responsive-tablet.css')}}
	{{ HTML::script('scripts/modernizr.js') }}
</head>
<body>
	
	<div>

		<header class="block mainMenu mainTitle floatFix">

			<div class="grid-container">

				<a href="/" title="Rework">
					{{ HTML::image("images/logo_small.png", "Rework", array('class' => 'floatLeft')) }}
				    <h1 class="floatLeft">Rework</h1>
				</a>
		    	
		    	@if(Auth::check())

			    <nav>
			        <ul class="floatRight">
			            <li class="floatLeft"><a href="#" class="menuLink borderRight">Registreren</a></li>
			            <li class="floatLeft">{{ link_to_route("logout", "Uitloggen", array(), array("class" => "menuLink")) }}</li>
			        </ul>
			    </nav>

				@else
		
				<nav>
			        <ul class="floatRight">
			        	<li class="floatLeft"><a href="#" class="menuLink borderRight">Registreren!</a></li>
			            <li class="floatLeft"><a href="#" class="menuLink borderRight">Inloggen</a></li>
			        </ul>
			    </nav>

			@endif

			</div>

		</header>

    	@yield('content')

	    <footer class="block marginTop footer">
	    	<div class="grid-container">
	    		<p>&copy; Rework 2013</p>
	    	</div>
	    </footer>

	</div>

	{{ HTML::script('scripts/jquery-2.0.3.min.js') }}
	
</body>
</html>