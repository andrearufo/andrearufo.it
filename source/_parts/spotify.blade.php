
<section id="home-spotify" class="mt-5">
    <hr>

    <ul class="list-inline mb-0 mt-5">
        <tempalte v-if="play">

            <li class="list-inline-item">
                <i class="fa-brands fa-spotify" style="color: #1DB954"></i>
            </li>
            <li class="list-inline-item fw-bold">
                @{{ play.artist }}
            </li>
            <li class="list-inline-item">
                @{{ play.title }}
            </li>
            <li class="list-inline-item text-muted">
                (@{{ play.year }})
            </li>
            <li class="list-inline-item">
                <a v-bind:href="play.link" target="_blank">
                    <i class="fa-light fa-arrow-up-right"></i>
                </a>
            </li>

        </tempalte>
        <template v-else>

            <li class="list-inline-item">
                <i class="fa-brands fa-spotify text-muted"></i>
            </li>
            <li class="list-inline-item fst-italic">
                Niente in riproduzione per ora...
            </li>

        </template>
    </ul>
</section>
