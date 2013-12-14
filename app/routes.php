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
		Route::get('jobs', 'controllers\client\HomeController@getMyJobs');
		Route::get('settings', 'controllers\client\SettingsController@getSettings');

		Route::get('jobs/{id}', array('as' => 'client.jobs.show', 'uses' => 'controllers\client\JobsController@show'));
		Route::get('jobs/{id}/join', array('as' => 'client.jobs.join', 'uses' => 'controllers\client\JobsController@join'));
	});

	Route::get('login', 'controllers\client\AuthController@getLogin');
	Route::post('login', 'controllers\client\AuthController@postLogin');
	Route::get('logout', 'controllers\client\AuthController@getLogout');
	Route::get('register', 'controllers\client\AuthController@getRegister');
	Route::post('register', 'controllers\client\AuthController@postRegister');

});

/*
|---------------------------------------------------------------------------
| Company routes
|---------------------------------------------------------------------------
*/

// Todo: These still need some refactoring
Route::group(array('prefix' => 'opdrachtgever'), function()
{
	Route::group(array('before' => 'auth.company'), function() 
	{
		Route::get('/', 'controllers\company\HomeController@getIndex');
	});

	Route::get('login', 'controllers\company\AuthController@getLogin');
	Route::post('login', 'controllers\company\AuthController@postLogin');
	Route::get('register', 'controllers\company\AuthController@getRegister');
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

/*
|---------------------------------------------------------------------------
| Confidence Routes
|---------------------------------------------------------------------------
*/
Route::get( 'user/create',                 'UserController@create');
Route::post('user',                        'UserController@store');
Route::get( 'user/login',                  'UserController@login');
Route::post('user/login',                  'UserController@do_login');
Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/forgot_password',        'UserController@forgot_password');
Route::post('user/forgot_password',        'UserController@do_forgot_password');
Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get( 'user/logout',                 'UserController@logout');
