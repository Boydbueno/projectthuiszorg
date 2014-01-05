<article class="block marginTop floatFix {{ $job->jobcategory_classname }}">
    <header class="mainTitle floatFix">
        <h1 class="floatLeft">{{ $job->title }}</h1>
        <span class="subTitle floatRight">{{ $job->category }}</span>
    </header>
    <div class="progress">
        <div class="progressBar" style="width: {{ $job->percentage_complete }}%"></div>
    </div>
    <section class="description">
        <aside class="details floatRight">
            <ul>
                <li class="iconItem dateIcon bold">{{ $job->days_left_phrase }}</li>
                <li class="iconItem timeIcon">{{ $job->status->label }}</li>
                <li class="iconItem moneyIcon">€ {{ $job->formatted_payment }}</li>
            </ul>
            {{ link_to_route('client.jobs.edit', 'Bekijk Opdracht', ['id' => 1], ['class' => 'btn'])}}
        </aside>
        <div class="information borderRight">
            <p>{{ $job->short_description }}</p>
        </div>
    </section>
</article>