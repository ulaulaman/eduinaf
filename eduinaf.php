<?php
/*
Plugin Name: Edu INAF Plugin
Description: Il plugin aggiunge varie funzionalità al sito Edu INAF senza modificare direttamente il codice php del tema.
Version: 0.9.6
Author: Gianluigi Filippelli
Author URI: http://dropseaofulaula.blogspot.it/
Plugin URI: https://ulaulaman.github.io/eduinaf/
GitHub Plugin URI: https://github.com/ulaulaman/eduinaf
License: GPLv2 or later
*/
/* ------------------------------------------------------ */
# menu plugin
/** Aggiunta del menu */
add_action( 'admin_menu', 'eduinaf_menu' );

/** Creazione del menu come sottovoce della dashboard */
function eduinaf_menu() {
	add_dashboard_page( 'Edu INAF Plugin: pagina di documentazione', 'Edu INAF', 'manage_options', 'eduinaf-top-level-handle', 'eduinaf_toplevel_page' );
}

/** Creazione della pagina di documentazione */
function eduinaf_toplevel_page() {
        echo '<h2>Edu INAF Plugin</h2>';
	echo '<div class="wrap">';
        echo '<p>Il plugin aggiunge varie funzionalità al sito Edu INAF senza modificare direttamente il codice php del tema.<br/>In particolare sono presenti gli shortcode per la creazione automatica dei link alle attività astroedu e alle notizie spacescoop. In particolare lo shortcode utilizza due parametri, il codice dell\'attività/news e la lingua</p>';
        echo '<p><strong>Uso degli shortcode</strong>:</p>';
	echo '<p>[astroedu code="..." lang="..."]</p>';
        echo '<p>[spacescoop code="..." lang="..."]<br/>';
        echo '<p>Entrambi i parametri sono obbligatori per il corretto funzionamento dello shortcode.</p>';
	echo '</div>';
}

# messaggio nell'admin footer
function remove_footer_admin () {
 
echo 'Benvenuto su <a href="http://edu.inaf.it/" target="inaf">Edu INAF</a> | Sito realizzato con <a href="http://www.wordpress.org" target="word">WordPress</a></p>';
 
}
 
add_filter('admin_footer_text', 'remove_footer_admin');

# manipolazione del feed rss
# aggiunta delle attività didattiche
function myfeed_request($qv) {
    if (isset($qv['feed']) && !isset($qv['post_type']))
        $qv['post_type'] = array('post', 'attivita_didattica');
    return $qv;
}
add_filter('request', 'myfeed_request');

# aggiunta dell'immagine in evidenza
function rss_post_thumbnail($content) {
global $post;
if(has_post_thumbnail($post->ID)) {
$content = '<p>' . get_the_post_thumbnail($post->ID) .
'</p>' . get_the_excerpt();
}
return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');

# aggiunta autori in apertura e messaggio di chiusura per post nel feed
function eduinaf_postrss($content) {
$coauthors = coauthors_posts_links(", ", " e ", null, null, false);
if(is_feed()){
$content = '<p>Questo articolo è stato scritto da '.$coauthors.'</p>'.$content.'<p>Leggi Edu INAF</p>';
}
return $content;
}
add_filter('the_excerpt_rss', 'eduinaf_postrss');
add_filter('the_content', 'eduinaf_postrss');

# Aggiunta del logo e modifica del link nella pagina di login
function custom_login_logo() {
	echo '<style type="text/css">
	h1 a { background-image: url('.plugin_dir_url( __FILE__ ).'images/avatar_eduinaf.png) !important; }
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

# Contacaratteri
# Excerpt/Riassunto
function excerpt_count_js(){

if ('page' != get_post_type()) {

      echo '<script>jQuery(document).ready(function(){
jQuery("#postexcerpt .handlediv").after("<div style=\"position:absolute;top:12px;right:34px;color:#666;\"><small>Numero caratteri: </small><span id=\"excerpt_counter\"></span><span style=\"font-weight:bold; padding-left:7px;\">/ 500</span><small><span style=\"font-weight:bold; padding-left:7px;\">caratteri.</span></small></div>");
     jQuery("span#excerpt_counter").text(jQuery("#excerpt").val().length);
     jQuery("#excerpt").keyup( function() {
         if(jQuery(this).val().length > 500){
            jQuery(this).val(jQuery(this).val().substr(0, 500));
        }
     jQuery("span#excerpt_counter").text(jQuery("#excerpt").val().length);
   });
});</script>';
}
}
add_action( 'admin_head-post.php', 'excerpt_count_js');
add_action( 'admin_head-post-new.php', 'excerpt_count_js');

# Content/Contenuto
function content_char_count() {
?>
<script type="text/javascript">
(function($) {
	wpCharCount = function(txt) {
		$('.char-count').html("" + txt.length);
	};
	$(document).ready(function() {
		$('#wp-word-count').append('<br />Numero caratteri: <span class="char-count">0</span>');
	}).bind( 'wpcountwords', function(e, txt) {
		wpCharCount(txt);
	});
	$('#content').bind('keyup', function() {
		wpCharCount($('#content').val());
	});
}(jQuery));
</script>
<?php
}
add_action('dbx_post_sidebar', 'content_char_count');

# Citazioni e link automatici
# Astroedu
add_shortcode('astroedu', 'astroedu');

 function astroedu ($atts, $content = null) {

   extract(
      shortcode_atts(
         array( 
		'lang' => null,
		'code' => null,
	 ),
         $atts
      )
   );

   $link = '<a href="http://astroedu.iau.org/'.$lang.'/activities/'.$code.'/" target="astroedu">'.$content.'</a>';

   return $link;
}

# spacescoop
add_shortcode('spacescoop', 'spacescoop');

 function spacescoop ($atts, $content = null) {

   extract(
      shortcode_atts(
         array( 
		'lang' => null,
		'code' => null,
	 ),
         $atts
      )
   );

   $link = '<a href="http://www.spacescoop.org/'.$lang.'/scoops/'.$code.'/" target="spacescoop">'.$content.'</a>';

   return $link;
}
/* ------------------------------------------------------ */
?>
