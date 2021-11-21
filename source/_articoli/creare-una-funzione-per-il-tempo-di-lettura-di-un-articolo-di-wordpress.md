---
extends: _layouts.articoli
title: Creare una funzione per il tempo di lettura di un articolo di WordPress
image: wordpress-time-to-read-article.jpg
created_at: 2020-05-05
section: body
---

<!-- wp:heading -->
<h2>Aggiungere il tempo di lettura di un articolo aumenta il coinvolgimento nella lettura dell'articolo: ecco come aggiungere questa informazione agli articoli di Wordpress.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Una dovuta premessa: il calcolo del tempo di lettura è tecnicamente un <em>calcolo del tempo medio di lettura stimato</em> che si basa su alcuni dati.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Facendo qualche ricerca, tutto si basa sul tempo medio di lettura di un testo standard, che è stimabile in <strong>265 parole al minuto</strong>. Qualcuno dice di più, qualcuno dice di meno... aggiungendo poi qualche secondo anche per le immagini.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Partiamo da questo dato allora: quante parole sono contenute nell'articolo: a meno di strani template o comportamenti del sistema sono le parole del titolo più quelle del contenuto dell'articolo. </p>
<!-- /wp:paragraph -->

<!-- wp:code -->
<pre class="wp-block-code"><code>$content = &#91;]; 

$content&#91;] = get_the_title(); 
$content&#91;] = get_the_content(); 

$content = implode(' ', $content); 
$words = str_word_count($content);</code></pre>
<!-- /wp:code -->

<!-- wp:paragraph -->
<p>Per comodità di gestione inseriamo il titolo e il contenuto in un array (di nome <code>$content</code>) e li incolliamo (con la funzione <code>implode</code>) con degli spazi nel mezzo. Per contare poi le parole usiamo la funzione <code>str_word_count</code>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Per stimare poi i secondi necessari alla lettura il calcolo è:</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><strong>numero di parole / parole lette al minuto * 60 secondi</strong></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>A questo conto possiamo poi aggiungere magari 12 secondi per la "lettura" dell'immagine in evidenza... ed ecco fatto: abbiamo il tempo di lettura stimato in secondi.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Per rendere il tutto più leggibile portiamo il tempo in una "forma più umana" ed in ciò Wordpress ci viene incontro con la funzione <code>human_readable_duration</code> (documentazione alla pagina ufficiale) che però necessita del tempo diviso in minuti e secondi e formattato come <code>mm:ss</code>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Facciamo quindi una divisone intera per tornare ad avere i minuti e il resto per avere i secondi.</p>
<!-- /wp:paragraph -->

<!-- wp:code -->
<pre class="wp-block-code"><code>$ii = intdiv($time, 60);
$ss = $time % 60;

$duration = $ii.':'.$ss;
$timetoread = human_readable_duration($duration)</code></pre>
<!-- /wp:code -->

<!-- wp:paragraph -->
<p>Semplice vero?</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>La funzione ritornerà una informazione del tipo <em>2 minuti, 52 secondi</em>.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Inserendo il tutto in una funzione globale, nel file <code>functions.php</code>, possiamo quindi usare una semplice chiamata all'interno del loop come per qualsiasi altra informazione dell'articolo. Ecco di seguito il codice completo:</p>
<!-- /wp:paragraph -->

<!-- wp:shortcode -->
[gist id="7a969e0c50f81686d44a834ab1c5bcbe"]
<!-- /wp:shortcode -->

<!-- wp:separator -->
<hr class="wp-block-separator"/>
<!-- /wp:separator -->

<!-- wp:paragraph -->
<p>Fonti:</p>
<!-- /wp:paragraph -->

<!-- wp:list -->
<ul><li><a rel="noreferrer noopener" href="https://marketingland.com/estimated-reading-times-increase-engagement-79830" target="_blank">How Estimated Reading Times Increase Engagement With Content</a> da Marketing Land</li><li><a href="https://www.freecodecamp.org/news/how-to-more-accurately-estimate-read-time-for-medium-articles-in-javascript-fb563ff0282a/" target="_blank" rel="noreferrer noopener">How to more accurately estimate read time for Medium articles in JavaScript</a> da freeCodeCamp</li><li><a href="https://www.coengoedegebure.com/add-reading-time-to-articles/" target="_blank" rel="noreferrer noopener">How to add 'reading time' to your articles</a> di Coen Goedegebure</li><li><a href="https://medium.com/better-programming/how-to-estimate-any-articles-read-time-2a8403f0bd79" target="_blank" rel="noreferrer noopener">How To Estimate Any Article’s Read Time</a> di BetterProgramming</li><li><a href="https://medium.com/blogging-guide/how-is-medium-article-read-time-calculated-924420338a85" target="_blank" rel="noreferrer noopener">How is Medium Article Read Time Calculated?</a> di Blogging Guide</li></ul>
<!-- /wp:list -->

<!-- wp:paragraph -->
<p>Credits: illustrazione di copertina <a href="https://dribbble.com/shots/10785396-Man-read-a-message/attachments/2449882?mode=media">Man read a message</a> di Anastasiya Melnikova</p>
<!-- /wp:paragraph -->