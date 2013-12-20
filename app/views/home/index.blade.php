@extends('layouts.public')

@section('content')

<div class="backdropImage">
	{{ HTML::image("images/logo_big.png", "Rework Logo", array('class' => 'bigLogo')) }}
</div>

<section class="content grid-container">

	<div class="posRelative">
		<div class="imageOverlay floatFix">
			<div class="block grid-33">
				<div class="buttonHolder fysiekWerk">
					{{ link_to_route('client.login', 'Meedoen!', null, array('class' => 'btn')) }}
				</div>
				<p>Werken aan opdrachten onder eigen voorwaarden en eigen tijdsindeling? Waar wacht u nog op!</p>
			</div>
			<div class="block grid-33">
				<div class="buttonHolder">
					{{ link_to_route('company.login', 'Opdracht Plaatsen', null, array('class' => 'btn')) }}
				</div>
				<p>Natuurlijk zijn we ook altijd op zoek naar enthousiaste bedrijven die een opdracht willen plaatsen!</p>
			</div>
			<div class="block grid-33">
				<div class="buttonHolder">
					<a href="/contact" class="btn">Contact Opnemen</a>
				</div>
				<p>Vragen over Rework of benieuwd wat alles inhoudt? Schroom niet contact met ons op te nemen.</p>
			</div>
		</div>
	</div>

	<div class="block marginTop">
		<header class="boxTitle">
		    <h1>Wat doen wij?</h1>
		</header>
		<div class="description floatFix">
			<div class="grid-66">
				<p>Wij zijn een nieuw initiatief genaamd Rework. Ons doel is om ouderen weer aan werk te helpen en het liefst in de branche waar ze vroeger werkzaam in waren. We willen dat de keuze en tijdsduur van een opdracht volledig bepaald kan worden door u! Geen verplichtingen en geen valkuilen. </p>
			</div>
			<div class="grid-33 hide-on-mobile hide-on-tablet">
				<img class="center" src="images/icons/flag_big_icon.png" alt="Wat doen wij?" />
			</div>
		</div>
	</div>

	<div class="block marginTop">
		<header class="boxTitle">
		    <h1>Wie zijn wij!</h1>
		</header>
		<div class="description floatFix marginTop">
			<div class="grid-33">
				<img class="center" src="images/boyd.png" alt="Boyd Bueno de Mesquita" />
				<p class="center">Mediatechnoloog, programmeur
nog wat leuke dingetjes over Boyd</p>
			</div>
			<div class="grid-33">
				<img class="center" src="images/kevin.png" alt="Kevin Vlietstra" />
				<p class="center">Mediatechnoloog, programmeur
nog wat leuke dingetjes over Boyd</p>
			</div>
			<div class="grid-33">
				<img class="center" src="images/stefan.png" alt="Stefan Weck" />
				<p class="center">Mediatechnoloog, programmeur
nog wat leuke dingetjes over Boyd</p>
			</div>
		</div>
	</div>

</section> <!-- End Content -->

@stop