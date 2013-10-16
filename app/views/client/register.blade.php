@extends('layouts.master')

@section('content')

	{{ Form::open(array('url' => 'client/register')) }}
		<ul>
			<li class="form-group">
				{{ Form::label('first_name', 'Voornaam:') }}
				{{ Form::text('first_name') }}
			</li>
			<li class="form-group">
				{{ Form::label('last_name', 'Achternaam:') }}
				{{ Form::text('last_name') }}
			</li>
			<li class="form-group">
				{{ Form::label('email', 'Email:') }}
				{{ Form::text('email') }}
			</li>
			<li class="form-group">
				{{ Form::label('street_name', 'Straatnaam:') }}
				{{ Form::text('street_name') }}
			</li>
			<li class="form-group">
				{{ Form::label('house_number', 'Huisnummer:') }}
				{{ Form::text('house_number') }}
			</li>
			<li class="form-group">
				{{ Form::label('zipcode', 'Postcode:') }}
				{{ Form::text('zipcode') }}
			</li>
			<li class="form-group">
				{{ Form::label('city', 'Woonplaats:') }}
				{{ Form::text('city') }}
			</li>
			<li class="form-group">
				{{ Form::label('password', 'Wachtwoord:') }}
				{{ Form::password('password') }}
			</li>
			<li class="form-group">
				{{ Form::label('password_confirmation', 'Bevestig wachtwoord:') }}
				{{ Form::password('password_confirmation') }}
			</li>
			<li class="form-group">
				{{ Form::submit('Registreer', array('class' => 'btn btn-primary')) }}
			</li>
		</ul>
	{{ Form::close() }}
	
	@include('partials._errors')

@stop
