=== Edu INAF Tools ===
Contributors: ulaulaman
Tags: eduinaf, inaf
Requires at least: 4.8.5
Tested up to: 4.9.4
Requires PHP: 7.0.18
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

Il plugin, in italiano, aggiunge varie funzionalità al sito Edu INAF senza modificare direttamente il codice php del tema.

== Description ==
Il plugin è stato originariamente sviluppato per integrarsi con il plugin [Co-Authors Plus](https://wordpress.org/plugins/co-authors-plus/). I codici di integrazione con il plugin sono stati cancellati dalla versione attuale e spostati nel plugin [Co-Authors Widget](https://wordpress.org/plugins/widget-for-co-authors/) (vedi anche la [pagina del plugin](https://ulaulaman.github.io/widget-for-co-authors/)).

Il plugin aggiunge un'icona per il login, personalizza il messaggio nell'*admin footer*, manipola il *feed rss* per accreditare l'articolo all'autore/i, inclusi *guest author* (**Attenzione**: la manipolazione del *feed* funziona solo con [Co-Authors Plus](https://wordpress.org/plugins/co-authors-plus/) installato), aggiunge degli shortcode per la creazione automatica dei link alle attività astroedu e alle notizie spacescoop. In particolare entrambi gli shortcode utilizzano due parametri, il codice dell'attività/news e la lingua.

[astroedu code="..." lang="..."]

[spacescoop code="..." lang="..."]

Entrambi i parametri sono obbligatori per il corretto funzionamento degli shortcode.

Il plugin aggiunge anche uno shortcode che genera una griglia. Esistono due distinte versioni: lo shortcode generico:

[grigliaeduinaf categoria="..." etichetta="..."]

in cui almeno uno dei due parametri deve essere specificato.
Il secondo shortcode, invece, genera una griglia appositamente per i libri:

[griglialibri etichetta="..."]

dove il parametro etichetta è, al momento, settato di default sul valore "libri-per-bambini-e-ragazzi" e va utilizzato per distinguere tra le tre differenti sottosezioni delle recensioni

== Changelog ==
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
* 2018.0212 aggiunto shortcode per articoli tratti da Sapere
* 2018.0211 semplificazioni del codice e nuova numerazione:
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
