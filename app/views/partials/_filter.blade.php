<section class="block marginTop mainTitle">
    {{ Form::select('jobcategory', $jobcategories, null, array('id' => 'jobcategoryDropdown')) }}
    <select>
        <option value="">Status</option>
        <option value="fysiek">Starten</option>
        <option value="adviserend">Gepauzeerd</option>
        <option value="handarbeid">Voltooid</option>
    </select>
    <select>
        <option value="">Beschikbaarheid</option>
        <option value="fysiek">Meer dan 20%</option>
        <option value="adviserend">Meer dan 50%</option>
        <option value="handarbeid">Meer dan 70%</option>
        <option value="technisch">Volledig</option>
    </select>
</section>