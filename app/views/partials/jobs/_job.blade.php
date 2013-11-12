<article class="block marginTop floatFix {{ camel_case($job->jobcategory->label) }}">
    <header class="mainTitle floatFix">
        <h1 class="floatLeft">{{ $job->title }}</h1>
        <span class="subTitle floatRight">{{ $job->jobcategory->label }}</span>
    </header>
    <div class="progress">
        <div class="progressBar"></div>
    </div>
    <aside class="description">
        <div class="details floatRight">
            <ul>
                <li>Nog 5 dagen!</li>
                <li>Gepauzeerd</li>
                <li>€{{ $job->payment }}</li>
            </ul>

            {{ link_to_route('jobs.show', 'Bekijk Opdracht', array($job->id), array('class' => 'btn')) }}
        </div>
        <div class="information borderRight">
            <p>{{ $job->description }}</p>
        </div>
    </aside>
</article>