<?php namespace controllers\api;

use Job;
use Auth;
use DateTime;
use JobCategory;

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
		return Job::find($id);
	/**
	 * Return a listing of jobs by jobCategory
	 * 
	 * @param  int $id id of jobcategory
	 * @return Response
	 */
	public function byCategory($id)
	{
		return JobCategory::find($id)->jobs;
	}

}