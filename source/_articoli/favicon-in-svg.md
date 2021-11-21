---
extends: _layouts.articoli
title: Favicon in SVG, vettoriale e dinamica
image: faviconsvg.jpg
created_at: 2020-06-21
section: body
---

<!-- wp:heading -->
<h2>La favicon è quella piccolissima icona che si trova sulla tab del vostro browser e che identifica un sito al primo sguardo aiutando molto l'utente nella navigazione multitab.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>E sapevate che è possibile impostare una favicon di un sito o app in formato SVG così da non avere problemi di render o dimensioni?</p>
<!-- /wp:paragraph -->

<!-- wp:preformatted -->
<pre class="wp-block-preformatted">&lt;link rel="icon" type="image/svg+xml" href="/favicon.svg"&gt;</pre>
<!-- /wp:preformatted -->

<!-- wp:paragraph -->
<p>Il vantaggio di usare questa soluzione è avere un'immagine vettoriale molto più semplice da visualizzare, gestire e manovrare.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Per esempio, oggi sappiamo che vanno moltissimo i temi dark, non solo per i siti ma anche per i sistemi operativi. Quindi le tab dei programmi sono scure: una favicon nera risulterà invisibile.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Nel file SVG è possibile inserire anche del CSS che ci permette di gestire queste circostanze:</p>
<!-- /wp:paragraph -->

<!-- wp:preformatted -->
<pre class="wp-block-preformatted">&lt;svg&gt;
    &lt;style&gt;
    path { fill: #3fb0ac; }
    @media (prefers-color-scheme: dark) {
        path { fill: #3fb0ac; }
    }
    &lt;/style&gt;
    &lt;path d="..."/&gt;
&lt;/svg&gt;</pre>
<!-- /wp:preformatted -->

<!-- wp:paragraph -->
<p>E così cambia il colore nel caso di tema scuro.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Interessante no!? Potete trovare più info in questo articolo su <a rel="noreferrer noopener" href="https://css-tricks.com/svg-favicons-and-all-the-fun-things-we-can-do-with-them/?ref=webdesignernews.com" target="_blank">CSS-Tricks.com</a> e un approfondimento su <a href="https://medium.com/swlh/are-you-using-svg-favicons-yet-a-guide-for-modern-browsers-836a6aace3df">The Startup on medium.com</a>.</p>
<!-- /wp:paragraph -->