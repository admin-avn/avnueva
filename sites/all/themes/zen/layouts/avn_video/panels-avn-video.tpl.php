<div class="video-contenedor" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<?php if($content['arriba']): ?>
		<div class="arriba">
			<div class="inside"><?php print $content['arriba']; ?></div>
		</div>
	<?php endif ?>
	<?php if($content['abajo']): ?>
		<div class="abajo">
			<div class="inside"><?php print $content['abajo']; ?></div>
		</div>
	<?php endif ?>
</div>
