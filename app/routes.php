<?php

Route::get('/', 'HomeController@getIndex');
Route::get('/contact', 'HomeController@getContact');
Route::post('/contact', 'HomeController@postContact');
Route::get( '/forgot_password', 'HomeController@forgot_password');
Route::post('/forgot_password', 'HomeController@do_forgot_password');

/*
|---------------------------------------------------------------------------
| Login routes
|---------------------------------------------------------------------------
*/

Route::group(['prefix' => 'login'], function()
{

	Route::get('client', ['as' => 'client.login', 'uses' => 'controllers\client\AuthController@getLogin']);
	Route::post('client', ['as' => 'client.doLogin', 'uses' => 'controllers\client\AuthController@postLogin']);
	Route::get('company', ['as' => 'company.login', 'uses' => 'controllers\company\AuthController@getLogin']);
	Route::post('company', ['as' => 'company.doLogin', 'uses' => 'controllers\company\AuthController@postLogin']);

});

/*
|---------------------------------------------------------------------------
| Register routes
|---------------------------------------------------------------------------
*/

Route::group(['prefix' => 'register'], function()
{

	Route::get('client', 'controllers\client\AuthController@getRegister');
	Route::post('client', 'controllers\client\AuthController@postRegister');
	Route::get('company', 'controllers\company\AuthController@getRegister');

});

/*
|---------------------------------------------------------------------------
| Client routes
|---------------------------------------------------------------------------
*/

Route::group(['prefix' => 'client'], function()
{

	Route::group(['before' => 'clientOrAdmin'], function() 
	{
		Route::get('/', ['as' => 'client', 'uses' => 'controllers\client\HomeController@index']);
		Route::get('jobs', ['as' => 'client.jobs', 'uses' => 'controllers\client\HomeController@getMyJobs']);
		Route::get('settings', ['as' => 'client.settings', 'uses' => 'controllers\client\SettingsController@getSettings']);
		Route::get('friendlist', ['as' => 'client.friendlist', 'uses' => 'controllers\client\FriendListController@getFriendList']);

		Route::get('jobs/{id}', ['as' => 'client.jobs.show', 'uses' => 'controllers\client\JobsController@show']);
		Route::get('jobs/{id}/join', ['as' => 'client.jobs.join', 'uses' => 'controllers\client\JobsController@join']);
		Route::post('jobs/{id}/join', 'controllers\client\JobsController@postJoin');

		Route::get('jobs/{id}/edit', ['as' => 'client.jobs.edit', 'uses' => 'controllers\client\JobsController@edit']);
		Route::delete('jobs/{id}', ['as' => 'client.jobs.delete', 'uses' => 'controllers\client\JobsController@destroy']); // Doesn't destroy the job, just connection with user
	});

});

/*
|---------------------------------------------------------------------------
| Company routes
|---------------------------------------------------------------------------
*/

Route::group(['prefix' => 'company'], function()
{

	Route::group(['before' => 'companyOrAdmin'], function() 
	{
		Route::get('/', ['as' => 'company', 'uses' => 'controllers\company\HomeController@index']);

		Route::get('jobs/create', ['as' => 'company.jobs.create', 'uses' => 'controllers\company\JobsController@create']);
		Route::post('jobs/create', 'controllers\company\JobsController@postCreate');
	});

});

/*
|---------------------------------------------------------------------------
| API routes
|---------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api'], function()
{

	# Comment routes
	Route::get('comments', 'controllers\api\CommentsController@index');
	Route::get('comments/{id}', 'controllers\api\CommentsController@show');

	# Job routes
	Route::get('jobs', 'controllers\api\JobsController@index');
	Route::get('jobs/{id}', 'controllers\api\JobsController@show');
	Route::get('jobs/{id}/comments', 'controllers\api\CommentsController@indexJob');
	Route::get('jobs/{id}/invite/{userid}', 'controllers\api\JobsController@inviteUser');
	Route::get('jobcategories/{id}/jobs', 'controllers\api\JobsController@byCategory');

	# Jobcategory routes
	Route::get('jobcategories', 'controllers\api\JobcategoriesController@index');
	Route::get('jobcategories/{id}', 'controllers\api\JobcategoriesController@show');

});

/*
|---------------------------------------------------------------------------
| Confidence Routes
|---------------------------------------------------------------------------
*/

Route::get( 'user/confirm/{code}',         'UserController@confirm');
Route::get( 'user/reset_password/{token}', 'UserController@reset_password');
Route::post('user/reset_password',         'UserController@do_reset_password');
Route::get('logout', ['as' => 'logout', 'uses' => 'UserController@logout']);