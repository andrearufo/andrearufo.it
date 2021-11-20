<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<link rel="canonical" href="{{ $page->getUrl() }}">
<meta name="description" content="{{ $page->description }}">

<title>{{ $page->title }}</title>

<link rel="stylesheet" href="{{ mix('css/main.css', 'assets/build') }}">
<script defer src="{{ mix('js/main.js', 'assets/build') }}"></script>
<script defer src="https://kit.fontawesome.com/7319c752cd.js"></script>
<link rel="icon" type="image/svg+xml" href="{{ $page->baseUrl }}/assets/images/favicon.svg">

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
