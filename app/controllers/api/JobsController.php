<?php namespace controllers\api;

use Job;
use Auth;
use Input;
use DateTime;
use JobCategory;
use User;
use Mail;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class JobsController extends \BaseController {

	protected $job;

	public function __construct(Job $job)
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
		$jobs = $this->job->notExpired()->orderBy('start_date'); 
		
		$jobs = $jobs->get();

		if(Input::get('availability'))
		{
			// Throw the jobs through some method to filter out the ones with wrong availability
			$jobs = $this->filterAvailability($jobs, Input::get('availability'));
		}
		
		return $jobs;
	}

	private function filterAvailability($jobs, $availability)
	{

		$filteredJobs = new EloquentCollection;

		foreach($jobs as $job)
		{
			$jobAvailability = 100 - $job->percentage_complete;

			if($jobAvailability >= $availability) {
				$filteredJobs->add( $job );
			}
		}

		return $filteredJobs;
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
		return Job::find($id);
	}

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

	/**
	 * Sends an email to another person to invite them to a job
	 * 
	 * @param  int $id id of the user being invited
	 * @return Response
	 */
	public function inviteUser($id, $userId)
	{
		$data = array();
		$data['job'] = Job::find($id);
		$data['user'] = User::find($userId);

		Mail::send('emails.invite', $data, function($message) use ($data)
		{
			$message->subject(Auth::user()->userInfo->firstName.''.Auth::user()->userInfo->lastName." nodigt u uit!");
		    $message->to($data['user']->email, $data['user']->userInfo->firstName.' '.$data['user']->userInfo->lastName);
		});

		return "succes";
	}

}