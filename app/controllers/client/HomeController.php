<?php namespace controllers\client;

use \Carbon\Carbon;

class HomeController extends \BaseController {

	public function index()
	{
		// Jobcategories in id => label pairs, for the dropdown in view
		$dropdownPlaceholder = array('' => 'Category');
		$jobcategories = $dropdownPlaceholder + \Jobcategory::lists('label', 'id');
		
		$jobs = \Job::orderBy('start_date')->get();

		foreach($jobs as $job) {
			$job->daysLeft = Carbon::now()->diffInDays($job->start_date);
			$job->totalAmount = 0;

			$jobusers = \JobUser::where('job_id','=',$job->id)->get();

			foreach($jobusers as $jobuser){
				$job->totalAmount += $jobuser->amount;
			}

			$job->percentageComplete = ($job->totalAmount / $job->amount) * 100;

		}

		return \View::make('client.index')->with('jobs', $jobs)->with('jobcategories', $jobcategories);
	}

	public function getMyjobs() 
	{
		$jobs = \Auth::user()->jobs;

		return \View::make('client.myjobs')->with('jobs', $jobs);
	}
	
}