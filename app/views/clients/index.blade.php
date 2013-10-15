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
    	<h2>Naam vacature</h2>
	    	<?php
	    	//$results = DB::select('select * from users where id = 1', array(3));
	    	//echo $results;
	    	//
	    	$users = DB::table('users')->get();
    			?>
	    			<ul>
		    			<?php
						foreach ($users as $user)
						{
						    ?> <li> <?php echo ($user->email); ?> </li> <?php
						}?>
		    		</ul>
    </div>
@stop