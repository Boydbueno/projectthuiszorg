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

	public function getRegister()
	{
		return \View::make('client.register');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postRegister()
	{
		$input = \Input::all();

		$validator = \Validator::make($input, \User::$rules);

		if($validator->fails()) return \Redirect::back()->withInput()->withErrors($validator);

		$user = new \User();

		$user->email = $input['email'];
		$user->password = \Hash::make($input['password']);
		$user->first_name = $input['first_name'];
		$user->last_name = $input['last_name'];
		$user->street_name = $input['street_name'];
		$user->house_number = $input['house_number'];
		$user->zipcode = $input['zipcode'];
		$user->city = $input['city'];

		$user->save();

		return \Redirect::to('/client');
	}

}