<?php
#
# costellazioni
#

# menu
add_shortcode( 'menucostellazioni', function () {

	$starsNav = wp_get_nav_menu_items(1895);
	
	foreach ( $starsNav as $navItem ) {
		$nav = $nav. '<button><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></button>';
	}

	$menu = '<div align="center" class="btn-group">'.$nav.'</div>';
	
	$out = $menu;

	return $out;
} );

# sidebar
add_shortcode( 'sbcostellazioni', function () {
	
	$custom = get_post_custom();
	if ( empty($custom) ) {
		$out = null;
	} else {
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
		$out = $mappa.$mappa1.$mappa2.$field1.$field2;
	}
	
	$type = 'emisfero ';
	$terms = get_the_terms ( $post->ID, 'emisfero' );
	if ( empty($terms) ) {
		$type = null;
	} else {
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
		$out = $out.'<p><strong>Visibile in</strong>: '.$type.'</p>';
	}
	
	$terms = get_the_terms ( $post->ID, 'stagione' );
	if ( empty($terms) ){
		$season = null;
	} else {
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
		$out = $out.'<p>'.$season.'</p>';
	}

	$auth = do_shortcode('[blog-post-coauthors]');
	$cura = '<h4 class="widget-title"><span>Scheda a cura di</h4><p><strong>'.$auth.'</strong></p>';

	$starsNav = wp_get_nav_menu_items(1895);
	
	foreach ( $starsNav as $navItem ) {
		$nav = $nav. '<button><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></button>';
	}

	$menu = '<div align="center" class="btn-group">'.$nav.'</div>';
	
	$out = $menu;
	
	$out = $out.$cura.$menu;

	return $out;
} );