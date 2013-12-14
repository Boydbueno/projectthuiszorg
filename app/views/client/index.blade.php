@extends('layouts.master')

@section('title')
	Project Thuiszorg - Clients
@stop

@section('content')

    @if(Session::get('notice'))

        <section class="block marginTop floatFix">
        
            <header class="mainTitle">
                <h1>Welkom terug, {{{ Auth::user()->first_name }}} {{{ Auth::user()->last_name }}}!</h1>
            </header>

            <div class="progressSmall"></div>

            <section class="description">
                <aside class="floatRight quickMenu">
                    <nav>
                        <!-- TODO: Place 'mijn opdrachten' link in ul -->
                        {{ link_to('client/jobs', 'Mijn Opdrachten', array('class' => 'btn messageBoxBtn btnWorkIcon'))}}
                        <ul>
                            <li class="iconItem settingsIcon">
                                {{ link_to('client/settings', 'Instellingen')}}
                            </li>
                        </ul>
                    </nav>
                </aside>

                <p class="information borderRight">
                    Goed om u terug te zien, er staan weer een hoop nieuwe opdrachten op u te  wachten, in de balk hier naast kunt u de status van uw huidige opdrachten bekijken of zoek een nieuwe opdracht uit om samen aan te werken, alles is mogelijk!
                </p>
            </section>

        </section> <!-- End Welcome -->

    @elseif(count(Auth::user()->checkPersonalDetails()) !== 0)

        <section class="block marginTop floatFix">

            <header class="mainTitle">
                <h1>Er ontbreken gegevens!</h1>
            </header>

            <div class="progressSmall"></div>

            <section class="description">
                <aside class="floatRight quickMenu">
                    <nav>
                        <!-- TODO: Place 'mijn opdrachten' link in ul -->
                        {{ link_to('client/settings', 'Instellingen', array('class' => 'btn messageBoxBtn btnSettingsIcon'))}}
                    </nav>
                </aside>

                <p class="information borderRight">
                    U heeft nog niet al uw persoonlijke gegevens ingevuld. Er ontbreken nog {{ count(Auth::user()->checkPersonalDetails()) }} velden! Dit is nodig om mee te kunnen doen aan een opdracht. Via uw instellingen kunnen de persoonlijke gegevens worden ingevuld of veranderd!
                </p>
            </section>

        </section>

    @endif

    @include('partials._filter')

    <section class="jobs" id="jobs">

        @foreach ($jobs as $job)
            @include('partials.jobs._job', array('job' => $job))
        @endforeach

    </section> <!-- End Jobs -->

    <!-- Todo: See if we can combine this with the php partial -->
    @include('partials.handlebars._job')

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

@section('scripts')
    {{ HTML::script('scripts/vendor/handlebars-v1.1.2.js') }}

    <script>
        // Todo: We need some javascript layer to wrap all javascript into or something..
        // Probably some namespacing stuff

        // Todo: Place in external js file
        $("#jobcategoryDropdown").on('change', function() { // Todo: Abstract away in named function
            var jobcategoryId = $(this).val();
            
            var url;

            // Todo: This url should not be hardcoded!!
            if (jobcategoryId === "") {
                url = "http://projectthuiszorg.dev/api/jobs"; 
            } else {
                url = 'http://projectthuiszorg.dev/api/jobcategories/' + jobcategoryId + '/jobs';
            }

            $.getJSON(url, function(data) { // Todo: Abstract away in named func

                var source   = $("#jobsTemplate").html();
                var template = Handlebars.compile(source);

                $("#jobs").html(template({jobs: data}));

            });

        });

    </script>
@stop