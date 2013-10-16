<?php

class Job extends Eloquent {
	public function jobCategory()
	{
		return $this->belongsToMany('JobCategory');
	}
}