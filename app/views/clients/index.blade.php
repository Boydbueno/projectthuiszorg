@extends('layouts.master')

@section('title')
	Project Thuiszorg - Clients
@stop

@section('content')
    
    <header class="block mainTitle floatFix">
        <h1 class="floatLeft">Banending</h1>
        <nav>
            <ul class="mainMenu">
                <li><a href="#" class="menuLink borderRight">Mijn Opdrachten</a></li>
                <li><a href="#" class="menuLink borderRight">Instellingen</a></li>
                <li><a href="#" class="menuLink">Uitloggen</a></li>
            </ul>
        </nav>
    </header>

    <section class="block marginTop">
        <p>
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fugit, ab iusto doloribus atque nostrum ullam velit porro distinctio architecto. <p>{{ Session::get('notice') }}</p>
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

    {{ link_to_route('logout', 'Logout') }}
@stop