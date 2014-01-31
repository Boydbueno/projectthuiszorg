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
			</section>

			<canvas id="js-progressChart" width="940"></canvas>
		</article>
	</section>

@stop

@section('scripts')
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

		var myNewChart = new Chart(ctx).Bar(chart);
	})();
	</script>
@stop