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