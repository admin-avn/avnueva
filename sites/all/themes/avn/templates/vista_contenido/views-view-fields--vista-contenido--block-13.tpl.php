<div class="index-contenedor-2-noticias">
	<?php if(empty($fields['field_video_fid']->content)): ?>
		<div class="imagen"><?php print theme('imagecache', 'index-posicion-2-noticias' , $fields['field_imagen_fid']->content); ?></div>
	<?php else: ?>
		<div class="imagen"><?php print theme('imagecache', 'index-posicion-2-noticias' , $fields['field_imagen_fid']->content); ?></div>
	<?php endif; ?>
	<div class="termino"><?php print $fields['tid']->content; ?></div>
	<div class="titulo"><?php print $fields['field_titulo_portada_value']->content; ?></div>
	<div class="sumario"><?php print $fields['field_sumario_value']->content; ?></div>
</div>
