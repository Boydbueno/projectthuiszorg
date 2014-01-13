@extends('layouts.master')

@section('title')
	Rework - Nieuwe opdracht
@stop

@section('content')

	<nav class='block marginTop mainTitle'>
		{{ link_to_route('company', 'Terug naar het overzicht') }}
	</nav>

	<section class='settings'>

		<div class="block marginTop floatFix">

			<div class="grid-60 description">
				<h1>Hallo!</h1>
				<p class="regularPadding marginTop">Het toevoegen van een nieuwe opdracht is simpel. Vul het formulier hiernaast zo uitgebreid mogelijk in en stuur het op! U zult zien dat binnen een paar dagen de eerste aanmeldingen op uw opdracht binnen zullen komen. En voor u het weet zijn er vele enthousiaste handen mee aan de slag!</p>
			</div>
			<div class="grid-40 description">
				<header>
				    <h1>Opdracht toevoegen</h1>
				</header>
				{{ Form::open(array('url' => '/company/jobs/create', 'class' => 'regularPadding marginTop contactForm')) }} 
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