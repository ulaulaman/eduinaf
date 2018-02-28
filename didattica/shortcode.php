<?php
#
# codice per la visualizzazione dei campi delle attività didattiche definite con CPT UI e Custom Fields Suite
# Versione 1.2.3
#
# curriculum scolastico
 add_shortcode('eduinaf-ad-curriculum', 'eduinaf_ad_curriculum');

 function eduinaf_ad_curriculum() {
   $loop = CFS()->get( 'curriculum_scolastico' );
   $text = '<p><strong>Riferimenti al curriculum scolastico</strong>:<table><td width="20%"><strong>Livello scolastico</strong></td><td width="30%"><strong>Materia</strong></td><td width="20%"><strong>Certificazione</strong></td><td width="30%"><strong>Argomento</strong></td></table>';
   foreach ( $loop as $row ) {
    $text = $text.'<table><td width="20%">'.$row['livello_scolastico'].'</td>'.'<td width="30%">'.$row['materia'].'</td>'.'<td width="20%">'.$row['certificazione'].'</td>'.'<td width="30%">'.$row['argomento'].'</td></table>';
   }
  $loop = $text.'</p>';
  return $loop;
 }

# obiettivi
 add_shortcode('eduinaf-ad-obiettivi', 'eduinaf_ad_obiettivi');

 function eduinaf_ad_obiettivi () {
   $loop = CFS()->get( 'elenco_obiettivi' );
   $text = '<p><strong>Obiettivi</strong>:</p><ul>';
   foreach ( $loop as $line ) {
    $text = $text.'<li>'.$line['obiettivi'].'</li>';
   }
  $loop = $text.'</ul>';
  return $loop;
}

# obiettivi educativi
 add_shortcode('eduinaf-ad-obiettivi-educativi', 'eduinaf_ad_obiettivi_educativi');

 function eduinaf_ad_obiettivi_educativi () {
   $loop = CFS()->get( 'elenco_obiettivi_educativi' );
   $text = '<p><strong>Obiettivi educativi</strong>:</p><ul>';
   foreach ( $loop as $line ) {
    $text = $text.'<li>'.$line['obiettivi_educativi'].'</li>';
   }
  $loop = $text.'</ul>';
  return $loop;
}

# materiali
 add_shortcode('eduinaf-ad-materiali', 'eduinaf_ad_materiali');

 function eduinaf_ad_materiali () {
   $loop = CFS()->get( 'lista_materiali' );
   $text = '<p><strong>Materiali</strong>:</p><ul>';
   foreach ( $loop as $line ) {
    $text = $text.'<li>'.$line['materiale'].'</li>';
   }
  $loop = $text.'</ul>';
  return $loop;
}

# età degli studenti
 add_shortcode('eduinaf-ad-eta', 'eduinaf_ad_eta');

 function eduinaf_ad_eta () {
   $loop = CFS()->get( 'eta_studenti' );
   $text = '<strong>Età</strong>:<ul>';
   foreach ( $loop as $key => $label )
  {$text = $text.'<li>'.$label.'</li>';}
   $text = $text.'</ul>';
  return $text;
}

# durata
 add_shortcode('eduinaf-ad-durata', 'eduinaf_ad_durata');

 function eduinaf_ad_durata () {
   $text = CFS()->get( 'durata' );
   foreach ( $text as $key => $label )
  {return '<strong>Durata</strong>: '.$label;}
}

# supervisione
 add_shortcode('eduinaf-ad-supervisione', 'eduinaf_ad_supervisione');

 function eduinaf_ad_supervisione () {
   # $text = CFS()->get_field_info( 'supervisione' );
   $value = CFS()->get( 'supervisione' );
   if ($value = 1)
   {return '<strong>Supervisionata</strong>';}
   else
   {return '<strong>Non supervisionata</strong>';}
}

# attività di gruppo
 add_shortcode('eduinaf-ad-gruppo', 'eduinaf_ad_gruppo');

 function eduinaf_ad_gruppo () {
   $value = CFS()->get( 'attivita_di_gruppo' );
   if ($value = 1)
   {return '<strong>Attività di gruppo</strong>';}
   else
   {return '<strong>Attività individuale</strong>';}
}

