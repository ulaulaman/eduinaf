<?php
#
# astrodidattica
#
add_shortcode( 'sbdidattica', function () {
	
	$img = '<div align="center"><img src="https://edu.inaf.it/wp-content/plugins/eduinaf/images/avatar_eduinaf_blu.png" width="40%" /></div>';
	$terms = get_the_terms( $post->ID, 'livello_educativo' ); 
	$numcat = sizeof( $terms );
 	foreach ( $terms as $term ) { 
		$term_link = get_term_link( $term, 'livello_educativo' );
		$img = $img.'<a rel="tag" href="'.$term_link.'" title="Vedi tutte le attività del livello: '.$term->name.'"><img src="https://edu.inaf.it/wp-content/plugins/eduinaf/images/'.$term->slug.'.png" width="25%" /></a>';
	}
	
	$type = null;
	$terms = get_the_terms ( $post->ID, 'tipologia_contenuto' );
	$numcat = sizeof( $terms );
	$i = 0;
	foreach ( $terms as $term ) {
		$term_link = get_term_link( $term, 'tipologia_contenuto' );
		$i++;
		if ( $i < $numcat ) {
			$type = $type.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>, ';
		} else {
			$type = $type.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>';
		}
	}
	
	$auth = null;
	$custom = get_post_custom();
	foreach( $custom as $key => $value ) {
		$key_name = get_post_custom_values( $key = 'autore_attivita' );
		if ( $key_name[0] <> null ) {
			$auth1 = '<strong>'.$key_name[0].'</strong>';
		} else {
			$auth1 = null;
		}
		if ( $key_name[1] <> null ) {
			$auth2 = ', <strong>'.$key_name[1].'</strong>';
		} else {
			$auth2 = null;
		}
		if ( $key_name[2] <> null ) {
			$auth3 = ', <strong>'.$key_name[2].'</strong>';
		} else {
			$auth3 = null;
		}
		if ( $key_name[3] <> null ) {
			$auth4 = ', <strong>'.$key_name[3].'</strong>';
		} else {
			$auth4 = null;
		}
		
		$auth = $auth1.$auth2.$auth3.$auth4;
	}
	
	if ( $auth == null ) {
		$terms = get_the_terms ( $post->ID, 'autore_didattico' );
		$numcat = sizeof( $terms );
		$i = 0;
		foreach ( $terms as $term ) {
			$term_link = get_term_link( $term, 'autore_didattico' );
			$i++;
			if ( $i < $numcat ) {
				$auth = $auth.'<a rel="tag" href="'.$term_link.'"><strong>'.$term->name.'</a></strong>, ';
			} else {
				$auth = $auth.'<a rel="tag" href="'.$term_link.'"><strong>'.$term->name.'</a></strong>';
			}
		}
	}
	
	$auth = 'di '.$auth;
	
	$curriculum = null;
	
	$curriculumastro = null;
	$terms = get_the_terms ( $post->ID, 'argomento_astro' );
	$numcat = sizeof( $terms );
	$i = 0;
	foreach ( $terms as $term ) {
		$term_link = get_term_link( $term, 'argomento_astro' );
		$i++;
		if ( $i < $numcat ) {
			$curriculumastro = $curriculumastro.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>, ';
		} else {
			$curriculumastro = $curriculumastro.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>';
		}
	}
	
	$curriculumsteam = null;
	$terms = get_the_terms ( $post->ID, 'argomento_steam' );
	$numcat = sizeof( $terms );
	$i = 0;
	foreach ( $terms as $term ) {
		$term_link = get_term_link( $term, 'argomento_steam' );
		$i++;
		if ( $i < $numcat ) {
			$curriculumsteam = $curriculumsteam.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>, ';
		} else {
			$curriculumsteam = $curriculumsteam.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>';
		}
	}
	
	$curriculum = '<strong>Argomenti dal <em>curriculum</em> scolastico:</strong>';
	if ( $curriculumastro <> 'null' ) {
		$curriculum = '<p>'.$curriculum.'<br/>'.$curriculumastro;
	}
	if ( $curriculumsteam <> 'null' ) {
		$curriculum = $curriculum.', '.$curriculumsteam.'</p>';
	} else {
		$curriculum = $curriculum.'</p>';
	}
	
	$keyw = '<strong>Parole chiave:</strong> ';
	$terms = get_the_terms ( $post->ID, 'parole_chiave' );
	$numcat = sizeof( $terms );
	$i = 0;
	foreach ( $terms as $term ) {
		$term_link = get_term_link( $term, 'parole_chiave' );
		$i++;
		if ( $i < $numcat ) {
			$keyw = $keyw.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>, ';
		} else {
			$keyw = $keyw.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>';
		}		
	}
	
	$livello = '<strong>Livello:</strong> ';
	$terms = get_the_terms ( $post->ID, 'livello_educativo' );
	$numcat = sizeof( $terms );
	$i = 0;
	foreach ( $terms as $term ) {
		$term_link = get_term_link( $term, 'livello_educativo' );
		$i++;
		if ( $i < $numcat ) {
			$livello = $livello.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>, ';
		} else {
			$livello = $livello.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>';
		}		
	}
	
	$durata = null;
	if ( has_term( 'Percorso didattico', 'tipologia_contenuto' ) ) {
		$durata = null;
	} else {
		$terms = get_the_terms ( $post->ID, 'durata_attivita' );
		foreach ( $terms as $term ) {
			$term_link = get_term_link( $term, 'durata_attivita' );
			$durata = '<strong>Durata:</strong> <a rel="tag" href="'.$term_link.'">'.$term->name.'</a>';
		}
	}
	
	$supervisione = null;
	if ( has_term( 'Scheda didattica', 'tipologia_contenuto' ) || has_term( 'Laboratorio didattico', 'tipologia_contenuto' ) ) {
		$terms = get_the_terms ( $post->ID, 'supervisione' );
		foreach ( $terms as $term ) {
			$term_link = get_term_link( $term, 'supervisione' );
			$supervisione = $term->name;
	} } else {
		$supervisione = null;
		}
	
	$costo = null;
	if ( has_term( 'Scheda didattica', 'tipologia_contenuto' ) || has_term( 'Laboratorio didattico', 'tipologia_contenuto' ) ) {
		$terms = get_the_terms ( $post->ID, 'costo_attivita' );
		foreach ( $terms as $term ) {
			$term_link = get_term_link( $term, 'costo_attivita' );
			$costo = $term->name;
	} } else {
		$costo = null;
		}
	
	$outnew = $img.'<p>'.$type.' '.$auth.'</p>'.$curriculum.'<p>'.$keyw.'</p><p>'.$livello.'</p>';
	
	if ( $durata <> 'null' ) {
		$outnew = $outnew.'<p>'.$durata.'</p>';
	} else {
		$outnew = $outnew;
	}
	
	if ( $supervisione <> 'null' ) {
		$outnew = $outnew.'<p><strong>'.$supervisione.'</strong></p>';
	} else {
		$outnew = $outnew;
	}
	
	if ( has_term( 'Percorso didattico', 'tipologia_contenuto' ) || has_term( 'Video didattico', 'tipologia_contenuto' ) || has_term( 'Video rubriche', 'tipologia_contenuto' ) ) {
		$outnew = $outnew;
	} else {
		$outnew = $outnew.'<p><strong>Costo:</strong> '.$costo.'</p>';
	}
	
	$collaborazione = null;
	
	$terms = get_the_terms ( $post->ID, 'collaborazioni' );
	$numcat = sizeof( $terms );
	$i = 0;
	foreach ( $terms as $term ) {
		$term_link = get_term_link( $term, 'collaborazioni' );
		$i++;
		if ( $i < $numcat ) {
			$ente = $ente.'<a rel="tag" href="'.$term_link.'"><img src="https://edu.inaf.it/wp-content/plugins/eduinaf/images/coll/'.$term->slug.'.png" width="90%" style="padding-bottom:10px;" /></a><br/>';
		} else {
			$ente = $ente.'<a rel="tag" href="'.$term_link.'"><img src="https://edu.inaf.it/wp-content/plugins/eduinaf/images/coll/'.$term->slug.'.png" width="90%" /></a>';
		}	
	}
	
	if ( $i <> 0 ) {
		$collaborazione = '<p><strong>In collaborazione con</strong>:<br/>'.$ente.'</p>';
		$outnew = $outnew.$collaborazione;
	} else {
		$outnew = $outnew;
	}
	
	$licenza = '<p><a href="http://creativecommons.org/licenses/by-nc/4.0/" target="cc"><img src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a><br/>Quest\'opera è distribuita con <a href="http://creativecommons.org/licenses/by-nc/4.0/" target="cc">Licenza Creative Commons Attribuzione - Non commerciale 4.0 Internazionale</a>.';
	
	$outnew = $outnew.$licenza;
	
	$out = $img;

	return $outnew;
} );
