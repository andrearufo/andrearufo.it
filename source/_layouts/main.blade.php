<!DOCTYPE html>
<html lang="{{ $page->language ?? 'it' }}">
<head>

    @include('_parts.meta')

</head>
<body>

    @include('_parts.header')

    <main class="py-5">
        <div class="container">

            <section class="{{ $page->getFilename() }}">
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
