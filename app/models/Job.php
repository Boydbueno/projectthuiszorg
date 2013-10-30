<?php

class Job extends Eloquent {
	public function jobcategory()
	{
		return $this->belongsToMany('Jobcategory');
	}
}