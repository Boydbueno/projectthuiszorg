@extends('layouts.master')

@section('title')
	Rework - Instellingen
@stop

@section('content')

	<nav class='block marginTop mainTitle'>
		{{ link_to_route('client', 'Terug naar het overzicht') }}
	</nav>

	<section class='settings'>

		<div class="block marginTop floatFix">

			<div class="grid-60 description">
				<h1 class="boxTitle">Hallo!</h1>
				<p class="regularPadding">Heeft u een vraag, probleem of suggestie over Rework. Wij staan altijd open voor feedback en helpen u graag met problemen. Ook staat er altijd een werknemer voor u klaar mocht u problemen hebben met het aanmaken van een account of het inloggen op de website! We zullen zo snel mogelijk reageren na het ontvangen van uw email!</p>
			</div>
			<div class="grid-40 description">
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

	</section>

@stop