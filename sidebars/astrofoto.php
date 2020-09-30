<?php
#
# astrofoto
#
add_shortcode( 'sbastrofoto', function () {
	
	$img = '<div align="center"><img src="https://edu.inaf.it/wp-content/uploads/2020/05/astrofoto_avatar-180x180.jpg" /></div>';
	
	$auth = null;
	$terms = get_the_terms ( $post->ID, 'astrofotografi' );
	$numcat = sizeof( $terms );
	$i = 0;
	foreach ( $terms as $term ) {
		$term_link = get_term_link( $term, 'tipologia_contenuto' );
		$i++;
		if ( $i <> 0 ) {
			$auth = $auth.'<p align="center"><strong><a rel="tag" href="'.$term_link.'">'.$term->name.'</a></strong></p><p>'.$term->description.'</p>';
		} else {
			$auth = $auth;
		}		
	}
	
	$out = $img.$auth;

	return $out;
} );
