@extends('layouts.master')

@section('title')
	Project Thuiszorg - Clients
@stop

@section('content')
    <div>
        <h1>Clients</h1>
        <p>{{ Session::get('notice') }}</p>
    </div>
    <div>

    <section>
        <h1>Vacatures</h1>
        <ul>
            @foreach ($jobs as $job)
                <li>{{ $job->title }}</li>
            @endforeach
        </ul>
    </section>
    {{ link_to_route('logout', 'Logout') }}
@stop