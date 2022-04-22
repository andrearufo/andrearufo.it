<!DOCTYPE html>
<html lang="{{ $page->language ?? 'it' }}">
<head>

    @include('_parts.meta')

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/color-brewer.min.css" integrity="sha512-SJm3cAu//Nn6+cv90D0Ue8ArsnjDlszVGE3o/0JX55VOd9/KVbSGTegrZhyNK6ttKMeLbR14ezeGWyBUmF1Aww==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/highlight.min.js" integrity="sha512-Pbb8o120v5/hN/a6LjF4N4Lxou+xYZ0QcVF8J6TWhBbHmctQWd8O6xTDmHpE/91OjPzCk4JRoiJsexHYg4SotQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>hljs.highlightAll();</script>

</head>
<body>

    @include('_parts.header')

    <main class="py-3">
        <div class="container">

            <section class="{{ $page->getFilename() }}">

                <div class="row justify-content-center">
                    <div class="col-xl-8 col-lg-9">

                        <small class="text-muted">
                            <i class="fal fa-calendar"></i>
                            {{ $page->formatdate($page->created_at) }}
                        </small>
                        <small class="text-muted ms-2">
                            <i class="fal fa-clock"></i>
                            {{ $page->readingtime($page->content) }} di lettura
                        </small>

                        <h1>{{ $page->title }}</h1>

                    </div>
                </div>

                @if( $page->image )
                    <div class="row justify-content-center">
                        <div class="col-xl-10 col-lg-10">

                            <div class="mb-5">
                                <img src="/assets/images/articoli/{{ $page->image }}" class="shadow rounded w-100" title="{{ $page->image }}">
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

            <section class="mt-3">
                <script
                src="https://utteranc.es/client.js"
                repo="andrearufo/andrearufo-comments"
                issue-term="pathname"
                theme="github-light"
                crossorigin="anonymous"
                async>
                </script>
            </section>

        </div>
    </main>

    @include('_parts.footer')

</body>
</html>
