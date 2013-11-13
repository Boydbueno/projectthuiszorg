@extends('layouts.master')

@section('title')
	Project Thuiszorg - Clients
@stop

@section('content')

    <section class="block marginTop floatFix">
        <header class="mainTitle">
            <h1>Welkom terug, {{ Auth::user()->first_name }}!</h1>
        </header>

        <div class="progressSmall">
        </div>

        <section class="description">
            <aside class="floatRight quickMenu">
                <nav>
                    <a href="#" class="btn btnWorkIcon">Mijn Opdrachten</a>
                    <ul>
                        <li class="iconItem settingsIcon"><a href="#">Instellingen</a></li>
                    </ul>
                </nav>
            </aside>

            <p class="information borderRight">
                Goed om u terug te zien, er staan weer een hoop nieuwe opdrachten op u te  wachten, in de balk hier naast kunt u de status van uw huidige opdrachten bekijken of zoek een nieuwe opdracht uit om samen aan te werken, alles is mogelijk!
                <span>{{ Session::get('notice') }}</span>
            </p>
        </section>

    </section> <!-- End Welcome -->

    <section class="block marginTop mainTitle">
        <select>
            <option value="">Categorie</option>
            <option value="fysiek">Fysiek Werk</option>
            <option value="adviserend">Adviserend Werk</option>
            <option value="handarbeid">Handarbeid</option>
            <option value="technisch">Technisch Werk</option>
        </select>
        <select>
            <option value="">Status</option>
            <option value="fysiek">Starten</option>
            <option value="adviserend">Gepauzeerd</option>
            <option value="handarbeid">Voltooid</option>
        </select>
        <select>
            <option value="">Beschikbaarheid</option>
            <option value="fysiek">Meer dan 20%</option>
            <option value="adviserend">Meer dan 50%</option>
            <option value="handarbeid">Meer dan 70%</option>
            <option value="technisch">Volledig</option>
        </select>
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

        <div class="progressSmall">
        </div>

        <section class="description floatFix">
            <aside class="details floatRight">
                <nav>
                    <ul>
                        <li><a href="#" class="subMenuLink">Technisch werk</a></li>
                        <li><a href="#" class="subMenuLink">Fysiek werk</a></li>
                        <li><a href="#" class="subMenuLink">Adviserend werk</a></li>
                        <li><a href="#" class="subMenuLink">Handenarbeid</a></li>
                    </ul>
                </nav>
                <nav>
                    <ul>
                        <li><a href="#" class="subMenuLink">Terug naar boven</a></li>
                    </ul>
                </nav>
            </aside>
            
            <p class="information borderRight">
                Wij zijn een nieuw initiatief genaamd Rework. Ons doel is om ouderen weer aan werk te helpen en het liefst in de branche waar ze vroeger werkzaam in waren. We willen dat de keuze en tijdsduur van een opdracht volledig bepaald kan worden door u! Geen verplichtingen en geen valkuilen. Heeft u nog tips of advies voor ons, wij horen het graag!
            </p>
        </section>

    </section>
@stop