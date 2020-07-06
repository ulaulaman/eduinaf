Il plugin aggiunge varie funzionalità al sito Edu INAF senza modificare direttamente il codice php del tema.

## Descrizione

Il plugin è stato originariamente sviluppato per integrarsi con il plugin [Co-Authors Plus](https://wordpress.org/plugins/co-authors-plus/). I codici di integrazione con il plugin sono stati cancellati dalla versione attuale e spostati nel plugin [Co-Authors Widget](https://wordpress.org/plugins/widget-for-co-authors/) (vedi anche la [pagina del plugin](https://ulaulaman.github.io/widget-for-co-authors/)).
Il plugin aggiunge un'icona per il login, personalizza il messaggio nell'*admin footer*, manipola il *feed rss* per accreditare l'articolo all'autore/i, inclusi *guest author* (**Attenzione**: la manipolazione del *feed* funziona solo con [Co-Authors Plus](https://wordpress.org/plugins/co-authors-plus/) installato), aggiunge degli shortcode per la creazione automatica dei link alle attività astroedu e alle notizie spacescoop. In particolare entrambi gli shortcode utilizzano due parametri, il codice dell'attività/news e la lingua.

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

### Attività didattiche

Sono anche presenti una serie di *shortcode* che permettono la visualizzazione dei campi creati utilizzando [Custom Field Suite](https://wordpress.org/plugins/custom-field-suite/) e in uso dalle attività didattiche create con [Custom Post Type UI](https://wordpress.org/plugins/custom-post-type-ui/).

### Speciali

Aggiunti una tassonomia e due *shortcode* per la gestione degli Speciali. In particolare i due *shortcode* hanno la seguente sintassi:

* Griglia da inserire nella pagina dello Speciale: [grigliaspeciali speciale="slug speciale"]
* Box da inserire in un *widget* di testo per generare il sommario completo dello Speciale: [specialishort speciale="slug speciale"]

## Changelog
* 2020.0706
  * disabilitato contacaratteri (in conflitto con plugin che incorpora il google calendar)
  * disabilitati shortcode della didattica
  * nuovo avatar di login
* 2018.0625
  * aggiunto il permalink sull'immagine in evidenza
  * tolta la classe del titolo
  * aggiunta la data con la classe del tema
  * modifiche minori di ordine grafico
* 2018.0622
  * creazione di una griglia per la home per mostrare gli articoli in evidenza con una tassonomia personalizzata creata con plugin esterno
  * creazione del css della griglia della home
* 2018.0503 modifica minore per sistemare la tabella degli articoli di uno Speciale nella spalla
* 2018.0328 varie modifiche agli *shortcode* per la gestione degli Speciali
  * sostituito lo *shortcode* per la creazione della talebba degli articoli di uno speciale con uno con un controllo interno, utilizzabile direttamente in un *widget* di testo
  * modifiche minori alla griglia
* 2018.0327 corretto errore nel *path* di speciali.css
* 2018.0323 aggiunte funzionalità per gli Speciali
  * aggiunta una tassonomia specifica per includere gli articoli in un dato speciale
  * aggiunti due shortcode per la pubblicazione di un box all'interno degli articoli e di una griglia nella pagina di un dato speciale
  * aggiunto un css per la personalizzazione del box da utilizzare in futuro anche per le tabelle degli eventi
* 2018.0228 incluso il file shortcode.php:
  * aggiunge una serie di *shortcode* compatibili con i campi creati con [Custom Field Suite](https://wordpress.org/plugins/custom-field-suite/) e associati con le attività didattiche, tipologia di post creata con [Custom Post Type UI](https://wordpress.org/plugins/custom-post-type-ui/)
* 2018.0219 modifiche nei *loop* e nelle griglie e aggiunta di campi personalizzati:
  * cancellazione della griglia precedente
  * creazione di una griglia per un *loop* generico
  * creazione della griglia per i libri
  * creazione degli *shortcode* corrispondenti
  * creazione di un *metabox* per l'aggiunta del titolo di un libro e dell'url della sua copertina
  * aggiunta in grid.php del codice per sostituire, se presente, il titolo del libro con il titolo del post nel caso della griglia di libri
* 2018.0217 aggiunto un *loop* personalizzato:
  * aggiunto uno *shortcode* che mostra tutti i post dati una categoria e un'etichetta: di default sono rispettivamente 'libri' e 'libri-per-bambini-e-ragazzi'
  * incluso il css per la griglia
* 2018.0214 aggiunti colori ai *link*
* 2018.0212 aggiunto *shortcode* per articoli tratti da Sapere
* 2018.02.11 semplificazioni del codice e nuova numerazione:
  * crezione di *file php* indipendenti con i codici relativi alla pagina di descrizione, al contacaratteri, alla manipolazione del *feed rss*, per gli *shortcode dei link*
* 0.9.6 test per wp 4.9.4
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
