<?php

class CompanyController extends BaseController {

	public function getIndex()
	{
		return View::make('company.index');
	}

}