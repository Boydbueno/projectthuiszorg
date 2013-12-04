<?php namespace controllers\client;

class SettingsController extends \BaseController {

	/**
	 * Show login form
	 */
	public function getSettings()
	{
		return \View::make('client.settings');
	}

	/**
	 * Register a new user in the database
	 *
	 * @return Redirect
	 */
	public function postSettings()
	{
		// TODO: Store part in the user table and part in the client table
		$input = \Input::all();

		$validator = \Validator::make($input, \User::$rules);

		if($validator->fails()) return \Redirect::back()->withInput()->withErrors($validator);

		$user = new \User();

		$user->email = $input['email'];
		$user->password = \Hash::make($input['password']);
		$user->first_name = $input['first_name'];
		$user->last_name = $input['last_name'];
		$user->street_name = $input['street_name'];
		$user->house_number = $input['house_number'];
		$user->zipcode = $input['zipcode'];
		$user->city = $input['city'];

		$user->save();

		return \Redirect::to('/client');
	}

}