# costo
 add_shortcode('eduinaf-ad-costo', 'eduinaf_ad_costo');

 function eduinaf_ad_costo () {
   $text = CFS()->get( 'costo' );
   foreach ( $text as $key => $label )
  {return '<strong>Costo</strong>: '.$label;}
}

# luogo
 add_shortcode('eduinaf-ad-luogo', 'eduinaf_ad_luogo');

 function eduinaf_ad_luogo () {
   $text = CFS()->get( 'luogo' );
   foreach ( $text as $key => $label )
  {return '<strong>Luogo</strong>: '.$label;}
}

# abilità acquisite
 add_shortcode('eduinaf-ad-abilita', 'eduinaf_ad_abilita');

 function eduinaf_ad_abilita () {
   $loop = CFS()->get( 'abilita_acquisite' );
   $text = '<strong>Abilità acquisite</strong>:<ul>';
   foreach ( $loop as $key => $label )
   {$text = $text.'<li>'.$label.'</li>';}
   $text = $text.'</ul>';
  return $text;
}

# allegati
 add_shortcode('eduinaf-ad-allegati', 'eduinaf_ad_allegati');

 function eduinaf_ad_allegati () {
   $loop = CFS()->get( 'materiale_aggiuntivo' );
   $text = '<strong>Allegati</strong>: ';
   foreach ( $loop as $file )
   {
    $url = $file['file_allegato'];
    $name = basename($url);
    $url = '<a href="'.$url.'" target="pdf">'.$name.'</a>';
    $text = $text.'<br/>'.$url;
   }
   $loop = $text;
   return $loop;
}

# bibliografia
 add_shortcode('eduinaf-ad-biblio', 'eduinaf_ad_biblio');

 function eduinaf_ad_biblio () {
   $loop = CFS()->get( 'riferimenti' );
   $text = '<p><strong>Bibliografia</strong>:<ul>';
   foreach ( $loop as $line ) {
    $text = $text.'<li>'.$line['riferimento_bibliografico'].'</li>';
   }
  $loop = $text.'</ul></p>';
  return $loop;
}

# autori
 add_shortcode('eduinaf-ad-autori', 'eduinaf_ad_autori');

 function eduinaf_ad_autori () {
   $loop = CFS()->get( 'dati_autori' );
   $text = '<p>di:';
   foreach ( $loop as $row ) {
    $text = $text.' '.$row['autore_attivita'].' ('.$row['affiliazione'].')'.' contatto: '.$row['contatto_e_mail'].'<br/>';
   }
  $loop = $text.'</p>';
  return $loop;
}

# area
 add_shortcode('eduinaf-ad-area', 'eduinaf_ad_area');

 function eduinaf_ad_area () {
   $text = CFS()->get( 'area' );
   foreach ( $text as $key => $label )
  {$label = '<strong>'.$label.'</strong>';}
   return $label;
}

# descrizione breve
 add_shortcode('eduinaf-ad-abstract', 'eduinaf_ad_abstract');

 function eduinaf_ad_abstract () {
   $text = CFS()->get( 'descrizione_breve' );
   return $text;
}

# descrizione completa
 add_shortcode('eduinaf-ad-completa', 'eduinaf_ad_completa');

 function eduinaf_ad_completa () {
   $text = CFS()->get( 'descrizione_completa' );
   return $text;
}

# materiale aggiuntivo
 add_shortcode('eduinaf-ad-materiale', 'eduinaf_ad_materiale');

 function eduinaf_ad_materiale () {
   $text = CFS()->get( 'descrizione_materiale_aggiuntivo' );
   return $text;
}

# informazioni preliminari
 add_shortcode('eduinaf-ad-info', 'eduinaf_ad_info');

 function eduinaf_ad_info () {
   $text = CFS()->get( 'descrizione_informazioni_preliminari' );
   return $text;
}

# valutazione
 add_shortcode('eduinaf-ad-valutazione', 'eduinaf_ad_valutazione');

 function eduinaf_ad_valutazione () {
   $text = CFS()->get( 'valutazione' );
   return $text;
}

