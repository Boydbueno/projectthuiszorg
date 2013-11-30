<?php

Route::controller('client', 'ClientController');
Route::controller('opdrachtgever', 'CompanyController');

/*
|---------------------------------------------------------------------------
| Authorization
|---------------------------------------------------------------------------
*/

Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));
Route::controller('auth', 'AuthController');

/*
|---------------------------------------------------------------------------
| Auth protected areas
|---------------------------------------------------------------------------
*/

Route::group(array('before' => 'auth'), function() 
{

	Route::resource('clients', 'ClientsController');
	Route::resource('jobs', 'JobsController');
	
});

Route::group(array('prefix' => 'api'), function()
{
	Route::resource('jobs', 'controllers\api\JobsController');
	Route::resource('jobcategories', 'controllers\api\JobCategoriesController');
});

Route::controller('/', 'HomeController');