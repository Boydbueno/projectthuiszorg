@extends('layouts.master')

@section('title')
	Project Thuiszorg - Clients
@stop

@section('content')
    <div class="welcome">
        <h1>Clients</h1>
        <p>{{ Session::get('notice') }}</p>
    </div>
    <div>
    	<h2>Naam vacature</h2>
		<ul>
			@foreach ($users as $user)
			    <li>{{ $user->email }}</li>
			@endforeach
		</ul>
    </div>
    {{ link_to_route('logout', 'Logout') }}
@stop