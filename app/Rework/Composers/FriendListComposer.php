<?php namespace Rework\Composers;

class FriendListComposer {

	public function compose($view)
	{

		$friendList = array();
		$friends = \Auth::user()->friendList();

		foreach ($friends as $friend) {
			array_push($friends, \User::find($friend->user_id));
		}

		$view->with('friends', $friendList);
	}

}