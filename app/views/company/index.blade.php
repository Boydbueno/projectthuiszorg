@extends('layouts.master')

@section('title')
	Project Thuiszorg - Opdrachtgever
@stop

@section('content')
    <div class="welcome">
        <h1>Opdrachtgever</h1>
    </div>

    @include('partials._login')

    <div>
    	<a href='/client/register'>Maak een account!</a>
    </div>

    @include('partials._errors')
    
@stop