<?php

class ClientController extends BaseController {

	public function getIndex()
	{
		return View::make('client.index');
	}

	public function getMyjobs() 
	{
		$jobs = Auth::user()->jobs;

		return View::make('client.myjobs')->with('jobs', $jobs);
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

		$attempt = Auth::attempt(array(
			'email' => $input['email'],
			'password' => $input['password']
		));

		if($attempt) return Redirect::intended('/clients')->with('notice', 'You have been logged in!');

		return Redirect::back()->with('notice', 'Invalid credentials')->withInput();

	}

		/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postRegister()
	{
		$input = Input::all();

		$validator = Validator::make($input, User::$rules);

		if($validator->fails()) return Redirect::back()->withInput()->withErrors($validator);

		$user = new User();

		$user->email = $input['email'];
		$user->password = Hash::make($input['password']);
		$user->first_name = $input['first_name'];
		$user->last_name = $input['last_name'];
		$user->street_name = $input['street_name'];
		$user->house_number = $input['house_number'];
		$user->zipcode = $input['zipcode'];
		$user->city = $input['city'];

		$user->save();

		return Redirect::to('/client');
	}

}