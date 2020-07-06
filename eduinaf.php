<?php
/*
Plugin Name: Edu INAF Tools
Description: Il plugin aggiunge varie funzionalità al sito Edu INAF senza modificare direttamente il codice php del tema.
Version: 2020.0706
Author: Gianluigi Filippelli
Author URI: http://dropseaofulaula.blogspot.it/
Plugin URI: https://ulaulaman.github.io/eduinaf/
GitHub Plugin URI: https://github.com/ulaulaman/eduinaf
License: GPLv2 or later
*/
/* ------------------------------------------------------ */
# inclusione file
define( 'EDUINAF__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
# pagina di descrizione
require_once( EDUINAF__PLUGIN_DIR . 'incl/menu.php' );
# manipolazione feed
require_once( EDUINAF__PLUGIN_DIR . 'incl/feed.php' );
# creazione link: astroedu, spacescoop
require_once( EDUINAF__PLUGIN_DIR . 'link/link.php' );
# metabox per campi aggiuntivi sui libri
require_once( EDUINAF__PLUGIN_DIR . 'incl/metabox.php' );
# creazione di un loop con griglia
require_once( EDUINAF__PLUGIN_DIR . 'incl/grid.php' );
# creazione della griglia per la home
require_once( EDUINAF__PLUGIN_DIR . 'incl/evidenza.php' );
# Speciali
require_once( EDUINAF__PLUGIN_DIR . 'incl/speciali.php' );

# inclusione di css personalizzato per tabella
 function edu_inaf_table () {
	 wp_register_style( 'eduinaf', plugins_url( 'eduinaf/incl/speciale.css' ) );
	 wp_enqueue_style( 'eduinaf' );
 }
add_action( 'wp_enqueue_scripts', 'edu_inaf_table' );

# inclusione di css personalizzato per la griglia in home
 function edu_inaf_evidenza () {
   wp_register_style( 'evidenza', plugins_url( 'eduinaf/incl/evidenza.css' ) );
   wp_enqueue_style( 'evidenza' );
 }

add_action( 'wp_enqueue_scripts', 'edu_inaf_evidenza' );

# messaggio nell'admin footer
function remove_footer_admin () {
	echo 'Benvenuto su <a href="http://edu.inaf.it/" target="inaf">Edu INAF</a> | Sito realizzato con <a href="http://www.wordpress.org" target="word">WordPress</a></p>';
} 
add_filter('admin_footer_text', 'remove_footer_admin');

# Aggiunta del logo e modifica del link nella pagina di login
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url('.plugin_dir_url( __FILE__ ).'images/avatar_eduinaf_blu.png) !important; }
	</style>';
}
add_action('login_head', 'custom_login_logo');

function eduinaf_login_logo_url() {
    return home_url();
}
add_filter( 'login_headerurl', 'eduinaf_login_logo_url' );

function eduinaf_login_logo_url_title() {
    return 'Edu INAF';
}
add_filter( 'login_headertitle', 'eduinaf_login_logo_url_title' );
/* ------------------------------------------------------ */
?>
