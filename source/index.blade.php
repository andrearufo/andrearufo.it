@extends('_layouts.main')

@section('body')

<h1>Salve!</h1>
<h2>Io sono Andrea Rufo e sono uno sviluppatore.</h2>

<p>
    Per la precisione sono un <strong>full stack web developer</strong>.
    Il che è solo una maniera un po’ più complicata e <em>cool</em>
    per dire che sono uno programmatore e mi occupo di programmazione di
    <strong>siti web</strong> e <strong>applicazioni</strong>.
</p>
<p>
    Per lo più su piattaforma <strong>Laravel</strong> o <strong>WordPress</strong>.
    Sono uno specialista del front-end e nei miei lavori uso SCSS, Bootstrap e Gulp,
    Webpack e Vue.js o jQuery. Ma ovviamente anche tanto PHP, MySQL, CSS, LESS, HTML,
    Lodash, SQLite e Javascript… E tante altre cose.
</p>
<p>
    Vivo e lavoro tra Sermoneta, Latina, Roma e Pisa. Ho avuto la fortuna di collaborare
    con con molte agenzie, aziende e professionisti in tutta Italia ed Europa.
</p>
<p>
    Nel <strong>2021</strong> ho fondato il mio <strong><a href="https://axio.studio/" target="_blank">Axio Studio</a></strong>
    e offro servizi di progettazione, programmazione e consulenza di alto livello.
</p>

<section id="home-portfolio" class="mt-5">

    <hr>

    <h3>
        <a href="{{ $page->baseUrl }}/portfolio">Portfolio</a>
    </h3>

    <ul class="list-unstyled mb-3">
        @foreach ($portfolio->take(6) as $item)
            <li>
                <article>
                    <div class="row align-items-end gx-1 mb-3 mb-md-1">
                        <div class="col-12 col-md-auto">
                            <a href="{{ $item->getPath() }}>">
                                {{ $item->title }}
                            </a>
                            <span class="text-muted">per {{ $item->cliente }}</span>
                        </div>
                        <div class="col d-none d-md-flex"><div class="spacerline"></div></div>
                        <div class="col-12 col-md-auto text-md-end">
                            {{ $item->anno }}
                        </div>
                    </div>
                </article>
            </li>
        @endforeach
    </ul>

</section>

<section id="home-articoli" class="mt-5">

    <hr>

    <h3>
        <a href="{{ $page->baseUrl }}/articoli">Articoli</a>
    </h3>

    <ul class="list-unstyled mb-3">
        @foreach ($articoli->take(6) as $item)
            <li>
                <article>
                    <div class="row align-items-end gx-1 mb-3 mb-md-1">
                        <div class="col-12 col-md-auto">
                            <a href="{{ $item->getPath() }}">
                                {{ $item->title }}
                            </a>
                        </div>
                        <div class="col d-none d-md-flex"><div class="spacerline"></div></div>
                        <div class="col-12 col-md-auto text-md-end">
                            {{ date('j M Y', $page->created_at) }}
                        </div>
                    </div>
                </article>
            </li>
        @endforeach
    </ul>

</section>

@endsection
