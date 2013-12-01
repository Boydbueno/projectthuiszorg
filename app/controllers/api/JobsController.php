<?php namespace controllers\api;

class JobsController extends \BaseController {

	/**
	 * Return a listing of the resource as JSON.
	 *
	 * @return Response
	 */
	public function index()
	{
		return \Job::all();
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
		return \Job::find($id);
	}

}