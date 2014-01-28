@extends('layouts.master')

@section('title')
	Project Thuiszorg - Vriendenlijst
@stop

@section('content')

    <section class="block marginTop floatFix">
        <header class="mainTitle">
            <h1>Uw vrienden!</h1>
        </header>

        <div class="progressSmall">
        </div>

        <section class="description">
            <aside class="floatRight quickMenu">
                <nav>
                    {{ link_to_route('client', 'Vriend Toevoegen', [], ['class' => 'btn messageBoxBtn btnWorkIcon']) }}
                    <ul>
                        <li class="iconItem settingsIcon">
                            {{ link_to_route('client.settings', 'Instellingen') }}
                        </li>
                    </ul>
                </nav>
            </aside>

            <p class="information borderRight">
                Hier is een lijst met al uw vrienden. Zo kunt u in één oogopslag zien wie u kunt uitnodigen voor een klus, of wie u kunt aanbevelen bij een opdrachtgever! In het menu hierboven kunt u nieuwe vrienden opzoeken en ze toevoegen aan uw vriendenlijst!
            </p>
        </section>

    </section> <!-- End Welcome -->

    <section class="block marginTop friends">

        <header class="mainTitle">
            <h1>Vriendenlijst</h1>
        </header>

        <ul>
            @foreach ($friends as $friend)
                <li id="{{ $friend->id }}" class="friend">{{ $friend->userInfo->firstName }} {{ $friend->userInfo->lastName }}</li>
            @endforeach
        </ul>

    </section> <!-- End Friends -->

    @include('partials.client._footer')

@stop