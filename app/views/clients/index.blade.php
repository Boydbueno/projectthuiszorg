@extends('layouts.master')

@section('title')
	Project Thuiszorg - Clients
@stop

@section('content')

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
@stop