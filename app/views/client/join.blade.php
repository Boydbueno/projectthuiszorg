@extends('layouts.master')

@section('title')
	Rework - {{ $job->title }}
@stop

@section('content')
{{ Form::open(array('url' => 'client/jobs/' . $job->id . '/join', 'class' => 'regularPadding')) }}
	<nav class='block marginTop mainTitle'>
		{{ link_to_route('client', 'Terug naar het overzicht') }}
	</nav>

	<section class='job'>
		<article class="block marginTop floatFix {{ $job->jobcategory_classname }}">
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
	                	{{ $job->days_left_phrase }}
	                </li>
	                <li class="iconItem timeIcon">Starten</li>
	                <li class="iconItem moneyIcon">€ {{ $job->payment }}</li>
	                <li class="iconItem companyIcon">{{ $job->company->name }}</li>
	            </ul>

	            <p class="marginTop centerText">{{ $job->participantsText }}</p>
				{{ Form::submit('Meedoen', array('class' => 'btn btn-primary')) }}				
	        </aside>
	        <div class="information borderRight">
	            <p>
	            	{{ $job->long_description ? $job->long_description : $job->short_description }}
	            </p>
	        </div>
	        <div class="jobSlider floatFix" class="slider">
			    {{ Form::label('range_1', 'Slider', array('class' => 'hidden' )); }}
			    {{ Form::text('range_1') }}
			</div>
	    </section>
	</section>
</article>
{{ Form::close() }}

@include('partials.client._friendlist')

@stop

@section('scripts')
	{{ HTML::script('scripts/friendlist.js') }}
	{{ HTML::script('scripts/ion.rangeSlider.js') }}
	<script>
		var job = {{ $job }};
	    $(document).ready(function(){

	        $("#range_1").ionRangeSlider({
	            min: 0,
	            max: job.amount_left,
	            type: 'single',
	            step: job.step,
	            postfix: ' '+job.postfix,
	            prefix: job.prefix,
	            prettify: true,
	            hasGrid: true
	        });

	    });
	</script>
@stop