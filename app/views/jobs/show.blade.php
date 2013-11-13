@extends('layouts.master')

@section('title')
	Rework - {{ $job->title }}
@stop

@section('content')
	<nav class='block marginTop mainTitle'>
		<a href="../clients">Terug naar het overzicht</a>
	</nav>

	<section class='job'>
		<article class="block marginTop floatFix {{ camel_case($job->jobcategory->label) }}">
	    <header class="mainTitle floatFix">
	        <h1 class="floatLeft">{{ $job->title }}</h1>
	        <span class="subTitle floatRight">{{ $job->jobcategory->label }}</span>
	    </header>
	    <div class="progress">
	        <div class="progressBar"></div>
	    </div>
	    <section class="description floatFix">
	        <aside class="details floatRight">
	            <ul>
	                <li class="iconItem dateIcon bold">Nog 5 dagen!</li>
	                <li class="iconItem timeIcon">Starten</li>
	                <li class="iconItem moneyIcon">€ {{ $job->payment }},00</li>
	                <li class="iconItem companyIcon">{{ $job->company->company_name }}</li>
	            </ul>

	            <p class="marginTop centerText">Al 15 mensen willen meewerken, doe ook mee!</p>
				<a class="btn" href="#">Meedoen</a>
	        </aside>
	        <div class="information borderRight">
	            <p>{{ $job->description }}</p>
	        </div>
	    </section>
	</section>
</article>
@stop