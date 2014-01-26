<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Rework')</title>
    {{ HTML::style('css/vendor/unsemantic/unsemantic-grid-responsive-tablet.css')}}
    {{ HTML::style('css/base.css') }}
    {{ HTML::style('css/ion.rangeSlider.css') }}
    {{ HTML::style('css/ion.rangeSlider.skinNice.css') }}
	{{ HTML::script('scripts/modernizr.js') }}
	{{ HTML::script('scripts/shepherd.min.js') }}
</head>
<body>
	
	<div class="grid-container">

		<header class="block mainMenu mainTitle floatFix">

			<a href="/client" title="Rework">
				{{ HTML::image("images/logo_small.png", "Rework", array('class' => 'floatLeft')) }}
			    <h1 class="floatLeft">Rework</h1>
			</a>
		    	
	    	@if(Auth::check())

		    <nav>
		        <ul class="floatRight">
		            <li class="floatLeft">
		            	{{ link_to('client/jobs', 'Mijn Opdrachten', array('class' => 'menuLink borderRight'))}}
		            </li>
		            <li class="floatLeft">
		            	{{ link_to('client/settings', 'Instellingen', array('class' => 'menuLink borderRight'))}}
		            </li>
		            <li class="floatLeft">{{ link_to_route("logout", "Uitloggen", null, array("class" => "menuLink")) }}</li>
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
    {{ HTML::script('scripts/jquery-ui-1.9.2.custom.min.js') }}	
	@yield('scripts')
	<script>
	var tour;

	tour = new Shepherd.Tour({
  		defaults: {
    	classes: 'shepherd-theme-arrows',
    	scrollTo: true
  		}
	});

	tour.addStep('example-step', {
  		text: 'This step is attached to the bottom of the <code>.example-css-selector</code> element.',
  		attachTo: '.floatLeft bottom',
  		classes: 'example-step-extra-class',
  		buttons: [{
      		text: 'Next',
      		action: tour.next
    	}]
	});

	tour.start();
	</script>
</body>
</html>