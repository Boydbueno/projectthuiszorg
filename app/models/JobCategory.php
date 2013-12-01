<?php

class Jobcategory extends Eloquent {
	protected $guarded = array();

	public static $rules = array();

	public function jobs()
	{
		return $this->hasMany('Job');
	}
}