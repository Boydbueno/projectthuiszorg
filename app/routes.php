<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'home'), function()
{
	return View::make('hello');
});

Route::get('login', ['as' => 'login', 'uses' => 'AuthController@getLogin']);
Route::post('login', 'AuthController@postLogin');
Route::get('logout', ['as' => 'logout', 'uses' => 'AuthController@getLogout']);
Route::controller('auth', 'AuthController');

Route::group(array('before' => 'auth'), function() 
{

	Route::get('protected', function(){
		return View::make('protected');
	});

});
