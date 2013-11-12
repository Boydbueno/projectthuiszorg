@extends('layouts.master')

@section('title')
	Rework - Opdrachtgever
@stop

@section('content')
    <div>
        <h1>Opdrachtgever</h1>
    </div>

    @include('partials._login')

    <div>
    	<a href='/opdrachtgever/register'>Maak een account!</a>
    </div>

    @include('partials._errors')

@stop