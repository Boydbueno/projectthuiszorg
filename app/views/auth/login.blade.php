@extends('layouts.master')

@section('content')
{{ Form::open() }}
	<ul>
		<li>
			{{ Form::label('email', 'Email:') }}
			{{ Form::text('email') }}
		</li>

		<li>
			{{ Form::label('password', 'Password:') }}
			{{ Form::password('password') }}
		</li>

		<li>
			{{ Form::submit() }}
			{{ Session::get('notice') }}
		</li>
	</ul>
{{ Form::close() }}
@stop