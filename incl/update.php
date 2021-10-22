<?php
# manipolazione feed rss
# aggiunta post personalizzati
function myfeed_request($qv) {
    if (isset($qv['feed']) && !isset($qv['post_type']))
        $qv['post_type'] = array('post', 'costellazioni', 'astrofoto');
    return $qv;
}
add_filter('request', 'myfeed_request');

# aggiunta dell'immagine in evidenza
function rss_post_thumbnail($content) {
    global $post;
    if ( has_post_thumbnail($post->ID) ) {
        $content = '<p>'.get_the_post_thumbnail($post->ID).'</p>'.get_the_excerpt();
    }

    return $content;
}
add_filter('the_excerpt_rss', 'rss_post_thumbnail');
add_filter('the_content_feed', 'rss_post_thumbnail');

# aggiunta autori in apertura e messaggio di chiusura per post nel feed
function eduinaf_postrss( $content ) {
    if ( function_exists( 'get_coauthors' ) ) {
	    $coauthors = coauthors_posts_links(", ", " e ", null, null, false);
	} else {
	    $coauthors = get_author_posts_url( $coauthor->ID, $coauthor->user_nicename );
    }
    
    if( is_feed() ){
        $url = get_the_author_meta( 'user_url' );
		$name = get_the_author_meta( 'display_name' );
		$coauthors = '<a href="'.$url.'">'.$name.'</a>';
    }

    return $content;
}
add_filter('the_excerpt_rss', 'eduinaf_postrss');
add_filter('the_content', 'eduinaf_postrss');

# striscia ultimo aggiornamento
function wpb_last_updated_date( $content ) {
    $u_time = get_the_time('U');
    $u_modified_time = get_the_modified_time('U');
    if ( $u_modified_time >= $u_time + 86400 ) { 
        $updated_date = get_the_modified_time('j F Y');
        $custom_content = '<p class="last-updated">Aggiornato il '. $updated_date .'</p>';
    }
    
    $custom_content .= $content;
        
    if ( get_post_type() <> 'page' && get_post_type() <> 'oae_italia' ) {
        return $custom_content;
    } else {
        if ( get_the_ID() === 17897 ) {
            return $custom_content;
        } else {
            return $content;
        }
    }    
}
add_filter( 'the_content', 'wpb_last_updated_date' );

# creazione shortcode per alcuni link esterni
# astroEdu
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

    if ( $lang <> null ) {
        $link = '<a href="http://astroedu.iau.org/'.$lang.'/activities/'.$code.'/" target="astroedu" class="astroedu">'.$content.'</a>';
    } else {
        $link = '<a href="http://astroedu.iau.org/it/activities/'.$code.'/" target="astroedu" class="astroedu">'.$content.'</a>';
    }

    return $link;
}

# Spacescoop
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

    if ( $lang <> null ) {
        $link = '<a href="http://www.spacescoop.org/'.$lang.'/scoops/'.$code.'/" target="spacescoop" style="color: #03709c">'.$content.'</a>';
    } else {
        $link = '<a href="http://www.spacescoop.org/it/scoops/'.$code.'/" target="spacescoop" style="color: #03709c">'.$content.'</a>';
    }

    return $link;
}

# Sapere
add_shortcode('sapere', 'sapere');
function sapere ($atts, $content = null) {
    extract(
        shortcode_atts(
            array(
                'url' => null,
                'num' => null,
                'data' => null,
                'doi' => null,
            ),
            $atts
        )
    );

    if ( $doi <> null ) {
        if ( $url <> null ) {
            $link = '<em>Estratto dall\'articolo "<a href="'.$url.' target="sapere">'.$content.'</a>" uscito su Sapere n.'.$num.' di '.$data.'. doi:<a href="https://dx.doi.org/'.$doi.'" target="doi">'.$doi.'</a></em>';
        } else {
            $link = '<em>Estratto dall\'articolo "'.$content.'" uscito su Sapere n.'.$num.' di '.$data.'. doi:<a href="https://dx.doi.org/'.$doi.'" target="doi">'.$doi.'</a></em>';
        }
    } else {
        if ( $url <> null ) {
            $link = '<em>Estratto dall\'articolo "<a href="'.$url.' target="sapere">'.$content.'</a>" uscito su Sapere n.'.$num.' di '.$data.'.</em>';
        } else {
            $link = '<em>Estratto dall\'articolo "'.$content.'" uscito su Sapere n.'.$num.' di '.$data.'.</em>';
        }
    }

    return $link;
}