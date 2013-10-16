@extends('layouts.master')

@section('content')

	{{ Form::open(array('url' => 'client/register')) }}
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
				{{ Form::label('street_name', 'Straatnaam:') }}
				{{ Form::text('street_name') }}
			</li>
			<li>
				{{ Form::label('house_number', 'Huisnummer:') }}
				{{ Form::text('house_number') }}
			</li>
			<li>
				{{ Form::label('zipcode', 'Postcode:') }}
				{{ Form::text('zipcode') }}
			</li>
			<li>
				{{ Form::label('city', 'Woonplaats:') }}
				{{ Form::text('city') }}
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
				{{ Form::submit() }}
			</li>
		</ul>
	{{ Form::close() }}
	
	@include('partials._errors')

@stop
