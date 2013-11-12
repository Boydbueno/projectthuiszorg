@extends('layouts.master')

@section('title')
	Rework - Clients
@stop

@section('content')
    
    <header class="block mainTitle floatFix">
        <h1 class="floatLeft">Rework</h1>
        <nav>
            <ul class="mainMenu">
                <li><a href="#" class="menuLink borderRight">Mijn Opdrachten</a></li>
                <li><a href="#" class="menuLink borderRight">Instellingen</a></li>
                <li>{{ link_to_route("logout", "Uitloggen", array(), array("class" => "menuLink")) }}</li>
            </ul>
        </nav>
    </header>

    <section class="block marginTop">
        <p>
            Goed om u terug te zien, er staan weer een hoop nieuwe opdrachten op u te  wachten, in de balk hier naast kunt u de status van uw huidige opdrachten bekijken of zoek een nieuwe opdracht uit om samen aan te werken, alles is mogelijk!
            <p>{{ Session::get('notice') }}</p>
        </p>

        <aside>
            <nav>
                <ul>
                    <li><a href="#" class="btn">Mijn Opdrachten</a></li>
                    <li><a href="#" class="btn">Instellingen</a></li>
                </ul>
            </nav>
        </aside>
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