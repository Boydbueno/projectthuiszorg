<script id="jobsTemplate" type="text/x-handlebars-template">
    {{#each jobs}}
        <article class="block marginTop floatFix">
            <header class="mainTitle floatFix">
                <h1 class="floatLeft">{{ title }}</h1>
                <span class="subTitle floatRight"></span>
            </header>
            <div class="progress">
                <div class="progressBar"></div>
            </div>
            <section class="description">
                <aside class="details floatRight">
                    <ul>

                        <li class="iconItem timeIcon">Starten</li>

                    </ul>
                </aside>
                <div class="information borderRight">
                    <p>{{ short_description }}</p>
                </div>
            </section>
        </article>
    {{/each}}
</script>