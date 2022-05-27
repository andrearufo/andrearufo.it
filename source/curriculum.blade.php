@php
    $page->title = 'Curriculum';
    $page->description = 'Le mie esperienze lavorative più interessanti da consulente per lo sviluppo di suoluzioni per il web.';
@endphp

@extends('_layouts.main')

@section('body')

    <h1>{{ $page->title }}</h1>

    @foreach ($page->curriculum as $item)

        <div class="mb-4">
            <div class="row">
                <div class="col-3 col-lg-1 border-lg-end pt-1">

                    <img src="/assets/images/curriculum/{{ $item['logo'] }}" alt="{{ $item['azienda'] }}" class="rounded">

                </div>
                <div class="col-12 col-lg">

                    <small class="text-muted d-block">
                        {{ $item['periodo'] }}
                    </small>
                    <h3 class="m-0">
                        <div>
                            {{ $item['posizione'] }}
                            @
                            <strong>
                                <a href="{{ $item['link'] }}" target="_blank">
                                    {{ $item['azienda'] }}
                                </a>
                            </strong>
                        </div>
                    </h3>
                    <h4 class="mt-0 fs-5">
                        ― {{ $item['luogo'] }}
                    </h4>

                    <div>{{ $item['content'] }}</div>

                </div>
            </div>
        </div>

    @endforeach

@endsection
