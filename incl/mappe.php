<?php

# Mappa INAF

add_shortcode( 'provamappainaf', function () {

	$out = '<div class="mappainaf" aria-haspopup="true"><img src="https://edu.inaf.it/wp-content/plugins/eduinaf/images/mappa-italia-inaf.png" alt="" width="800" height="917" class="aligncenter size-full wp-image-4137" />
<box><luogoinaf class="torino"><span><a href="../sedi-inaf/osservatorio-astrofisico-di-torino/">Osservatorio Astrofisico di Torino</a></span></luogoinaf></box>
<box><luogoinaf class="milano"><span><a href="../sedi-inaf/osservatorio-astronomico-di-brera/">Osservatorio Astronomico di Brera</a><br/>
- <a href="../sedi-inaf/iasf-milano/">IASF Milano</a></luogoinaf></box>
<box><luogoinaf class="padova"><span><a href="../sedi-inaf/osservatorio-astronomico-di-padova/">Osservatorio Astronomico di Padova</a></luogoinaf></span></box>
<box><luogoinaf class="trieste"><span><a href="../sedi-inaf/osservatorio-astronomico-di-trieste/">Osservatorio Astronomico di Trieste</a></span></luogoinaf></box>
<box><luogoinaf class="bologna"><span><a href="../sedi-inaf/osservatorio-di-bologna/">Osservatorio di Astrofisica e Scienza dello Spazio di Bologna</a><br/>
- <a href="../sedi-inaf/ira-bologna/">IRA Bologna</a></span></luogoinaf></box>
<box><luogoinaf class="firenze"><span><a href="../sedi-inaf/osservatorio-astrofisico-di-arcetri/">Osservatorio Astrofisico di Arcetri</a></span></box></luogoinaf>
<box><luogoinaf class="roma"><span><a href="../sedi-inaf/osservatorio-astronomico-di-roma/">Osservatorio Astronomico di Roma</a><br/>
- <a href="../sedi-inaf/iaps-roma/">IAPS Roma</a><br/>
- <a href="http://www.inaf.it/" target="inaf" style="color: blue;">Sede centrale INAF</a></span></luogoinaf></box>
<box><luogoinaf class="teramo"><span><a href="../sedi-inaf/osservatorio-astronomico-dabruzzo/">Osservatorio Astronomico d\'Abruzzo</a></span></luogoinaf></box>
<box><luogoinaf class="napoli"><span><a href="../sedi-inaf/osservatorio-astronomico-di-capodimonte/">Osservatorio Astronomico di Capidimonte</a></span></luogoinaf></box>
<box><luogoinaf class="catania"><span><a href="../sedi-inaf/osservatorio-astrofisico-di-catania/">Osservatorio Astrofisico di Catania</a></span></luogoinaf></box>
<box><luogoinaf class="palermo"><span><a href="../sedi-inaf/osservatorio-astronomico-di-palermo/">Osservatorio Astronomico di Palermo</a><br/>
- <a href="../sedi-inaf/iasf-palermo/">IASF Palermo</a></span></luogoinaf></box>
<box><luogoinaf class="cagliari"><span><a href="../sedi-inaf/osservatorio-astronomico-di-cagliari/">Osservatorio Astronomico di Cagliari</a></span></luogoinaf></box>
</div>';

	return $out;
} );
