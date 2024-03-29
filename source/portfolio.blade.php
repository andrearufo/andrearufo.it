@php
    $page->title = 'Portfolio';
    $page->description = 'Una raccolta dei miei lavori più interessanti in ambito webdesign, sviluppo siti web e applicazioni.';
@endphp

@extends('_layouts.main')

@section('body')

    <h1>{{ $page->title }}</h1>

    <div class="row row-cols-lg-2 row-cols-1 gx-lg-3 gy-5">
        @foreach ($portfolio as $item)
            @if (!$item->minore)

                <div>

                    <a class="d-block mb-1 border-0" href="{{ $item->getPath() }}">
                        <img src="/assets/images/portfolio/{{ $item->image }}" class="w-100">
                    </a>
                    <small class="d-block text-muted">{{ $item->anno }}, per {{ $item->cliente }}</small>
                    <h4 class="mt-1 mb-0">{{ $item->title }}</h4>
                    <a href="{{ $item->getPath() }}">
                        {{ $item->label }}
                        <i class="fa-light fa-arrow-up-right ms-1"></i>
                    </a>

                </div>

            @endif
        @endforeach
    </div>

    {{-- lavori minori --}}

    <hr>

    <h2>Altri lavori interessanti</h2>

    <ul>
        @foreach ($portfolio as $item)
            @if ($item->minore)

                <li>
                    {{ $item->anno }}, per {{ $item->cliente }}:
                    <a href="{{ $item->getPath() }}">
                        {{ $item->title }}
                    </a>
                </li>

            @endif
        @endforeach
    </ul>

@endsection
