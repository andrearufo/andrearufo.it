---
extends: _layouts.articoli
title: Ma su quale diavolo di breakpoint mi trovo?
image: sebastian-staines-9dfJQx-ez3U-unsplash.jpg
created_at: 2018-02-08
section: body
---

## E allora ho creato un piccolo _helper_ che si piazza in un angolo dello schermo e ti dice su che misura sei tra: XL, LG, MD, SM o&nbsp;XS 

Non so voi ma spesso mi rincoglionisco nel capire su quale breakpoint sono. Ci sono dei layout che si comportano in maniera veramente strana: hanno vita propria.

Questo piccolo helper a volte mi aiuta parecchio.

È composto in pratica da due piccoli pezzi di codice.

Quello più importante è un pezzo di HTML che sfrutta le classi native di Bootstrap 4 per impostare la proprietà `_display_` nei vari breakpoint.

```html
<div id="size-helper"></div>
    <span class="d-block d-sm-none">SIZE XS</span>
    <span class="d-none d-sm-block d-md-none">SIZE SM</span>
    <span class="d-none d-md-block d-lg-none">SIZE MD</span>
    <span class="d-none d-lg-block d-xl-none">SIZE LG</span>
    <span class="d-none d-xl-block">SIZE XL</span>
</div>
```

Dopo di che un piccolo aggiustamento CSS, che è comunque opzionale e dipende da come e dove volete vederlo, per tenerlo in un angoletto e darne evidenza:

```css
#size-helper{
    position: fixed;
    top: 1rem;
    left: 0;
    padding: 1rem 1rem 1rem 6rem;
    background: rgba(#d00, .8);
    color: white;
    font-weight: bold;
}
```

Beh, spero che vi possa tornare utile. Fatemi sapere!

Credits: foto di [Sebastian Staines](https://unsplash.com/@seabas?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText) on [Unsplash](https://unsplash.com/s/photos/window?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText)