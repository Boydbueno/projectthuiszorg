@extends('layouts.master')

@section('content')
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
			{{ Form::submit() }}
		</li>
	</ul>
{{ Form::close() }}
@stop

@include('partials._errors')