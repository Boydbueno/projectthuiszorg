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

Route::group(['prefix' => 'client', 'namespace' => 'controllers\client', 'before' => 'clientOrAdmin'], function()
{

	Route::get('/', ['as' => 'client', 'uses' => 'HomeController@index']);
	Route::get('jobs', ['as' => 'client.jobs', 'uses' => 'HomeController@getMyJobs']);
	Route::get('settings', ['as' => 'client.settings', 'uses' => 'SettingsController@getSettings']);
	Route::get('friendlist', ['as' => 'client.friendlist', 'uses' => 'FriendListController@getFriendList']);

	Route::get('jobs/{id}', ['as' => 'client.jobs.show', 'uses' => 'JobsController@show']);
	Route::get('jobs/{id}/join', ['as' => 'client.jobs.join', 'uses' => 'JobsController@join']);
	Route::post('jobs/{id}/join', 'JobsController@postJoin');

	Route::get('jobs/{id}/edit', ['as' => 'client.jobs.edit', 'uses' => 'JobsController@edit']);
	Route::delete('jobs/{id}', ['as' => 'client.jobs.delete', 'uses' => 'JobsController@destroy']); // Doesn't destroy the job, just connection with user
	Route::get('jobs/{id}/progress', ['as' => 'client.jobs.progress', 'uses' => 'JobsController@progress']);

});

/*
|---------------------------------------------------------------------------
| Company routes
|---------------------------------------------------------------------------
*/

Route::group(['prefix' => 'company', 'namespace' => 'controllers\company', 'before' => 'companyOrAdmin'], function()
{

	Route::get('/', ['as' => 'company', 'uses' => 'HomeController@index']);

	Route::get('jobs/create', ['as' => 'company.jobs.create', 'uses' => 'JobsController@create']);
	Route::post('jobs/create', 'JobsController@postCreate');

});

/*
|---------------------------------------------------------------------------
| API routes
|---------------------------------------------------------------------------
*/

Route::group(['prefix' => 'api', 'namespace' => 'controllers\api'], function()
{

	# Comment routes
	Route::get('comments', 'CommentsController@index');
	Route::get('comments/{id}', 'CommentsController@show');

	# Job routes
	
	Route::get('jobs', 'JobsController@index');
	Route::get('jobs/{id}', 'JobsController@show');
	Route::get('jobs/{id}/comments', 'CommentsController@getComments');
	Route::post('jobs/{id}/comments', 'CommentsController@postComment');
	Route::get('jobs/{id}/invite/{userid}', 'JobsController@inviteUser');
	Route::get('jobcategories/{id}/jobs', 'JobsController@byCategory');

	# Jobcategory routes
	Route::get('jobcategories', 'JobcategoriesController@index');
	Route::get('jobcategories/{id}', 'JobcategoriesController@show');

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
