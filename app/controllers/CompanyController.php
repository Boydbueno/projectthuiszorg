<?php

class CompanyController extends BaseController {

	public function showIndex()
	{
		return View::make('company.index');
	}

}