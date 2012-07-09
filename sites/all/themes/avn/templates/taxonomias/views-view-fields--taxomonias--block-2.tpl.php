<div class="vista-taxonomia-posicion-1-3">
	<?php if(!empty($fields['field_ante_titulo_value']->content)): ?>
		<span class="antetitulo"><?php print $fields['field_ante_titulo_value']->content; ?></span>
	<?php endif; ?>
	<div class="titulo"><?php print $fields['title']->content; ?></div>
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
	<div class="sumario"><span><?php print $fields['field_sumario_value']->content; ?></span></div>
</div>
