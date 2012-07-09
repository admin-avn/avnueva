<?php if(empty($fields['field_imagen_fid']->content)): ?>
	<td class="fdigito"><div class="digito"></div></td>
	<td class="titulo">
		<?php print $fields['field_titulo_portada_value']->content; ?>
	</td>
<?php else: ?>
	<td class="fdigito"><div class="digito"></div></td>
	<td class="titulo-imagen">
		<?php print $fields['field_titulo_portada_value']->content; ?>
	</td>
	<td class="imagen">
		<?php print $fields['field_imagen_fid']->content; ?>
	</td>
<?php endif; ?>
