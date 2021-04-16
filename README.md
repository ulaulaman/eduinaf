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

### Speciali

Aggiunti una tassonomia e due *shortcode* per la gestione degli Speciali. In particolare i due *shortcode* hanno la seguente sintassi:

* Griglia da inserire nella pagina dello Speciale: [grigliaspeciali speciale="slug speciale" tipo="slug tipologia post"]
* Box da inserire in un *widget* di testo per generare il sommario completo dello Speciale: [tabspeciali speciale="slug speciale"]

### Storia

Il *plugin* è stato originariamente sviluppato per integrarsi con [Co-Authors Plus](https://wordpress.org/plugins/co-authors-plus/). I codici di integrazione con questo *plugin* sono stati cancellati dalla versione attuale e spostati in [Co-Authors Widget](https://wordpress.org/plugins/widget-for-co-authors/) (vedi anche la [pagina del *plugin*](https://ulaulaman.github.io/widget-for-co-authors/)).

## Changelog
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

* [Changelog 2020](https://github.com/ulaulaman/eduinaf/blob/master/changelog2020.md)
* [Changelog 2018](https://github.com/ulaulaman/eduinaf/blob/master/changelog2018.md)
* [Changelog pre 1.0](https://github.com/ulaulaman/eduinaf/blob/master/changelog01.md)