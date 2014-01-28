<?php namespace controllers\client;

use User;

class FriendListController extends \BaseController {

	/**
	 * Show friendlist
	 */
	public function getFriendList()
	{
		return \View::make('client.friendlist');
	}

}