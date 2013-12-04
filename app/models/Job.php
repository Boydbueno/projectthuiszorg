<?php

use \Carbon\Carbon;

class Job extends Eloquent {

	protected $guarded = array();
	public static $rules = array();

	public function company()
	{
		return $this->belongsTo('Company');
	}

	public function jobcategory()
	{
		return $this->belongsTo('Jobcategory');
	}

	public function users()
	{
		return $this->belongsToMany('User')->withPivot('amount', 'amount');
	}

	public function getDates()
	{
	    return array('created_at', 'updated_at', 'start_date', 'end_date');
	}

	public function daysLeft()
	{
		return Carbon::now()->diffInDays($this->start_date);
	}

	public function percentageComplete()
	{
		$totalAmount = 0;

		//Get all the contributors to this job
		$jobusers = \JobUser::where('job_id','=',$this->id)->get();

		//Calculate the total amount
		foreach($jobusers as $jobuser){
			$totalAmount += $jobuser->amount;
		}

		//Return the percentage
		return ($totalAmount / $this->amount) * 100;
	}

}