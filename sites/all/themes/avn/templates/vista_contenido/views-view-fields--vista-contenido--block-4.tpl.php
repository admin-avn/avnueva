<div class="front-lomasleido-3-5">
	<div class="digito"></div>
	<table>
		<?php if(empty($fields['field_imagen_fid']->content)): ?>
			<tr>
				<td>
					<div class="titulo"><?php print $fields['field_titulo_portada_value']->content; ?></div>
				</td>
			</tr>
		<?php else: ?>
			<tr>
				<td>
					<div class="titulo"><?php print $fields['field_titulo_portada_value']->content; ?></div>
				</td>
				<td>
					<div class="imagen"><?php print $fields['field_imagen_fid']->content; ?></div>
				</td>
			</tr>
		<?php endif; ?>
	</table>
</div>
