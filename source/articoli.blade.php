@php
    $page->title = 'Articoli';
    $page->description = 'Una lista di articoli tecnici di approfondimento su questioni riguardo il web, lo sviluppo, il design e la tecnologia.';
@endphp

@extends('_layouts.main')

@section('body')

    <h1>{{ $page->title }}</h1>
    <h2>Articoli di approfondimento e informazione</h2>

    <p>Ecco una lista di {{ $articoli->count() }} articoli che ho scritto negli ultimi anni.</p>

        @php
            $year = false
        @endphp

        @foreach ($articoli as $item)

            @php
                if($year != date('Y', $item->created_at)){
                    $year = date('Y', $item->created_at);
                    echo '<h3 class="ps-2">'.$year.'</h3>';
                }
            @endphp

            <article>
                <div class="row align-items-end gx-1 mb-3 mb-md-1">
                    <div class="col-12 col-md-auto">
                        <a href="{{ $item->getPath() }}">
                            {{ $item->title }}
                        </a>
                    </div>
                    <div class="col d-none d-md-flex"><div class="spacerline"></div></div>
                    <div class="col-12 col-md-auto text-md-end">
                        {{ $page->formatdate($item->created_at) }}
                    </div>
                </div>
            </article>

        @endforeach

@endsection
