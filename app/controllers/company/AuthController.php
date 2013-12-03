<?php namespace controllers\company;

class AuthController extends \BaseController {

	public function getLogin()
	{
		return \View::make('company.auth.login');
	}

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

		if($attempt) return \Redirect::intended('/opdrachtgever')->with('notice', 'You have been logged in!');

		return \Redirect::back()->with('notice', 'Invalid credentials')->withInput();

	}


	public function getRegister()
	{
		return \View::make('company.auth.register');
	}

}