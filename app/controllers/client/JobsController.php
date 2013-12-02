<?php namespace controllers\client;

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

        return \View::make('client.jobDetail')->with('job', $job);
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