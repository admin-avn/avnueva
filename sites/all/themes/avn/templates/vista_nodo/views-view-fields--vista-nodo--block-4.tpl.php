<div class="nodo-posicion-2">
	<div class="bloque">
		<div class="termino"><span><?php print $fields['tid']->content; ?></span></div>
		<?php if(!empty($fields['field_video_fid']->content)): ?>
			<?php if(!empty($fields['field_imagen_fid']->content)): ?>
				<?php if($fields['field_corte_imagen_value']->content == 1): ?>
					<?php print theme('imagecache', 'fotografia-138x80-arriba-video', $fields['field_imagen_fid']->content); ?>
				<?php elseif($fields['field_corte_imagen_value']->content == 2): ?>
					<?php print theme('imagecache', 'fotografia-138x80-centro-video', $fields['field_imagen_fid']->content); ?>
				<?php elseif($fields['field_corte_imagen_value']->content == 3): ?>
					<?php print theme('imagecache', 'fotografia-138x80-abajo-video', $fields['field_imagen_fid']->content); ?>
				<?php endif; ?>
			<?php endif; ?>
		<?php else: ?>
			<?php if(!empty($fields['field_imagen_fid']->content)): ?>
				<?php if($fields['field_corte_imagen_value']->content == 1): ?>
					<?php print theme('imagecache', 'fotografia-138x80-arriba', $fields['field_imagen_fid']->content); ?>
				<?php elseif($fields['field_corte_imagen_value']->content == 2): ?>
					<?php print theme('imagecache', 'fotografia-138x80-centro', $fields['field_imagen_fid']->content); ?>
				<?php elseif($fields['field_corte_imagen_value']->content == 3): ?>
					<?php print theme('imagecache', 'fotografia-138x80-abajo', $fields['field_imagen_fid']->content); ?>
				<?php endif; ?>
			<?php endif; ?>
		<?php endif; ?>
	</div>
	<div class="titulo"><?php print $fields['title']->content; ?></div>
</div>
