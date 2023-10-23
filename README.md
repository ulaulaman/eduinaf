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

### Griglie e *loop*

Il *plugin* aggiunge degli *shortcode* per generare delle griglia di *post*. Si può utilizzare uno *shortcode* generico:

[grigliata categoria="..." etichetta="..." tassonomia="..." valore="..."]

in cui almeno uno dei due parametri deve essere specificato. Nel caso di *tassonomia*, a questo sarebbe buona norma abbinare anche il *valore* che può assumere la tassonomia personalizzata.

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
* 2023.1023 Cambio file scheda di partecipazione concorso Rodari 2023
* 2023.1019 Modificati link e aggiunti documenti per Rodari 2023 e archiviato il menu di Rodari 2022
* 2023.0113 Aggiuntinuovi loghi in collaborazioni
* 2022.1020 Correzione errori versione precedente e nuovo bando concorso Rodari 2022
* 2022.1012 Nuovi allegati per il concorso Rodari 2022
* 2022.0610
  * Modifica *link* della barra laterale del concorso Rodari
  * Eliminazione delle griglie eduinaf e libri e semplificazione della grigliata
  * Accorpamento di speciali e grid in quest'ultimo

### Changelog precedenti

* [Changelog 2021](changelog2021.md)
* [Changelog 2020](changelog2020.md)
* [Changelog 2018](changelog2018.md)
* [Changelog pre 1.0](changelog01.md)