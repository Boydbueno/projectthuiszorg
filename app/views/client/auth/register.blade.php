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
				<p class="regularPadding">Registreren bij Rework is heel gemakkelijk! Vul uw email adres in en kies een veilig wachtwoord. Alle andere informatie, zoals uw naam en adres gegevens, kunt u altijd op een later moment aanvullen! Op deze manier kunt u snel aan de slag met Rework!</p>
			</div>
			<div class="block grid-40 contactForm">
				<header class="boxTitle">
				    <h1>Registreren</h1>
				</header>
				{{ Form::open(array('url' => 'client/register', 'class' => 'regularPadding')) }}
					<ul>
						<li>
							{{ Form::label('email', 'Email:') }}
							{{ Form::text('email') }}
						</li>
						<li>
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