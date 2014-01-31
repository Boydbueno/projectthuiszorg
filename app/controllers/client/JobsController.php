<?php namespace controllers\client;

use Progress;
use JobUser;
use Job;
use DB;

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
		$user = Auth::user();

		$jobUserCount = JobUser::where('user_id', '=', $user->id)->where('job_id', '=', $job->id)->count();

		$userJoined = (bool) $jobUserCount;

		$job->participantsText = $this->getParticipantsText(count($job->users));

        return View::make('client.jobDetail')->with('job', $job)->with('userJoined', $userJoined);
	}

	public function join($id)
	{
		$job = Job::find($id);

        return View::make('client.join')->with('job', $job);
	}

	public function postJoin($id)
	{
		$userid = Auth::user()->id;
		$amount = Input::get('range_1');
		JobUser::create(array('job_id' => $id, 'user_id' => $userid, 'amount' => $amount));

		return Redirect::to('client/jobs/' . $id . '/')->with('notice', 'U bent nu succesvol ingeschreven!');
	}

	public function edit($id)
	{
		$userid = Auth::user()->id;

		$job = Job::find($id);

		return View::make('client.jobEdit', compact('job'));	
	}

	public function destroy($id)
	{
		Auth::user()->jobs()->detach($id);

		return Redirect::route('client.jobs');
	}

	public function progress($id)
	{
		$userId = Auth::user()->id;
		$job = Job::find($id);

		$progress = Progress::select([
		        DB::raw('DATE(`created_at`) as `date`'),
                DB::raw('SUM(amount) as `amount`')
			])
			->where('user_id', '=', $userId)->where('job_id', '=', $job->id)
			->groupBy('date')
			->lists('amount', 'date');

		$dates = array_keys($progress);
		$amounts = array_map('intval', array_values($progress));

		$amountSubscribedFor = $job->users->find($userId)->pivot->amount;

		return View::make('client.jobProgress')
			->with('job', $job)
			->with('dates', $dates)
			->with('amounts', $amounts)
			->with('max', $amountSubscribedFor);
	}

	public function addProgress($id)
	{
		$userId = Auth::user()->id;

		$progress = new Progress;
		$progress->user_id = $userId;
		$progress->job_id = $id;
		$progress->amount = Input::get('progressSlider');
		$progress->save();

		return Redirect::route('client.jobs.progress', $id);
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