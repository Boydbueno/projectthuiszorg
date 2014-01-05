<?php namespace controllers\client;

use \Carbon\Carbon;
use Jobcategory;
use Job;

class HomeController extends \BaseController {

	public function index()
	{
		// Jobcategories in id => label pairs, for the dropdown in view
		$dropdownPlaceholder = array('' => 'Categorie');
		$jobcategories = $dropdownPlaceholder + Jobcategory::lists('label', 'id');

		$jobs = \Job::with('users')->orderBy('start_date')->get();

		// Get the jobs the user didn't join
		$jobs = array_filter($jobs->toArray(), function($job){
			return !$this->usersContains($job['users'], \Auth::user()->id);
		});

		return \View::make('client.index')->with('jobs', $jobs)->with('jobcategories', $jobcategories);
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
		$jobs = \Auth::user()->jobs()->with('jobcategory', 'status')->get()->toArray();

		// Split jobs array into groups per status
		
		$jobsInGroups = [];

		foreach ($jobs as $job) {
    		$jobsInGroups[$job['status']['label']][] = $job;
		}

		return \View::make('client.myjobs')->with('jobs', $jobsInGroups);
	}
	
}