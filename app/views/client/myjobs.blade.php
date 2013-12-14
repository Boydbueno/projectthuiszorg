@extends('layouts.master')

@section('title')
	Project Thuiszorg - Clients
@stop

@section('content')

    <section class="block marginTop floatFix">
        <header class="mainTitle">
            <h1>Uw opdrachten!</h1>
        </header>

        <div class="progressSmall">
        </div>

        <section class="description">
            <aside class="floatRight quickMenu">
                <nav>
                    {{ link_to('client/jobs', 'Mijn Opdrachten', array('class' => 'btn messageBoxBtn btnWorkIcon')) }}
                    <ul>
                        <li class="iconItem settingsIcon">
                            {{ link_to('client/settings', 'Instellingen')}}
                        </li>
                    </ul>
                </nav>
            </aside>

            <p class="information borderRight">
                Hier staan al uw huidige opdrachten, ook is het mogelijk aan te geven hoeveel er al gewerkt is aan een opdracht. Het is belangrijk om opdrachen op tijd af te hebben, vandaar dat wij ze alvast op datum hebben gesorteerd voor u. Succes!
            </p>
        </section>

    </section> <!-- End Welcome -->

    @include('partials._filter')

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