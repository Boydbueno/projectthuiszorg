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
		'first_name' => 'required',
		'last_name' => 'required',
		'street_name' => 'required',
		'house_number' => 'required|alpha_num',
		'zipcode' => 'required|alpha_num',
		'city' => 'required'
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

}