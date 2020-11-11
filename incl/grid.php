<?php
# guide utilizzate: https://www.zenwebthemes.com/blog/create-grid-layout-wordpress-flexbox/
# https://wordpress.stackexchange.com/questions/269671/wp-query-by-keyword-or-post-tag

# shortcode per la creazione di un loop di articoli in funzione dei categoria e tag
function postlooptab($atts) {
	global $post;
	
	extract(
		shortcode_atts(
			array(
				'intro' => null,
				'categoria' => null,
				'tag' => null,
				'pag' => null,
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
			
			$content .= '<li><a href="'.get_the_permalink().'">'.$titolo.'</a></li>';
		}
	
		/* ripristino */
		wp_reset_postdata();
		
	}
	
	if ( $content <> null ) {
		$content = '<div id="recent-posts-2" class="widget widget_recent_entries"><h4 class="widget-title h6">'.$head.'</h4><ul>'.$content.'</ul></div>';
	} else {
		$content = '<div id="recent-posts-2" class="widget widget_recent_entries"><h4 class="widget-title h6">'.$head.'</h4><ul><li>Nessun articolo presente in archivio</li></ul></div><p></p>';
	}
	
	$out = $content.$after_widget;
	
	return $out;
}
add_shortcode( 'postlooptab', 'postlooptab' );

# griglia per loop generico per categoria ed etichetta
add_shortcode ( 'grigliaeduinaf', 'grigliaeduinaf');

 function grigliaeduinaf ($atts) {
   
   extract(
      shortcode_atts(
         array(
           'categoria' => 'null',
           'etichetta' => 'null',
          ),
         $atts
      )
   );

   if ( $categoria <> 'null' ) {
     if ( $etichetta <> 'null' ) {
       $q = new WP_Query( array( 'category_name' => $categoria, 'tag' => $etichetta, 'posts_per_page'=>-1 ) );
     }
     else {
       $q = new WP_Query( array( 'category_name' => $categoria, 'posts_per_page'=>-1 ) );
     }
   }
   else {
     if ( $etichetta <> 'null' ) {
       $q = new WP_Query( array( 'tag' => $etichetta, 'posts_per_page'=>-1 ) );
     }
     else { $q = new WP_Query( array( 'categoria' => 'beta', 'posts_per_page'=>0 ) );}
   }

   $grid = '<ul class="grid-wrap">';

   if ( $q->have_posts() ) {
	while ( $q->have_posts() ) {
		$q->the_post();
                $thumb = get_the_post_thumbnail($post->ID, 'thumbnail');
		$grid = $grid.'<li class="grid-item"><span class="grid-border"><a href="'.get_the_permalink().'">'.$thumb.'</a><h4>'.get_the_title().'</h4></span></li>';
	}
	$grid = $grid.'</ul>';
	# ripristino ricerca
	wp_reset_postdata();
   } else {
	$grid = '<p><strong>Nessun articolo trovato</strong></p>';
   }

   return $grid;

 }

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
		$grid = $grid.'<li class="grid-item"><span class="grid-border"><a href="'.get_the_permalink().'">'.$thumb.'</a><h4>'.get_the_title().'</h4></span></li>';
	}
	$grid = $grid.'</ul>';
	# ripristino ricerca
	wp_reset_postdata();
   } else {
	$grid = '<p><strong>Nessun articolo trovato</strong></p>';
   }

   return $grid;

 }

# creazione della griglia per il loop dei libri: pesca il campo del titolo del libro
add_shortcode( 'griglialibri', 'griglialibri' );

 function griglialibri ($atts) {

   global $post; #https://wordpress.stackexchange.com/questions/43315/use-a-shortcode-to-display-custom-meta-box-contents

   extract(
      shortcode_atts(
         array( 
                'etichetta' => 'libri-per-bambini-e-ragazzi',
	 ),
         $atts
      )
   );

   $q = new WP_Query( array( 'category_name' => 'libri', 'tag' => $etichetta, 'posts_per_page'=>-1 ) );
   $grid = '<ul class="grid-wrap">';

   if ( $q->have_posts() ) {
	while ( $q->have_posts() ) {
		$q->the_post();
		
		# recupero dei valori dei campi personalizzati definiti in metabox.php
                # guida: https://wordpress.stackexchange.com/questions/13074/pull-custom-fields-from-custom-posts-within-a-loop
                $customtitlevalue = get_post_meta($post->ID, "meta-titolo", true);
                $thumb = get_the_post_thumbnail($post->ID, 'thumbnail');
		
		# ciclo if che sostituisce, se presente, il titolo del post con il titolo del libro
                if ( $customtitlevalue <> 'null') {
                  $titolo = $customtitlevalue;
                }
                else
                {
                  $titolo = get_the_title();
                }
		$grid = $grid.'<li class="grid-item"><a href="'.get_the_permalink().'">'.$thumb.'</a><h4>'.$titolo.'</h4></li>';
	}
	$grid = $grid.'</ul>';
	# ripristino ricerca
	wp_reset_postdata();
   } else {
	$grid = '<p><strong>Nessun articolo trovato</strong></p>';
   }

   return $grid;

 }
