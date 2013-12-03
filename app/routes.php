<?php

Route::get('/', 'HomeController@getIndex');
Route::get('/contact', 'HomeController@getContact');
Route::post('/contact', 'HomeController@postContact');

Route::post('clients', 'ClientsController@store'); // Todo: This route is lost, please give it a new home.

/*
|---------------------------------------------------------------------------
| Client routes
|---------------------------------------------------------------------------
*/
Route::group(array('prefix' => 'client'), function()
{

	Route::group(array('before' => 'auth.client'), function() 
	{
		Route::get('/', array('as' => 'client', 'uses' => 'controllers\client\HomeController@index'));
		Route::get('myjobs', 'controllers\client\HomeController@getMyJobs');

		Route::get('jobs/{id}', array('as' => 'client.jobs.show', 'uses' => 'controllers\client\JobsController@show'));
	});

	Route::get('login', 'controllers\client\AuthController@getLogin');
	Route::post('login', 'controllers\client\AuthController@postLogin');
	Route::get('logout', 'controllers\client\AuthController@getLogout');
	Route::get('register', 'controllers\client\AuthController@getRegister'); // Todo: Registration, move in different controller?
	Route::post('register', 'controllers\client\AuthController@postRegister'); // Todo: Registration, move in different controller?

});

/*
|---------------------------------------------------------------------------
| Company routes
|---------------------------------------------------------------------------
*/

// Todo: These still need some refactoring
Route::group(array('prefix' => 'opdrachtgever'), function()
{
	Route::get('/', 'CompanyController@getIndex');
	Route::post('/', 'CompanyController@postIndex');
	Route::get('register', 'CompanyController@getRegister');
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