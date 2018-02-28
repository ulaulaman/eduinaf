<?php

# menu plugin

/** Creazione del menu come sottovoce della dashboard */
function eduinaf_menu() {
	add_dashboard_page( 'Edu INAF Tools: pagina di documentazione', 'Edu INAF', 'manage_options', 'eduinaf-top-level-handle', 'eduinaf_toplevel_page' );
}

/** Creazione della pagina di documentazione */
function eduinaf_toplevel_page() {
        echo '<h2>Edu INAF Tools</h2>';
	echo '<div class="wrap">';
        echo '<p>Il plugin aggiunge varie funzionalità al sito Edu INAF senza modificare direttamente il codice php del tema.<br/>In particolare sono presenti gli shortcode per la creazione automatica dei link alle attività astroedu e alle notizie spacescoop. In particolare lo shortcode utilizza due parametri, il codice dell\'attività/news e la lingua</p>';
        echo '<p><strong>Uso degli shortcode</strong>:</p>';
	echo '<p>[astroedu code="..." lang="..."]</p>';
        echo '<p>[spacescoop code="..." lang="..."]</p>';
        echo '<p>Entrambi i parametri sono obbligatori per il corretto funzionamento dello shortcode.</p>';
	echo '<h3>Griglia di libri</h3>';
        echo '<p>Il plugin aggiunge anche uno shortcode che genera una griglia. Esistono due distinte versioni: lo shortcode generico:</p>';
        echo '<p>[grigliaeduinaf categoria="..." etichetta="..."]</p>';
        echo '<p>in cui almeno uno dei due parametri deve essere specificato.</p>';
        echo '<p>Il secondo shortcode, invece, genera una griglia appositamente per i libri:</p>';
        echo '<p>[griglialibri etichetta="..."]</p>';
        echo '<p>dove il parametro etichetta è, al momento, settato di default sul valore "libri-per-bambini-e-ragazzi" e va utilizzato per distinguere tra le tre differenti sottosezioni delle recensioni</p>';
	echo '<h3>Shortcode per le attività didattiche</h3>';
	echo '<p>Elenco degli <em>shortcode</em> introdotti per la visualizzazione dei campi delle attività didattiche creati con Custom Field Suite:';
	echo '<ul><li>curriculum scolastico: [eduinaf-ad-curriculum]</li>';
	echo '<li>obiettivi: [eduinaf-ad-obiettivi]</li>';
	echo '<li>obiettivi educativi: [eduinaf-ad-obiettivi-educativi]</li>';
	echo '<li>materiali: [eduinaf-ad-materiali]</li>';
	echo '<li>età degli studenti: [eduinaf-ad-eta]</li>';
	echo '<li>durata: [eduinaf-ad-durata]</li>';
	echo '<li>supervisione: [eduinaf-ad-supervisione]</li>';
	echo '<li>attività di gruppo: [eduinaf-ad-gruppo]</li>';
	echo '<li>costo: [eduinaf-ad-costo]</li>';
	echo '<li>luogo: [eduinaf-ad-luogo]</li>';
	echo '<li>abilità acquisite: [eduinaf-ad-abilita]</li>';
	echo '<li>allegati: [eduinaf-ad-allegati]</li>';
	echo '<li>bibliografia: [eduinaf-ad-biblio]</li>';
	echo '<li>autori: [eduinaf-ad-autori]</li>';
	echo '<li>area: [eduinaf-ad-area]</li>';
	echo '<li>descrizione breve: [eduinaf-ad-abstract]</li>';
	echo '<li>descrizione completa: [eduinaf-ad-completa]</li>';
	echo '<li>materiale aggiuntivo: [eduinaf-ad-materiale]</li>';
	echo '<li>informazioni preliminari: [eduinaf-ad-info]</li>';
	echo '<li>valutazione: [eduinaf-ad-valutazione]</li>';
	echo '<li>informazioni aggiuntive: [eduinaf-ad-infoplus]</li>';
	echo '<li>conclusioni: [eduinaf-ad-conclusioni]</li>';
	echo '<li>ringraziamenti: [eduinaf-ad-ringraziamenti]</li>';
	echo '<li>titolo: [eduinaf-ad-titolo]</li>';
	echo '<li>dimensione media: [eduinaf-ad-media]</li>';
	echo '<li>dimensione massima: [eduinaf-ad-massima]</li>';
	echo '<li>worksheet: [eduinaf-ad-worksheet]</li>';
	echo '<li>parole chiave: [eduinaf-ad-keyword]</li>';
	echo '<li>livello educativo: [eduinaf-ad-livello]</li>';
	echo '<li>categorie astronomiche: [eduinaf-ad-astrocat]</li>';
	echo '<li>categorie scienze della terra: [eduinaf-ad-terracat]</li>';
	echo '<li>categorie scienza dello spazio: [eduinaf-ad-spacecat]</li>';
	echo '<li>tipologia: [eduinaf-ad-tipologia]</li></ul></p>';
	echo '</div>';
}

/** Aggiunta del menu */
add_action( 'admin_menu', 'eduinaf_menu' );
