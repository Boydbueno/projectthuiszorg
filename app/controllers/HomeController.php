<?php

class HomeController extends BaseController {

	public function getIndex()
	{
		return View::make('home.index');
	}

	public function getContact()
	{
		return View::make('home.contact');
	}

	public function postContact()
	{
		
		//Get all input
		$input = Input::all();

		//Create validator instance
		$validator = Validator::make(
		    $input,
		    array(
		    	'first_name' => 'required',
		    	'last_name' => 'required',
	            'email' => 'required|email',
	            'text' => 'required'
	        )
		);

		if ($validator->fails()) return Redirect::back()->withErrors($validator)->withInput();

		Mail::send('emails.contact', $input, function($message)
		{
			$message->subject('Contact Formulier');
		    $message->to('stefanweck1@gmail.com', 'Stefan Weck');
		});

		return View::make('home.contact', array('message' => 'De mail is succesvol verzonden!'));

	}

	/**
	 * Displays the forgot password form
	 *
	 */
	public function forgot_password()
	{
	    return View::make('home.auth.password');
	}

	/**
	 * Attempt to send change password link to the given email
	 *
	 */
	public function do_forgot_password()
	{
	    if( Confide::forgotPassword( Input::get( 'email' ) ) )
	    {
	        $notice_msg = Lang::get('confide::confide.alerts.password_forgot');
	                    return Redirect::action('UserController@login')
	                        ->with( 'notice', $notice_msg );
	    }
	    else
	    {
	        $error_msg = Lang::get('confide::confide.alerts.wrong_password_forgot');
	                    return Redirect::action('UserController@forgot_password')
	                        ->withInput()
	            ->with( 'error', $error_msg );
	    }
	}

}