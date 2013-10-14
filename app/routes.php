<?php

Route::get('/', array('as' => 'home', 'uses' => 'HomeController@showIndex'));

Route::get('client', array('as' => 'client', 'uses' => 'ClientController@showIndex'));
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
Route::resource('clients', 'ClientsController');

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

});
