<?php
$url = 'node/' . $fields['nid']->content;
$result = drupal_lookup_path('alias', $url);
?>

<div class="index3-notas-graficas">
	<?php if(!empty($fields['field_imagen_fid']->content)): ?>
		<?php if(empty($fields['field_video_fid']->content)): ?>
			<div class="bloque">
				<div class="termino"><?php print $fields['tid']->content; ?></div>
					<div class="imagen"><a href="<?php print $result; ?>"><?php print theme('imagecache', 'index3-160x110' , $fields['field_imagen_fid']->content); ?></a></div>
				</div>
		<?php else: ?>
			<div class="bloque">
				<div class="termino"><?php print $fields['tid']->content; ?></div>
					<div class="imagen"><a href="<?php print $result; ?>"><?php print theme('imagecache', 'index3-160x110' , $fields['field_imagen_fid']->content); ?></a></div>
				</div>
		<?php endif; ?>
	<?php else: ?>
		<div class="termino"><?php print $fields['tid']->content; ?></div>
	<?php endif; ?>
	<div class="titulo"><?php print $fields['field_titulo_portada_value']->content; ?></div>
</div>
