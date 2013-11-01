<article class="job">
    <h2>{{ $job->title }}</h2>
    <div class="progress">
        <div class="finished"></div>
    </div>
    <aside class="information">
        <ul>
            <li>Nog 5 dagen!</li>
            <li>Gepauzeerd</li>
            <li>€{{ $job->payment }}</li>
        </ul>

        {{ link_to_route('jobs.show', 'Bekijk Opdracht', array($job->id), array('class' => 'btn')) }}
    </aside>
</article>