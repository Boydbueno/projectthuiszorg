@extends('layouts.public')

@section('title')
	Rework - Registreren
@stop

@section('content')

<div class="backdropImage smallHeader">
	{{ HTML::image("images/logo_big.png", "Rework Logo", array('class' => 'bigLogo')) }}
</div>

<section class="content grid-container">

	<div class="posRelative">
		<div class="imageOverlay floatFix">
			<div class="block grid-60">
				<h1 class="boxTitle">Welkom bij het team!</h1>
				<p class="regularPadding">Wij zijn een nieuw initiatief genaamd Rework. Ons doel is om ouderen weer aan werk te helpen en het liefst in de branche waar ze vroeger werkzaam in waren. We willen dat de keuze en tijdsduur van een opdracht volledig bepaald kan worden door u! Geen verplichtingen en geen valkuilen.</p>
			</div>
			<div class="block grid-40 contactForm">
				<header class="boxTitle">
				    <h1>Registreren</h1>
				</header>
				{{ Form::open(array('route' => 'clients.store', 'class' => 'regularPadding')) }}
					<ul>
						<li>
							{{ Form::label('company_name', 'Bedrijfdnaam:') }}
							{{ Form::text('company_name') }}
						</li>
						<li>
							{{ Form::label('url', 'Website:') }}
							{{ Form::text('url') }}
						</li>
						<li>
							{{ Form::label('kvknummer', 'KvK nummer:') }}
							{{ Form::text('kvknummer') }}
						</li>
						<li>
							{{ Form::label('email', 'Email:') }}
							{{ Form::text('email') }}
						</li>
						<li>
							{{ Form::label('street_name', 'Straatnaam:') }}
							{{ Form::text('street_name') }}
						</li>
						<li>
							{{ Form::label('house_number', 'Huisnummer:') }}
							{{ Form::text('house_number') }}
						</li>
						<li>
							{{ Form::label('zipcode', 'Postcode:') }}
							{{ Form::text('zipcode') }}
						</li>
						<li>
							{{ Form::label('city', 'Woonplaats:') }}
							{{ Form::text('city') }}
						</li>
						<li>
							{{ Form::label('password', 'Wachtwoord:') }}
							{{ Form::password('password') }}
						</li>
						<li>
							{{ Form::label('password_confirmation', 'Bevestig wachtwoord:') }}
							{{ Form::password('password_confirmation') }}
						</li>
						<li>
							{{ Form::submit('Registreer', array('class' => 'btn btn-primary')) }}
						</li>
					</ul>
				{{ Form::close() }}
				
				@include('partials._errors')
			</div>
		</div>
	</div>

</section> <!-- End Content -->

@stop