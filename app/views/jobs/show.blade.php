@extends('layouts.master')

@section('title')
	Vacatures - Detail overzicht
@stop

@section('content')
	<nav>
		<a href="../clients">Terug</a>
	</nav>
	<section>
		<h1>{{ $job->title }}</h1>
	</section>
	<section>
		<section>
			<p>{{ $job->description }}}</p> 
		</section>
		<aside>
			<ul>
				<li>Nog 5 dagen</li>
				<li>Gepauzeerd</li>
				<li>€{{ $job->payment }},=</li>
				<li>{{ $job->company->company_name }}</li>
			</ul>
			<p>Al 15 mensen gingen je voor, doe ook mee!</p>
			<a href="#">Meedoen</a>
		</aside>
	</section>
@stop