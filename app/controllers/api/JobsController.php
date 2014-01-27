<?php namespace controllers\api;

use Job;
use User;
use Mail;
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