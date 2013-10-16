@extends('layouts.master')

@section('content')

	{{ Form::open(array('url' => '/contact')) }}
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
				{{ Form::submit('Verzend') }}
			</li>
		</ul>
	{{ Form::close() }}

	@include('partials._errors')

@stop
