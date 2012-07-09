<div class="titulares-contenedor" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<?php if($content['medio']): ?>
		<div class="medio">
			<div class="inside"><?php print $content['medio']; ?></div>
		</div>
	<?php endif; ?>
</div>
