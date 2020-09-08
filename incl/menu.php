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
	echo '<h3>Shortcode per gli speciali</h3>';
	echo '<p>Per la creazione del <em>loop</em> nella pagina di uno speciale:</p>';
	echo '<p>[grigliaspeciali speciale="slug speciale"]</p>';
	echo '<p>Per inserire una lista degli articoli di uno speciale nella barra laterale:</p>';
	echo '<p>[tabspeciali speciale="slug speciale"]</p>';
	echo '</div>';
}

/** Aggiunta del menu */
add_action( 'admin_menu', 'eduinaf_menu' );
