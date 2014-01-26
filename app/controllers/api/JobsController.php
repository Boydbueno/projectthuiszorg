<?php namespace controllers\api;

use Job;
use Auth;
use Input;
use DateTime;
use JobCategory;
use Rework\Repositories\EloquentJobRepository;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class JobsController extends \BaseController {

	private $job;

	public function __construct(EloquentJobRepository $job)
	{
		$this->job = $job;
	}

	/**
	 * Return a listing of the resource as JSON.
	 *
	 * @return Response
	 */
	public function index()
	{
		$params = [];

		if(Input::get('availability'))
		{
			$params['availability'] = Input::get('availability');
		}

		$jobs = $this->job->all($params); 
		
		return $jobs;
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
		return $this->job->find($id);
	}

	/**
	 * Return a listing of jobs by jobCategory
	 * 
	 * @param  int $id id of jobcategory
	 * @return Response
	 */
	public function byCategory($id)
	{
		$params = [];

		if(Input::get('availability'))
		{
			$params['availability'] = Input::get('availability');
		}

		return $this->job->byCategory($id, $params);
	}

}