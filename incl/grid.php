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
		array('post','astrodidattica','video_settimana'), /* per estendere array('post','page','custom-post-type') */
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
				'speciale' => null,
				'tipo' => null,
			),
			$atts
		)
	);
	
	if ( $tipo == null ) {
		$q = new WP_Query( array( 'speciali' => $speciale, 'post_type'=> 'post', 'posts_per_page'=>-1 ) );
	} else {
		$q = new WP_Query( array( 'speciali' => $speciale, 'post_type'=> $tipo, 'posts_per_page'=>-1 ) );
	}

	$contentblu ='<div class="divTable paleBlueRows">';
	
	if ( $q->have_posts() ) {
		while ( $q->have_posts() ) {
			$q->the_post();
			$titolo = get_the_title();

			if ( $tipo == 'post' ) {
				if ( function_exists( 'get_coauthors' ) ) {
					$autori = coauthors_posts_links(", ", " e ", null, null, false);
				} else {
					$autori = the_author();
				}
			} else {
				$autori = null;
			}

			if ( $autori <> null ) {
				$auth = '<em>di <strong>'.$autori.'</strong></em><br/>';
			} else {
				$auth = null;
			}
			
			$estratto = get_the_excerpt();

			/* griglia con titolo ed estratto: stilizzazione minimale */
			$header = '<h4 style="color: #ecb252;">'.$titolo.'</h4>';

			/* griglia con titolo ed estratto: formato tabella */
			$headerblu = '<div class="divTableHeading"><div class="divTableRow"><div class="divTableHead">'.$titolo.'</div></div></div>';
			$contentblu .= $headerblu.'<div class="divTableBody"><div class="divTableRow"><div class="divTableCell">'.$auth.$estratto.'<br/>(<a href="'.get_the_permalink().'" style="color: #1d71b8;">continua</a>)</div></div></div>';
		}
		
		$contentblu = $contentblu.'</div>';
		
		/* ripristino */
		wp_reset_postdata();
	} else  {
		$contentblu = null;
	}
	
	return $contentblu;
}
add_shortcode( 'grigliaspeciali', 'grigliaspeciali' );

# shortcode per la creazione di un loop di articoli in funzione di categoria e tag
function postlooptab($atts) {
	global $post;
	
	extract(
		shortcode_atts(
			array(
				'intro' => null,
				'categoria' => null,
				'tag' => null,
				'pag' => null,
				'stile' => '1',
			),
			$atts
		)
	);
	
	if ( $pag <> null ) {
		if ( $categoria <> null ) {
			if ( $tag <> null) {
				$q = new WP_Query ( array( 'post_type' => 'post', 'category_name' => $categoria, 'tag' => $tag, 'posts_per_page' => $pag ) );
			} else {
				$q = new WP_Query ( array( 'post_type' => 'post', 'category_name' => $categoria, 'posts_per_page' => $pag ) );
			}
		} else {
			if ( $tag <> null ) {
				$q = new WP_Query ( array( 'post_type' => 'post', 'tag' => $tag, 'posts_per_page' => $pag ) );
			} else {
				$q = new WP_Query ( array( 'post_type' => 'post', 'posts_per_page' => $pag ) );
			}
		}
	} else {
		if ( $categoria <> null ) {
			if ( $tag <> null ) {
				$q = new WP_Query ( array( 'post_type' => 'post', 'category_name' => $categoria, 'tag' => $tag, 'posts_per_page' => 5 ) );
			} else {
				$q = new WP_Query ( array( 'post_type' => 'post', 'category_name' => $categoria, 'posts_per_page' => $pag ) );
			}
		} else {
			if ( $tag <> null ) {
				$q = new WP_Query ( array( 'post_type' => 'post', 'tag' => $tag, 'posts_per_page' => $pag ) );
			} else {
				$q = new WP_Query ( array( 'post_type' => 'post', 'posts_per_page' => $pag ) );
			}
		}
	}
	
	$content = null;
	
	if ( $intro <> null ) {
		$head = '<span>'.$intro.'</span>';
	} else {
		$head = '<span>Ultimi articoli</span>';
	}
	
	if ( $q->have_posts() ) {
		while ( $q->have_posts() ) {
			$q->the_post();
			$titolo = get_the_title();
			$autore = get_the_author();
			$data = get_the_date();
			$thumb = get_the_post_thumbnail($post->ID, 'thumbnail');
			
			$cats = get_the_category();
			foreach ( $cats as $category ) {
				$cat = $category->name;
			}
			
			if ( $stile == 1 ) {
				$content .= '<li><a href="'.get_the_permalink().'">'.$titolo.'</a></li>';
			}
			if ( $stile == 2 ) {
				$content .= '<h5>'.$cat.'</h5><a href="'.get_the_permalink().'"><strong>'.$titolo.'</strong></a><br/><small><em>di '.$autore.' - '.$data.'</em></small><hr/>';
			}
			if ( $stile == 3 ) {
				$content = $content.'<li class="grid-item"><span class="grid-border"><a href="'.get_the_permalink().'">'.$thumb.'</a></span></li>';
			}
	
		/* ripristino */
		wp_reset_postdata();		
	}}
	
	if ( $content <> null ) {
		if ( $stile == 1 ) {
			$content = '<div id="recent-posts-2" class="widget widget_recent_entries"><h4 class="widget-title h6">'.$head.'</h4><ul>'.$content.'</ul></div>';
		}
		if ( $stile == 2 ) {
			$content = '<div id="recent-posts-2" class="widget widget_recent_entries"><h4 class="widget-title h6">'.$head.'</h4>'.$content.'</div>';
		}
		if ( $stile == 3 ) {
			$content = '<ul class="grid-wrap">'.$content.'</ul>';
		}
	} else {
		$content = '<div id="recent-posts-2" class="widget widget_recent_entries"><h4 class="widget-title h6">'.$head.'</h4>Nessun articolo presente in archivio</div><p></p>';
	}
	
	$out = $content.$after_widget;
	
	return $out;
}
add_shortcode( 'postlooptab', 'postlooptab' );

