@extends('layouts.public')

@section('title')
	Rework - Opdrachtgever
@stop

@section('content')

<div class="backdropImage smallHeader">
	{{ HTML::image("images/logo_big.png", "Rework Logo", array('class' => 'bigLogo')) }}
</div>

<section class="content grid-container">

	<div class="posRelative">
		<div class="imageOverlay floatFix">
			<div class="block grid-60">
				<h1 class="boxTitle">We wachten op u!</h1>
				<p class="regularPadding">Wij zijn een nieuw initiatief genaamd Rework. Ons doel is om ouderen weer aan werk te helpen en het liefst in de branche waar ze vroeger werkzaam in waren. We willen dat de keuze en tijdsduur van een opdracht volledig bepaald kan worden door u! Geen verplichtingen en geen valkuilen.</p>
			</div>
			<div class="block grid-40 contactForm">
				<header class="boxTitle">
				    <h1>Inloggen</h1>
				</header>
				<div class="regularPadding">
					{{ Form::open() }}
						
						<input type="hidden" name="_token" value="{{{ Session::getToken() }}}">
						<fieldset>
						    <div class="form-group">
						        <label for="email">E-mail Adres</label>
						        <input class="form-control" tabindex="1" type="text" name="email" id="email" value="{{{ Input::old('email') }}}">
						    </div>
						    <div class="form-group">
						    <label for="password">
						        {{{ Lang::get('confide::confide.password') }}}
						        <small>
						            <a href="{{{ (Confide::checkAction('controllers/HomeController@forgot_password')) ?: '/forgot_password' }}}">{{{ Lang::get('confide::confide.login.forgot_password') }}}</a>
						        </small>
						    </label>
						    <input tabindex="2" type="password" name="password" id="password">
						    </div>
						    <div class="form-group">
						        <label for="remember" class="checkbox">{{{ Lang::get('confide::confide.login.remember') }}}
						            <input type="hidden" name="remember" value="0">
						            <input tabindex="4" type="checkbox" name="remember" id="remember" value="1">
						        </label>
						    </div>
						    @if ( Session::get('error') )
						        <div class="alert alert-error">{{{ Session::get('error') }}}</div>
						    @endif

						    @if ( Session::get('notice') )
						        <div class="alert">{{{ Session::get('notice') }}}</div>
						    @endif
						    <div class="form-group">
						        <button tabindex="3" type="submit" class="btn btn-default">{{{ Lang::get('confide::confide.login.submit') }}}</button>
						    </div>
						</fieldset>

						<div class="form-group">
								<a href='/register/company'>Maak een account!</a>
						</div>

					{{ Form::close() }}
				</div>
			</div>
		</div>
	</div>

</section> <!-- End Content -->

@stop