@extends('layouts.master')

@section('title')
	Project Thuiszorg - Clients
@stop

@section('content')

    <section class="block marginTop floatFix mainTitle">

        <aside class="floatRight">
            <nav>
                <ul>
                    <li><a href="#" class="btn">Mijn Opdrachten</a></li>
                    <li><a href="#" class="btn">Instellingen</a></li>
                </ul>
            </nav>
        </aside>

        <p class="information borderRight">
            Goed om u terug te zien, er staan weer een hoop nieuwe opdrachten op u te  wachten, in de balk hier naast kunt u de status van uw huidige opdrachten bekijken of zoek een nieuwe opdracht uit om samen aan te werken, alles is mogelijk!
            <span>{{ Session::get('notice') }}</span>
        </p>

    </section> <!-- End Welcome -->

    <section class="block marginTop">
        Filters here
    </section>

    <section class="jobs">

        @foreach ($jobs as $job)
            @include('partials.jobs._job', array('job' => $job))
        @endforeach

    </section> <!-- End Jobs -->

    <section class="block marginTop">
        <header class="mainTitle">
            <h1>Footer</h1>
        </header>

        <section class="description">
            <aside class="details floatRight">
                <nav>
                    <ul>
                        <li><a href="#" class="menuLink">Technisch werk</a></li>
                        <li><a href="#" class="menuLink">Fysiek werk</a></li>
                        <li><a href="#" class="menuLink">Adviserend werk</a></li>
                        <li><a href="#" class="menuLink">Handenarbeid</a></li>
                    </ul>
                </nav>
                <nav>
                    <ul>
                        <li><a href="#" class="menuLink borderRight">Terug naar boven</a></li>
                    </ul>
                </nav>
            </aside>
            
            <p class="information borderRight">
                Wij zijn een nieuw initiatief genaamd Rework. Ons doel is om ouderen weer aan werk te helpen en het liefst in de branche waar ze vroeger werkzaam in waren. We willen dat de keuze en tijdsduur van een opdracht volledig bepaald kan worden door u! Geen verplichtingen en geen valkuilen. Heeft u nog tips of advies voor ons, wij horen het graag!
            </p>
        </section>

    </section>
@stop