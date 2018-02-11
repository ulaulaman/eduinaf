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
	echo '</div>';
}

/** Aggiunta del menu */
add_action( 'admin_menu', 'eduinaf_menu' );
