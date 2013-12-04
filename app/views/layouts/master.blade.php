<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Rework')</title>
    {{ HTML::style('css/base.css') }}
    {{ HTML::style('css/vendor/unsemantic/unsemantic-grid-responsive-tablet.css')}}
    {{ HTML::style('css/ion.rangeSlider.css') }}
    {{ HTML::style('css/ion.rangeSlider.skinNice.css') }}
	
</head>
<body>
	
	<div class="grid-container">

		<header class="block mainMenu mainTitle floatFix">

			<a href="/" title="Rework">
				{{ HTML::image("images/logo_small.png", "Rework", array('class' => 'floatLeft')) }}
			    <h1 class="floatLeft">Rework</h1>
			</a>
		    	
	    	@if(Auth::check())

		    <nav>
		        <ul class="floatRight">
		            <li class="floatLeft"><a href="#" class="menuLink borderRight">Mijn Opdrachten</a></li>
		            <li class="floatLeft"><a href="#" class="menuLink borderRight">Instellingen</a></li>
		            <li class="floatLeft">{{ link_to("client/logout", "Uitloggen", array("class" => "menuLink")) }}</li>
		        </ul>
		    </nav>

			@else
	
			<nav>
		        <ul class="floatRight">
		            <li class="floatLeft"><a href="#" class="menuLink borderRight">Client</a></li>
		            <li class="floatLeft"><a href="#" class="menuLink borderRight">Opdrachtgever</a></li>
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

	{{ HTML::script('scripts/jquery-2.0.3.min.js') }}
	{{ HTML::script('scripts/modernizr.js') }}
	{{ HTML::script('scripts/ion.rangeSlider.js') }}

	<script>
	    $(document).ready(function(){

	        $("#range_1").ionRangeSlider({
	            min: 0,
	            max: 150,
	            from: 0,
	            to: 70,
	            type: 'double',
	            step: 10,
	            postfix: "m2",
	            prefix: "€",
	            prettify: true,
	            hasGrid: true
	        });

	    });
	</script>
	
</body>
</html>