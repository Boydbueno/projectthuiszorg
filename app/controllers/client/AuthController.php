<?php namespace controllers\client;

class AuthController extends \BaseController {

	public function getLogin()
	{
		return \View::make('client.auth.login');
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

		if($attempt) return \Redirect::intended('/clients')->with('notice', 'You have been logged in!');

		return \Redirect::back()->with('notice', 'Invalid credentials')->withInput();

	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function getLogout()
	{
		\Auth::logout();
		return \Redirect::to('/');
	}
	
}