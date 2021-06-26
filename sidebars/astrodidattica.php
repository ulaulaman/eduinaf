<?php
#
# astrodidattica
#
add_shortcode( 'sbdidattica', function () {
	
	$img = '<div align="center"><img src="https://edu.inaf.it/wp-content/plugins/eduinaf/images/avatar_eduinaf_blu.png" width="40%" /></div>';
	
	$livello = null;	
	$terms = get_the_terms ( $post->ID, 'livello_educativo' );
	if ( empty($terms) ) {
        	$livello = null;
        } else {
		$numcat = sizeof( $terms );
        foreach ( $terms as $term ) {
                $term_link = get_term_link( $term, 'livello_educativo' );
                $livello = $livello.'<a rel="tag" href="'.$term_link.'" title="Vedi tutte le attività del livello: '.$term->name.'"><img src="https://edu.inaf.it/wp-content/plugins/eduinaf/images/dida/'.$term->slug.'.png" width="25%" /></a>';
		}
			$img = $img.'<div>'.$livello.'</div>';
  		}
	
	$type = null;	
	$terms = get_the_terms ( $post->ID, 'tipologia_contenuto' );
	if ( empty($terms) ) {
		$type = null;
	} else {
	$numcat = sizeof( $terms );
	$i = 0;
	foreach ( $terms as $term ) {
			$term_link = get_term_link( $term, 'tipologia_contenuto' );
			$i++;
			if ( $i < $numcat )
				$type = $type.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>, ';
			else
				$type = $type.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>';
	}
	}
	
	$auth = null;	
	$terms = get_the_terms ( $post->ID, 'autore_didattico' );
	if ( empty($terms) ) {
        	$auth = null;
        } else {
		$numcat = sizeof( $terms );
        $i = 0;
		$auth = 'di ';
        foreach ( $terms as $term ) {
                $term_link = get_term_link( $term, 'autore_didattico' );
                $i++;
                if ( $i < $numcat )
					$auth = $auth.'<a rel="tag" href="'.$term_link.'"><strong>'.$term->name.'</strong></a>, ';
                else
					$auth = $auth.'<a rel="tag" href="'.$term_link.'"><strong>'.$term->name.'</strong></a>';
		}
  		}
	
	$curriculum = null;
	
	$curriculumastro = null;
	$terms = get_the_terms ( $post->ID, 'argomento_astro' );
	if ( empty($terms) ) {
		$curriculumastro = null;
	} else {
		$numcat = sizeof( $terms );
		$i = 0;
		foreach ( $terms as $term ) {
			$i++;
			$term_link = get_term_link( $term );
			if ( $i < $numcat ) {
				$curriculumastro = $curriculumastro.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>, ';
			} else {
				$curriculumastro = $curriculumastro.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>';
			}
		}	
	}
	
	$curriculumsteam = null;
	$terms = get_the_terms ( $post->ID, 'argomento_steam' );
	if ( empty($terms) ) {
		$curriculumsteam = null;
	} else {
		$numcat = sizeof( $terms );
		$i = 0;
		foreach ( $terms as $term ) {
			$i++;
			if ( $i < $numcat ) {
				$curriculumsteam = $curriculumsteam.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>, ';
			} else {
				$curriculumsteam = $curriculumsteam.'<a rel="tag" href="'.$term_link.'">'.$term->name.'</a>';
			}
		}	
	}
	
	$curriculum = '<strong>Argomenti dal <em>curriculum</em> scolastico:</strong>';
	if ( $curriculumsteam <> null ) {
		if ( $curriculumastro <> null ) {
			$curriculum = '<p>'.$curriculum.' '.$curriculumastro.', '.$curriculumsteam.'</p>';
		} else {
			$curriculum = '<p>'.$curriculum.' '.$curriculumsteam.'</p>';
		}
	} else {
		if ( $curriculumastro <> null ) {
			$curriculum = '<p>'.$curriculum.' '.$curriculumastro.'</p>';
		} else {
			$curriculum = null;
		}
	}
	
	$keyw = null;
	$terms = get_the_terms ( $post->ID, 'parole_chiave' );
	if ( empty($terms) ) { 
		$keyw = null;
	} else {
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
		$keyw = '<strong>Parole chiave:</strong> '.$keyw;
	}
	
	$livello = null;
	$terms = get_the_terms ( $post->ID, 'livello_educativo' );
	if ( empty($terms) ) {
		$livello = null;
	} else {
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
		$livello = '<strong>Livello:</strong> '.$livello;
	}
	
	$outnew = $img.'<p>'.$type.' '.$auth.'</p>'.$curriculum.'<p>'.$keyw.'</p><p>'.$livello.'</p>';

	$durata = null;
	$terms = get_the_terms ( $post->ID, 'durata_attivita' );
	if ( empty($terms) ) {
		$durata = null;
	} else {
		$terms = get_the_terms ( $post->ID, 'durata_attivita' );
		foreach ( $terms as $term ) {
			$term_link = get_term_link( $term, 'durata_attivita' );
			$durata = '<strong>Durata:</strong> <a rel="tag" href="'.$term_link.'">'.$term->name.'</a>';
		}
		$outnew = $outnew.'<p>'.$durata.'</p>';
	}
	
	$supervisione = null;
	$terms = get_the_terms ( $post->ID, 'supervisione' );
	if ( empty($terms) ) {
		$supervisione = null;
	} else {
		foreach ( $terms as $term ) {
			$term_link = get_term_link( $term, 'supervisione' );
			$supervisione = '<a rel="tag" href="'.$term_link.'"><strong>'.$term->name.'</strong></a>';
		}
		$outnew = $outnew.'<p>'.$supervisione.'</p>';
	}
	
	$costo = null;
	$terms = get_the_terms ( $post->ID, 'costo_attivita' );
	if ( empty($terms) ) {
		$costo = null;
	} else {
		foreach ( $terms as $term ) {
			$term_link = get_term_link( $term, 'costo_attivita' );
			$costo = $term->name;
		}
		if ( costo <> null ) {
			$outnew = $outnew.'<p><strong>Costo:</strong> '.$costo;
		} else {
			$outnew = $outnew;
		}	
	}
	
	$collaborazione = null;	
	$terms = get_the_terms ( $post->ID, 'collaborazioni' );
	if ( empty($terms) ) {
        	$collaborazione = null;
        } else {
		$numcat = sizeof( $terms );
        $i = 0;
        foreach ( $terms as $term ) {
                $term_link = get_term_link( $term, 'collaborazioni' );
                $i++;
                $ente .= '<a rel="tag" href="'.$term_link.'"><img src="https://edu.inaf.it/wp-content/plugins/eduinaf/images/coll/'.$term->slug.'.png" width="90%"';
                if ( $i < $numcat )
                        $ente .= 'style="padding-bottom:10px;" /></a><br/>';
                else
                        $ente .= ' /></a>';
		}
			$collaborazione = '<p><strong>In collaborazione con</strong>:<br/>'.$ente.'</p>';
			$outnew = $outnew.$collaborazione;
  		}
	
	$licenza = '<p><a href="http://creativecommons.org/licenses/by-nc/4.0/" target="cc"><img src="https://i.creativecommons.org/l/by-nc/4.0/88x31.png" /></a><br/>Quest\'opera è distribuita con <a href="http://creativecommons.org/licenses/by-nc/4.0/" target="cc">Licenza Creative Commons Attribuzione - Non commerciale 4.0 Internazionale</a>.';
	
	$outnew = $outnew.$licenza;

	return $outnew;
} );