<?php

/* Documenti */

add_shortcode( 'rodaridocs', function () {
	
	$informativa = '<a href="https://edu.inaf.it/concorso-gianni-rodari/informativa_privacy.pdf" target="pdf">Informativa sul trattamento dei dati personali</a>';
	$bando = '<a href="https://edu.inaf.it/concorso-gianni-rodari/bando.pdf" target="pdf">Bando del concorso</a>';
	$scheda1 = '<a href="https://edu.inaf.it/concorso-gianni-rodari/scheda-autorizzazione-concorso-rodari.pdf" target="pdf">Scheda di autorizzazione</a>';
	$scheda = '<a href="https://edu.inaf.it/wp-content/plugins/eduinaf/rodari/Scheda_di_autorizzazione_partecipazione_Concorso_Rodari.pdf" target="pdf">Scheda di autorizzazione</a>';
	$locandine = 'Locandine: <a href="https://edu.inaf.it/concorso-gianni-rodari/locandina_black" target="img">in nero</a>, <a href="https://edu.inaf.it/concorso-gianni-rodari/locandina_white" target="img">in bianco</a>';
	$form = '<a href="https://edu.inaf.it/concorso-gianni-rodari/form-individuale" target="form">Modulo di iscrizione</a>';
	$formclasse = '<a href="https://edu.inaf.it/concorso-gianni-rodari/form-classe" target="form">Modulo di iscrizione</a>';
	
	$lista = '<ul><li>Partecipazione individuale: '.$form.', '.$scheda.'</li><li>Partecipazione per classe: '.$formclasse.'</li><li>'.$informativa.'</li><li>'.$bando.'</li><li>'.$locandine.'</li></ul>';
	
	$allegati = '<div align="center"><h3>Moduli e documentazione</h3></div>'.$lista;
	
	$out = $allegati;

	return $out;
} );

/* Concorso Rodari 2022 */

add_shortcode( 'rodari2022', function () {
	
	$rodariNav = wp_get_nav_menu_items(3729);
	
	foreach ( $rodariNav as $navItem ) {
		$nav = $nav. '<button><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></button>';
	}
	
	$menu = '<div align="center" class="btn-group">'.$nav.'</div>';

	$beni = '<a href="http://www.beniculturali.inaf.it/eventi/universi-da-ascoltare/" target="inaf">Universi da ascoltare</a><br/>';
	$libri = '<a href="https://edu.inaf.it/libri-astronomia-bambini-ragazzi" target="eduinaf">Libri di astronomia per bambini e ragazzi</a><br/>';
	$briciole = '<a href="http://edu.inaf.it/briciole-spaziali/" target="eduinaf">Briciole Spaziali</a><br/>';
	$edprecedenti = '<a href="https://edu.inaf.it/concorsi/concorso-gianni-rodari-2020/" target="eduinaf">Concorso Rodari 2020</a><br/><a href="https://edu.inaf.it/concorsi/concorso-gianni-rodari-2021/" target="eduinaf">Concorso Rodari 2021</a>';

	$pagine = '<div align="center" style="padding-top:40px;"><h3>Pagine correlate</h3> <br/>'.$beni.$libri.$briciole.$edprecedenti.'</div>';
	
	$out = $menu.$pagine;

	return $out;
} );

/* Concorso Rodari 2021 */

add_shortcode( 'rodari2021', function () {
	
	$rodariNav = wp_get_nav_menu_items(3418);
	
	foreach ( $rodariNav as $navItem ) {
		$nav = $nav. '<button><a href="'.$navItem->url.'" title="'.$navItem->title.'">'.$navItem->title.'</a></button>';
	}
	
	$menu = '<div align="center" class="btn-group">'.$nav.'</div>';

	$beni = '<a href="http://www.beniculturali.inaf.it/eventi/universi-da-ascoltare/" target="inaf">Universi da ascoltare</a><br/>';
	$libri = '<a href="https://edu.inaf.it/libri-astronomia-bambini-ragazzi" target="inaf">Libri di astronomia per bambini e ragazzi</a><br/>';
	$prisma = '<a href="http://www.prisma.inaf.it/" target="inaf">Progetto PRISMA</a><br/>';
	$spazio = '<a href="https://sorvegliatispaziali.inaf.it/" target="inaf">Sorvegliati Spaziali</a>';

	$pagine = '<div align="center" style="padding-top:40px;"><h3>Pagine correlate</h3><strong>Per i piccoli</strong><br/>'.$beni.$libri.'<strong>Per tutti</strong><br/>'.$prisma.$spazio.'</div>';
	
	$out = $menu.$pagine;

	return $out;
} );

/* Concorso Rodari 2020 */

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

/* Documenti 2020 */

add_shortcode( 'rodaridocs2020', function () {
	
	$informativa = '<a href="https://edu.inaf.it/wp-content/plugins/eduinaf/rodari/Informativa_concorso_Rodari.pdf" target="pdf">Informativa sul trattamento dei dati personali</a>';
	$bando = '<a href="https://edu.inaf.it/wp-content/plugins/eduinaf/rodari/Bando_Concorso_GianniRodari_2020.pdf" target="pdf">Bando del concorso</a>';
	$scheda = '<a href="https://edu.inaf.it/wp-content/plugins/eduinaf/rodari/pubblicazione_contenuti_Rodari.pdf" target="pdf">Scheda di autorizzazione</a>';
	$locandine = 'Locandine: <a href="https://edu.inaf.it/wp-content/plugins/eduinaf/rodari/A-Gianni-Rodari-2020-nero.pdf" target="pdf">in nero</a>, <a href="https://edu.inaf.it/wp-content/plugins/eduinaf/rodari/A-Gianni-Rodari-2020-bianco.pdf" target="pdf">in bianco</a>';
	$form = '<a href="https://forms.gle/cBNmqLyitYCGUJJ79" target="form">Modulo di iscrizione</a>';
	
	$allegati = '<div align="center"><strong>Modulo e documentazione</strong><br/>'.$form.'<br/>'.$bando.'<br/>'.$scheda.'<br/>'.$informativa.'<br/>'.$locandine.'</div>';
	
	$out = $allegati;

	return $out;
} );