# informazioni aggiuntive
 add_shortcode('eduinaf-ad-infoplus', 'eduinaf_ad_infoplus');

 function eduinaf_ad_infoplus () {
   $text = CFS()->get( 'informazioni_aggiuntive' );
   return $text;
}

# conclusioni
 add_shortcode('eduinaf-ad-conclusioni', 'eduinaf_ad_conclusioni');

 function eduinaf_ad_conclusioni () {
   $text = CFS()->get( 'conclusioni' );
   return $text;
}

# ringraziamenti
 add_shortcode('eduinaf-ad-ringraziamenti', 'eduinaf_ad_ringraziamenti');

 function eduinaf_ad_ringraziamenti () {
   $text = CFS()->get( 'ringraziamenti' );
   return $text;
}

# titolo
 add_shortcode('eduinaf-ad-titolo', 'eduinaf_ad_titolo');

 function eduinaf_ad_titolo () {
   $text = CFS()->get( 'titolo_attivita' );
   return $text;
}

# dimensione media
 add_shortcode('eduinaf-ad-media', 'eduinaf_ad_media');

 function eduinaf_ad_media () {
   $text = CFS()->get( 'dimensione_media' );
   return $text;
}

# dimensione massima
 add_shortcode('eduinaf-ad-massima', 'eduinaf_ad_massima');

 function eduinaf_ad_massima () {
   $text = CFS()->get( 'dimensione_massima' );
   return $text;
}

# worksheet
 add_shortcode('eduinaf-ad-worksheet', 'eduinaf_ad_worksheet');

 function eduinaf_ad_worksheet () {
   $worksheet = CFS()->get( 'worksheet' );
   $url = 'Scheda di valutazione: <a href="'.$worksheet.'" target="doc"><em>Worksheet</em></a>';
   return $url;
}

# parole chiave
 add_shortcode('eduinaf-ad-keyword', 'eduinaf_ad_keyword');

 function eduinaf_ad_keyword () {
   $text = CFS()->get( 'parole_chiave' );
   return $text;
}

# livello educativo
 add_shortcode('eduinaf-ad-livello', 'eduinaf_ad_livello');

 function eduinaf_ad_livello () {
   $loop = CFS()->get( 'livello_educativo' );
   $text = '<strong>Livello</strong>:<ul>';
   foreach ( $loop as $key => $label )
  {$text = $text.'<li>'.$label.'</li>';}
   $text = $text.'</ul>';
  return $text;
}

# categorie astronomiche
 add_shortcode('eduinaf-ad-astrocat', 'eduinaf_ad_astrocat');

 function eduinaf_ad_astrocat () {
   $loop = CFS()->get( 'categorie_astronomiche' );
   $text = null;
   foreach ( $loop as $key => $label )
    {$text = $text.'<strong>'.$label.'</strong>, ';}
   return $text;
}

# categorie scienze della terra
 add_shortcode('eduinaf-ad-terracat', 'eduinaf_ad_terracat');

 function eduinaf_ad_terracat () {
   $loop = CFS()->get( 'categorie_scienze_della_terra' );
   $text = null;
   foreach ( $loop as $key => $label )
    {$text = $text.'<strong>'.$label.'</strong>, ';}
   return $text;
}

# categorie scienza dello spazio
 add_shortcode('eduinaf-ad-spacecat', 'eduinaf_ad_spacecat');

 function eduinaf_ad_spacecat () {
   $loop = CFS()->get( 'categorie_scienza_dello_spazio' );
   $text = null;
   foreach ( $loop as $key => $label )
    {$text = $text.'<strong>'.$label.'</strong>, ';}
   return $text;
}

# tipologia
 add_shortcode('eduinaf-ad-tipologia', 'eduinaf_ad_tipologia');

 function eduinaf_ad_tipologia () {
   $loop = CFS()->get( 'tipologia_attivita' );
   $text = null;
   foreach ( $loop as $key => $label )
    {$text = $text.$label.', ';}
   return $text;
}
