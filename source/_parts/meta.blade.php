<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="description" content="{{ $page->description }}">

<title>{{ $page->title }}</title>

<link rel="canonical" href="{{ $page->getUrl() }}">
<link rel="icon" type="image/svg+xml" href="{{ $page->baseUrl }}/assets/images/favicon.svg">
<link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/styles/color-brewer.min.css" integrity="sha512-SJm3cAu//Nn6+cv90D0Ue8ArsnjDlszVGE3o/0JX55VOd9/KVbSGTegrZhyNK6ttKMeLbR14ezeGWyBUmF1Aww==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.3.1/highlight.min.js" integrity="sha512-Pbb8o120v5/hN/a6LjF4N4Lxou+xYZ0QcVF8J6TWhBbHmctQWd8O6xTDmHpE/91OjPzCk4JRoiJsexHYg4SotQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>hljs.highlightAll();</script>

<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-4918423-11"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('set', 'linker', {"domains":["www.andrearufo.it"]} );
    gtag('js', new Date());

    gtag("set", "developer_id.dZTNiMT", true);
    gtag('config', 'UA-4918423-11');
</script>

<!--

    returns the path to the current page, relative to the site root
    -> {{ $page->getPath() }}


    returns the relative path (i.e. parent directories) of the current page, relative to the site root
    -> {{ $page->getRelativePath() }}


    returns the full URL to the item, if baseUrl was defined in config.php
    -> {{ $page->getUrl() }}


    returns the filename of the page, without extension (e.g. my-first-page)
    -> {{ $page->getFilename() }}


    returns the file extension (e.g. md)
    -> {{ $page->getExtension() }}


    returns the last modified time of the file, as a Unix timestamp
    -> {{ $page->getModifiedTime() }}

-->
