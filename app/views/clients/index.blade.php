@extends('layouts.master')

@section('title')
	Project Thuiszorg - Clients
@stop

@section('content')
    <div class="welcome">
        <h1>Clients</h1>
        <p>{{ Session::get('notice') }}</p>
    </div>
    <div>

    <section class="jobs">
        <h1>Vacatures</h1>
        <ul>
            @foreach ($jobs as $job)
                <li class="job">{{ $job->title }}</li>
            @endforeach
        </ul>
    </section>
    {{ link_to_route('logout', 'Logout') }}
@stop