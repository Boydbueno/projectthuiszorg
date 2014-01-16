<?php namespace controllers\company;

use JobUser;
use Job;

use Auth;
use Input;
use Redirect;
use View;

class JobsController extends \BaseController {

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$job = \Job::find($id);

		$usersCount = count($job->users);

		$job->participantsText = $this->getParticipantsText(count($job->users));

        return View::make('company.jobDetail')->with('job', $job);
	}

	public function create()
	{
		$statusList = \Status::lists('label', 'id');
		$categoryList = \JobCategory::lists('label', 'id');

		return View::make('company.jobCreate')->with('statusList', $statusList)->with('categoryList', $categoryList);
	}

	public function postCreate(){

		$userid = \Auth::user()->id;

		$job = new \Job;
		$job->title = \Input::get('title');
		$job->short_description = \Input::get('short_description');
		$job->long_description = \Input::get('long_description');
		$job->amount = \Input::get('amount');
		$job->payment = \Input::get('payment');
		$job->minimum = \Input::get('minimum');
		$job->step = \Input::get('step');
		$job->postfix = \Input::get('postfix');
		$job->prefix = \Input::get('prefix');
		$job->start_date = \Input::get('start_date');
		$job->end_date = \Input::get('end_date');
		$job->status_id = \Input::get('status_id');
		$job->jobcategory_id = \Input::get('category_id');
		$job->company_id = \CompanyUser::where('user_id', '=', $userid)->first()->company_id;
		$job->save();

		return Redirect::to('/company');

	}

	/**
	 * Get the text about previous participants based on amount of users
	 * @param  int $usersCount
	 * @return string
	 */
	private function getParticipantsText($usersCount) 
	{
		if ($usersCount === 0) {
			return "Er doet nog niemand mee met uw opdracht.";
		} 

		if ($usersCount === 1) {
			return "Er is een participant voor uw opdracht!";
		}

		return "Al {$usersCount} mensen doen mee!";
	}

}