@extends('layouts.master')

@section('content')

	<div class="welcome">
	    <h1>Registreren</h1>
	</div>
	
	{{ Form::open(array('route' => 'clients.store')) }}
		<ul>
			<li>
				{{ Form::label('company_name', 'Bedrijfdnaam:') }}
				{{ Form::text('company_name') }}
			</li>
			<li>
				{{ Form::label('url', 'Website:') }}
				{{ Form::text('url') }}
			</li>
			<li>
				{{ Form::label('kvknummer', 'KvK nummer:') }}
				{{ Form::text('kvknummer') }}
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
				{{ Form::submit('Registreer') }}
			</li>
		</ul>
	{{ Form::close() }}

	@include('partials._errors')

@stop
