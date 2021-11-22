@extends('_layouts.main')

@section('body')

    <h1>Curriculum</h1>

    @foreach ($page->curriculum as $item)

        <div class="mb-4">
            <div class="row">
                <div class="col-3 col-lg-1 border-lg-end pt-1">

                    <img src="/assets/images/curriculum/{{ $item['logo'] }}" alt="{{ $item['azienda'] }}" class="rounded">

                </div>
                <div class="col-12 col-lg">

                    <small class="text-muted">
                        {{ $item['periodo'] }}
                    </small>
                    <h6 class="mt-0">
                        {{ $item['posizione'] }}
                        @
                        <strong>
                            <a href="{{ $item['link'] }}" target="_blank">
                                {{ $item['azienda'] }}
                            </a>
                        </strong>
                        ―
                        {{ $item['luogo'] }}
                    </h6>

                    <div>{{ $item['content'] }}</div>

                </div>
            </div>
        </div>

    @endforeach

@endsection
