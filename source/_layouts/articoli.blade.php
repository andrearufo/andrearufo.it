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

                        <small class="text-muted">{{ date('j M Y', $page->created_at) }}</small>
                        <h1>{{ $page->title }}</h1>

                    </div>
                </div>

                @if( $page->image )
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-10">

                            <div class="mb-5">
                                <img src="/assets/images/articoli/{{ $page->image }}" class="shadow rounded w-100">
                            </div>

                        </div>
                    </div>
                @endif

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">

                        @yield('body')

                    </div>
                </div>

            </section>

        </div>
    </main>

    @include('_parts.footer')

</body>
</html>
