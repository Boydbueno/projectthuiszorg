@extends('layouts.public')

@section('content')

<div class="backdropImage smallHeader">
	{{ HTML::image("images/logo_big.png", "Rework Logo", array('class' => 'bigLogo')) }}
</div>

<section class="content grid-container">

	<div class="posRelative">
		<div class="imageOverlay floatFix">
			<div class="block grid-60">
				<h1 class="boxTitle">Details</h1>
				<p class="regularPadding">Wij zijn een nieuw initiatief genaamd Rework. Ons doel is om ouderen weer aan werk te helpen en het liefst in de branche waar ze vroeger werkzaam in waren. We willen dat de keuze en tijdsduur van een opdracht volledig bepaald kan worden door u! Geen verplichtingen en geen valkuilen.</p>
			</div>
			<div class="block grid-40 contactForm">
				<header class="boxTitle">
				    <h1>Contact</h1>
				</header>
				{{ Form::open(array('url' => '/contact', 'class' => 'regularPadding')) }} 
					<ul>
						<li>
							{{ Form::label('first_name', 'Voornaam:') }}
							{{ Form::text('first_name') }}
						</li>
						<li>
							{{ Form::label('last_name', 'Achternaam:') }}
							{{ Form::text('last_name') }}
						</li>
						<li>
							{{ Form::label('email', 'Email:') }}
							{{ Form::text('email') }}
						</li>
						<li>
							{{ Form::label('text', 'Bericht:') }}
							{{ Form::textarea('text') }}
						</li>
						<li>
							{{ Form::submit('Verzend', array('class' => 'btn btn-primary center')) }}
						</li>
					</ul>
				{{ Form::close() }}

				@include('partials._errors')
			</div>
		</div>
	</div>

</section> <!-- End Content -->

@stop
