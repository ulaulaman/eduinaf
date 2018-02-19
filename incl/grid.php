<?php
# guide utilizzate: https://www.zenwebthemes.com/blog/create-grid-layout-wordpress-flexbox/
# https://wordpress.stackexchange.com/questions/269671/wp-query-by-keyword-or-post-tag
# inclusione di grid.css
 function edu_inaf_to_the_head () {
   wp_register_style( 'grid', plugins_url( 'eduinaf/incl/grid.css' ) );
   wp_enqueue_style( 'grid' );
 }

add_action( 'wp_enqueue_scripts', 'edu_inaf_to_the_head' );

# griglia per loop generico
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
	/* ripristino */
	wp_reset_postdata();
   } else {
	$grid = '<p><strong>Nessun articolo trovato</strong></p>';
   }

   return $grid;

 }

# creazione della griglia per il loop dei libri
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
                # https://wordpress.stackexchange.com/questions/13074/pull-custom-fields-from-custom-posts-within-a-loop
                $customtitlevalue = get_post_meta($post->ID, "meta-titolo", true);
                $customimgvalue = get_post_meta($post->ID, "meta-urlcover", true);
                $thumb = get_the_post_thumbnail($post->ID, 'thumbnail');
                if ( $customtitlevalue <> 'null') {
                  $titolo = $customtitlevalue;
                }
                else
                {
                  $titolo = get_the_title();
                }
                #if ( $customimgvalue <> 'null') {
                #  $thumb = '<img src="'.$customimgvalue.' />';
                #}
                #else
                #{
                #  $thumb = get_the_post_thumbnail($post->ID, 'thumbnail');
                #}
		$grid = $grid.'<li class="grid-item"><a href="'.get_the_permalink().'">'.$thumb.'</a><h4>'.$titolo.'</h4></li>';
	}
	$grid = $grid.'</ul>';
	/* ripristino */
	wp_reset_postdata();
   } else {
	$grid = '<p><strong>Nessun articolo trovato</strong></p>';
   }

   return $grid;

 }
