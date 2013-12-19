<?php

use \Carbon\Carbon;

class Job extends Eloquent {

	protected $guarded = array();

	protected $appends = array(
		'percentage_complete',
		'days_left_phrase',
		'formatted_payment',
		'jobcategory_classname',
		'link_to_details'
	);
	
	public static $rules = array();

	public function company()
	{
		return $this->belongsTo('Company');
	}

	public function jobcategory()
	{
		return $this->belongsTo('Jobcategory');
	}

	public function status()
	{
		return $this->belongsTo('status');
	}

	public function users()
	{
		return $this->belongsToMany('User')->withPivot('amount');
	}

	public function getDates()
	{
	    return array('created_at', 'updated_at', 'start_date', 'end_date');
	}

	/*
	|---------------------------------------------------------------------------
	| Getters and setters
	|---------------------------------------------------------------------------
	*/

	public function getDaysLeftAttribute()
	{
		return Carbon::now()->diffInDays($this->start_date);
	}

	public function getPercentageCompleteAttribute()
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

	public function getDaysLeftPhraseAttribute()
	{
		if($this->daysLeft === 0)
            return "Alleen vandaag nog!";

        return "Nog {$this->daysLeft} " . ($this->daysLeft  === 1 ? "dag" : "dagen") . "!";
	}

	public function getFormattedPaymentAttribute()
	{
		return number_format($this->payment, 2, ",", ".");
	}

	public function getJobcategoryClassnameAttribute()
	{
		return camel_case($this->jobcategory->label);
	}

	public function getLinkToDetailsAttribute()
	{
		return link_to_route('client.jobs.show', 'Bekijk Opdracht', array($this->id), array('class' => 'btn'));
	}

}