<div class="index3" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
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
	<div class="horizontal3">
		<?php if($content['horizontal3_izquierda'] || $content['horizontal3_derecha']): ?>
			<div class="horizontal3-izquierda">
				<div class="inside"><?php print $content['horizontal3_izquierda']; ?></div>
			</div>
		<?php endif; ?>
		<?php if($content['horizontal3_derecha']): ?>
			<div class="horizontal3-derecha">
				<div class="inside"><?php print $content['horizontal3_derecha']; ?></div>
			</div>
		<?php endif; ?>
		<div class="clear-float"></div>
	</div>
</div>
