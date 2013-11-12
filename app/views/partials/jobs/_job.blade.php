<article class="block marginTop {{ $job->jobcategory->label }}">
    <header class="mainTitle floatFix">
        <h1 class="floatLeft">{{ $job->title }}</h1>
        <span class="subTitle floatRight">{{ $job->jobcategory->label }}</span>
    </header>
    <div class="progress">
        <div class="progressBar"></div>
    </div>
    <aside class="description">
        <div class="information">
            <p>{{ $job->description }}</p>
        </div>
        <div class="details">
            <ul>
                <li>Nog 5 dagen!</li>
                <li>Gepauzeerd</li>
                <li>€{{ $job->payment }}</li>
            </ul>

            {{ link_to_route('jobs.show', 'Bekijk Opdracht', array($job->id), array('class' => 'btn')) }}
        </div>
    </aside>
</article>