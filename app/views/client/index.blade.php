@extends('layouts.master')

@section('title')
	Rework - Client
@stop

@section('content')

	<section class="block description marginTop">
	    <header>
	        <h1>Client</h1>
	    </header>

	    @include('partials._login')

	    <div>
	    	<a href='/client/register'>Maak een account!</a>
	    </div>

    	@include('partials._errors')

    </section>

@stop