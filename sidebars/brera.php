<?php
#
# corso base di astronomia - Brera
#
add_shortcode( 'sbcorsobase', function () {
	
	$logo = '<p align="center"><img src="https://edu.inaf.it/wp-content/plugins/eduinaf/images/loghi/corso_base_astro.png" /></p>';
	
	$autore = do_shortcode('[blog-post-coauthors]');
	
	$breraNav = wp_get_nav_menu_items(1682);
	
	foreach ( $breraNav as $navItem ) {
		$nav = $nav. '<button><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></button>';
	}
	
	$menu = '<div align="center" class="btn-group">'.$nav.'</div>';
	
	$custom = get_post_custom();
	foreach( $custom as $key => $value ) {
		$key_name = get_post_custom_values( $key = 'pdfcap' );
		if ( $key_name[0] <> null ) {
			$capitolo = '<p><a href="'.$key_name[0].'" target="pdf">Scarica la lezione in pdf</a></p>';
		} else {
			$capitolo = null;
		}
	}
	
	$cap = '<p><strong>Lezione a cura di</strong>: '.$autore.'</p>';
	
	$sidebar = $logo.$cap.$capitolo.$menu;
	
	$out = $sidebar;

	return $out;
} );