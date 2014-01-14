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

		return View::make('company.jobCreate')->with('statusList', $statusList);
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