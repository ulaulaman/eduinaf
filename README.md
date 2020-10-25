Il *plugin*, in italiano, aggiunge varie funzionalità al sito EduINAF senza modificare direttamente il codice php del tema.

## Descrizione

Il *plugin* aggiunge un'icona per il *login*, personalizza il messaggio nell'*admin footer*, manipola il *feed rss* per accreditare l'articolo all'autore/i, inclusi *guest author*, aggiunge una serie di *shortcode* e di *widget*.
In particolare definisce una serie di *shortcode* per la costruzione delle *sidebar* di alcuni *custom post type*:

* **Didattica**: [sbdidattica]
* **Astrofoto**: [sbastrofoto]
* **Costellazioni**: [sbcostellazioni]
* **Menu costellazioni**: [menucostellazioni]

Per la didattica è consigliato utilizzare anche il *widget* apposito.
Definisce anche gli *shortcode* per inserire le attività didattiche da astroedu o gli articoli da spacesoop a partire dal codice del contenuto e dalla lingua:

[astroedu code="..." lang="..."]

[spacescoop code="..." lang="..."]

Entrambi i parametri sono obbligatori per il corretto funzionamento degli *shortcode*.

### Griglie per i *loop*

Il *plugin* aggiunge degli *shortcode* per generare delle griglia di *post*. Si può utilizzare uno *shortcode* generico:

[grigliaeduinaf categoria="..." etichetta="..."]

in cui almeno uno dei due parametri deve essere specificato.
Un altro *shortcode* genera una griglia appositamente per i libri:

[griglialibri etichetta="..."]

dove il parametro etichetta è, al momento, settato di *default* sul valore "libri-per-bambini-e-ragazzi" e va utilizzato per distinguere tra le tre differenti sottosezioni delle recensioni.

### Speciali

Aggiunti una tassonomia e due *shortcode* per la gestione degli Speciali. In particolare i due *shortcode* hanno la seguente sintassi:

* Griglia da inserire nella pagina dello Speciale: [grigliaspeciali speciale="slug speciale"]
* Box da inserire in un *widget* di testo per generare il sommario completo dello Speciale: [tabspeciali speciale="slug speciale"]

### Storia

Il *plugin* è stato originariamente sviluppato per integrarsi con [Co-Authors Plus](https://wordpress.org/plugins/co-authors-plus/). I codici di integrazione con questo *plugin* sono stati cancellati dalla versione attuale e spostati in [Co-Authors Widget](https://wordpress.org/plugins/widget-for-co-authors/) (vedi anche la [pagina del *plugin*](https://ulaulaman.github.io/widget-for-co-authors/)).

## Changelog
* 2020.1025
  * Sistemazione cartella immagini
  * Cambio percorso bottoni
  * Aggiunto *shortcode* mappa IRNET
* 2020.1023
  * Aggiunto codice che corregge errore generato dallo *shortcode* tabspeciali quando usato in un *widget* di testo, se questo risulta ultimo della *sidebar*
  * Aggiunto *shortcode* (in grid.php) per la creazione di *loop* di articoli con categoria e *tag* come variabili
  * Aggiunto *widget* per la *sidebar* delle costellazioni
  * Pulizia css
* 2020.1022
  * Corretto errore in codice html menu costellazioni
  * Corretti errori nella *sidebar* didattica e sistemazioni varie del codice
  * Aggiunto supporto per l'ordine personalizzato degli autori usando i *custom fields*
  * Aggiunto nella tabspeciali codice che previene un errore che occorre con i *custom post type* e nasconde la tabella
* 2020.1021
  * Modificato css dei menu (correzione malfunzionamento con *tag* <code>ul</code>)
  * Corretto errore nella *sidebar* didattica che produce doppio logo *Europlanet*
  * Aggiunto css per bottoni per menu orizzontale
* 2020.1020
  * Eliminato css per twitter e facebook
  * Aggiunto css per menu a bottoni
  * Aggiunto css per menu con lista
  * Aggiunto *shortcode* per la *sidebar* delle costellazioni
  * Aggiunto *widget* per la *sidebar* didattica
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