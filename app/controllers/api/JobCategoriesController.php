<?php namespace controllers\api;

class JobCategoriesController extends \BaseController {

	/**
	 * Return a listing of the resource as JSON.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \JobCategory::all();
	}

	/**
	 * Return the specified resource as JSON.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		// TODO: Error handling if resource isn't found
		return \JobCategory::find($id);
	}

}