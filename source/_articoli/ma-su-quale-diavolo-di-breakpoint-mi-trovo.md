---
extends: _layouts.articoli
title: Ma su quale diavolo di breakpoint mi trovo?
image: sebastian-staines-9dfJQx-ez3U-unsplash.jpg
created_at: 2018-02-08
section: body
---

<!-- wp:heading -->
<h2>E allora ho creato un piccolo <em>helper</em> che si piazza in un angolo dello schermo e ti dice su che misura sei tra: XL, LG, MD, SM o&nbsp;XS</h2>
<!-- /wp:heading -->

<!-- wp:paragraph -->
<p>Non so voi ma spesso mi rincoglionisco nel capire su quale breakpoint sono. Ci sono dei layout che si comportano in maniera veramente strana: hanno vita propria.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Questo piccolo helper a volte mi aiuta parecchio.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>È composto in pratica da due piccoli pezzi di codice.</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Quello più importante è un pezzo di HTML che sfrutta le classi native di Bootstrap 4 per impostare la proprietà <code><em>display</em></code> nei vari breakpoint.</p>
<!-- /wp:paragraph -->

<!-- wp:preformatted -->
<pre class="wp-block-preformatted">&lt;div id="size-helper"&gt;<br>  &lt;span class="d-block d-sm-none"&gt;SIZE XS&lt;/span&gt;<br>  &lt;span class="d-none d-sm-block d-md-none"&gt;SIZE SM&lt;/span&gt;<br>  &lt;span class="d-none d-md-block d-lg-none"&gt;SIZE MD&lt;/span&gt;<br>  &lt;span class="d-none d-lg-block d-xl-none"&gt;SIZE LG&lt;/span&gt;<br>  &lt;span class="d-none d-xl-block"&gt;SIZE XL&lt;/span&gt;<br>&lt;/div&gt;</pre>
<!-- /wp:preformatted -->

<!-- wp:paragraph -->
<p>Dopo di che un piccolo aggiustamento CSS, che è comunque opzionale e dipende da come e dove volete vederlo, per tenerlo in un angoletto e darne evidenza:</p>
<!-- /wp:paragraph -->

<!-- wp:preformatted -->
<pre class="wp-block-preformatted">#size-helper{<br>    position: fixed;<br>    top: 1rem;<br>    left: 0;<br>    padding: 1rem 1rem 1rem 6rem;<br>    background: rgba(#d00, .8);<br>    color: white;<br>    font-weight: bold;<br>}</pre>
<!-- /wp:preformatted -->

<!-- wp:paragraph -->
<p>Beh, spero che vi possa tornare utile.&nbsp;<br>Fatemi sapere!</p>
<!-- /wp:paragraph -->

<!-- wp:paragraph -->
<p>Credits: foto di <a rel="noreferrer noopener" href="https://unsplash.com/@seabas?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText" target="_blank">Sebastian Staines</a> on <a rel="noreferrer noopener" href="https://unsplash.com/s/photos/window?utm_source=unsplash&amp;utm_medium=referral&amp;utm_content=creditCopyText" target="_blank">Unsplash</a></p>
<!-- /wp:paragraph -->