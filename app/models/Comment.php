<?php

class Comment extends Eloquent {
	protected $guarded = array();
	public static $rules = array();

	public function job()
	{
		return $this->belongsTo('Job');
	}

	public function user()
	{
		return $this->belongsTo('User')->with('userInfo');
	}
}
