<?php namespace controllers\client;

use \Carbon\Carbon;
use Jobcategory;
use DateTime;
use View;
use Auth;
use Job;

class HomeController extends \BaseController {

	public function index()
	{
		$jobs = Job::with('users', 'status', 'jobcategory')->notExpired()->orderBy('start_date')->get();

		// Get the jobs the user didn't join
		$jobs = array_filter($jobs->toArray(), function($job){
			return !$this->usersContains($job['users'], Auth::user()->id);
		});

		return View::make('client.index', compact('jobs'));
	}

	private function usersContains($users, $user_id)
	{
		$contains = false;
		foreach($users as $user)
		{
			if($user['id'] === $user_id){
				$contains = true;
				break;
			}
		}

		return $contains;

	}

	public function getMyjobs() 
	{
		$jobs = Auth::user()->jobs()->with('jobcategory', 'status')->get();

		// Split jobs array into groups per status
		
		$jobsInGroups = [];

		foreach ($jobs as $job) {
    		$jobsInGroups[$job['status']['label']][] = $job;
		}

		return View::make('client.myjobs')->with('jobs', $jobsInGroups);
	}
	
}