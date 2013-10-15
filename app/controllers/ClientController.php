<?php

class ClientController extends BaseController {

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getIndex()
	{
		return View::make('client.index');
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getRegister()
	{
		return View::make('client.register');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
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