<?php

class JobUser extends Eloquent {

	protected $table = 'job_user';
	protected $guarded = array();

	public $timestamps = false;
	public static $rules = array();

	public function company()
	{
		return $this->belongsTo('Job');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

}
