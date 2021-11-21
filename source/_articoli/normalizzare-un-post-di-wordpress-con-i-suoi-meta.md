---
extends: _layouts.articoli
title: Normalizzare un post di WordPress con i suoi meta
image: normalizza-custom-fields-wordpress.jpg
created_at: 2019-11-10
section: body
---

<!-- wp:heading -->
<h2>Torno a scrivere dopo un po' di tempo per condividere un codice che mi è stato davvero utile negli ultimi progetti.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Alcuni siti hanno al loro interno "qualcosa" tipo un catalogo, o una varietà di informazioni molto, ma molto ampia. </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Wordpress agevola la gestione di questi contenuti attraverso la creazione di <a rel="noreferrer noopener" aria-label="custom post (apre in una nuova scheda)" href="https://wordpress.org/support/article/post-types/" target="_blank">custom post type</a> a cui si possono legare dei <a rel="noreferrer noopener" aria-label="custom fields (apre in una nuova scheda)" href="https://wordpress.org/support/article/custom-fields/" target="_blank">custom fields</a>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Questo vuol dire che con uno sforzo molto basso puoi creare una collezione di oggetti e per ognuno di essi puoi avere informazioni peculiari. E puoi creare pagine di archivi, ricerche e tanto altro.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3>TL;NR</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ok... questo fino a quando non cominciano a diventare centinaia o migliaia o decine di migliaia di custom fileds da ricercare e comparare. A questo punto il classico <a href="https://developer.wordpress.org/reference/classes/wp_query/" target="_blank" rel="noreferrer noopener" aria-label="WP_Query (apre in una nuova scheda)">WP_Query</a> non è una via percorribile.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Il problema principale è ovviamente i tempi di risposta del server ed eventualmente la potenza di calcolo a disposizione.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":3} -->
<h3>La soluzione</h3>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>La maniera più efficace che si ha a disposizione l'interrogazione diretta del database MySQL e normalizzare il dato: ovvero avere, per ogni singolo oggetto della collezione, tutti i field necessari direttamente dal database. E questo attraverso un'unica interrogazione!</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>Il funzionamento standard</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Questa parte è noiosa: vi avverto!</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Di standard Wordpress utilizza un oggetto <strong>Post</strong>. I Post vengono salvati nella tabella del database <code>wp_posts</code> (dove <code>wp_</code> è il prefisso della tabella e può cambiare per ogni installazione o a piacimento).</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Per ogni Post vengono salvati innumerevoli alti dati nella tabella <code>wp_postmeta</code> collegandoli al post tramite l'id dello stesso.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Succede che ovviamente incrociando i dati di queste due tabelle è possibile avere una riposta molto più veloce rispetto alla chiamata singola del post e una altra per ogni postmeta necessario.</p>
<!-- /wp:paragraph -->

<!-- wp:heading -->
<h2>La funzione di normalizzazione</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Ed ecco la funzione completa:</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[gist id="e036bb8afbede846d8cc5cf5c903a439"]
<!-- /wp:shortcode -->

<!-- wp:heading {"level":4} -->
<h4>La versione breve: come usarla</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>La funzione ritorna un array di oggetti (oggetti standard di PHP, non oggetti di tipo Post). </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Il primo parametro $type è il tipo di post che si intende richiamare. È stato scelto nella creazione del custom post che vi interessa: se non lo ricordate potete andare nella sezione del backend e leggere dalla url qualcosa tipo <code>wp-admin/edit.php?post_type=lavoro</code> e allora dovete scrivere <code>lavoro</code>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Il secondo parametro è un array di tutti i meta che volete richiedere: anche di questi dovete conoscere il nome. Se li avete creati con Advanced Custom Fields non vi sarà complicato andare a trovarli, altrimenti dovete ingegnarvi un po' e vedere nelle schermate o nel database.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ogni oggetto ottenuto dalla chiamata riporta:</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><li>ID;</li><li>titolo;</li><li>field richiesti</li></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>Quindi ora, avendo un elenco completo di tutti i dati che vi sono necessari potete manovrarli più agevolmente in PHP.</p>
<!-- /wp:paragraph -->

<!-- wp:heading {"level":4} -->
<h4>La versione lunga: come funziona</h4>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Il tutto avviene abbastanza banalmente tramite la creazione di una query per MySQL e la relativa chiamata. Il tutto è reso più agnostico e facile grazie all'uso di un oggetto globale <code>$wpdb</code> messo a disposizione da Wordpress con una serie di metodi utili per interfacciarci col database MySQL.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>In un esempio dove vogliamo ottenere tutti i post di tipo <code>portfolio</code> e i relativi meta <code>year</code>, <code>customer</code>, <code>place</code>, <code>link</code> e <code>price</code> la query che ne viene fuori sarà del tipo:</p>
<!-- /wp:paragraph -->

<!-- wp:preformatted -->
<pre class="wp-block-preformatted">SELECT
ID,
post_title as title,
MAX( CASE WHEN pm.meta_key = 'year' THEN pm.meta_value END ) AS year ,
MAX( CASE WHEN pm.meta_key = 'customer' THEN pm.meta_value END ) AS customer ,
MAX( CASE WHEN pm.meta_key = 'place' THEN pm.meta_value END ) AS place ,
MAX( CASE WHEN pm.meta_key = 'link' THEN pm.meta_value END ) AS link ,
MAX( CASE WHEN pm.meta_key = 'price' THEN pm.meta_value END ) AS price
FROM
wp_postmeta pm LEFT JOIN wp_posts p
ON p.ID = pm.post_id
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
GROUP BY pm.post_id</pre>
<!-- /wp:preformatted -->

<!-- wp:paragraph -->
<p>Una cosa interessante: prima della chiamata al database ovviamente crea una query MySQL che, a parer mio, è molto interessante e, volendo, può essere integrata per degli utilizzi diversi e più specifici.</p>
<!-- /wp:paragraph -->

<!-- wp:separator -->
<hr class="wp-block-separator"/>
<!-- /wp:separator -->

<!-- wp:paragraph -->
<p>Spero la cosa possa esservi utile e, nel caso aveste dubbi, contattatemi pure!</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Al link del <a href="https://gist.github.com/andrearufo/e036bb8afbede846d8cc5cf5c903a439">Gist su GitHub</a> trovate il codice che vedete sopra e potete commentare, forkare e quanto altro.</p>
<!-- /wp:paragraph -->