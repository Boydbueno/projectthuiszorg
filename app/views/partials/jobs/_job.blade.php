<article class="block marginTop floatFix {{ camel_case($job->jobcategory->label) }}">
    <header class="mainTitle floatFix">
        <h1 class="floatLeft">{{ $job->title }}</h1>
        <span class="subTitle floatRight">{{ $job->jobcategory->label }}</span>
    </header>
    <div class="progress">
        <div class="progressBar" style="width: {{ $job->percentageComplete }}%"></div>
    </div>
    <section class="description">
        <aside class="details floatRight">
            <ul>
                <li class="iconItem dateIcon bold">
                    @if($job->daysLeft() === 0)
                        Alleen vandaag nog!
                    @else
                        Nog {{ $job->daysLeft() }} {{ $job->daysLeft()  === 1 ? "dag" : "dagen" }}!
                    @endif
                </li>
                <li class="iconItem timeIcon">Starten</li>
                <li class="iconItem moneyIcon">€ {{ number_format($job->payment, 2, ",", ".") }}</li>
            </ul>

            {{ link_to_route('client.jobs.show', 'Bekijk Opdracht', array($job->id), array('class' => 'btn')) }}
        </aside>
        <div class="information borderRight">
            <p>{{ $job->short_description }}</p>
        </div>
    </section>
</article>