<?php
#
# costellazioni
#

# menu
add_shortcode( 'menucostellazioni', function () {
	
	$menu = '<div align="center" class="btn-group"><button><a href="https://edu.inaf.it/le-costellazioni/">Le costellazioni</a></button><button><a href="https://edu.inaf.it/le-costellazioni/mappe-stagionali/">Le mappe stagionali</a></button><button><a href="https://edu.inaf.it/le-costellazioni/glossario/">Glossario</a></button><button><a href="https://edu.inaf.it/astroschede/">Schede astronomiche</a></button><button><a href="http://edu.inaf.it/category/rubriche/il-cielo-del-mese/" target="eduinaf">Il cielo del mese</a></button></div>';
	
	$out = $menu;

	return $out;
} );

# sidebar
add_shortcode( 'sbcostellazioni', function () {
	
	$custom = get_post_custom();
	foreach( $custom as $key => $value ) { 
		$key_name = get_post_custom_values( $key = 'ascensione_retta_centrale' );
		$field1 = '<p><strong>Ascensione retta centrale</strong>: '.$key_name[0].'</p>';
		$key_name = get_post_custom_values( $key = 'declinazione_centrale' );
		$field2 = '<p><strong>Declinazione centrale</strong>: '.$key_name[0].'</p>';
		$key_name = get_post_custom_values( $key = 'urlmappa' );
		$mappa = '<p><img src="'.$key_name[0].'" /></p>';
		if ( $key_name[1] <> null ) {
			$mappa1 = '<p><img src="'.$key_name[1].'" /></p>';
		} else { $mappa1 = null; }
		if ( $key_name[2] <> null ) {
			$mappa2 = '<p><img src="'.$key_name[2].'" /></p>';
		} else { $mappa2 = null; }
	}
	$map = $mappa.$mappa1.$mappa2;
	
	$type = 'emisfero ';
	$terms = get_the_terms ( $post->ID, 'emisfero' );
	$numcat = sizeof( $terms );
	$i = 0;
	foreach ( $terms as $term ) {
		$term_link = get_term_link( $term, 'emisfero' );
		$i++;
		if ( $i < $numcat ) {
			$type = $type.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>, ';
		} else {
			$type = $type.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>';
		}		
	}
	
	$terms = get_the_terms ( $post->ID, 'stagione' );
	$numcat = sizeof( $terms );
	if ( $numcat > 1 ) {
		$season = '<strong>Stagioni</strong>: ';
	} else {
		$season = '<strong>Stagione</strong>: ';
	}
	$i = 0;
	foreach ( $terms as $term ) {
		$term_link = get_term_link( $term, 'stagione' );
		$i++;
		if ( $i < $numcat ) {
			$season = $season.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>, ';
		} else {
			$season = $season.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>';
		}		
	}
	
	$visibile = '<p><strong>Visibile in</strong>: '.$type.'</p><p>'.$season.'</p>';
	
	if ( get_post_type() == 'costellazioni' ) {
		$out = $map.$field1.$field2.$visibile;
	} else {
		$out = null;
	}

	return $out;
} );