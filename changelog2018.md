## Changelog 2018
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
  * aggiunti due *shortcode* per la pubblicazione di un box all'interno degli articoli e di una griglia nella pagina di un dato speciale
  * aggiunto un css per la personalizzazione del box da utilizzare in futuro anche per le tabelle degli eventi
* 2018.0228 incluso il file shortcode.php
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
* 2018.0211 semplificazioni del codice e nuova numerazione:
  * crezione di *file php* indipendenti con i codici relativi alla pagina di descrizione, al contacaratteri, alla manipolazione del *feed rss*, per gli *shortcode* dei *link*