Il *plugin*, in italiano, aggiunge varie funzionalità al sito EduINAF senza modificare direttamente il codice php del tema.

## Descrizione

Il *plugin* aggiunge un'icona per il *login*, personalizza il messaggio nell'*admin footer*, manipola il *feed rss* per accreditare l'articolo all'autore/i, inclusi *guest author*, aggiunge una serie di *shortcode* e di *widget*.
In particolare definisce una serie di *shortcode* per la costruzione delle *sidebar* di alcuni *custom post type*:

* **Didattica**: [sbdidattica] (con *widget*)
* **Astrofoto**: [sbastrofoto] (con *widget*)
* **Costellazioni**: [sbcostellazioni] (con *widget*)
* **Menu costellazioni**: [menucostellazioni]
* **Corso base di astronomia**: [sbcorsobase] (con *widget*)

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

### *Loop* personalizzati

Per realizzare dei *loop* personalizzati si può utilizzare lo *shortcode*

[postlooptab intro="Ultimi articoli" pag="5" categoria="..." tag="..." stile="1"]

Nell'esempio sono inseriti, laddove presenti, i valori di *default*.
Per gli stili, è possibile indicare 1 per un elenco in linea con quello del tema, 2 per un elenco con nome dell'autore e data di pubblicazione, 3 per una griglia di quadrati.

### Speciali

Aggiunti una tassonomia e due *shortcode* per la gestione degli Speciali. In particolare i due *shortcode* hanno la seguente sintassi:

* Griglia da inserire nella pagina dello Speciale: [grigliaspeciali speciale="slug speciale" tipo="slug tipologia post"]

### Storia

Il *plugin* è stato originariamente sviluppato per integrarsi con [Co-Authors Plus](https://wordpress.org/plugins/co-authors-plus/). I codici di integrazione con questo *plugin* sono stati cancellati dalla versione attuale e spostati in [Co-Authors Widget](https://wordpress.org/plugins/widget-for-co-authors/) (vedi anche la [pagina del *plugin*](https://ulaulaman.github.io/#CoAuthorsWidget)).

## Changelog
* 2021.1022
  * Corretti errori di sintassi nello *shortcode* per astroedu
  * Cambiato colore dei link ad astroedu introducendo una nuova classe apposita e usando il *file css* generale
  * Aggiunto il supporto per le diverse versioni al *file css*
  * Aggiunto il codice per la striscietta sull'ultimo aggiornamento
* 2021.1019
  * Accorpati pezzi di codice in per ridurre il numeri dei *file* .php richiamati in quello principale
  * Modifiche minori agli *shortcode* del concorso Rodari 2021
  * Eliminata la pagina di descrizione nella bacheca
* 2021.1018 Aggiornati gli *shortcode* del concorso Rodari per l'anno 2021
* 2021.1007
  * Aggiornato lo *shortcode* dei *loop* personalizzati con la distinzione tra 3 stili differenti
  * Aggiunti gli shortcode e i documenti relativi al concorso Via Lattea Quaraquarinci dedicato a Gianni Rodari
* 2021.0629
  * Modifiche al codice di brera.php per risolvere le [*issue* segnalate](https://github.com/ulaulaman/eduinaf/issues/5) e ottimizzazione generale del codice
* 2021.0628
  * Modifiche al codice di costellazioni.php per risolvere le [*issue* segnalate](https://github.com/ulaulaman/eduinaf/issues/5)
  * Sistemazioni varie nella pagina di descrizione del *plugin*
  * Modifiche minori in link.php
* 2021.0626
  * Conclusione delle modifiche ad astrodidattica.php per risolvere le [*issue* segnalate](https://github.com/ulaulaman/eduinaf/issues/5)
* 2021.0624
  * Nuove modifiche al codice di astrodidattica.php per risolvere le [*issue* segnalate](https://github.com/ulaulaman/eduinaf/issues/5)
* 2021.0513
  * Nuove modifiche al codice di astrodidattica.php per risolvere le [*issue* segnalate](https://github.com/ulaulaman/eduinaf/issues/5)
  * Aggiunto nuovo logo per le collaborazioni
* 2021.0508
  * Disabilitata tabella.php in attesa di risolvere il problema nell'[*issue* segnalato](https://github.com/ulaulaman/eduinaf/issues/4)
  * Modifiche al codice di astrodidattica.php per risolvere le [*issue* segnalate](https://github.com/ulaulaman/eduinaf/issues/5)
* 2021.0416
  * Spacchettato il *file* speciali.php in tre *file* separati
  * Estesi gli speciali anche ai video della settimana
  * Rivisto parte del codice della griglia degli speciali
* 2021.0410
  * Corretto errore in [grigliaspeciali] dovuto a *query* senza risultato
  * Aggiunte tipologie di post differenti in [grigliaspeciali]
* 2021.0409
  * Aggiunto il logo di Roma3
  * Sistemata la parte degli argomenti del *curriculum* scolastico nella *sidebar* di astrodidattica

### Changelog precedenti

* [Changelog 2020](changelog2020.md)
* [Changelog 2018](changelog2018.md)
* [Changelog pre 1.0](changelog01.md)