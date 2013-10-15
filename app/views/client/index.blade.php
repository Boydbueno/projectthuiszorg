@extends('layouts.master')

@section('title')
	Project Thuiszorg - Client
@stop

@section('content')
    <div class="welcome">
        <h1>Client</h1>
    </div>

    @include('auth.login')

    <div>
    	<a href='/client/register'>Maak een account!</a>
    </div>

    @include('partials._errors')

@stop