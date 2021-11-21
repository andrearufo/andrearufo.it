@extends('_layouts.main')

@section('body')

    <h1>Articoli</h1>
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
                        {{ date('j M Y', $item->created_at) }}
                    </div>
                </div>
            </article>
        @endforeach
    </ul>

@endsection
