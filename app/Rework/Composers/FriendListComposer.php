<?php namespace Rework\Composers;

class FriendListComposer {

	public function compose($view)
	{
		$view->with('friends', \Auth::user()->friendList());
	}

}