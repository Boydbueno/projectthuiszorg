<?php namespace Rework\Repositories;

use Job;
use Auth;
use Jobcategory;
use Illuminate\Database\Eloquent\Collection as EloquentCollection;

class EloquentJobRepository {

	public function all(Array $params = [])
	{
		$jobs = Job::with('users', 'status', 'jobcategory')->notExpired()->orderBy('start_date')->get();

		$jobs = $this->filterJoined($jobs);

		if(isset($params['availability']))
		{
			$jobs = $this->filterAvailability($jobs, $params['availability']);
		}

		return $jobs;
	}

	public function find($id)
	{
		$jobs = Job::with('users', 'status', 'jobcategory')->notExpired()->find($id);

		$jobs = $this->filterJoined($jobs);

		return $jobs;
	}

	public function byCategory($id, Array $params = [])
	{
		$jobs = \Jobcategory::find($id)->jobs()->with('users', 'status', 'jobcategory')->notExpired()->get();

		$jobs = $this->filterJoined($jobs);

		if(isset($params['availability']))
		{	
			$jobs = $this->filterAvailability($jobs, $params['availability']);
		}

		return $jobs;
	}

	private function filterJoined($jobs)
	{
		// Get the jobs the user didn't join
		$filteredJobs = new EloquentCollection;
		foreach($jobs as $job)
		{
			if( ! $this->usersContains($job['users'], Auth::user()->id) )
			{
				$filteredJobs->add($job);
			}
		}
		return $filteredJobs;
	}

	private function filterAvailability($jobs, $availability)
	{

		$filteredJobs = new EloquentCollection;

		foreach($jobs as $job)
		{
			$jobAvailability = 100 - $job->percentage_complete;

			if($jobAvailability >= $availability) {
				$filteredJobs->add( $job );
			}
		}

		return $filteredJobs;
	}

	private function usersContains($users, $user_id)
	{
		$contains = false;
		foreach($users as $user)
		{
			if($user['id'] === $user_id){
				$contains = true;
				break;
			}
		}

		return $contains;
	}

}