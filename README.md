Il plugin aggiunge varie funzionalità al sito Edu INAF senza modificare direttamente il codice php del tema.

## Descrizione

Il plugin è stato originariamente sviluppato per integrarsi con il plugin [Co-Authors Plus](https://wordpress.org/plugins/co-authors-plus/). I codici di integrazione con il plugin sono stati cancellati dalla versione attuale e spostati nel plugin [Co-Authors Widget](https://wordpress.org/plugins/widget-for-co-authors/) (vedi anche la [pagina del plugin](https://ulaulaman.github.io/widget-for-co-authors/)).
Il *plugin* aggiunge un'icona per il *login*, personalizza il messaggio nell'*admin footer*, manipola il *feed rss* per accreditare l'articolo all'autore/i, inclusi *guest author*, aggiunge degli *shortcode* per la creazione automatica dei *link* alle attività astroedu e alle notizie spacescoop. In particolare entrambi gli *shortcode* utilizzano due parametri, il codice dell'attività/articolo e la lingua.

[astroedu code="..." lang="..."]

[spacescoop code="..." lang="..."]

Entrambi i parametri sono obbligatori per il corretto funzionamento degli shortcode.

### Griglie per i *loop*

Il *plugin* aggiunge degli *shortcode* per generare delle griglia di *post*. Si può utilizzare uno *shortcode* generico:

[grigliaeduinaf categoria="..." etichetta="..."]

in cui almeno uno dei due parametri deve essere specificato.
Un altro *shortcode* genera una griglia appositamente per i libri:

[griglialibri etichetta="..."]

dove il parametro etichetta è, al momento, settato di default sul valore "libri-per-bambini-e-ragazzi" e va utilizzato per distinguere tra le tre differenti sottosezioni delle recensioni.
Per la *homepage* si può adottare lo *shortcode* [grigliaevidenza] che prende gli articoli in evidenza identificati con apposita tassonomia creata con il *plugin* esterno [CPT UI](https://wordpress.org/plugins/custom-post-type-ui/).

### Speciali

Aggiunti una tassonomia e due *shortcode* per la gestione degli Speciali. In particolare i due *shortcode* hanno la seguente sintassi:

* Griglia da inserire nella pagina dello Speciale: [grigliaspeciali speciale="slug speciale"]
* Box da inserire in un *widget* di testo per generare il sommario completo dello Speciale: [tabspeciali speciale="slug speciale"]

## Changelog
* 2020.0922
  * Corretto errore nella personalizzazione del *feed* che genera errore in caso di mancata installazione di Co-Authors Plus
* 2020.0919
  * Pulizia codice speciali
  * Eliminato il campo sull'url della copertina nel metabox dei dati aggiuntivi per i libri
  * Pulizia codice griglia dei libri in funzione della cancellazione del campo del'url della copertina
  * Accorpato tutto il css in un unico *file*, incluso il css delle mappe INAF
  * Disabilitata la griglia di evidenza
  * Aggiunta griglia generica per categoria, etichetta, tassonomia e suo valore
  * Aggiunto shortcode per la mappa delle sedi INAF
* 2020.0907
  * Correzione errore nel codice della tabella degli speciali (*shortcode specialishort*) che va nella spalla degli articoli
  * Nella griglia degli speciali (*shortcode grigliaspeciali*), specificato di raccogliere solo gli articoli
  * Cancellate righe di codice che si riferivano alla vecchia griglia
* 2020.0824
  * Modifca alla griglia degli speciali: adottata la tabella personalizzata
* 2020.0728
  * aggiunte immagini per i livelli didattici nella cartella "images"
  * aggiunte costellazioni e astrofoto al *feed*, tolte attività didattiche
  * tolte le videolezioni dagli speciali
* 2020.0709
  * estesi gli speciali anche a videolezioni e alla nuova tipologia astrodidattica
* 2020.0707
  * aggiunta compatibilità con Wordpress 4.9.5
* 2020.0706
  * disabilitato contacaratteri (in conflitto con plugin che incorpora il google calendar)
  * disabilitati *shortcode* della didattica
  * nuovo avatar di login

### Changelog precedenti

* [Changelog 2018](https://github.com/ulaulaman/eduinaf/blob/master/changelog2018.md)
* [Changelog pre 1.0](https://github.com/ulaulaman/eduinaf/blob/master/changelog01.md)