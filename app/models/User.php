<?php

use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	/**
	 * The database table used by the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array('password');

	/**
	 * Rules for validation
	 * 
	 * @var array
	 */
	public static $rules = array(
		'email' => 'required|unique:users|email',
		'password' => 'required|min:6|confirmed',
		'house_number' => 'alpha_num',
		'zipcode' => 'alpha_num'
	);

	public function jobs()
	{
		return $this->belongsToMany('Job');
	}

	/**
	 * Get the unique identifier for the user.
	 *
	 * @return mixed
	 */
	public function getAuthIdentifier()
	{
		return $this->getKey();
	}

	/**
	 * Get the password for the user.
	 *
	 * @return string
	 */
	public function getAuthPassword()
	{
		return $this->password;
	}

	/**
	 * Get the e-mail address where password reminders are sent.
	 *
	 * @return string
	 */
	public function getReminderEmail()
	{
		return $this->email;
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