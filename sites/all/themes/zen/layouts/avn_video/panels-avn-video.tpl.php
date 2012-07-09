<div class="video-contenedor" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<div class="arriba">
		<?php if($content['arriba_izquierda']): ?>
			<div class="arriba-izquierda">
				<div class="inside"><?php print $content['arriba_izquierda']; ?></div>
			</div>
		<?php endif; ?>
		<?php if($content['arriba_derecha']): ?>
			<div class="arriba-derecha">
				<div class="inside"><?php print $content['arriba_derecha']; ?></div>
			</div>
		<?php endif; ?>
		<div class="clear-float"></div>
	</div>
	<?php if($content['abajo']): ?>
		<div class="abajo">
			<div class="inside"><?php print $content['abajo']; ?></div>
		</div>
	<?php endif ?>
</div>
