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
            Goed om u terug te zien, er staan weer een hoop nieuwe opdrachten op u te  wachten, in de balk hier naast kunt u de status van uw huidige opdrachten bekijken of zoek een nieuwe opdracht uit om samen aan te werken, alles is mogelijk!<p>{{ Session::get('notice') }}</p>
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
@stop