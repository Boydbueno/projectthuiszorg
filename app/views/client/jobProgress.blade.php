@extends('layouts.master')

@section('title')
	Rework - {{ $job->title }} voortgang
@stop

@section('content')

	<nav class='block marginTop mainTitle'>
		{{ link_to_route('client.jobs.edit', 'Terug naar mijn opdracht', ['id' => $job->id]) }}
	</nav>

	<section class="job">
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
				<h2>Uw voortgang</h2> 
				@if(count($dates) == 1)
					<p>U heeft van één dag uw voortgang doorgegeven. Doe dit vaker om een beter overzicht te krijgen van uw voortgang.</p> 
				@elseif($dates)
					<canvas id="js-progressChart" width="900"></canvas>
				@else
					<h2>U heeft nog geen voortgang dooregeven.</h2>
					<p>
						Geef uw voortgang door zodat uw opdrachtgever een beter beeld krijgt hoe het er voor staat.
					</p>
				@endif
				{{ Form::open(['action' => ['controllers\client\JobsController@addProgress', $job->id]]) }}
		        <div class="jobSlider floatFix" class="slider">
				    {{ Form::label('progressSlider', 'Slider', array('class' => 'hidden')); }}
				    {{ Form::text('progressSlider') }}
				</div>
				{{ Form::submit('Voortgang doorgeven', ['class' => 'btn'])}}
				{{ Form::close() }}
			</section>

		</article>
	</section>

@stop

@section('scripts')
	@if($dates)
		{{ HTML::script('scripts/vendor/chartjs/chart.min.js') }}
		<script>
		(function(){
			"use strict"

			//Get the context of the canvas element we want to select
			var ctx = document.getElementById("js-progressChart").getContext("2d");
			var chart = {
				labels: {{ json_encode($dates) }},
				datasets: [{
					data: {{ json_encode($amounts) }}
				}]
			};

			var options = {
				scaleShowLabels: false,
				scaleShowGridLines: false
			};

			var myNewChart = new Chart(ctx).Bar(chart, options);
		})();
		</script>
	@endif
	{{ HTML::script('scripts/ion.rangeSlider.js') }}
	<script>
		var job = {{ $job }};
	    $(document).ready(function(){

	        $("#progressSlider").ionRangeSlider({
	            min: 1,
	            max: {{ $max }},
	            type: 'single',
	            step: 1,
	            postfix: ' '+job.postfix,
	            prefix: job.prefix,
	            prettify: true,
	            hasGrid: true
	        });

	    });
	</script>
@stop