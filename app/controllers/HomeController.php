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

}