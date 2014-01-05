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

    <section class="jobs">

        @if(isset($jobs['Start']))

            @foreach ($jobs['Start'] as $job)
                @include('partials.jobs._job', array('job' => $job))
            @endforeach

        @endif

        @if(isset($jobs['Open']))

            @foreach ($jobs['Open'] as $job)
                @include('partials.jobs._job', array('job' => $job))
            @endforeach

        @endif

    </section> <!-- End Jobs -->

    @include('partials.client.footer')

@stop