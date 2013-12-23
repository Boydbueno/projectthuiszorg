@extends('layouts.public')

@section('title')
	Rework - Wachtwoord vergeten
@stop

@section('content')

<div class="backdropImage smallHeader">
	{{ HTML::image("images/logo_big.png", "Rework Logo", array('class' => 'bigLogo')) }}
</div>

<section class="content grid-container">

	<div class="posRelative">
		<div class="imageOverlay floatFix">
			<div class="block grid-60">
				<h1 class="boxTitle">Wachtwoord vergeten?</h1>
				<p class="regularPadding">We weten hoe vervelend het kan zijn, daarom kunt u hiernaast uw email adres vullen, waarna u een mailtje zult krijgen om een nieuw wachtwoord aan te maken! U kunt dus weer bijna direct aan de slag, tot snel!</p>
			</div>
			<div class="block grid-40 contactForm">
				<header class="boxTitle">
				    <h1>Wachtwoord</h1>
				</header>
				<div class="regularPadding buttonTopMargin">
					{{ Confide::makeForgotPasswordForm()->render() }}
					<a href='register/client'>Maak een account!</a>
				</div>
			</div>
		</div>
	</div>

</section> <!-- End Content -->

@stop