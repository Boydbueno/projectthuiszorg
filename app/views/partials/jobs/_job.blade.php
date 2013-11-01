<article class="block marginTop">
    <header class="mainTitle floatFix">
        <h1 class="floatLeft">{{ $job->title }}</h1>
        <span class="subTitle floatRight">Fysiek Werk</span>
    </header>
    <div class="progress">
        <div class="progressBar"></div>
    </div>
    <aside class="description">
        <div class="information">
            <p>The Earth was small, light blue, and so touchingly alone, our home that must be defended like a holy relic. The Earth was absolutely round. I believe I never knew what the word round meant until I saw Earth from space. Where ignorance lurks, so too do the frontiers of discovery and imagination. Here men from the planet Earth first set foot upon the Moon. July 1969 AD. We came in peace for all mankind.</p>
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