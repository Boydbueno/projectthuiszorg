@extends('layouts.master')

@section('title')
	Rework - {{ $job->title }} bewerken
@stop

@section('content')

	<nav class='block marginTop mainTitle'>
		{{ link_to_route('client.jobs.edit', 'Terug naar mijn opdracht', ['id' => $job->id]) }}
	</nav>

@stop