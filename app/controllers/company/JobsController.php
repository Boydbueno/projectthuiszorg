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
		$job = Job::find($id);

		$usersCount = count($job->users);

		$job->participantsText = $this->getParticipantsText(count($job->users));

        return View::make('company.jobDetail')->with('job', $job);
	}

	public function join($id)
	{
		$job = Job::find($id);

        return View::make('company.join')->with('job', $job);
	}

	public function postJoin($id)
	{
		$userid = Auth::user()->id;
		$amount = Input::get('range_1');
		JobUser::create(array('job_id' => $id, 'user_id' => $userid, 'amount' => $amount));

		return Redirect::to('company/jobs/' . $id . '/')->with('notice', 'U bent nu succesvol ingeschreven!');
	}

	public function edit($id)
	{
		$userid = Auth::user()->id;

		$job = Job::find($id);

		return View::make('company.jobEdit', compact('job'));	
	}

	/**
	 * Get the text about previous participants based on amount of users
	 * @param  int $usersCount
	 * @return string
	 */
	private function getParticipantsText($usersCount) 
	{
		if ($usersCount === 0) {
			return "Er doet nog niemand mee, word de eerste!";
		} 

		if ($usersCount === 1) {
			return "Al één iemand doet mee, doe ook mee!";
		}

		return "Al {$usersCount} mensen willen meewerken, doe ook mee!";
	}

}