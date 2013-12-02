<?php

class ClientsController extends \BaseController {

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
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