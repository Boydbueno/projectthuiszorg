<?php

class Progress extends Eloquent{

	protected $table = "progress";

	public function job()
	{
		$this->belongsTo('jobs');
	}

	public function user()
	{
		$this->belongsTo('users');
	}

}