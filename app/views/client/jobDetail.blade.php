@extends('layouts.master')

@section('title')
	Rework - {{ $job->title }}
@stop

@section('content')

	<nav class='block marginTop mainTitle'>
		{{ link_to_route('client', 'Terug naar het overzicht') }}
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

				@else 
					@if($showButton == true)
						{{ link_to_route('client.jobs.join', 'Meedoen', array($job->id), array('class' => 'btn')) }}
					@endif
				@endif

	        </aside>
	        <div class="information borderRight">
	            <p>
	            	{{ $job->long_description ? $job->long_description : $job->short_description }}
	            </p>
	        </div>
	    </section>
	</section>
</article>
@stop