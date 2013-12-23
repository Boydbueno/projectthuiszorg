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
				<div class="regularPadding">
					{{ Form::open() }}
					
					    <input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
					    <fieldset>
					        <div class="form-group">
					            <label for="email">{{{ Lang::get('confide::confide.e_mail') }}} <small>{{ Lang::get('confide::confide.signup.confirmation_required') }}</small></label>
					            <input class="form-control" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
					        </div>
					        <div class="form-group">
					            <label for="password">{{{ Lang::get('confide::confide.password') }}}</label>
					            <input class="form-control" type="password" name="password" id="password">
					        </div>
					        <div class="form-group">
					            <label for="password_confirmation">{{{ Lang::get('confide::confide.password_confirmation') }}}</label>
					            <input class="form-control" type="password" name="password_confirmation" id="password_confirmation">
					        </div>

					        @if ( Session::get('error') )
					            <div class="alert alert-error alert-danger">
					                @if ( is_array(Session::get('error')) )
					                    {{ head(Session::get('error')) }}
					                @endif
					            </div>
					        @endif

					        @if ( Session::get('notice') )
					            <div class="alert">{{ Session::get('notice') }}</div>
					        @endif

					        <div class="form-actions form-group">
					          <button type="submit" class="btn btn-primary">{{{ Lang::get('confide::confide.signup.submit') }}}</button>
					        </div>

					    </fieldset>

					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

</section> <!-- End Content -->

@stop