<?php
$url = 'node/' . $fields['nid']->content;
$result = drupal_lookup_path('alias', $url);
?>

<?php if(empty($fields['field_imagen_fid']->content)): ?>
	<td class="titulo">
		<?php print $fields['field_titulo_portada_value']->content; ?>
	</td>
<?php else: ?>
	<td class="imagen">
		<a href="<?php print $result; ?>"><?php print theme('imagecache', 'fotogalerias-thumbnail', $fields['field_imagen_fid']->content); ?></a>
	</td>
	<td class="titulo">
		<?php print $fields['field_titulo_portada_value']->content; ?>
	</td>
<?php endif; ?>
