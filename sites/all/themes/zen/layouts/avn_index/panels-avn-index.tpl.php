<div class="index-contenedor" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<?php if($content['horizontal1']): ?>
		<div class="horizontal1">
			<div class="inside"><?php print $content['horizontal1']; ?></div>
		</div>
		<div class="clear-float"></div>
	<?php endif; ?>
	<?php if($content['horizontal2']): ?>
		<div class="horizontal2">
			<div class="inside"><?php print $content['horizontal2']; ?></div>
		</div>
		<div class="clear-float"></div>
	<?php endif; ?>
	<?php if($content['horizontal3']): ?>
		<div class="horizontal3">
			<div class="inside"><?php print $content['horizontal3']; ?></div>
		</div>
		<div class="clear-float"></div>
	<?php endif; ?>
	<?php if($content['horizontal4']): ?>
		<div class="horizontal4">
			<div class="inside"><?php print $content['horizontal4']; ?></div>
		</div>
		<div class="clear-float"></div>
	<?php endif; ?>
	<div class="horizontal5">
		<?php if($content['abajo_izquierda'] || $content['abajo_derecha']): ?>
			<div class="abajo-izquierda">
				<div class="inside"><?php print $content['abajo_izquierda']; ?></div>
			</div>
		<?php endif; ?>
		<?php if($content['abajo_derecha']): ?>
			<div class="abajo-derecha">
				<div class="inside"><?php print $content['abajo_derecha']; ?></div>
			</div>
		<?php endif; ?>
		<div class="clear-float"></div>
	</div>
</div>
