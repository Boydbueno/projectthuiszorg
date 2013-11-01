@extends('layouts.master')

@section('title')
	Vacatures - Detail overzicht
@stop

@section('content')
	<div>
		<a href="back">Terug</a>
	</div>
	<div>
		<h1>{{ $job->title }}</h1>
	</div>
	<div>
		<div>
			<p>{{ $job->description }}}</p> 
		</div>
		<div>
			<ul>
				<li>Nog 5 dagen</li>
				<li>Gepauzeerd</li>
				<li>€{{ $job->payment }},=</li>
				<li>{{ $job->company_id }}</li>
			</ul>
			<p>Al 15 mensen gingen je voor, doe ook mee!</p>
			<a href="#">Meedoen</a>
		</div>
	</div>
@stop