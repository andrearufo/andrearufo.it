@extends('_layouts.main')

@section('body')

<h1>Portfolio</h1>

<div class="row row-cols-lg-2 gx-3 gy-5">
    @foreach ($portfolio as $item)
        @if (!$item->minore)

            <div>

                <a class="d-block mb-1" href="{{ $item->getPath() }}">
                    <img src="/assets/images/portfolio/{{ $item->image }}" class="w-100">
                </a>
                <small class="d-block text-muted">{{ $item->anno }}, per {{ $item->cliente }}</small>
                <h4 class="mt-1 mb-0">{{ $item->title }}</h4>
                <a href="{{ $item->getPath() }}">{{ $item->label }}</a>

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
