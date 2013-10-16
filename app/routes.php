<?php

Route::controller('client', 'ClientController');
Route::controller('opdrachtgever', 'CompanyController');

/*
|---------------------------------------------------------------------------
| Authorization
|---------------------------------------------------------------------------
*/

// Route::get('login', array('as' => 'login', 'uses' => 'AuthController@getLogin'));
// Route::post('login', 'AuthController@postLogin');
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));
Route::controller('auth', 'AuthController');

/*
|---------------------------------------------------------------------------
| Auth protected areas
|---------------------------------------------------------------------------
*/

Route::group(array('before' => 'auth'), function() 
{

	Route::get('protected', function(){
		return View::make('protected');
	});

	Route::resource('clients', 'ClientsController');

});

Route::controller('/', 'HomeController');