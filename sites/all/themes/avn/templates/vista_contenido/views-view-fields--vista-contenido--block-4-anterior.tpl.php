<div class="vista-contenido-posicion-4-5-6">
	<div class="cajon">
		<div class="termino"><p><?php print $fields['tid']->content; ?></p></div>
		<div class="titulo"><a href="<?php print "node/" . $fields['nid']->content; ?>"><?php print $fields['field_titulo_portada_value']->content; ?></a></div>
		<?php if($fields['field_posicion_value']->content == 4): ?>
			<div class="imagen"><?php print $fields['field_imagen_fid']->content; ?></div>
		<?php endif; ?>
		<div class="sumario"><p><?php print $fields['field_sumario_value']->content; ?></p></div>
	</div>
</div>
