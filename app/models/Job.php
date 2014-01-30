<?php

use \Carbon\Carbon;

class Job extends Eloquent {

	protected $guarded = array();

	protected $appends = array(
		'category',
		'jobstatus', // status is reserved
		'percentage_complete',
		'amount_left',
		'days_left_phrase',
		'formatted_payment',
		'jobcategory_classname',
		'link_to_details',
		'link_to_edit'
	);
	
	public static $rules = array();

	public function getDates()
	{
	    return array('created_at', 'updated_at', 'start_date', 'end_date');
	}

	/*
	|---------------------------------------------------------------------------
	| Query scopes
	|---------------------------------------------------------------------------
	*/

	public function scopeNotExpired($query)
	{
		return $query->where('start_date', '>', new DateTime('today'));
	}

	/*
	|---------------------------------------------------------------------------
	| Functions
	|---------------------------------------------------------------------------
	*/

	public function differenceInDates($dateToCompare)
	{
		return Carbon::now()->diffInDays($this->start_date);
	}

	/*
	|---------------------------------------------------------------------------
	| Relationships
	|---------------------------------------------------------------------------
	*/

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
		return $this->belongsTo('Status');
	}

	public function users()
	{
		return $this->belongsToMany('User')->withPivot('amount');
	}

	/*
	|---------------------------------------------------------------------------
	| Getters and setters
	|---------------------------------------------------------------------------
	*/

	public function getIsStartedAttribute()
	{
		return ($this->status->label == 'Gestart');
	}

	public function getIsOpenAttribute()
	{
		return ($this->status->label == 'Open');
	}

	public function getCategoryAttribute()
	{
		return $this->jobcategory->label;
	}

	public function getJobStatusAttribute() // status is reserved
	{
		return $this->status->label;
	}

	public function getAmountLeftAttribute()
	{
		$totalAmount = \JobUser::where('job_id','=',$this->id)->sum('amount');

		return $this->amount - $totalAmount;
	}

	public function getPercentageCompleteAttribute()
	{
		//Get all the contributors to this job
		$totalAmount = \JobUser::where('job_id','=',$this->id)->sum('amount');

		//Return the percentage
		return ($totalAmount / $this->amount) * 100;
	}

	public function getDaysLeftPhraseAttribute()
	{
		if($this->start_date >= new \DateTime('today')){
			if($this->differenceInDates($this->start_date) === 0){
	            return "Alleen vandaag nog!";
			}

	        return "Nog {$this->differenceInDates($this->start_date)} " . ($this->differenceInDates($this->start_date)  === 1 ? "dag" : "dagen") . "!";
	    }else{
	    	if($this->differenceInDates($this->end_date) === 0){
	            return "Uiterlijk vandaag opleveren!";
	    	}

	        return "Opleveren over {$this->differenceInDates($this->end_date)} " . ($this->differenceInDates($this->end_date)  === 1 ? "dag" : "dagen") . "!";
	    }
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

	public function getLinkToEditAttribute()
	{
		return link_to_route('client.jobs.edit', 'Beheer opdracht', array($this->id), array('class' => 'btn'));
	}

}