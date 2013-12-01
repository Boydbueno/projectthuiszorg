<?php

use \Carbon\Carbon;

class ClientsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		// Jobcategories in id => label pairs, for the dropdown in view
		$dropdownPlaceholder = array('' => 'Category');
		$jobcategories = $dropdownPlaceholder + Jobcategory::lists('label', 'id');
		
		$jobs = Job::orderBy('start_date')->get();

		foreach($jobs as $job) {
			$job->daysLeft = Carbon::now()->diffInDays($job->start_date);
			$job->totalAmount = 0;

			$jobusers = JobUser::where('job_id','=',$job->id)->get();

			foreach($jobusers as $jobuser){
				$job->totalAmount += $jobuser->amount;
			}

			$job->percentageComplete = ($job->totalAmount / $job->amount) * 100;

		}

		return View::make('clients.index')->with('jobs', $jobs)->with('jobcategories', $jobcategories);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$validator = Validator::make($input, User::$rules);

		if($validator->fails()) return Redirect::back()->withInput()->withErrors($validator);

		$user = new User();

		$user->email = $input['email'];
		$user->password = Hash::make($input['password']);
		$user->first_name = $input['first_name'];
		$user->last_name = $input['last_name'];
		$user->street_name = $input['street_name'];
		$user->house_number = $input['house_number'];
		$user->zipcode = $input['zipcode'];
		$user->city = $input['city'];

		$user->save();

		return Redirect::to('/client');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}

}