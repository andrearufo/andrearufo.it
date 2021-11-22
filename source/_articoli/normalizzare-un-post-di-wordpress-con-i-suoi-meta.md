---
extends: _layouts.articoli
title: Normalizzare un post di WordPress con i suoi meta
image: normalizza-custom-fields-wordpress.jpg
created_at: 2019-11-10
section: body
---

## Torno a scrivere dopo un po' di tempo per condividere un codice che mi è stato davvero utile negli ultimi progetti. 
Alcuni siti hanno al loro interno "qualcosa" tipo un catalogo, o una varietà di informazioni molto, ma molto ampia. Wordpress agevola la gestione di questi contenuti attraverso la creazione di [custom post type](https://wordpress.org/support/article/post-types/) a cui si possono legare dei [custom fields](https://wordpress.org/support/article/custom-fields/). Questo vuol dire che con uno sforzo molto basso puoi creare una collezione di oggetti e per ognuno di essi puoi avere informazioni peculiari. E puoi creare pagine di archivi, ricerche e tanto altro.

### TL;NR

Ok... questo fino a quando non cominciano a diventare centinaia o migliaia o decine di migliaia di custom fileds da ricercare e comparare. A questo punto il classico [WP_Query](https://developer.wordpress.org/reference/classes/wp_query/) non è una via percorribile. Il problema principale è ovviamente i tempi di risposta del server ed eventualmente la potenza di calcolo a disposizione.

### La soluzione

La maniera più efficace che si ha a disposizione l'interrogazione diretta del database MySQL e normalizzare il dato: ovvero avere, per ogni singolo oggetto della collezione, tutti i field necessari direttamente dal database. E questo attraverso un'unica interrogazione! 

## Il funzionamento standard 

Questa parte è noiosa: vi avverto! 

Di standard Wordpress utilizza un oggetto PHP _Post_. I Post vengono salvati nella tabella del database `wp_posts` (dove `wp_` è il prefisso della tabella e può cambiare per ogni installazione o a piacimento). Per ogni Post vengono salvati innumerevoli alti dati nella tabella `wp_postmeta` collegandoli al post tramite l'id dello stesso. 

Succede che ovviamente incrociando i dati di queste due tabelle è possibile avere una riposta molto più veloce rispetto alla chiamata singola del post e una altra per ogni postmeta necessario. 

## La funzione di normalizzazione Ed ecco la funzione completa: 

<script src="https://gist.github.com/andrearufo/e036bb8afbede846d8cc5cf5c903a439.js"></script>

#### La versione breve: come usarla

La funzione ritorna un array di oggetti (oggetti standard di PHP, non oggetti di tipo _Post_). 

Il primo parametro `$type` è il tipo di post che si intende richiamare. È stato scelto nella creazione del custom post che vi interessa: se non lo ricordate potete andare nella sezione del backend e leggere dalla url qualcosa tipo `wp-admin/edit.php?post_type=lavoro` e allora dovete scrivere `lavoro`. 

Il secondo parametro è un array di tutti i meta che volete richiedere: anche di questi dovete conoscere il nome. Se li avete creati con *Advanced Custom Fields* non vi sarà complicato andare a trovarli, altrimenti dovete ingegnarvi un po' e vedere nelle schermate o nel database. Ogni oggetto ottenuto dalla chiamata riporta:

*   ID;
*   titolo;
*   field richiesti.

Quindi ora, avendo un elenco completo di tutti i dati che vi sono necessari potete manovrarli più agevolmente in PHP.

#### La versione lunga: come funziona

Il tutto avviene abbastanza banalmente tramite la creazione di una query per MySQL e la relativa chiamata. Il tutto è reso più agnostico e facile grazie all'uso di un oggetto globale `$wpdb` messo a disposizione da Wordpress con una serie di metodi utili per interfacciarci col database MySQL. 

In un esempio dove vogliamo ottenere tutti i post di tipo `portfolio` e i relativi meta `year`, `customer`, `place`, `link` e `price` la query che ne viene fuori sarà del tipo: 

```sql
SELECT 
    ID, 
    post_title as title, 
    MAX(CASE WHEN pm.meta_key = 'year' THEN pm.meta_value END ) AS year , 
    MAX( CASE WHEN pm.meta_key = 'customer' THEN pm.meta_value END ) AS customer , 
    MAX( CASE WHEN pm.meta_key = 'place' THEN pm.meta_value END ) AS place , 
    MAX( CASE WHEN pm.meta_key = 'link' THEN pm.meta_value END ) AS link , 
    MAX( CASE WHEN pm.meta_key = 'price' THEN pm.meta_value END ) AS price 
FROM 
    wp_postmeta pm 
LEFT JOIN 
    wp_posts p 
ON 
    p.ID = pm.post_id 
WHERE 
    ( 
        pm.meta_key = 'year' 
        OR pm.meta_key = 'customer' 
        OR pm.meta_key = 'place' 
        OR pm.meta_key = 'link' 
        OR pm.meta_key = 'price' 
    ) 
    AND pm.meta_value IS NOT NULL 
    AND p.post_status = 'publish' 
    AND p.post_type = 'portfolio' 
GROUP BY 
    pm.post_id
```

Una cosa interessante: prima della chiamata al database ovviamente crea una query MySQL che, a parer mio, è molto interessante e, volendo, può essere integrata per degli utilizzi diversi e più specifici.

* * *

Spero la cosa possa esservi utile e, nel caso aveste dubbi, contattatemi pure! Al link del [Gist su GitHub](https://gist.github.com/andrearufo/e036bb8afbede846d8cc5cf5c903a439) trovate il codice che vedete sopra e potete commentare, forkare e quanto altro.