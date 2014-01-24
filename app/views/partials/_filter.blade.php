<section class="block marginTop mainTitle">
    {{ Form::select('jobcategory', $jobcategories, null, ['id' => 'js-jobcategoryDropdown']) }}
    {{ Form::select('jobavailability', $jobavailability, null, ['id' => 'js-jobAvailabilityDropdown']) }}
</section>