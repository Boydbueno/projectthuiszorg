@extends('layouts.master')

@section('title')
	Project Thuiszorg - Client
@stop

@section('content')
    <div>
        <h1>Client</h1>
    </div>

    @include('partials._login')

    <div>
    	<a href='/client/register'>Maak een account!</a>
    </div>

    @include('partials._errors')

@stop