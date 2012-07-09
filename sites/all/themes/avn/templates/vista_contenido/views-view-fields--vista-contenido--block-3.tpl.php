<div class="front-contenedor-6-7">
	<?php if(empty($fields['field_video_fid']->content)): ?>
		<div class="imagen"><?php print $fields['field_imagen_fid']->content; ?></div>
	<?php else: ?>
		<div class="imagen"><a href="<?php print "node/" . $fields['nid']->content . "/reproducir"  ?>"><?php print $fields['field_imagen_fid_1']->content; ?></a></div>
	<?php endif; ?>

	<div class="contenido">
		<div class="termino"><?php print $fields['tid']->content; ?></div>
		<div class="titulo"><?php print $fields['field_titulo_portada_value']->content; ?></div>
	</div>
	<div class="clear-float"></div>
</div>
