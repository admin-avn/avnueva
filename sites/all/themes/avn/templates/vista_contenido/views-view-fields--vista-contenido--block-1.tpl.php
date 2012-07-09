<div class="front-contenedor-1-3">
	<div class="termino"><?php print $fields['tid']->content; ?></div>
	<div class="titulo"><?php print $fields['field_titulo_portada_value']->content; ?></div>
	<?php if(empty($fields['field_video_fid']->content)): ?>
		<?php if($fields['field_corte_imagen_value']->content == 1): ?>
			<div class="imagen"><?php print $fields['field_imagen_fid']->content; ?></div>
		<?php elseif($fields['field_corte_imagen_value']->content == 2): ?>
			<div class="imagen"><?php print $fields['field_imagen_fid_1']->content; ?></div>
		<?php elseif($fields['field_corte_imagen_value']->content == 3): ?>
			<div class="imagen"><?php print $fields['field_imagen_fid_2']->content; ?></div>
		<?php endif; ?>
	<?php else: ?>
		<?php if($fields['field_corte_imagen_value']->content == 1): ?>
			<div class="imagen"><a href="<?php print "node/" . $fields['nid']->content . "/reproducir"  ?>"><?php print $fields['field_imagen_fid_3']->content; ?></a></div>
		<?php elseif($fields['field_corte_imagen_value']->content == 2): ?>
			<div class="imagen"><a href="<?php print "node/" . $fields['nid']->content . "/reproducir"  ?>"><?php print $fields['field_imagen_fid_4']->content; ?></a></div>
		<?php elseif($fields['field_corte_imagen_value']->content == 3): ?>
			<div class="imagen"><a href="<?php print "node/" . $fields['nid']->content . "/reproducir"  ?>"><?php print $fields['field_imagen_fid_5']->content; ?></a></div>
		<?php endif; ?>
	<?php endif; ?>
	<?php if(!empty($fields['field_vinculo1_nid']->content)): ?>
		<ul class="vinculos">
			<li class="vinculo-1"><?php print $fields['field_vinculo1_nid']->content; ?></li>
			<?php if(!empty($fields['field_vinculo2_nid']->content)): ?>
				<li class="vinculo-2"><?php print $fields['field_vinculo2_nid']->content; ?></li>
			<?php endif; ?>
			<?php if(!empty($fields['field_vinculo3_nid']->content)): ?>
				<li class="vinculo-3"><?php print $fields['field_vinculo3_nid']->content; ?></li>
			<?php endif; ?>
		<ul>
	<?php endif; ?>
</div>
