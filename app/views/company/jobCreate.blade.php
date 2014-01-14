@extends('layouts.master')

@section('title')
	Rework - Nieuwe opdracht
@stop

@section('content')

	<nav class='block marginTop mainTitle'>
		{{ link_to_route('company', 'Terug naar het overzicht') }}
	</nav>

	<section class='settings'>

		<div class="block marginTop floatFix">

			<div class="grid-60 description">
				<h1>Hallo!</h1>
				<p class="regularPadding marginTop">Het toevoegen van een nieuwe opdracht is simpel. Vul het formulier hiernaast zo uitgebreid mogelijk in en stuur het op! U zult zien dat binnen een paar dagen de eerste aanmeldingen op uw opdracht binnen zullen komen. En voor u het weet zijn er vele enthousiaste handen mee aan de slag!</p>
			</div>
			<div class="grid-40 description">
				<header>
				    <h1>Opdracht toevoegen</h1>
				</header>
				{{ Form::open(array('url' => '/company/jobs/create', 'class' => 'regularPadding marginTop contactForm')) }} 
					<ul>
						<li>
							{{ Form::label('title', 'Titel:') }}
							{{ Form::text('title') }}
						</li>
						<li>
							{{ Form::label('short_description', 'Korte Beschrijving:') }}
							{{ Form::textarea('short_description') }}
						</li>
						<li>
							{{ Form::label('long_description', 'Volledige Beschrijving:') }}
							{{ Form::textarea('long_description') }}
						</li>
						<li>
							{{ Form::label('amount', 'Totale Aantal:') }}
							{{ Form::text('amount') }}
						</li>
						<li>
							{{ Form::label('payment', 'Tarief Per Product:') }}
							{{ Form::text('payment') }}
						</li>
						<li>
							{{ Form::label('minimum', 'Minimum Afname:') }}
							{{ Form::text('minimum') }}
						</li>
						<li>
							{{ Form::label('step', 'Step:') }}
							{{ Form::text('step') }}
						</li>
						<li>
							{{ Form::label('postfix', 'Type:') }}
							{{ Form::text('postfix') }}
						</li>
						<li>
							{{ Form::label('prefix', 'prefix:') }}
							{{ Form::text('prefix') }}
						</li>
						<li>
							{{ Form::label('start_date', 'Opdracht Start Op:') }}
							{{ Form::text('start_date') }}
						</li>
						<li>
							{{ Form::label('end_date', 'Oplevering Op:') }}
							{{ Form::text('end_date') }}
						</li>
						<li>
							{{ Form::label('category_id', 'Categorie:') }}
							{{ Form::select('category_id', $statusList) }}
						</li>
						<li>
							{{ Form::submit('Verzend', array('class' => 'btn btn-primary center')) }}
						</li>
					</ul>
				{{ Form::close() }}

				@include('partials._errors')
			</div>

		</div>

	</section>

@stop