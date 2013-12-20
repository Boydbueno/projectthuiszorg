<?php namespace controllers\client;

class AuthController extends \BaseController {

	/**
	 * Show login form
	 */
	public function getLogin()
	{
		return \View::make('client.auth.login');
	}

	/**
	 * Logs in the user
	 */
	public function postLogin()
	{

		//Get all input
		$input = \Input::all();

		//Create validator instance
		$validator = \Validator::make(
		    $input,
		    array(
	            'email' => 'required|email',
	            'password' => 'required'
	        )
		);

		if ($validator->fails()) return \Redirect::back()->withErrors($validator)->withInput();

		$attempt = \Auth::attempt(array(
			'email' => $input['email'],
			'password' => $input['password']
		));

		if(!$attempt) return \Redirect::back()->with('notice', 'Invalid credentials')->withInput();

		return \Redirect::intended('/clients')->with('notice', 'You have been logged in!');
	}

	/**
	 * Logs out the current user
	 */
	public function getLogout()
	{
		\Auth::logout();
		return \Redirect::to('/');
	}

	/**
	 * Show the registration form
	 */
	public function getRegister()
	{
		return \View::make('client.auth.register');
	}

	/**
	 * Register a new user in the database
	 *
	 * @return Redirect
	 */
	public function postRegister()
	{
		// TODO: Store part in the user table and part in the client table
		$input = \Input::all();

		$validator = \Validator::make($input, \User::$rules);

		if($validator->fails()) return \Redirect::back()->withInput()->withErrors($validator);

		$user = new \User();

		$user->email = $input['email'];
		$user->password = \Hash::make($input['password']);

		$user->save();

		return \Redirect::to('/client');
	}

}