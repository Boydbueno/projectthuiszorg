<?php namespace controllers\client;

class AuthController extends \BaseController {

	/**
	 * Show login form
	 */
	public function getLogin()
	{

		if( \Confide::user() )
        {
            // If user is logged, redirect to internal 
            // page, change it to '/admin', '/dashboard' or something
            return \Redirect::to('/client');
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
		    'email'    => Input::get( 'email' ), // May be the username too
		    'username' => Input::get( 'email' ), // so we have to pass both
		    'password' => Input::get( 'password' ),
		    'remember' => Input::get( 'remember' ),
		);

		// If you wish to only allow login from confirmed users, call logAttempt
		// with the second parameter as true.
		// logAttempt will check if the 'email' perhaps is the username.
		if ( \Confide::logAttempt( $input, true ) ) 
		{
		    return Redirect::intended('/client'); 
		}
		else
		{
		    $user = new User;

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

		                return Redirect::action('controllers\client\AuthController@getLogin')
		                    ->withInput(Input::except('password'))
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
		// TODO: Store part in the user table and part in the client table
		$input = \Input::all();

		$validator = \Validator::make($input, \User::$rules);

		if($validator->fails()) return \Redirect::back()->withInput()->withErrors($validator);

		$user = new \User();

		$user->email = $input['email'];
		$user->password = \Hash::make($input['password']);

		$user->save();

		return \Redirect::to('/client');
	}

}