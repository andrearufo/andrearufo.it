<!DOCTYPE html>
<html lang="{{ $page->language ?? 'it' }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="canonical" href="{{ $page->getUrl() }}">
    <meta name="description" content="{{ $page->description }}">

    <title>{{ $page->title }}</title>

    <link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
    <script defer src="{{ mix('js/main.js', 'assets/build') }}"></script>
    <script defer src="https://kit.fontawesome.com/7319c752cd.js"></script>
    <link rel="icon" type="image/svg+xml" href="/images/favicon.svg">

</head>
<body>

    <div id="cookie">
        <div id="cookie-wrapper">
            <div id="cookie-content">
                <i class="fad fa-cookie-bite me-2"></i>
                Questo sito <em>potrebbe</em> usare i cookie
            </div>
            <button id="cookie-ok">Ok</button>
        </div>
    </div>

    @include('_layouts.header')

    @include('_layouts.menu')

    <main class="py-3">
        <div class="container">

            @yield('body')

        </div>
    </main>

    @include('_layouts.footer')

</body>
</html>
