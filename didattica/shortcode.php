<?php
#
# shortcode di personalizzazione per varie tipologie di post
#
# astrodidattica
#
add_shortcode( 'header_didattica', function () {

	$header = '<header><div class="breadcrumb hidden-xs"><div class="vbreadcrumb" typeof="v:Breadcrumb"><a href="https://edu.inaf.it/" property="v:title" class="home">Home</a> / <a href="https://edu.inaf.it/astrodidattica/" property="v:title">Didattica</a></div></div>';
	$title = '<h1 class="entry-title" itemprop="name" style="color:black;">'.get_the_title().'</h1>';
	if ( has_excerpt ()) {
		$excerpt ='<div><em>'.get_the_excerpt().'</em></div>';
	} else {
		$excerpt = '';
	}
	$date = '<div class="breadcrumb hidden-xs"><time class="entry-date">'.get_the_date().'</time></div></header>';
	$out = $header.$title.$date.$excerpt;

	return $out;
} );

add_shortcode( 'sidebar_didattica', function () {
	
	$img = '<div align="center"><img src="https://edu.inaf.it/wp-content/plugins/eduinaf/images/avatar_eduinaf_blu.png" width="40%" /></div>';
	$terms = get_the_terms( $post->ID, 'livello_educativo' );
	$numcat=sizeof($terms);
 	foreach ( $terms as $term ) { 
		$term_link = get_term_link( $term, 'livello_educativo' );
		$img = $img.'<a rel="tag" href="'.$term_link.'" title="Vedi tutte le attività del livello: '.$term->name.'"><img src="https://edu.inaf.it/wp-content/plugins/eduinaf/images/'.$term->slug.'.png" width="25%" /></a>';
	}
	
	$type = null;
	$terms = get_the_terms ( $post->ID, 'tipologia_contenuto' );
	$numcat=sizeof($term);
	foreach ( $terms as $term ) {
		$term_link = get_term_link( $term, 'tipologia_contenuto' );
		$type = $type.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>, ';
	}
	
	$auth = null;
	$terms = get_the_terms ( $post->ID, 'autore_didattico' );
	$numcat=sizeof($term);
	foreach ( $terms as $term ) {
		$term_link = get_term_link( $term, 'autore_didattico' );
		$auth = $auth.'di <a rel="tag" href="'.$term_link.'"><strong>'.$term->name.'</a></strong> ';
	}
	
	$out = $img.'<p>'.$type.' '.$auth.'</p>';

	return $out;
} );
