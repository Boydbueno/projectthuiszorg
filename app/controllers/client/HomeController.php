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
		
		$jobs = Job::orderBy('start_date')->get();

		return \View::make('client.index')->with('jobs', $jobs)->with('jobcategories', $jobcategories);
	}

	public function getMyjobs() 
	{
		$jobs = \Auth::user()->jobs;

		// Split jobs array into
		
		// Started jobs
		
		// Pending jobs

		// To make this possible.. we need to add a status to the job.

		return \View::make('client.myjobs')->with('jobs', $jobs);
	}
	
}