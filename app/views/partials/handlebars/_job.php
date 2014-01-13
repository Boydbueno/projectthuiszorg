<script id="jobsTemplate" type="text/x-handlebars-template">
    {{#each jobs}}
        <article class="block marginTop floatFix {{ jobcategory_classname }}">
            <header class="mainTitle floatFix">
                <h1 class="floatLeft">{{ title }}</h1>
                <span class="subTitle floatRight">{{ category }}</span>
            </header>
            <div class="progress">
                <div class="progressBar" style="width: {{ percentage_complete }}%"></div>
                <div class="progressDescription">
                    Nog {{ job.amount_left }} {{ job.postfix }}
                </div>
            </div>
            <section class="description">
                <aside class="details floatRight">
                    <ul>
                        <li class="iconItem dateIcon bold">{{ days_left_phrase }}</li>
                        <li class="iconItem timeIcon">{{ jobstatus }}</li>
                        <li class="iconItem moneyIcon">€ {{ formatted_payment }}</li>
                    </ul>
                    {{{ link_to_details }}}
                </aside>
                <div class="information borderRight">
                    <p>{{ short_description }}</p>
                </div>
            </section>
        </article>
    {{/each}}
</script>