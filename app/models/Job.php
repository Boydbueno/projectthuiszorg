<?php

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
}