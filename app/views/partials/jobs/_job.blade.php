<article class="block marginTop floatFix {{ camel_case($job->jobcategory->label) }}">
    <header class="mainTitle floatFix">
        <h1 class="floatLeft">{{ $job->title }}</h1>
        <span class="subTitle floatRight">{{ $job->jobcategory->label }}</span>
    </header>
    <div class="progress">
        <div class="progressBar"></div>
    </div>
    <section class="description">
        <aside class="details floatRight">
            <ul>
                <li>Nog 5 dagen!</li>
                <li>Gepauzeerd</li>
                <li>€{{ $job->payment }}</li>
            </ul>

            {{ link_to_route('jobs.show', 'Bekijk Opdracht', array($job->id), array('class' => 'btn')) }}
        </aside>
        <div class="information borderRight">
            <p>{{ $job->description }}</p>
        </div>
    </section>
</article>