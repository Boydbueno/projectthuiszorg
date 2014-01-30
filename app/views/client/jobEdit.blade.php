@extends('layouts.master')

@section('title')
	Rework - {{ $job->title }} bewerken
@stop

@section('content')

	<nav class='block marginTop mainTitle'>
		{{ link_to_route('client.jobs', 'Terug naar mijn opdrachten') }}
	</nav>

	<section class='job'>
		<article class="block marginTop floatFix {{ camel_case($job->jobcategory->label) }}">
	    <header class="mainTitle floatFix">
	        <h1 class="floatLeft">{{ $job->title }}</h1>
	        <span class="subTitle floatRight">{{ $job->jobcategory->label }}</span>
	    </header>
	    <div class="progress">
	        <div class="progressBar" style="width: {{ $job->percentageComplete }}%"></div>
	        <div class="progressDescription">
	            Nog {{ $job->amount_left }} {{ $job->postfix }}
	        </div>
	    </div>
	    <section class="description floatFix">
	        <aside class="details floatRight">
	            <ul>
	                <li class="iconItem dateIcon bold">
	                	@if($job->daysLeft === 0)
	                	    Alleen vandaag nog!
	                	@else
	                	    Nog {{ $job->daysLeft }} {{ $job->daysLeft  === 1 ? "dag" : "dagen" }}!
	                	@endif
	                </li>
	                <li class="iconItem timeIcon">Starten</li>
	                <li class="iconItem moneyIcon">€ {{ $job->payment }}</li>
	                <li class="iconItem companyIcon">{{ $job->company->name }}</li>
	            </ul>

	            <p class="marginTop centerText">{{ $job->participantsText }}</p>
				@if(Session::get('notice'))
					{{{ Session::get('notice') }}}
				@endif

				@if($job->isStarted)
					{{ link_to_route('client.jobs.progress', 'Voortgang', [$job->id], ['class' => 'btn']) }}
				@endif

				@if($job->isOpen)
					{{ Form::open(['method' => 'delete', 'route' => ['client.jobs.delete', $job->id]])}}
						{{ Form::submit('Afmelden', ['class' => 'btn grey', 'id' => 'js-unsubscribe']) }}
					{{ Form::close() }}
				@endif

	        </aside>
	        <div class="information borderRight">
	            <p>
	            	{{ $job->long_description ? $job->long_description : $job->short_description }}
	            </p>
	        </div>
	    </section>

    	<div id="js-confirm" class="confirmOverlay confirmUnsubscribe hidden" title="Weet u het zeker?">
			<p>Weet u zeker dat u zich wilt uitschrijven voor deze opdracht?</p>
			{{ Form::open(['method' => 'delete', 'route' => ['client.jobs.delete', $job->id]])}}
				{{ Form::submit('Afmelden', ['class' => 'btn grey']) }}
			{{ Form::close() }}
			<a href="#" class="btn" id="js-confirm-cancel">Annuleren</a>
		</div>
	</section>
 
@stop

@section('scripts')
	<script>
		// Sorry for more internal javascript. :( 
		(function(){
			"use strict"

    		$("#js-unsubscribe").on('click', function(e) {
    			e.preventDefault();

    			$("#js-confirm, .droppableOverlay").show();
    		});

    		$("#js-confirm-proceed").on('click', function(e) {
    			e.preventDefault();
    			
    			$("#js-confirm, .droppableOverlay").hide();
    		});

    		$("#js-confirm-cancel").on('click', function(e) {
    			e.preventDefault();

    			$("#js-confirm, .droppableOverlay").hide();
    		});

		})();
	</script>

@stop