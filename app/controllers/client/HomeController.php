<?php namespace controllers\client;

use Job;
use Auth;
use View;
use DateTime;
use Jobcategory;
use \Carbon\Carbon;
use Rework\Repositories\EloquentJobRepository;

class HomeController extends \BaseController {

	private $job;

	public function __construct(EloquentJobRepository $job)
	{
		$this->job = $job;
	}


	public function index()
	{
		$jobs = $this->job->all();

		return View::make('client.index', compact('jobs'));
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