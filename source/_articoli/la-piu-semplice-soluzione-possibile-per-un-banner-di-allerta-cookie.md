---
extends: _layouts.articoli
title: La più semplice soluzione possibile per un banner di allerta cookie
image: cookie-alert.jpg
created_at: 2020-04-11
section: body
---

## Questa cosa dei cookie, del GDPR, delle policy, ormai ha un po' rotto le scatole a tutti. Vere soluzioni complete non esistono e ci sono requisiti spesso impossibili da soddisfare. 

Comunque, spesso non c'è bisogno di complicarsi la vita e un alert, magari molto semplice e discreto, assolve al suo compito e ci semplifica la vita.

Ecco la mia proposta.

## Il markup 

Un semplicissimo blocco di codice html da piazzare fuori da qualsiasi altro contesto. Io l'ho messo come primissima cosa dopo l'apertura del body. 

Un contenitore, un testo e un bottone: fine!

<script src="https://gist.github.com/andrearufo/b55a8cb749d5cf9cde82f2a909ecf3f3.js?file=cookie-markup.html"></script>

## Lo stile 

Io l'ho scritto in SCSS ma è molto semplice.

Lo piazziamo in basso, in buon contrasto con lo sfondo della pagina; posizione fissa e centrale; flexbox per organizzare gli elementi; pulsante pulito e minimale: fine!

<script src="https://gist.github.com/andrearufo/b55a8cb749d5cf9cde82f2a909ecf3f3.js?file=cookie-style.scss"></script>

Da far notare. Di standard il blocco sarebbe nascosto grazie dall'istruzione `display: none` ma poi ci penserà il codice Javascript a decidere se l'utente deve vederlo o meno.

## Lo script 

Ok, giusto questo è qualcosa di interessante.

Dobbiamo decidere se mostrare o meno il banner. Inoltre dobbiamo salvarci il fatto che l'utente abbia cliccato l'ok e quindi "basta banner".

Usiamo quindi jQuery per le azioni (tanto c'è dappertutto) e, in questo caso, ho deciso di salvare l'informazione del click nel `localStorage` così da non dover presentare più il banner per questo utente.

<script src="https://gist.github.com/andrearufo/b55a8cb749d5cf9cde82f2a909ecf3f3.js?file=cookie-script.js"></script>

Per "storare" il dato potete in alternativa potete usare i cookie o anche il `sessionStorage` ma la logica rimane la stessa.

Le funzioni `fadeIn` e anche `fadeOut` aiutano a gestire un po' meglio la transizione del banner. Ma anche qui ci sono molte soluzioni alternative.

***

Ok, lo so: la soluzione non è propriamente \_compliance\_ ma è un buon punto di partenza per analizzare il tutto no?! Il codice completo lo trovate [su questo Gist di Github](https://gist.github.com/andrearufo/b55a8cb749d5cf9cde82f2a909ecf3f3) (a proposito: se vi va, date un occhio anche alle altre mie repo e fatemi sapere che ne pensate). 

Credits: Photo by [Food Photographer | Jennifer Pallian](https://unsplash.com/@foodess?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText) on [Unsplash](https://unsplash.com/s/photos/cookie?utm_source=unsplash&utm_medium=referral&utm_content=creditCopyText)