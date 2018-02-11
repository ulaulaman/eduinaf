<?php

# creazione link esterni con shortcode
# astroedu
add_shortcode('astroedu', 'astroedu');

 function astroedu ($atts, $content = null) {

   extract(
      shortcode_atts(
         array( 
		'lang' => null,
		'code' => null,
	 ),
         $atts
      )
   );

   $link = '<a href="http://astroedu.iau.org/'.$lang.'/activities/'.$code.'/" target="astroedu">'.$content.'</a>';

   return $link;
}

# spacescoop
add_shortcode('spacescoop', 'spacescoop');

 function spacescoop ($atts, $content = null) {

   extract(
      shortcode_atts(
         array( 
		'lang' => null,
		'code' => null,
	 ),
         $atts
      )
   );

   $link = '<a href="http://www.spacescoop.org/'.$lang.'/scoops/'.$code.'/" target="spacescoop">'.$content.'</a>';

   return $link;
}
