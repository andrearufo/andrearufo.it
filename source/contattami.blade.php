@extends('_layouts.main')

@section('body')

    <h1 class="d-none">Contattami</h1>

    <div class="row row-cols-lg-3 gx-3 gy-5 text-center">
        @foreach ($page->contatti as $contatto)
            <div>

                <div class="fw-bold">
                    <i class="{{ $contatto['icona'] }} me-1"></i>
                    {{ $contatto['contatto'] }}
                </div>
                <div>
                    <a target="_blank" href="{{ $contatto['link'] }}">
                        {{ $contatto['label'] }}
                    </a>
                </div>

            </div>
        @endforeach
    </div>

@endsection
