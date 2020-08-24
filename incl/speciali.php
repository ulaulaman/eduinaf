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
		array('post','astrodidattica'), /* per estendere array('post','page','custom-post-type') */
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

			/* griglia con titolo ed estratto: stilizzazione minimale */
			$header = '<h4 style="color: #ecb252;">'.$titolo.'</h4>';
			$content .= $header.'<p><em>di <strong>'.$autori.'</strong></em><br/>'.$estratto.'<br/>(<a href="'.get_the_permalink().'" style="color: #1d71b8;">continua</a>)</p><hr/>';

			/* griglia con titolo ed estratto: formato tabella */
			$headerblu = '<div class="divTableHeading"><div class="divTableRow"><div class="divTableHead">'.$titolo.'</div></div></div>';
			$contentblu .= '<div class="divTable paleBlueRows">'.$headerblu.'<div class="divTableBody"><div class="divTableRow"><div class="divTableCell"><em>di <strong>'.$autori.'</strong></em><br/>'.$estratto.'<br/>(<a href="'.get_the_permalink().'" style="color: #1d71b8;">continua</a>)</div></div>';
		}
		
		$content = $content.'</p>';
		$contentblu = $contentblu.'</div></div>';
		
		/* ripristino */
		wp_reset_postdata();
	}
	
	return $contentblu;
}
add_shortcode( 'grigliaspeciali', 'grigliaspeciali' );

#shortcode per mostrare in una tabella l'elenco degli articoli di uno speciale: da utilizzare in un widget di testo in attesa di creare un widget vero e proprio
function specialishort($atts) {
	
	global $post;
	
	extract(
		shortcode_atts(
			array(
				'speciale' => 'null',
			),
			$atts
		)
	);
	
	#tutti i termini associati all'eventuale speciale associato al post
	$term_list = wp_get_post_terms($post->ID, 'speciali', array("fields" => "all"));
	#estrazione del nome dello speciale associato al post
	$nomespeciale = $term_list[0]->name;
	
	if ($nomespeciale <> $speciale) { $content = null; } else {
		$q = new WP_Query( array( 'speciali' => $speciale, 'posts_per_page'=>-1 ) );
		$header = '<div class="divTable paleBlueRows"><div class="divTableHeading"><div class="divTableRow"><div class="divTableHead"><strong>Speciale '.$speciale.'</strong></div></div></div>';
		
		if ( $q->have_posts() ) {
			while ( $q->have_posts() ) {
				$q->the_post();
				$titolo = get_the_title();
				if ( function_exists( 'get_coauthors' ) ) {
					$autori = coauthors_posts_links(", ", " e ", null, null, false);
				} else {
					$autori = the_author();
				}
				$estratto = get_the_excerpt();
				
				$content .= '<div class="divTableBody"><div class="divTableRow"><div class="divTableCell"><a href="'.get_the_permalink().'" style="color: #1d71b8;">'.$titolo.'</a></div></div></div>';
			}
			$content = $content.'</p>';
			/* ripristino */
			wp_reset_postdata();
		}
	}
	
	$content = '<p>'.$header.$content.'</div></p>';
	
	return $content;
}
add_shortcode( 'specialishort', 'specialishort' );
