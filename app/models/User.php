<?php

use Zizaco\Confide\ConfideUser;
use Zizaco\Entrust\HasRole;

class User extends ConfideUser{

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	public static $rules = array(
		'email' => 'required|email',
		'password' => 'required|between:4,11|confirmed',
	);

	//User have a role!
	use HasRole;

	public function jobs()
	{
		return $this->belongsToMany('Job');
	}

	/**
	 * Get the fist name for the user
	 *
	 * @return string
	 */
	public function getFirstNameAttribute($value)
    {
    	if($value === ""){
    		return "Rework";
    	}else{
    		return ucfirst($value);
    	}
    }

    /**
	 * Get the fist name for the user
	 *
	 * @return string
	 */
	public function getLastNameAttribute($value)
    {
    	if($value === ""){
    		return "Gebruiker";
    	}else{
    		return ucfirst($value);
    	}
    }

    /**
     * Function to check which personal details aren't set
     *
     * @return array
     */
    public function checkPersonalDetails(){

    	$emptyFields = [];

    	//Loop through the attributes of this user
    	foreach($this->attributes as $key => $value) {

    		//If a value is not filled in, add it to the array
    		if($value === ""){
    			array_push($emptyFields, $key);
    	    }

    	}

    	return $emptyFields;

    }

}