=== Edu INAF Tools ===
Contributors: ulaulaman
Tags: eduinaf, inaf
Requires at least: 4.8.5
Tested up to: 5.5.1
Requires PHP: 7.0.18
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Il plugin, in italiano, aggiunge varie funzionalità al sito Edu INAF senza modificare direttamente il codice php del tema.

== Description ==
Il plugin è stato originariamente sviluppato per integrarsi con il plugin [Co-Authors Plus](https://wordpress.org/plugins/co-authors-plus/). I codici di integrazione con il plugin sono stati cancellati dalla versione attuale e spostati nel plugin [Co-Authors Widget](https://wordpress.org/plugins/widget-for-co-authors/) (vedi anche la [pagina del plugin](https://ulaulaman.github.io/widget-for-co-authors/)).

Il *plugin* aggiunge un'icona per il *login*, personalizza il messaggio nell'*admin footer*, manipola il *feed rss* per accreditare l'articolo all'autore/i, inclusi *guest author*, aggiunge degli *shortcode* per la creazione automatica dei *link* alle attività astroedu e alle notizie spacescoop. In particolare entrambi gli *shortcode* utilizzano due parametri, il codice dell'attività/articolo e la lingua.

[astroedu code="..." lang="..."]

[spacescoop code="..." lang="..."]

Entrambi i parametri sono obbligatori per il corretto funzionamento degli *shortcode*.

Il plugin aggiunge degli *shortcode* per generare delle griglia di *post*. Si può utilizzare uno *shortcode* generico:

[grigliaeduinaf categoria="..." etichetta="..."]

in cui almeno uno dei due parametri deve essere specificato.
Un altro *shortcode* genera una griglia appositamente per i libri:

[griglialibri etichetta="..."]

dove il parametro etichetta è, al momento, settato di default sul valore "libri-per-bambini-e-ragazzi" e va utilizzato per distinguere tra le tre differenti sottosezioni delle recensioni.
Per la homepage si può adottare lo shortcode [grigliaevidenza] che prende gli articoli in evidenza identificati con apposita tassonomia creata con il *plugin* esterno [CPT UI](https://wordpress.org/plugins/custom-post-type-ui/).

Aggiunti una tassonomia e due *shortcode* per la gestione degli speciali. In particolare i due *shortcode* hanno la seguente sintassi:

[grigliaspeciali speciale="slug speciale"]

[tabspeciali speciale="slug speciale"]

== Changelog ==
* 2020.1001
  * Aggiunto *shortcode* per la *sidebar* didattica
  * Aggiunto *shortcode* per la *sidebar* astrofoto
  * Aggiunti in css personalizzazioni per *headline* e per incorporazioni da twitter e facebook
* 2020.0922
  * Corretto errore nella personalizzazione del *feed* che genera errore in caso di mancata installazione di Co-Authors Plus
  * Nuova modifica nello *shortcode tabspeciali* che ora funziona usando lo *slug* dello speciale. Aspetto integrato con il nuovo tema e corretto errore che impedisce di pescare tutti gli articoli di uno speciale con nome costituito da più parole
* 2020.0919
  * Pulizia codice speciali
  * Eliminato il campo sull'url della copertina nel metabox dei dati aggiuntivi per i libri
  * Pulizia codice griglia dei libri in funzione della cancellazione del campo del'url della copertina
  * Accorpato tutto il css in un unico *file*, incluso il css delle mappe INAF
  * Disabilitata la griglia di evidenza
  * Aggiunta griglia generica per categoria, etichetta, tassonomia e suo valore
  * Aggiunto shortcode per la mappa delle sedi INAF
* 2020.0908
  * Aggiunto bollino livello trasversale nella cartella delle immagini per sezione astrodidattica
  * Aggiunto lo *shortcode tabspeciali* che sostituirà lo *shortcode specialishort* che continua a produrre errore nella barra laterale in caso di inserimento di più speciali
* 2020.0907
  * Correzione errore nel codice della tabella degli speciali (*shortcode specialishort*) che va nella spalla degli articoli
  * Nella griglia degli speciali (*shortcode grigliaspeciali*), specificato di raccogliere solo gli articoli
  * Cancellate righe di codice che si riferivano alla vecchia griglia
* 2020.0824
  * Modifca alla griglia degli speciali: adottata la tabella personalizzata
* 2020.0728
  * Aggiunte immagini per i livelli didattici nella cartella "images"
  * Aggiunte costellazioni e astrofoto al *feed*, tolte attività didattiche
  * Tolte le videolezioni dagli speciali
* 2020.0709
  * Estesi gli speciali anche a videolezioni e alla nuova tipologia astrodidattica
* 2020.0707
  * Aggiunta compatibilità con Wordpress 4.9.5
* 2020.0706
  * Disabilitato contacaratteri (in conflitto con plugin che incorpora il google calendar)
  * Disabilitati *shortcode* della didattica
  * Nuovo *avatar* di *login*
* 2018.0625
  * Aggiunto il *permalink* sull'immagine in evidenza
  * Tolta la classe del titolo
  * Aggiunta la data con la classe del tema
  * Modifiche minori di ordine grafico
* 2018.0622
  * Creazione di una griglia per la home per mostrare gli articoli in evidenza con una tassonomia personalizzata creata con plugin esterno
  * Creazione del css della griglia della home
* 2018.0503
  * Modifica minore per sistemare la tabella degli articoli di uno Speciale nella spalla
* 2018.0328 varie modifiche agli *shortcode* per la gestione degli Speciali
  * Sostituito lo *shortcode* per la creazione della talebba degli articoli di uno speciale con uno con un controllo interno, utilizzabile direttamente in un *widget* di testo
  * Modifiche minori alla griglia
* 2018.0327
  * Corretto errore nel *path* di speciali.css
* 2018.0323 aggiunte funzionalità per gli Speciali
  * Aggiunta una tassonomia specifica per includere gli articoli in un dato speciale
  * Aggiunti due *shortcode* per la pubblicazione di un box all'interno degli articoli e di una griglia nella pagina di un dato speciale
  * Aggiunto un css per la personalizzazione del box da utilizzare in futuro anche per le tabelle degli eventi
* 2018.0228
  * Incluso il file shortcode.php
  * Aggiunge una serie di *shortcode* compatibili con i campi creati con [Custom Field Suite](https://wordpress.org/plugins/custom-field-suite/) e associati con le attività didattiche, tipologia di post creata con [Custom Post Type UI](https://wordpress.org/plugins/custom-post-type-ui/)
* 2018.0219
  * Modifiche nei *loop* e nelle griglie e aggiunta di campi personalizzati:
  * Cancellazione della griglia precedente
  * Creazione di una griglia per un *loop* generico
  * Creazione della griglia per i libri
  * Creazione degli *shortcode* corrispondenti
  * Creazione di un *metabox* per l'aggiunta del titolo di un libro e dell'url della sua copertina
  * Aggiunta in grid.php del codice per sostituire, se presente, il titolo del libro con il titolo del post nel caso della griglia di libri
* 2018.0217
  * Aggiunto un *loop* personalizzato:
  * Aggiunto uno *shortcode* che mostra tutti i post dati una categoria e un'etichetta: di *default* sono rispettivamente 'libri' e 'libri-per-bambini-e-ragazzi'
  * Incluso il css per la griglia
* 2018.0214
  * Aggiunti colori ai *link*
* 2018.0212
  * Aggiunto *shortcode* per articoli tratti da *Sapere*
* 2018.0211
  * Aemplificazioni del codice e nuova numerazione di versione
  * Crezione di *file php* indipendenti con i codici relativi alla pagina di descrizione, al contacaratteri, alla manipolazione del *feed rss*, per gli *shortcode* dei *link*
* 0.9.6 test per wp 4.9.4
* 0.9.5 test per wp 4.9.3
* 0.9.4 aggiunto il Plugin URI
* 0.9.3 aggiunto il GitHub Plugin URI per l'installazione e l'aggiornamento tramite il GitHub Updater
* 0.9.2 modifiche alla pagina di documentazione; pulizia nella cartella principale
* 0.9.1 aggiunta *shortcode* per i *link* a spacescoop usando codice e lingua della news
* 0.9 aggiunta *shortcode* per i *link* ad astroEdu usando codice e lingua dell'attività
* 0.8.1 cancellazione di *shortcode* e *widget* integrati con Co-Authors Plus a seguito della creazione di plugin apposito
* 0.8 aggiunte le attività didattiche al feed rss
* 0.7.2 aggiunto contacaratteri per gli articoli
* 0.7.1 aggiunto contacaratteri per il riassunto con limite a 500
* 0.6.2 correzione codice che mostrava articoli completi sostituendolo con il sommario
* 0.6.1 correzione baco che impediva di mostrare i profili tranne il primo
* 0.6 aggiunto metodo per mostrare/nascondere profilo nel *widget* con css
* 0.5 manipolazione del footer admin della dashboard; manipolazione del feed rss: aggiunta immagine in evidenza e autori articolo; aggiunto il logo e modificati descrizione e *link*
* 0.4 aggiunta della voce del menu e della pagina di presentazione del plugin
* 0.3 aggiunta dei *link* ai profili nel *widget*
* 0.2 *widget* per gli *avatar* degli autori compatibile con Coauthors Plus
* 0.1 *shortcode* per aggiunta autori compatibile con Coauthors Plus
