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

/*
|---------------------------------------------------------------------------
| API routes
|---------------------------------------------------------------------------
*/

Route::group(array('prefix' => 'api'), function()
{

	Route::group(array('prefix' => 'jobs'), function() 
	{
		Route::get('/', 'controllers\api\JobsController@index');
		Route::get('{id}', 'controllers\api\JobsController@show');
	});

	Route::group(array('prefix' => 'jobcategories'), function()
	{
		Route::get('/', 'controllers\api\JobcategoriesController@index');
		Route::get('{id}', 'controllers\api\JobcategoriesController@show');
		Route::get('{id}/{relationship}', 'controllers\api\JobcategoriesController@relationship');
	});

});

Route::controller('/', 'HomeController');