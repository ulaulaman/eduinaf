<?php
# manipolazione feed rss
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
