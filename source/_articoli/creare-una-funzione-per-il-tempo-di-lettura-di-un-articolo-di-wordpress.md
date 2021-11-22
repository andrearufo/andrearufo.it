---
extends: _layouts.articoli
title: Creare una funzione per il tempo di lettura di un articolo di WordPress
image: wordpress-time-to-read-article.jpg
created_at: 2020-05-05
section: body
---

## Aggiungere il tempo di lettura di un articolo aumenta il coinvolgimento nella lettura dell'articolo: ecco come aggiungere questa informazione agli articoli di Wordpress.

Una dovuta premessa: il calcolo del tempo di lettura è tecnicamente un _calcolo del tempo medio di lettura stimato_ che si basa su alcuni dati.

Facendo qualche ricerca, tutto si basa sul tempo medio di lettura di un testo standard, che è stimabile in __265 parole al minuto__. Qualcuno dice di più, qualcuno dice di meno... aggiungendo poi qualche secondo anche per le immagini.

Partiamo da questo dato allora: quante parole sono contenute nell'articolo: a meno di strani template o comportamenti del sistema sono le parole del titolo più quelle del contenuto dell'articolo. 

```php
$content = []; 

$content[] = get_the_title(); 
$content[] = get_the_content(); 

$content = implode(' ', $content); 
$words = str_word_count($content);
```

Per comodità di gestione inseriamo il titolo e il contenuto in un array (di nome `$content`) e li incolliamo (con la funzione `implode`) con degli spazi nel mezzo. Per contare poi le parole usiamo la funzione `str_word_count`.

Per stimare poi i secondi necessari alla lettura il calcolo è: 

- __numero di parole / parole lette al minuto * 60 secondi__

A questo conto possiamo poi aggiungere magari 12 secondi per la "lettura" dell'immagine in evidenza... ed ecco fatto: abbiamo il tempo di lettura stimato in secondi.

Per rendere il tutto più leggibile portiamo il tempo in una "forma più umana" ed in ciò Wordpress ci viene incontro con la funzione `human_readable_duration` (documentazione alla pagina ufficiale) che però necessita del tempo diviso in minuti e secondi e formattato come `mm:ss`.

Facciamo quindi una divisone intera per tornare ad avere i minuti e il resto per avere i secondi.

```php
$ii = intdiv($time, 60);
$ss = $time % 60;

$duration = $ii.':'.$ss;
$timetoread = human_readable_duration($duration)
```

Semplice vero?

La funzione ritornerà una informazione del tipo _2 minuti, 52 secondi_.

Inserendo il tutto in una funzione globale, nel file `functions.php`, possiamo quindi usare una semplice chiamata all'interno del loop come per qualsiasi altra informazione dell'articolo. Ecco di seguito il codice completo:

<script src="https://gist.github.com/andrearufo/7a969e0c50f81686d44a834ab1c5bcbe.js"></script>

### Fonti:

*   [How Estimated Reading Times Increase Engagement With Content](https://marketingland.com/estimated-reading-times-increase-engagement-79830) da Marketing Land
*   [How to more accurately estimate read time for Medium articles in JavaScript](https://www.freecodecamp.org/news/how-to-more-accurately-estimate-read-time-for-medium-articles-in-javascript-fb563ff0282a/) da freeCodeCamp
*   [How to add 'reading time' to your articles](https://www.coengoedegebure.com/add-reading-time-to-articles/) di Coen Goedegebure
*   [How To Estimate Any Article’s Read Time](https://medium.com/better-programming/how-to-estimate-any-articles-read-time-2a8403f0bd79) di BetterProgramming
*   [How is Medium Article Read Time Calculated?](https://medium.com/blogging-guide/how-is-medium-article-read-time-calculated-924420338a85) di Blogging Guide

Credits: illustrazione di copertina [Man read a message](https://dribbble.com/shots/10785396-Man-read-a-message/attachments/2449882?mode=media) di Anastasiya Melnikova
