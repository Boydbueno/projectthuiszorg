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
                <li class="iconItem dateIcon bold">Nog 5 dagen!</li>
                <li class="iconItem timeIcon">Starten</li>
                <li class="iconItem moneyIcon">€ {{ $job->payment }},00</li>
            </ul>

            {{ link_to_route('jobs.show', 'Bekijk Opdracht', array($job->id), array('class' => 'btn')) }}
        </aside>
        <div class="information borderRight">
            <p>{{ $job->description }}</p>
        </div>
    </section>
</article>