@php
    $page->title = 'Ciao!';
    $page->description = 'Sito web e portofolio di Andrea Rufo, full stack web developer. Programmazione di siti web e applicazioni. Specializzato in Larave, Vue, PWA, WordPress e webdesign.';
@endphp

@extends('_layouts.main')

@section('body')

<h1>{{ $page->title }}</h1>
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

    <div class="row align-items-center">
        <div class="col-lg">

            <h3 class="mt-3 mb-lg-3">Portfolio</h3>

        </div>
        <div class="col-lg text-lg-end">

            <div class="my-lg-3">
                <a href="{{ $page->baseUrl }}/portfolio">
                    Tutti i lavori
                    <i class="fa-light fa-arrow-up-right ms-2"></i>
                </a>
            </div>

        </div>
    </div>

    <ul class="list-unstyled mb-3">
        @foreach ($portfolio->take(6) as $item)
            <li>
                <article>
                    <div class="row align-items-end gx-1 mb-3 mb-md-1">
                        <div class="col-12 col-md-auto">
                            <a href="{{ $item->getPath() }}">{{ $item->title }}</a> <span class="text-muted">per {{ $item->cliente }}</span>
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

    <div class="row align-items-center">
        <div class="col-lg">

            <h3 class="mt-3 mb-lg-3">Articoli</h3>

        </div>
        <div class="col-lg text-lg-end">

            <div class="my-lg-3">
                <a href="{{ $page->baseUrl }}/articoli">
                    Tutti gli articoli
                    <i class="fa-light fa-arrow-up-right ms-2"></i>
                </a>
            </div>

        </div>
    </div>

    <ul class="list-unstyled mb-3">
        @foreach ($articoli->take(6) as $item)
            <li>
                <article>
                    <div class="row align-items-end gx-1 mb-3 mb-md-1">
                        <div class="col-12 col-md-auto">
                            <a href="{{ $item->getPath() }}">{{ $item->title }}</a>
                        </div>
                        <div class="col d-none d-md-flex"><div class="spacerline"></div></div>
                        <div class="col-12 col-md-auto text-md-end">
                            {{ $page->formatdate($item->created_at) }}
                        </div>
                    </div>
                </article>
            </li>
        @endforeach
    </ul>

</section>

@endsection
