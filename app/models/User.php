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

	//Users have a role!
	use HasRole;

	public function jobs()
	{
		return $this->belongsToMany('Job');
	}

    public function userInfo()
    {
        return $this->hasOne('UserInfo', 'user_id');
    }

    public function friendList()
    {
        $first = DB::table('friend_list')
                    ->where('user_id', '=', $this->attributes["id"])
                    ->select('friend_id');
        return DB::table('friend_list')
                    ->where('friend_id', '=', $this->attributes["id"])
                    ->select('user_id')->union($first)
                    ->get();
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
    	foreach($this->userInfo->attributes as $key => $value) {

    		//If a value is not filled in, add it to the array
    		if($value === ""){
    			array_push($emptyFields, $key);
    	   }

    	}

    	return $emptyFields;

    }

}