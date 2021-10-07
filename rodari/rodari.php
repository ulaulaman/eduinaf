<?php

add_shortcode( 'rodari2020', function () {
	
	$rodariNav = wp_get_nav_menu_items(3416);
	
	foreach ( $rodariNav as $navItem ) {
		$nav = $nav. '<button><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></button>';
	}
	
	$menu = '<div align="center" class="btn-group">'.$nav.'</div>';

   $beni = '<a href="http://www.beniculturali.inaf.it/eventi/universi-da-ascoltare/" target="inaf">Universi da ascoltare</a>';

   $pagine = '<div align="center" style="padding-top:40px;"><strong>Pagine correlate</strong><br/>'.$beni.'</div>';
	
	$out = $menu.$pagine;

	return $out;
} );

add_shortcode( 'rodari2021', function () {
	
	$rodariNav = wp_get_nav_menu_items(3418);
	
	foreach ( $rodariNav as $navItem ) {
		$nav = $nav. '<button><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></button>';
	}
	
	$menu = '<div align="center" class="btn-group">'.$nav.'</div>';

   $beni = '<a href="http://www.beniculturali.inaf.it/eventi/universi-da-ascoltare/" target="inaf">Universi da ascoltare</a>';

   $pagine = '<div align="center" style="padding-top:40px;"><strong>Pagine correlate</strong><br/>'.$beni.'</div>';
	
	$out = $menu.$pagine;

	return $out;
} );

add_shortcode( 'rodaridocs', function () {
	
	$informativa = '<a href="https://edu.inaf.it/wp-content/plugins/eduinaf/rodari/Informativa_concorso_Rodari.pdf" target="pdf">Informativa sul trattamento dei dati personali</a>';
	$bando = '<a href="https://edu.inaf.it/wp-content/plugins/eduinaf/rodari/Bando_Concorso_GianniRodari_2020.pdf" target="pdf">Bando del concorso</a>';
	$scheda = '<a href="https://edu.inaf.it/wp-content/plugins/eduinaf/rodari/pubblicazione_contenuti_Rodari.pdf" target="pdf">Scheda di autorizzazione</a>';
	$locandine = 'Locandine: <a href="https://edu.inaf.it/wp-content/plugins/eduinaf/rodari/A-Gianni-Rodari-2020-nero.pdf" target="pdf">in nero</a>, <a href="https://edu.inaf.it/wp-content/plugins/eduinaf/rodari/A-Gianni-Rodari-2020-bianco.pdf" target="pdf">in bianco</a>';
	$form = '<a href="https://forms.gle/cBNmqLyitYCGUJJ79" target="form">Modulo di iscrizione</a>';
	
	$allegati = '<div align="center"><strong>Modulo e documentazione</strong><br/>'.$form.'<br/>'.$bando.'<br/>'.$scheda.'<br/>'.$informativa.'<br/>'.$locandine.'</div>';
	
	$out = $allegati;

	return $out;
} );