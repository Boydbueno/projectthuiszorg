<script id="jobsTemplate" type="text/x-handlebars-template">
    {{#each jobs}}
        <article class="block droppableJob marginTop floatFix {{ jobcategory_classname }}">
            <div class="droppableOverlay">
                <h1>Deze persoon uitnodigen voor {{ title }}</h1>
            </div>
            <div class="confirmOverlay">
                <h1>Wilt u <span id="droppableName"></span> uitnodigen voor {{ title }}?</h1>
                <a href="#" class="btn accept" rel="{{ id }}">Ja, uitnodigen!</a><a href="#" class="btn grey cancel">Nee, helaas!</a>
            </div>
            <header class="mainTitle floatFix">
                <h1 class="floatLeft">{{ title }}</h1>
                <span class="subTitle floatRight">{{ category }}</span>
            </header>
            <div class="progress">
                <div class="progressBar" style="width: {{ percentage_complete }}%"></div>
                <div class="progressDescription">
                    Nog {{ amount_left }} {{ postfix }}
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
    {{else}}
        <article class="block marginTop floatFix">
            <header class="mainTitle"><h1>Er zijn opdrachten gevonden.</h1></header>
        </article>
    {{/each}}
</script>