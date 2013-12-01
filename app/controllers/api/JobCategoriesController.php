<?php namespace controllers\api;

class JobcategoriesController extends \BaseController {

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
		return \Jobcategory::find($id);
	}

	/**
	 * Return listing of the resources related to the specified resource as JSON
	 * 
	 * @param  int 	$id
	 * @param  string $relationship
	 * @return Response
	 */
	public function relationship($id, $relationship)
	{
		// TODO: Error handling if resource or relationship isn't found
		return $this->show($id)->$relationship;
	}

}