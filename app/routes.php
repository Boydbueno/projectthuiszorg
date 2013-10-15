<?php

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showIndex'));

Route::controller('client', 'ClientController');
Route::get('opdrachtgever', array('as' => 'company', 'uses' => 'CompanyController@showIndex'));

/*
|---------------------------------------------------------------------------
| Authorization
|---------------------------------------------------------------------------
*/

Route::get('login', array('as' => 'login', 'uses' => 'AuthController@getLogin'));
Route::post('login', 'AuthController@postLogin');
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
