<?php
$nid = arg(1);
$query = "select term_data.tid, term_data.vid, name from term_data left join term_node on term_data.tid=term_node.tid where nid=$nid order by vid desc limit 1";
$result = db_query($query);
while($rows = db_fetch_object($result)) {
	$tid = $rows->tid;
	$name = $rows->name;
}
$path = drupal_lookup_path('alias', "taxonomy/term/$tid");
?>
<div class="nodo-posicion">
	<div class="bloque">
		<div class="termino"><a href="<?php print "/$path"; ?>"><?php print "$name"; ?></a></div>
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
