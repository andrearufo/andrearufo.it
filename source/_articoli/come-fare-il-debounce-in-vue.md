---
extends: _layouts.articoli
title: Come fare il debounce di una chiamata in Vue.js
image: debounce-vue-lodash.jpg
created_at: 2022-01-06
section: body
---

## Per evitare numerevoli chiamate verso le API un debounce permette di avere dinamicità e prestazioni.

Utile in particolar modo quando chiamiamo, per esempio con un `watch` delle risorse remote per fare una ricerca e quindi non vogliamo inviare decine di chiamate verso server anche abbastanza inutili.

Eseguire un **debounde** significa, in pratica, intercettare la chiamata potenzialmente ripetuta ed eseguirla solo se non vi è una ulteriore chiamata che cancella la precedente. Tra una chiamata e l'altra deve passare quindi un lasso di tempo definito.

Esempio pratico: una ricerca dinamica tramite un campo di testo.

Ad ogni modifica della stringa di ricerca viene eseguita una chiamata verso un endpoint API che risponde con i risultati di ricerca. E allora per la ricerca `andrea` che richiama l'endpoint `cerca?s=andrea` succederà:

1. scrivo `a` e viene chiamato `cerca?s=a`
2. scrivo `an` e viene chiamato `cerca?s=an`
3. scrivo `and` e viene chiamato `cerca?s=and`
4. scrivo `andr` e viene chiamato `cerca?s=andr`
5. scrivo `andre` e viene chiamato `cerca?s=andre`
6. scrivo `andrea` e viene chiamato `cerca?s=andrea`

Quindi inutili 5 chiamate prima dell'ultima e realmente utile chiamata.

Usando il **debounce** lo script aspetterà che finisci di scrivere quindi chiamerà l'endpoint solo alla fine.

Per implementarlo usiamo una delle più famose librerie di utility per JS, ovvero [Lodash](https://lodash.com/).

All'interno di uno script Vue avremo quindi un metodo per la chiamata all'API (es. `getContacts`) e un metodo per la ricerca (es. `searchContacts`) che, risolto il debounce, chiama quello di chiamata.

Ecco come fare:

```js
methods: {
    getContacts(s){
        // chiamata all'endpoint di ricerca 
        // e computazione del dato di risposta
    },

    searchContacts: _.debounce(function(search){
        var s = _.trim(search);
        if(s) {
            this.getContacts(s);
        }
    }, 500)
}
```

La funzione di ricerca attenderà quindi **500 ms** nei quali, se non verrà di nuovo chiamata, eseguirà la chiamata. Nel caso in cui la digitazione continui, la chiamata precedente verrà annullata in favore della più recente senza far intervenire l'API.

Da notare bene la sintassi usata per usare la funzione di debounce che, in altro modo, potrebbe non realizzarsi come sperato e quindi non aiutare nell'esecuzione dello script.

Al [link ufficiale la documentazione](https://lodash.com/docs/4.17.15#debounce) per approfondire.