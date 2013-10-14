<?php

Route::get('/', 'HomeController@showIndex');

Route::get('client', 'HomeController@showClient');

Route::get('opdrachtgever', 'HomeController@showCompany');

Route::get('/', function()
{
	return View::make('hello');
});

Route::get('login', array('as' => 'login', 'uses' => 'AuthController@getLogin'));
Route::post('login', 'AuthController@postLogin');
Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));
Route::controller('auth', 'AuthController');

Route::group(array('before' => 'auth'), function() 
{

	Route::get('protected', function(){
		return View::make('protected');
	});

});
