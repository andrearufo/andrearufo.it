---
extends: _layouts.articoli
title: Favicon in SVG, vettoriale e dinamica
image: faviconsvg.jpg
created_at: 2020-06-21
section: body
---

## La favicon è quella piccolissima icona che si trova sulla tab del vostro browser e che identifica un sito al primo sguardo aiutando molto l'utente nella navigazione multitab. 

E sapevate che è possibile impostare una favicon di un sito o app in formato SVG così da non avere problemi di render o dimensioni?

```html
<link rel="icon" type="image/svg+xml" href="/favicon.svg">
```

Il vantaggio di usare questa soluzione è avere un'immagine vettoriale molto più semplice da visualizzare, gestire e manovrare.

Per esempio, oggi sappiamo che vanno moltissimo i temi dark, non solo per i siti ma anche per i sistemi operativi. Quindi le tab dei programmi sono scure: una favicon nera risulterà invisibile.

Nel file SVG è possibile inserire anche del CSS che ci permette di gestire queste circostanze:

```html
<svg>
    <style>
    path { fill: #3fb0ac; }
    @media (prefers-color-scheme: dark) {
        path { fill: #3fb0ac; }
    }
    </style>
    <path d="..."/>
</svg>
```

E così cambia il colore nel caso di tema scuro.

Interessante no!? Potete trovare più info in questo articolo su [CSS-Tricks.com](https://css-tricks.com/svg-favicons-and-all-the-fun-things-we-can-do-with-them/?ref=webdesignernews.com) e un approfondimento su [The Startup on medium.com](https://medium.com/swlh/are-you-using-svg-favicons-yet-a-guide-for-modern-browsers-836a6aace3df).