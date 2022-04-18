<!DOCTYPE html>
<html lang="{{ $page->language ?? 'it' }}">
<head>

    @include('_parts.meta')

</head>
<body>

    @include('_parts.header')

    <main class="py-3">
        <div class="container">

            <section class="{{ $page->getFilename() }}">

                <div class="row justify-content-center mb-5">
                    <div class="col-xl-8 col-lg-9">

                        <small class="text-muted">
                            {{ $page->anno }}
                            @if($page->cliente)
                                ― per {{ $page->cliente }}
                            @endif
                        </small>

                        <h1>{{ $page->title }}</h1>

                        @if($page->link)
                            <a href="{{ $page->link }}" target="_blank">
                                {{ $page->label }}
                                <i class="fa-light fa-arrow-up-right ms-2"></i>
                            </a>
                        @endif

                    </div>
                </div>

                @if( $page->image )
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-10">

                            <div class="mb-5">
                                <img src="/assets/images/portfolio/{{ $page->image }}" class="w-100">
                            </div>

                        </div>
                    </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">

                        @yield('body')

                        @if ($page->note || $page->minore)
                            <hr>
                            <p class="text-muted">
                                <strong class="pe-2">Note</strong>
                                {{ $page->note }}
                                @if ($page->minore)
                                    Progetto minore o discontinuato. Potrebbe non essere più presente online o essere stato modificato.
                                @endif
                            </p>
                        @endif

                        {{-- @if ($page->skills)
                            {{ $page->skills }}
                        @endif --}}

                    </div>
                </div>

            </section>

        </div>
    </main>

    @include('_parts.footer')

</body>
</html>
