<?php

/*
|---------------------------------------------------------------------------
| Client routes
|---------------------------------------------------------------------------
*/
Route::group(array('prefix' => 'client'), function()
{
	Route::get('/', 'ClientController@getIndex');
	Route::post('/', 'ClientController@postIndex');
	Route::get('myjobs', 'ClientController@getMyJobs');
	Route::get('register', 'ClientController@getRegister');
	Route::post('register', 'ClientController@postRegister');
});

/*
|---------------------------------------------------------------------------
| Company routes
|---------------------------------------------------------------------------
*/
Route::group(array('prefix' => 'opdrachtgever'), function()
{
	Route::get('/', 'CompanyController@getIndex');
	Route::post('/', 'CompanyController@postIndex');
	Route::get('register', 'CompanyController@getRegister');
});

/*
|---------------------------------------------------------------------------
| Authorization
|---------------------------------------------------------------------------
*/

Route::get('logout', array('as' => 'logout', 'uses' => 'AuthController@getLogout'));

Route::group(array('prefix' => 'auth'), function()
{
	Route::get('login', 'AuthController@getLogin');
	Route::post('login', 'AuthController@postLogin');
});

/*
|---------------------------------------------------------------------------
| Auth protected areas
|---------------------------------------------------------------------------
*/

Route::group(array('before' => 'auth'), function() 
{

	Route::group(array('prefix' => 'clients'), function()
	{
		Route::get('/', 'ClientsController@index');
		Route::post('/', 'ClientsController@store');
		Route::get('{id}', array('as' => 'jobs.show', 'uses' => 'JobsController@show'));
		Route::get('{id}/edit', 'ClientsController@edit');
		Route::put('{id}', 'ClientsController@update');
		Route::delete('{id}', 'ClientsController@destroy');
	});

	Route::group(array('prefix' => 'jobs'), function()
	{
		Route::get('/', 'JobsController@index');
		Route::post('/', 'JobsController@store');
		Route::get('{id}', 'JobsController@show');
		Route::get('{id}/edit', 'JobsController@edit');
		Route::put('{id}', 'JobsController@update');
		Route::delete('{id}', 'JobsController@destroy');
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

Route::get('/', 'HomeController@getIndex');
Route::get('/contact', 'HomeController@getContact');
Route::post('/contact', 'HomeController@postContact');