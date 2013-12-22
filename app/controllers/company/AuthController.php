<?php namespace controllers\company;

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
            return \Redirect::to('/company');
        }
        else
        {
            return \View::make('company.auth.login');
        }
	}

	/**
	 * Logs in the user
	 */
	public function postLogin()
	{

		$input = array(
		    'email'    => \Input::get( 'email' ), // May be the username too
		    'username' => \Input::get( 'email' ), // so we have to pass both
		    'password' => \Input::get( 'password' ),
		    'remember' => \Input::get( 'remember' ),
		);

		// If you wish to only allow login from confirmed users, call logAttempt
		// with the second parameter as true.
		// logAttempt will check if the 'email' perhaps is the username.
		if ( \Confide::logAttempt( $input, true ) ) 
		{
		    return \Redirect::intended('/company'); 
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

		                return \Redirect::action('controllers\company\AuthController@getLogin')
		                    ->withInput(\Input::except('password'))
		        ->with( 'error', $err_msg );
		}

	}


	public function getRegister()
	{
		return \View::make('company.auth.register');
	}

}