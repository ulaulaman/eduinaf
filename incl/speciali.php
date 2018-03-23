<?php
# tassonomia per gli speciali
function speciali_tax() {
	$labels = array(
		'name' => _x('Speciali', 'taxonomy general name'),
		'singular_name' => _x('Speciale', 'taxonomy singular name'),
		'all_items' => __('Tutti gli speciali'),
		'edit_item' => __('Modifica speciale'), 
		'update_item' => __('Aggiorna speciale'),
		'add_new_item' => __('Aggiungi un nuovo speciale'),
		'new_item_name' => __('Nuovo speciale'),
		'menu_name' => __('Speciali'),
	);

	register_taxonomy(
		'speciali',
		array('post'), /* per estendere array('post','page','custom-post-type') */
		array(
			'hierarchical' => true,
			'labels' => $labels,
			'show_ui' => true,
			'query_var' => true,
			'rewrite' => array('slug' => 'speciali'),
		)
	);
}
add_action('init', 'speciali_tax', 0);

# shortcode per mostrare l'elenco degli articoli di uno speciale all'interno di un post o di una pagina
function specialieduinaf($atts) {
	global $post;
	
	extract(
		shortcode_atts(
			array(
				'speciale' => 'null',
				'titolo' => 'null',
				'linkpage' => 'null',
			),
			$atts
		)
	);
	
	$q = new WP_Query( array( 'speciali' => $speciale, 'posts_per_page'=>-1 ) );
	$nnome = 'null';
	if ( $titolo <> 'null' ) {
		$nnome = $titolo;
		if ( $linkpage <> 'null' ) {
			$nnome = '<a href="'.$linkpage.'>'.$titolo.'</a>';
		}
	} else {$nnome = $speciale;}
	
	$header = '<div style="float: right; padding: 5px; width: 25%;" class="divTable paleBlueRows"><div class="divTableHeading"><div class="divTableRow"><div class="divTableHead"><strong>Speciale '.$nnome.'</strong></div></div></div>';
	if ( $q->have_posts() ) {
		while ( $q->have_posts() ) {
			$q->the_post();
			$titolo = get_the_title();
			$grid .= '<div class="divTableBody"><div class="divTableRow"><div class="divTableCell"><a href="'.get_the_permalink().'">'.$titolo.'</a></div>';
		}
		$grid = $header.$grid.'</div></div>';
		/* ripristino */
		wp_reset_postdata();
	}
	
	$container = '<p><div>'.$grid.'</div></p>';
	
	return $container;
}
add_shortcode( 'specialieduinaf', 'specialieduinaf' );

# shortcode per la creazione della griglia per la pagina degli speciali
function grigliaspeciali($atts) {
	global $post;
	
	extract(
		shortcode_atts(
			array(
				'speciale' => 'null',
			),
			$atts
		)
	);
	
	$q = new WP_Query( array( 'speciali' => $speciale, 'posts_per_page'=>-1 ) );
	$content = '<p>';
	
	if ( $q->have_posts() ) {
		while ( $q->have_posts() ) {
			$q->the_post();
			$titolo = get_the_title();
			if ( function_exists( 'get_coauthors' ) ) {
				$autori = coauthors_posts_links(", ", " e ", null, null, false);
			} else {$autori = the_author();}
			
			$estratto = get_the_excerpt();
			$tassonomia = get_the_category_list();
			$header = '<h4 style="color: #ecb252;">'.$titolo.'</h4><hr/>';
			$content .= $header.'<p><em>di <strong>'.$autori.'</strong><br/>'.$tassonomia.'</em><br/>'.$estratto.'<br/>(<a href="'.get_the_permalink().'" style="color: #1d71b8;">continua</a>)</p>';
		}
		
		$content = $content.'</p>';
		/* ripristino */
		wp_reset_postdata();
	}
	
	return $content;
}
add_shortcode( 'grigliaspeciali', 'grigliaspeciali' );
