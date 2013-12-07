<article class="block marginTop floatFix {{ $job->jobcategory_classname }}">
    <header class="mainTitle floatFix">
        <h1 class="floatLeft">{{ $job->title }}</h1>
        <span class="subTitle floatRight">{{ $job->jobcategory->label }}</span>
    </header>
    <div class="progress">
        <div class="progressBar" style="width: {{ $job->percentage_complete }}%"></div>
    </div>
    <section class="description">
        <aside class="details floatRight">
            <ul>
                <li class="iconItem dateIcon bold">{{ $job->days_left_phrase }}</li>
                <li class="iconItem timeIcon">Starten</li>
                <li class="iconItem moneyIcon">€ {{ $job->formatted_payment }}</li>
            </ul>
            {{ $job->link_to_details }}
        </aside>
        <div class="information borderRight">
            <p>{{ $job->short_description }}</p>
        </div>
    </section>
</article>