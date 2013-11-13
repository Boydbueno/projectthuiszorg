@extends('layouts.master')

@section('title')
	Rework - Opdrachtgever
@stop

@section('content')
	
	<section class="block description marginTop">

	    <header>
	        <h1>Opdrachtgever</h1>
	    </header>

	    @include('partials._login')

	    <div>
	    	<a href='/opdrachtgever/register'>Maak een account!</a>
	    </div>

	    @include('partials._errors')

    </section>

@stop