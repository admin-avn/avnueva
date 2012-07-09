<?php
$url = 'node/' . $fields['nid']->content;
$result = drupal_lookup_path('alias', $url);
?>

<div class="imagen">
	<div class="termino"><?php print $fields['tid']->content; ?></div>
	<?php if(empty($fields['field_video_fid']->content)): ?>
		<a href="<?php print $result; ?>"><?php print theme('imagecache', 'index3-6noticias' , $fields['field_imagen_fid']->content); ?></a>
	<?php else: ?>
		<a href="<?php print $result; ?>"><?php print theme('imagecache', 'index3-6noticias-video' , $fields['field_imagen_fid']->content); ?></a>
	<?php endif; ?>
</div>
<div class="titulo"><?php print $fields['field_titulo_portada_value']->content; ?></div>
