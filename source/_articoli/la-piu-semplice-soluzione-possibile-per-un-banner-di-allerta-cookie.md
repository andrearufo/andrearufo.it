---
extends: _layouts.articoli
title: La più semplice soluzione possibile per un banner di allerta cookie
image: cookie-alert.jpg
created_at: 2020-04-11
section: body
---

<!-- wp:heading -->
<h2>Questa cosa dei cookie, del GDPR, delle policy, ormai ha un po' rotto le scatole a tutti. Vere soluzioni complete non esistono e ci sono requisiti spesso impossibili da soddisfare.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Comunque, spesso non c'è bisogno di complicarsi la vita e un alert, magari molto semplice e discreto, assolve al suo compito e ci semplifica la vita.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ecco la mia proposta.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Il markup</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Un semplicissimo blocco di codice html da piazzare fuori da qualsiasi altro contesto. Io l'ho messo come primissima cosa dopo l'apertura del body. </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Un contenitore, un testo e un bottone: fine!</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[gist id="b55a8cb749d5cf9cde82f2a909ecf3f3" file="cookie-markup.html"]</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Lo stile</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Io l'ho scritto in SCSS ma è molto semplice.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Lo piazziamo in basso, in buon contrasto con lo sfondo della pagina; posizione fissa e centrale; flexbox per organizzare gli elementi; pulsante pulito e minimale: fine!</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[gist id="b55a8cb749d5cf9cde82f2a909ecf3f3" file="cookie-style.scss"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Da far notare. Di standard il blocco sarebbe nascosto grazie dall'istruzione <code>display: none</code> ma poi ci penserà il codice Javascript a decidere se l'utente deve vederlo o meno.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Lo script</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ok, giusto questo è qualcosa di interessante.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Dobbiamo decidere se mostrare o meno il banner. Inoltre dobbiamo salvarci il fatto che l'utente abbia cliccato l'ok e quindi "basta banner".</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Usiamo quindi jQuery per le azioni (tanto c'è dappertutto) e, in questo caso, ho deciso di salvare l'informazione del click nel <code>localStorage</code> così da non dover presentare più il banner per questo utente.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>[gist id="b55a8cb749d5cf9cde82f2a909ecf3f3" file="cookie-script.js"]</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Per "storare" il dato potete in alternativa potete usare i cookie o anche il <code>sessionStorage</code> ma la logica rimane la stessa.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Le funzioni <code>fadeIn</code> e anche <code>fadeOut</code> aiutano a gestire un po' meglio la transizione del banner. Ma anche qui ci sono molte soluzioni alternative.</p>
<!-- /wp:paragraph -->

<!-- wp:separator -->
<hr class="wp-block-separator"/>
<!-- /wp:separator -->

<!-- wp:paragraph -->
<p>Ok, lo so: la soluzione non è propriamente <em>compliance</em> ma è un buon punto di partenza per analizzare il tutto no?!</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Il codice completo lo trovate <a href="https://gist.github.com/andrearufo/b55a8cb749d5cf9cde82f2a909ecf3f3">su questo Gist di Github</a> (a proposito: se vi va,  date un occhio anche alle altre mie repo e fatemi sapere che ne pensate).</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Credits: Photo by&nbsp;<a href="https://unsplash.com/@foodess?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Food Photographer | Jennifer Pallian</a>&nbsp;on&nbsp;<a href="https://unsplash.com/s/photos/cookie?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText">Unsplash</a></p>
<!-- /wp:paragraph -->