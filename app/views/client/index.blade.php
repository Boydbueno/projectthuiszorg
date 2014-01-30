@extends('layouts.master')

@section('title')
	Project Thuiszorg - Clients
@stop

@section('content')

    @if(Session::get('notice'))

        <section class="block marginTop floatFix">
        
            <header class="mainTitle">
                <h1>Welkom terug, {{{ Auth::user()->userInfo->firstName }}} {{{ Auth::user()->userInfo->lastName }}}!</h1>
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

        @if(count($jobs))
            @foreach ($jobs as $job)
                @include('partials.jobs._job', array('job' => $job))
            @endforeach
        @else
            <article class="block marginTop ">
                <header class="mainTitle"><h1>Er zijn geen opdrachten beschikbaar</h1></header>
                <div class="progressSmall"></div>
                <section class="description">
                    <p class="information wide">
                        Op dit moment zijn er helaas geen opdrachten om weer te geven. Er zullen spoedig nieuwe opdrachten beschikbaar komen.
                    </p>
                </section>
            </article>
        @endif

    </section> <!-- End Jobs -->

    <!-- Todo: See if we can combine this with the php partial -->
    @include('partials.handlebars._job')

    @include('partials.client._friendlist')

    @include('partials.client._footer')
@stop

@section('scripts')
    {{ HTML::script('scripts/vendor/handlebars-v1.1.2.js') }}
    {{ HTML::script('scripts/friendlist.js') }}

    <script>
        // Todo: We need some javascript layer to wrap all javascript into or something..
        // Probably some namespacing stuff

        var filter = function() {
            var url;
            var baseUrl = 'http://projectthuiszorg.dev/api';
            var jobcategoryId = $("#js-jobcategoryDropdown").val();
            var availability = $("#js-jobAvailabilityDropdown").val();
            
            if (jobcategoryId === "") {
                url = baseUrl + '/jobs'; 
            } else {
                url = baseUrl + '/jobcategories/' + jobcategoryId + '/jobs';
            }

            if (availability !== "") {
                url += "?availability=" + availability;
            }

            $.getJSON(url, function(data) { // Todo: Abstract away in named func

                var source   = $("#jobsTemplate").html();
                var template = Handlebars.compile(source);

                $("#jobs").html(template({jobs: data}));

                //Make jobs droppable 
                $('.droppableJob').droppable( {
                    drop: handleDropEvent,
                    hoverClass: "droppable"
                });

            });

        }


        // Todo: Place in external js file
        $('#js-jobcategoryDropdown').on('change', filter);
        $('#js-jobAvailabilityDropdown').on('change', filter);

    </script>

    {{ HTML::style('css/shepherd-theme-arrows.css') }}
    @if(!Cookie::get('tour'))
        {{ HTML::script('scripts/shepherd.min.js') }}
        {{ HTML::script('scripts/tour.js') }}
    @endif    
@stop