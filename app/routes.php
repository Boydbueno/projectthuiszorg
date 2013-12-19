<?php

Route::get('/', 'HomeController@getIndex');
Route::get('/contact', 'HomeController@getContact');
Route::post('/contact', 'HomeController@postContact');

Route::post('clients', 'ClientsController@store'); // Todo: This route is lost, please give it a new home.

/*
|---------------------------------------------------------------------------
| Login routes
|---------------------------------------------------------------------------
*/

Route::group(array('prefix' => 'login'), function()
{

	Route::get('client', 'controllers\client\AuthController@getLogin');
	Route::get('company', 'controllers\company\AuthController@getLogin');

});

/*
|---------------------------------------------------------------------------
| Client routes
|---------------------------------------------------------------------------
*/
Route::group(array('prefix' => 'client'), function()
{

	Route::get('register', 'controllers\client\AuthController@getRegister');
	Route::post('register', 'controllers\client\AuthController@postRegister');

	Route::group(array('before' => 'auth.client'), function() 
	{
		Route::get('/', array('as' => 'client', 'uses' => 'controllers\client\HomeController@index'));
		Route::get('jobs', 'controllers\client\HomeController@getMyJobs');
		Route::get('settings', 'controllers\client\SettingsController@getSettings');

		Route::get('jobs/{id}', array('as' => 'client.jobs.show', 'uses' => 'controllers\client\JobsController@show'));
		Route::get('jobs/{id}/join', array('as' => 'client.jobs.join', 'uses' => 'controllers\client\JobsController@join'));
		Route::post('jobs/{id}/join', array('uses' => 'controllers\client\JobsController@postJoin'));
	});

});

/*
|---------------------------------------------------------------------------
| Company routes
|---------------------------------------------------------------------------
*/

Route::group(array('prefix' => 'opdrachtgever'), function()
{

	Route::get('register', 'controllers\company\AuthController@getRegister');

	Route::group(array('before' => 'auth.company'), function() 
	{
		Route::get('/', 'controllers\company\HomeController@getIndex');
	});

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
Route::get('logout', array('as' => 'logout', 'uses' => 'UserController@logout'));
