@extends('layouts.public')

@section('content')

<div class="backdropImage smallHeader">
	{{ HTML::image("images/logo_big.png", "Rework Logo", array('class' => 'bigLogo')) }}
</div>

<section class="content grid-container">

	<div class="posRelative">
		<div class="imageOverlay floatFix">
			<div class="block grid-60">
				<h1 class="boxTitle">Hallo!</h1>
				<p class="regularPadding">Heeft u een vraag, probleem of suggestie over Rework. Wij staan altijd open voor feedback en helpen u graag met problemen. Ook staat er altijd een werknemer voor u klaar mocht u problemen hebben met het aanmaken van een account of het inloggen op de website! We zullen zo snel mogelijk reageren na het ontvangen van uw email!</p>
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
