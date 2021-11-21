---
extends: _layouts.articoli
title: Come si usa Bootstrap, compilarlo e includerlo nel progetto
image: scss-bootstrap.jpg
created_at: 2020-10-29
section: body
---

## [https://getbootstrap.com/](Bootstrap) è probabilmente il più diffuso framework frontend web e viene largamente utilizzato nella creazione di siti, temi, app e sistemi.

Esiste fin dalla metà del 2010 ed era inizialmente solo un piccolo progetto interno di Twitter che poi, nella metà del 2011, venne rilasciato come [https://github.com/twbs/bootstrap](open source). Da qui fino ad oggi, alla sua **versione 5**.

Chiunque può quindi scaricarlo e utilizzarne i codici, personalizzarlo ed includerlo nel proprio progetto.

All’atto pratico non è altro che **un file CSS e un JS** che, anche tramite una <a href="https://www.bootstrapcdn.com/" target="_blank">CDN</a>, potete inserire direttamente in una pagina HTML e iniziare ad usarne le componenti. Ma usare i **file sorgenti**, scritti in **SCSS**, è la vera potenza di Bootstrap.

Infatti, modificando solo qualche **variabile**, è possibile stravolgere completamente l’aspetto che hanno caratterizzato, e ormai uniformato, moltissimi siti.

--- 

Cosa serve:

- un po’ di conoscenza di **CSS**, **HTML** e **JS**;
- un po’ di conoscenza di **SCSS**;
- un **terminale**, io uso iTerm;
- un **editor di codice**, io uso Atom;
- un **gestore di pacchetti**, npm o yarn.

L’obiettivo è quello di creare un file CSS completo, eventualmente compresso e minificato, da poter banalmente includere nelle pagine HTML.

Inoltre, se non si conosce un po’ di SCSS si perde gran parte del vantaggio di usare questa tecnologia: quindi magari <a href="https://sass-lang.com/guide" target="_blank">date un’occhio alla documentazione</a>.

### I file principali

Nella cartella del progetto create un file `index.html` con un markup di base. Potete prendere ad esempio quello dello <a href="https://getbootstrap.com/docs/4.5/getting-started/introduction/#starter-template" target="_blank">Starter Template</a> di Bootstrap stesso, rimuovendo i link ai CSS e JS delle CDN che ci sono dentro.

Creiamo quindi i file SCSS sorgente che poi dovrà essere compilato: lo mettiamo in `/dev/styles.scss` e per ora lasciamolo la…

### Le librerie necessarie

Usiamo un gestore di pacchetti per scaricare tutte le librerie che ci servono: in primis Bootstrap ovviamente.

Lanciate dal terminale `yarn add bootstrap@next`.

In questo caso io uso l’ultima versione **beta** di Bootstrap e <a href="https://yarnpkg.com/" target="_blank">Yarn</a> come gestore pacchetti. Tutti questi pacchetti verranno scaricati nella cartella `node_modules` e aggiunti alla lista delle dipendenze nel file `package.json` nella root del progetto. Quando si inizializza un progetto con questo file, basta lanciare `yarn install` per installare tutti i pacchetti di cui il progetto necessita e quindi poter lanciare i comandi.

Per gestire la **compilazione** utilizzeremo <a href="https://gulpjs.com/docs/en/getting-started/quick-start">Gulp</a> e creeremo un **task** per compilare il file SCSS: `yarn add gulp-cli -g` se già non ce l’avete installato globalmente e `yarn add gulp` per aggiungerlo al progetto.

### Configurare Gulp per gestire i task

Se non conoscete Gulp o le sue funzionalità potete vedere <a href="https://www.youtube.com?v=0CZuE5YwLO8&amp;ab_channel=AndreaRufo" target="_blank">un mio vecchio video dove ne parlo</a>?.

I **plugin** di Gulp necessari per la compilazione del file li aggiungiamo alle nostre dipendenze con `yarn add node-sass gulp-sass`. Se vogliamo anche la sourcemaps del file e minificare il tutto aggiungiamo anche `yarn add gulp-clean-css gulp-sourcemaps`.

Creiamo quindi il file `gulpfile.js` e andiamo a creare il task per la compilazione del file SCSS:

```js
const { src, dest } = require('gulp');

// per compilare l'scss
const sass = require('gulp-sass');

// per minificare il css
const cleanCSS = require('gulp-clean-css');

// per creare la sorucemap del file
const sourcemaps = require('gulp-sourcemaps');

// creo il task
function build(cb) {

    // prendo il file sorgente
    return src('dev/styles.scss')

    // inizializzo la sourcemap
    .pipe(sourcemaps.init())

    // compilo il file e mostro gli errori se ce ne sono
    .pipe(sass().on('error', sass.logError))

    // minifico il file
    .pipe(cleanCSS({compatibility: 'ie8'}))

    // completo la sourcemap
    .pipe(sourcemaps.write())

    // salvo il file nella destinazione
    .pipe(dest('.'));

    // completo il task
    cb();
}

// posso richiamare il task tramite $ gulp build
exports.build = build;
```

Ci siamo: è ora di lanciare il task per compilare il file SCSS e quindi iniziare a metterci “un po’ di stile”!

Dal **terminale** lanciamo `gulp build` ed ecco che nella root del progetto compare un file `styles.css`

Includiamo il file nella `index.html` che avevamo già creato:

```html
<link rel="stylesheet" href="styles.css">
```

### Fare lo stile

La prima cosa da fare è **includere Bootstrap** nel progetto facendo riferimento alla sua posizione in `node_modules`:

```scss
@import '..node_modules/bootstrap/scss/bootstrap.scss'; 
```

Ora, per **personalizzarlo**, per prima cosa possiamo andare a sovrascrivere le **variabili** del sistema di Bootstrap. Se non sapete quali sono e come si chiamano potete trovare il file di riferimento in `node_modules/bootstrap/scss/_variables.scss`.

Vi consiglio quindi di creare un vostro file in `/dev/_variables.scss` e quindi includerlo nel `dev/styles.scss` ma, attenzione! prima di Bootstrap:

```scss
@import 'variables';
@import '../node_modules/bootstrap/scss/bootstrap.scss';
```

Come vedete basta inserire il nome del file senza underscore davanti o estensione.

Ed ora… basta: compilate il tutto, aggiungete regole e stili e altre funzioni e completate il progetto.

### Proviamo a fare un test 

Modifichiamo solo un po’ di variabili per cercare di dare uno stile un po’ diverso, magari retrò.

- Cambiamo il colore principale delle componenti modificando la variabile `$primary`;
- Togliamo i bordi arrotondati delle componenti modificando la variabile di Bootstrap `$border-radius`;
- Modifichiamo anche le tipologie di ombre che ci offre Bootstrap di standard modificando le variabili `$box-shadow`;
- Quindi applichiamo lo shadow alle componenti che vogliamo modificare di aspetto estendendo le classi con la classe standard `@extend .shadow`

Quindi inseriamo nel file `/dev/_variables.scss`:

```scss
$primary: #3fb0ac;
$border-radius: 0;
$box-shadow: 10px 10px 0 rgba(0,0,0,.8);
```

Mentre nel `/dev/styles.scss` scriviamo:

```scss
@import 'variables';
@import '../node_modules/bootstrap/scss/bootstrap.scss';

.alert, .card{
    @extend .shadow;
}
```

Finito! Compiliamo di nuovo il file con `gulp build`.

Ora potete trovare il progetto completo <a href="https://github.com/andrearufo/bootstrap-tutorial" target="_blank">nella mia repository su GitHub</a>, inizializzarlo e usarlo. Che ne pensate?