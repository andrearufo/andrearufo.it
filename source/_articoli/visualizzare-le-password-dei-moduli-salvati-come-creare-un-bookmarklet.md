---
extends: _layouts.articoli
title: "Visualizzare le password dei moduli salvati: come creare un bookmarklet"
image: mostra-password-nascoste.jpg
created_at: 2020-09-06
section: body
---

## Ecco come creare un semplice "plugin" per il browser per riuscire a leggere le password salvate nei moduli autocompilati. 

Un __bookmarklet__ è un link HTML che al click richiama una funzione Javascript e che quindi esegue delle operazioni sul DOM della pagina.

La mia esigenza era quella di trasformare un campo `<input type="password">` in un `<input type="text">` così da poter leggere la password, che avevo precedentemente salvato quando l'ho compilato, e che il browser ricorda e autocompila per me. Così la posso copiare e incollare altrove.

Per fare questo mi sono programmato un bookmarklet che modificasse la proprietà type dell'input.

E per creare un bookmarklet basta programmare una pagina HTML e un po' di Javascript. La pagina HTML servirà a creare un semplice link che richieamerà il file esterno Javascript. Sarà possibile quindi trascinare il link nella __barra dei preferiti__ per poi cliccarlo quando serve.

<script src="https://gist.github.com/andrearufo/4912a98ba9e4a2f00b3fa98894bfbbb5.js"></script>

Come detto, il link richiama un Javascript esterno che si trova su un server remoto: è quindi necessario indicare l'indirizzo completo.

Sarebbe anche possibile scrivere tutto il codice in linea e quindi non usare un file js. Ma allora perche usarlo?

Perchè, così facendo sarà possibile modificare il solo file esterno js e aggiornare il bookmarklet per tutti quelli che lo usano e su tutte le postazioni.

Se anche tu hai creato un nuovo bookmarklet simile <a href="https://twitter.com/andrearufo" target="_blank">mandami un tweet</a>: magari mi torna comodo!