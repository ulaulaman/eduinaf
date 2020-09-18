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
	
	$q = new WP_Query( array( 'speciali' => $speciale, 'post_type'=> 'post', 'posts_per_page'=>-1 ) );
	$contentblu ='<div class="divTable paleBlueRows">';
	
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

			/* griglia con titolo ed estratto: formato tabella */
			$headerblu = '<div class="divTableHeading"><div class="divTableRow"><div class="divTableHead">'.$titolo.'</div></div></div>';
			$contentblu .= $headerblu.'<div class="divTableBody"><div class="divTableRow"><div class="divTableCell"><em>di <strong>'.$autori.'</strong></em><br/>'.$estratto.'<br/>(<a href="'.get_the_permalink().'" style="color: #1d71b8;">continua</a>)</div></div></div>';
		}
		
		$contentblu = $contentblu.'</div>';
		
		/* ripristino */
		wp_reset_postdata();
	}
	
	return $contentblu;
}
add_shortcode( 'grigliaspeciali', 'grigliaspeciali' );

# nuovo shortcode per listare nella barra gli articoli di uno speciale
function tabspeciali($atts) {
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
	
	#if per determinare se l'articolo fa parte dello speciale; in caso positivo crea l'elenco
	#usato lo stile del tema
	if ($nomespeciale <> $speciale) { $content = null; } else {
		$q = new WP_Query( array( 'speciali' => $speciale, 'posts_per_page'=>-1 ) );
		$header = '<aside id="recent-posts-3" class="widget widget_recent_entries clearfix"><header><div class="title"><span>Gli articoli dello speciale '.$speciale.'</span></div></header><ul>';
		
		if ( $q->have_posts() ) {
			while ( $q->have_posts() ) {
				$q->the_post();
				$titolo = get_the_title();
				
				$content .= '<li><a href="'.get_the_permalink().'" style="color: #1d71b8;">'.$titolo.'</a></li>';
			}
			/* ripristino */
			wp_reset_postdata();
		}
	}
	
	$content = $header.'<br/>'.$content.'</ul></aside>';
	
	return $content;
}
add_shortcode( 'tabspeciali', 'tabspeciali' );
