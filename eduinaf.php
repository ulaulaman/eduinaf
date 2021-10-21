<?php
/*
Plugin Name: Edu INAF Tools
Description: Il plugin aggiunge varie funzionalità al sito Edu INAF senza modificare direttamente il codice php del tema.
Version: 2021.1022
Author: Gianluigi Filippelli
Author URI: http://dropseaofulaula.blogspot.it/
Plugin URI: https://ulaulaman.github.io/#EduINAF
GitHub Plugin URI: https://github.com/ulaulaman/eduinaf
License: GPLv2 or later
*/
/* ------------------------------------------------------ */
# inclusione file
define( 'EDUINAF__PLUGIN_DIR', plugin_dir_path( __FILE__ ) );
# manipolazione feed e aggiunta link personalizzati
require_once( EDUINAF__PLUGIN_DIR . 'incl/feed.php' );
# metabox per campi aggiuntivi sui libri
require_once( EDUINAF__PLUGIN_DIR . 'incl/libri.php' );
# creazione loop e griglie
require_once( EDUINAF__PLUGIN_DIR . 'incl/grid.php' );
# creazione di un loop con griglia
require_once( EDUINAF__PLUGIN_DIR . 'rodari/rodari.php' );
# sidebar personalizzate
require_once( EDUINAF__PLUGIN_DIR . 'sidebars/astrodidattica.php' );
require_once( EDUINAF__PLUGIN_DIR . 'sidebars/astrofoto.php' );
require_once( EDUINAF__PLUGIN_DIR . 'sidebars/costellazioni.php' );
require_once( EDUINAF__PLUGIN_DIR . 'sidebars/brera.php' );
require_once( EDUINAF__PLUGIN_DIR . 'sidebars/widgets.php' );
# Speciali
require_once( EDUINAF__PLUGIN_DIR . 'incl/speciali.php' );
# Mappe
require_once( EDUINAF__PLUGIN_DIR . 'incl/mappe.php' );

# inclusione di css personalizzato
 function edu_inaf_table () {
	 wp_register_style( 'eduinaf', plugins_url( 'eduinaf/incl/eduinaf.css' ), rand(111,9999), '1' );
	 wp_enqueue_style( 'eduinaf' );
 }
add_action( 'wp_enqueue_scripts', 'edu_inaf_table' );

# messaggio nell'admin footer
function remove_footer_admin () {
	echo 'Benvenuto su <a href="https://edu.inaf.it/" target="inaf">Edu INAF</a> | Sito realizzato con <a href="https://www.wordpress.org" target="word">WordPress</a></p>';
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
