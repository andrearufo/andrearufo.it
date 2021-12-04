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

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">

                        <div class="row justify-content-between align-items-center">
                            <div class="col-lg-auto">

                                <small class="text-muted">
                                    {{ $page->anno }}
                                    @if($page->cliente)
                                        ― per {{ $page->cliente }}
                                    @endif
                                </small>
                                <h1>{{ $page->title }}</h1>

                            </div>
                            @if($page->link)
                                <div class="col-lg-auto">

                                    <a href="{{ $page->link }}" class="btn btn-outline-primary" target="_blank">
                                        <i class="far fa-link me-2"></i>
                                        {{ $page->label }}
                                    </a>

                                </div>
                            @endif
                        </div>


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
