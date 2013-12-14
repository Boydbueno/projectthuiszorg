@extends('layouts.public')

@section('title')
	Rework - Client
@stop

@section('content')

<div class="backdropImage smallHeader">
	{{ HTML::image("images/logo_big.png", "Rework Logo", array('class' => 'bigLogo')) }}
</div>

<section class="content grid-container">

	<div class="posRelative">
		<div class="imageOverlay floatFix">
			<div class="block grid-60">
				<h1 class="boxTitle">Welkom Client!</h1>
				<p class="regularPadding">Wij zijn een nieuw initiatief genaamd Rework. Ons doel is om ouderen weer aan werk te helpen en het liefst in de branche waar ze vroeger werkzaam in waren. We willen dat de keuze en tijdsduur van een opdracht volledig bepaald kan worden door u! Geen verplichtingen en geen valkuilen.</p>
			</div>
			<div class="block grid-40 contactForm">
				<header class="boxTitle">
				    <h1>Inloggen</h1>
				</header>
				{{ Confide::makeLoginForm()->render() }}
			</div>
		</div>
	</div>

</section> <!-- End Content -->

@stop