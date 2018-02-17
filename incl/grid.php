<?php
# inclusione di grid.css
 function edu_inaf_to_the_head () {
   wp_register_style( 'grid', plugins_url( 'eduinaf/incl/grid.css' ) );
   wp_enqueue_style( 'grid' );
 }

add_action( 'wp_enqueue_scripts', 'edu_inaf_to_the_head' );

# creazione di un loop con griglia
add_shortcode( 'eduinafgrid', 'eduinafgrid' );

 function eduinafgrid ($atts) {

   extract(
      shortcode_atts(
         array( 
         'categoriaeduinaf' => 'libri',
         'tageduinaf' => 'libri-per-bambini-e-ragazzi',
         ),
         $atts
      )
   );

   $q = new WP_Query( array( 'category_name' => $categoriaeduinaf, 'tag' => $tageduinaf, 'posts_per_page'=>-1 ) );
   $grid = '<ul class="grid-wrap">';

   if ( $q->have_posts() ) {
	while ( $q->have_posts() ) {
		$q->the_post();
                $thumb = get_the_post_thumbnail($post->ID, 'thumbnail');
		$grid = $grid.'<li class="grid-item"><a href="'.get_the_permalink().'">'.$thumb.'</a><h4>'.get_the_title().'</h4></li>';
	}
	$grid = $grid.'</ul>';
  
	wp_reset_postdata();
   } else {
	$grid = '<p><strong>Nessun articolo trovato</strong></p>';
   }

   return $grid;

 }
