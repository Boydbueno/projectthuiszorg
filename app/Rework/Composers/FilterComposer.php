<?php namespace Rework\Composers;

class FilterComposer {

	public function compose($view)
	{
		$dropdownPlaceholder = array('' => 'Categorie');
		$jobcategories = $dropdownPlaceholder + \Jobcategory::lists('label', 'id');

		$jobavailability = [
			'' => 'Beschikbaarheid',
			'20' => 'Meer dan 20%',
			'50' => 'Meer dan 50%',
			'70' => 'Meer dan 70%',
			'100' => 'Volledig'
		];

		$view->with('jobcategories', $jobcategories)->with('jobavailability', $jobavailability);
	}

}