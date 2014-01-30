@extends('layouts.master')

@section('title')
	Project Thuiszorg - Clients
@stop

@section('content')

    <section class="block marginTop floatFix">
        <header class="mainTitle">
            <h1>Uw opdrachten</h1>
        </header>

        <div class="progressSmall">
        </div>

        <section class="description">
            <aside class="floatRight quickMenu">
                <nav>
                    {{ link_to_route('client', 'Alle Opdrachten', [], ['class' => 'btn messageBoxBtn btnWorkIcon']) }}
                    <ul>
                        <li class="iconItem settingsIcon">
                            {{ link_to_route('client.settings', 'Instellingen') }}
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

        @if(!empty($jobs))

            @if(isset($jobs['Gestart']))

            <section class="started-jobs">            
                <h1 class="block marginTop mainTitle">Opdrachten die gestart zijn</h1>

                @foreach ($jobs['Gestart'] as $job)
                    @include('partials.jobs._myJob', $job)
                @endforeach
            </section>

            @endif

            @if(isset($jobs['Open']))
            
            <section class="pending-jobs">
                <h1 class="block marginTop mainTitle">Opdrachten die nog niet gestart zijn</h1>

                @foreach ($jobs['Open'] as $job)
                    @include('partials.jobs._myJob', $job)
                @endforeach
            </section>

            @endif

        @else

             <article class="block marginTop ">
                <header class="mainTitle"><h1>Je bent nog niet aangemeld voor een opdracht.</h1></header>
            </article>

        @endif

    </section> <!-- End Jobs -->

    @include('partials.client._friendlist')

    @include('partials.client._footer')

@stop

@section('scripts')
    {{ HTML::script('scripts/friendlist.js') }}
@stop