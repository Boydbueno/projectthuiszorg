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

        @if(isset($jobs['Start']))

            @foreach ($jobs['Start'] as $job)
                <article class="block marginTop floatFix {{ $job->jobcategory_classname }}">
                    <header class="mainTitle floatFix">
                        <h1 class="floatLeft">{{ $job->title }}</h1>
                        <span class="subTitle floatRight">{{ $job->category }}</span>
                    </header>
                    <div class="progress">
                        <div class="progressBar" style="width: {{ $job->percentage_complete }}%"></div>
                    </div>
                    <section class="description">
                        <aside class="details floatRight">
                            <ul>
                                <li class="iconItem dateIcon bold">{{ $job->days_left_phrase }}</li>
                                <li class="iconItem timeIcon">{{ $job->status->label }}</li>
                                <li class="iconItem moneyIcon">€ {{ $job->formatted_payment }}</li>
                            </ul>
                            {{ link_to_route('client.jobs.edit', 'Bekijk Opdracht', ['id' => 1], ['class' => 'btn'])}}
                        </aside>
                        <div class="information borderRight">
                            <p>{{ $job->short_description }}</p>
                        </div>
                    </section>
                </article>
            @endforeach

        @endif

        @if(isset($jobs['Open']))

            @foreach ($jobs['Open'] as $job)
                <article class="block marginTop floatFix {{ $job->jobcategory_classname }}">
                    <header class="mainTitle floatFix">
                        <h1 class="floatLeft">{{ $job->title }}</h1>
                        <span class="subTitle floatRight">{{ $job->category }}</span>
                    </header>
                    <div class="progress">
                        <div class="progressBar" style="width: {{ $job->percentage_complete }}%"></div>
                    </div>
                    <section class="description">
                        <aside class="details floatRight">
                            <ul>
                                <li class="iconItem dateIcon bold">{{ $job->days_left_phrase }}</li>
                                <li class="iconItem timeIcon">{{ $job->status->label }}</li>
                                <li class="iconItem moneyIcon">€ {{ $job->formatted_payment }}</li>
                            </ul>
                            {{ link_to_route('client.jobs.edit', 'Bekijk Opdracht', ['id' => 1], ['class' => 'btn'])}}
                        </aside>
                        <div class="information borderRight">
                            <p>{{ $job->short_description }}</p>
                        </div>
                    </section>
                </article>
            @endforeach

        @endif

    </section> <!-- End Jobs -->

    @include('partials.client.footer')

@stop