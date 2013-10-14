<?php

class ClientController extends BaseController {

	public function showIndex()
	{
		return View::make('client/index');
	}

}