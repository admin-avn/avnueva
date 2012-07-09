<?php
$url = 'node/' . $fields['nid']->content;
$result = drupal_lookup_path('alias', $url);
?>

<div class="index3-9noticias">
	<div class="termino"><?php print $fields['tid']->content; ?></div>
	<div class="titulo"><?php print $fields['field_titulo_portada_value']->content; ?></div>
	<div class="bloque">
		<?php if(file_exists($fields['field_imagen_fid']->content)): ?>
			<?php if(empty($fields['field_video_fid']->content)): ?>
				<div class="imagen"><a href="<?php print $result; ?>"><?php print theme("imagecache", "index3-160x110", $fields['field_imagen_fid']->content); ?></a></div>
			<?php else: ?>
				<div class="imagen"><a href="<?php print $result; ?>"><?php print theme("imagecache", "index3-160x110-video", $fields['field_imagen_fid']->content); ?></a></div>
			<?php endif; ?>
		<?php endif; ?>
		<div class="sumario"><?php print $fields['field_sumario_value']->content; ?></div>
		<div style="clear: both;"></div>
	</div>
</div>
