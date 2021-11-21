---
extends: _layouts.articoli
title: Come creare un pulsante 'Copia il link' per WordPress
image: copy-wordpress-link.jpg
created_at: 2019-12-11
section: body
---

<!-- wp:heading -->
<h2>Eccolo la sopra: lo vedete qui in testa agli articoli. Un pulsante per copiare il link e poterlo condividere come volete.</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Lo trovo estremamente comodo in tante occasioni e lo preferisco di gran lunga ai meccanismi di sharing standar che si usano in altri casi.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>La realizzazione necessita di un po' di HTML e CSS per fare il bottone (ma sullo stile non ci perderemo tempo) ma soprattutto Javascript per l'interazione.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Il pulsante non è niente altro che un semplice bottone:</p>
<!-- /wp:paragraph -->

<!-- wp:preformatted -->
<pre class="wp-block-preformatted">&lt;button type="button" class="btn-copy" data-copy="&lt;?php the_permalink() ?&gt;"&gt;Copia il link&lt;/button&gt;</pre>
<!-- /wp:preformatted -->

<!-- wp:paragraph -->
<p>Come è facile capire la parte più importante è l'informazione in <code>data-copy</code>, ovvero il testo che poi andremo a copiare realmente. In questo caso, usando la funzione di Wordpress <code>the_permalink()</code> viene stampato direttamente il link del post corrente nel loop.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Il lavoro grosso lo fa il Javascript. In questo caso con l'aiuto i jQuery:</p>
<!-- /wp:paragraph -->

<!-- wp:preformatted -->
<pre class="wp-block-preformatted">$('.btn-copy').click(function(event){
  $(this).removeClass('btn-copy-active');

  var coping = $(this).data('copy');
  var $temp = $('&lt;input id="copyinput" value="'+coping+'"&gt;');        
  $(this).append($temp);
  $temp.select();
  document.execCommand('copy');
  $temp.remove();

  $(this).addClass('btn-copy-active');
});</pre>
<!-- /wp:preformatted -->

<!-- wp:paragraph -->
<p>Quale è il "trucco"? <br>Al click viene creato un campo di testo <code>input</code> che contiene come valore il testo contenuto nel <code>data-copy</code> del bottone cliccato, lo selezioniamo e allora possiamo copiarlo.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Al che lo script aggiunge anche una classe al bottone così da poterlo stilizzare (classe che viene rimossa ad inizio script nel caso fosse presente.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Ecco un esempio:</p>
<!-- /wp:paragraph -->

<p><iframe height="340" style="width: 100%;" scrolling="no" title="Pulsante di copia di un link" src="https://codepen.io/andrearufo/embed/KKwMKxe?height=327&amp;theme-id=default&amp;default-tab=js,result" frameborder="no" allowtransparency="true" allowfullscreen="true"><br />
  See the Pen <a href='https://codepen.io/andrearufo/pen/KKwMKxe'>Pulsante di copia di un link</a> by Andrea Rufo<br />
  (<a href='https://codepen.io/andrearufo'>@andrearufo</a>) on <a href='https://codepen.io'>CodePen</a>.<br />
</iframe></p>

<!-- wp:heading -->
<h2>Come usarlo quindi in Wordpress?</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Bisogna mettere mano al tema e bisogna farlo in più punti se si vuole fare una cosa fatta bene: nel file PHP in cui si vuole inserire il pulsante (per esempio nel <code>single.php</code> e nel file Javascrip del tema. </p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>È però possibile anche inserire direttamente tutto il blocco di codice direttamente nel file PHP indicato. È però necessario ricordare che lo script necessita di jQuery e, se per qualche motivo non è incluso o inserito dopo, potrebbe non funzionare bene.</p>
<!-- /wp:paragraph -->