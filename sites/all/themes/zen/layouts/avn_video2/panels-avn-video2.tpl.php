<div class="video2-contenedor" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<?php if($content['horizontal1']): ?>
		<div class="horizontal1">
			<div class="inside"><?php print $content['horizontal1']; ?></div>
		</div>
	<?php endif ?>
	<div class="horizontal2">
		<?php if($content['horizontal2_izquierda']): ?>
			<div class="horizontal2-izquierda">
				<div class="inside"><?php print $content['horizontal2_izquierda']; ?></div>
			</div>
		<?php endif; ?>
		<?php if($content['horizontal2_derecha']): ?>
			<div class="horizontal2-derecha">
				<div class="inside"><?php print $content['horizontal2_derecha']; ?></div>
			</div>
		<?php endif; ?>
		<div class="clear-float"></div>
	</div>
	<?php if($content['horizontal3']): ?>
		<div class="horizontal3">
			<div class="inside"><?php print $content['horizontal3']; ?></div>
		</div>
	<?php endif ?>
</div>
