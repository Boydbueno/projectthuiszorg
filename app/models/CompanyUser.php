<?php

class CompanyUser extends Eloquent {

	protected $table = 'company_user';
	protected $guarded = array();

	public $timestamps = false;
	public static $rules = array();

	public function company()
	{
		return $this->belongsTo('Company');
	}

	public function user()
	{
		return $this->belongsTo('User');
	}

}
