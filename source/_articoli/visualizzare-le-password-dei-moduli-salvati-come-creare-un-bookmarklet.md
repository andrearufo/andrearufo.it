---
extends: _layouts.articoli
title: "Visualizzare le password dei moduli salvati: come creare un bookmarklet"
image: mostra-password-nascoste.jpg
created_at: 2020-09-06
section: body
---

<!-- wp:heading -->
<h2>Ecco come creare un semplice "plugin" per il browser per riuscire a leggere le password salvate nei moduli autocompilati.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Un <strong>bookmarklet</strong> è un link HTML che al click richiama una funzione Javascript e che quindi esegue delle operazioni sul DOM della pagina.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>La mia esigenza era quella di trasformare un campo <code>&lt;input type="password</code>"&gt; in un <code>&lt;input type="text"&gt;</code> così da poter leggere la password, che avevo precedentemente salvato quando l'ho compilato, e che il browser ricorda e autocompila per me. Così la posso copiare e incollare altrove.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Per fare questo mi sono programmato un bookmarklet che modificasse la proprietà type dell'input.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>E per creare un bookmarklet basta programmare una pagina HTML e un po' di Javascript. La pagina HTML servirà a creare un semplice link che richieamerà il file esterno Javascript. Sarà possibile quindi trascinare il link nella <strong>barra dei preferiti</strong> per poi cliccarlo quando serve.</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[gist id="4912a98ba9e4a2f00b3fa98894bfbbb5"]
<!-- /wp:shortcode -->

<!-- wp:paragraph -->
<p>Come detto, il link richiama un Javascript esterno che si trova su un server remoto: è quindi necessario indicare l'indirizzo completo.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Sarebbe anche possibile scrivere tutto il codice in linea e quindi non usare un file js. Ma allora perche usarlo?</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Perchè, così facendo sarà possibile modificare il solo file esterno js e aggiornare il bookmarklet per tutti quelli che lo usano e su tutte le postazioni.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Se vuoi fare un test prova qui e anche <strong>trascinarlo nella tua barra dei preferiti</strong> per usare il mio script:</p>
<!-- /wp:paragraph -->

<!-- wp:cp/codepen-gutenberg-embed-block {"penURL":"https://codepen.io/andrearufo/pen/LYNexaz","penID":"LYNexaz","penHeight":530,"clickToLoad":true} -->
<div class="wp-block-cp-codepen-gutenberg-embed-block cp_embed_wrapper"><iframe id="cp_embed_LYNexaz" src="//codepen.io/anon/embed/preview/LYNexaz?height=530&amp;theme-id=1&amp;slug-hash=LYNexaz&amp;default-tab=result" height="530" scrolling="no" frameborder="0" allowfullscreen allowpaymentrequest name="CodePen Embed LYNexaz" title="CodePen Embed LYNexaz" class="cp_embed_iframe" style="width:100%;overflow:hidden">CodePen Embed Fallback</iframe></div>
<!-- /wp:cp/codepen-gutenberg-embed-block -->

<!-- wp:paragraph -->
<p>Se anche tu hai creato un nuovo bookmarklet simile <a href="https://twitter.com/andrearufo" target="_blank" rel="noreferrer noopener">mandami un tweet</a>: magari mi torna comodo!</p>
<!-- /wp:paragraph -->