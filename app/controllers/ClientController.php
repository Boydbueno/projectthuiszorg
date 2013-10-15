<?php

class ClientController extends BaseController {

	public function getIndex()
	{
		return View::make('client.index');
	}

	public function getRegister()
	{
		return View::make('client.register');
	}

	public function postIndex()
	{

		//Get all input
		$input = Input::all();

		//Create validator instance
		$validator = Validator::make(
		    $input,
		    array(
	            'email' => 'required|email',
	            'password' => 'required'
	        )
		);

		if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

		//Validation succeeds
		$input = Input::all();

		$attempt = Auth::attempt(array(
			'email' => $input['email'],
			'password' => $input['password']
		));

		if($attempt) return Redirect::intended('/clients')->with('notice', 'You have been logged in!');

		return Redirect::back()->with('notice', 'Invalid credentials')->withInput();

	}

}