# griglia per loop generico per categoria, etichetta, tassonomia e suo valore
add_shortcode ( 'grigliata', 'grigliata');

 function grigliata ($atts) {
   
   extract(
      shortcode_atts(
         array(
			 'categoria' => 'null',
			 'etichetta' => 'null',
			 'tassonomia' => 'null',
			 'valore' => 'null',
		 ),
         $atts
      )
   );
	 
	 if ( $categoria <> 'null' ) {
		 if ( $etichetta <> 'null' ) {
			 if ( $tassonomia <> 'null' ) {
				 if ( $valore <> 'null' ) {
					 $qtax = new WP_Query ( array( 'category_name' => $categoria, 'tag' => $etichetta, 'taxonomy' => $tassonomia, 'term' => $valore, 'posts_per_page'=>-1 ) );
				 } else {
					 $qtax = new WP_Query ( array( 'category_name' => $categoria, 'tag' => $etichetta, 'taxonomy' => $tassonomia, 'posts_per_page'=>-1 ) );
				 }
			 } else {
				 $qtax = new WP_Query ( array( 'category_name' => $categoria, 'tag' => $etichetta, 'posts_per_page'=>-1 ) );
			 }
		 } else {
			 if ( $tassonomia <> 'null' ) {
				 if ( $valore <> 'null' ) {
					 $qtax = new WP_Query ( array( 'category_name' => $categoria, 'taxonomy' => $tassonomia, 'term' => $valore, 'posts_per_page'=>-1 ) );
				 } else {
					 $qtax = new WP_Query ( array( 'category_name' => $categoria, 'taxonomy' => $tassonomia, 'posts_per_page'=>-1 ) );
				 }
			 } else {
				 $qtax = new WP_Query ( array( 'category_name' => $categoria, 'posts_per_page'=>-1 ) );
			 }
		 }
	 } else {
		 if ( $etichetta <> 'null' ) {
			 if ( $tassonomia <> 'null' ) {
				 if ( $valore <> 'null' ) {
					 $qtax = new WP_Query ( array( 'tag' => $etichetta, 'taxonomy' => $tassonomia, 'term' => $valore, 'posts_per_page'=>-1 ) );
				 } else {
					 $qtax = new WP_Query ( array( 'tag' => $etichetta, 'taxonomy' => $tassonomia, 'posts_per_page'=>-1 ) );
				 }
			 } else {
				 $qtax = new WP_Query ( array( 'tag' => $etichetta, 'posts_per_page'=>-1 ) );
			 }
		 } else {
			 if ( $tassonomia <> 'null' ) {
				 if ( $valore <> 'null' ) {
					 $qtax = new WP_Query ( array( 'taxonomy' => $tassonomia, 'term' => $valore, 'posts_per_page'=>-1 ) );
				 } else {
					 $qtax = new WP_Query ( array( 'taxonomy' => $tassonomia, 'posts_per_page'=>-1 ) );
				 }
			 }
		 }
	 }

   $grid = '<ul class="grid-wrap">';

   if ( $qtax->have_posts() ) {
	while ( $qtax->have_posts() ) {
		$qtax->the_post();
                $thumb = get_the_post_thumbnail($post->ID, 'thumbnail');
		$grid = $grid.'<li class="grid-item"><span class="grid-border"><a href="'.get_the_permalink().'">'.$thumb.'</a><p>'.get_the_title().'</p></span></li>';
	}
	$grid = $grid.'</ul>';
	# ripristino ricerca
	wp_reset_postdata();
   } else {
	$grid = '<p><strong>Nessun articolo trovato</strong></p>';
   }

   return $grid;

 }