<?php namespace controllers\client;

class AuthController extends \BaseController {

	/**
	 * Show login form
	 */
	public function getLogin()
	{

		if( \Confide::user() )
		{

			if(\Confide::user()->hasRole("Client") || \Confide::user()->hasRole("Administrator")){
				
				// If user is logged, redirect to internal 
				return \Redirect::to('/client')->with('notice', 'Login Succeeded');

			}elseif(\Confide::user()->hasRole("Company")){
				
				return \View::make('client.auth.login');

			}
		
		}
		else
		{
			return \View::make('client.auth.login');
		}
		
	}

	/**
	 * Logs in the user
	 */
	public function postLogin()
	{

		$input = array(
			'email'	=> \Input::get( 'email' ), 
			'password' => \Input::get( 'password' ),
			'remember' => \Input::get( 'remember' ),
		);

		// If you wish to only allow login from confirmed users, call logAttempt
		// with the second parameter as true.
		// logAttempt will check if the 'email' perhaps is the username.
		if ( \Confide::logAttempt( $input, true ) ) 
		{
			return \Redirect::intended('/client')->with('notice', 'Login Succeeded');
		}
		else
		{
			$user = new \User;

			// Check if there was too many login attempts
			if( \Confide::isThrottled( $input ) )
			{
				$err_msg = \Lang::get('confide::confide.alerts.too_many_attempts');
			}
			elseif( $user->checkUserExists( $input ) and ! $user->isConfirmed( $input ) )
			{
				$err_msg = \Lang::get('confide::confide.alerts.not_confirmed');
			}
			else
			{
				$err_msg = \Lang::get('confide::confide.alerts.wrong_credentials');
			}

				return \Redirect::action('controllers\client\AuthController@getLogin')
					->withInput(\Input::except('password'))
					->with( 'error', $err_msg );
		}

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
		$user = new \User;

		$user->email = \Input::get( 'email' );
		$user->password = \Input::get( 'password' );

		// The password confirmation will be removed from model
		// before saving. This field will be used in Ardent's
		// auto validation.
		$user->password_confirmation = \Input::get( 'password_confirmation' );

		// Save if valid. Password field will be hashed before save
		$user->save();

		if ( $user->id )
		{
			//Assign the client role to this person
			$roleId = \Role::where('name', '=', 'Client')->first()->id;
			$user->attachRole($roleId);

			// Redirect with success message, You may replace "Lang::get(..." for your custom message.
			return \Redirect::action('controllers\client\AuthController@getLogin')
				->with( 'notice', \Lang::get('confide::confide.alerts.account_created') );
		}
		else
		{
			// Get validation errors (see Ardent package)
			$error = $user->errors()->all(':message');

			return \Redirect::action('controllers\client\AuthController@getRegister')
				->withInput(\Input::except('password'))
				->with( 'error', $error );

		}

	}

}