<div class="front-lomasleido-1-2">
	<?php if(empty($fields['field_video_fid']->content)): ?>
		<div class="digito"></div>
		<div class="imagen"><?php print $fields['field_imagen_fid']->content; ?></div>
	<?php else: ?>
		<div class="digito"></div>
		<div class="imagen"><a href="<?php print "node/" . $fields['nid']->content . "/reproducir"; ?>"><?php print $fields['field_imagen_fid_1']->content; ?></a></div>
	<?php endif; ?>
	<div class="titulo"><a href="<?php print "/node/" . $fields['nid']->content; ?>"><?php print $fields['field_titulo_portada_value']->content; ?></a></div>
</div>



