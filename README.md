Il plugin aggiunge varie funzionalità al sito Edu INAF senza modificare direttamente il codice php del tema.

## Descrizione

Il plugin è stato originariamente sviluppato per integrarsi con il plugin [Co-Authors Plus](https://wordpress.org/plugins/co-authors-plus/). I codici di integrazione con il plugin sono stati cancellati dalla versione attuale in un plugin separato [presente sul repository ufficiale di Wordpress](https://wordpress.org/plugins/widget-for-co-authors/) (vedi anche la [versione su git-hub](https://github.com/ulaulaman/widget-for-co-authors)).
Il plugin aggiunge un'icona per il login, personalizza il messaggio nell'*admin footer*, manipola il *feed rss* per accreditare l'articolo all'autore/i, inclusi *guest author*, aggiunge degli shortcode per la creazione automatica dei link alle attività astroedu e alle notizie spacescoop. In particolare lo shortcode utilizza due parametri, il codice dell'attività/news e la lingua.

[astroedu code="..." lang="..."]

[spacescoop code="..." lang="..."]

Entrambi i parametri sono obbligatori per il corretto funzionamento dello shortcode.

## Changelog
* 0.9.5 test per wp 4.9.3
* 0.9.4 aggiunto il Plugin URI
* 0.9.3 aggiunto il GitHub Plugin URI per l'installazione e l'aggiornamento tramite il GitHub Updater
* 0.9.2 modifiche alla pagina di documentazione; pulizia nella cartella principale
* 0.9.1 aggiunta shortcode per i link a spacescoop usando codice e lingua della news
* 0.9 aggiunta shortcode per i link ad astroEdu usando codice e lingua dell'attività
* 0.8.1 cancellazione di shortcode e widget integrati con Co-Authors Plus a seguito della creazione di plugin apposito
* 0.8 aggiunte le attività didattiche al feed rss
* 0.7.2 aggiunto contacaratteri per gli articoli
* 0.7.1 aggiunto contacaratteri per il riassunto con limite a 500
* 0.6.2 correzione codice che mostrava articoli completi sostituendolo con il sommario
* 0.6.1 correzione baco che impediva di mostrare i profili tranne il primo
* 0.6 aggiunto metodo per mostrare/nascondere profilo nel widget con css
* 0.5 manipolazione del footer admin della dashboard; manipolazione del feed rss: aggiunta immagine in evidenza e autori articolo; aggiunto il logo e modificati descrizione e link
* 0.4 aggiunta della voce del menu e della pagina di presentazione del plugin
* 0.3 aggiunta dei link ai profili nel widget
* 0.2 widget per gli avatar degli autori compatibile con Coauthors Plus
* 0.1 box shortcode per aggiunta autori compatibile con Coauthors Plus
