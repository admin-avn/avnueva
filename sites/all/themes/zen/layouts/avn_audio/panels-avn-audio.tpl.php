<div class="contenedor-audio" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<div class="izquierda">
		<?php if($content['horizontal1']): ?>
			<div class="horizontal1">
				<div class="inside"><?php print $content['horizontal1']; ?></div>
			</div>
		<?php endif; ?>
		<?php if($content['horizontal2']): ?>
			<div class="horizontal2">
				<div class="inside"><?php print $content['horizontal2']; ?></div>
				<div class="clear-float"></div>
			</div>
		<?php endif; ?>
		<?php if($content['horizontal3']): ?>
			<div class="horizontal3">
				<div class="inside"><?php print $content['horizontal3']; ?></div>
				<div class="clear-float"></div>
			</div>
		<?php endif; ?>
		<?php if($content['horizontal4']): ?>
			<div class="horizontal4">
				<div class="inside"><?php print $content['horizontal4']; ?></div>
				<div class="clear-float"></div>
			</div>
		<?php endif; ?>
		<?php if($content['horizontal5']): ?>
			<div class="horizontal5">
				<div class="inside"><?php print $content['horizontal5']; ?></div>
				<div class="clear-float"></div>
			</div>
		<?php endif; ?>
	</div>
	<?php if($content['derecha']): ?>
		<div class="derecha">
			<div class="inside"><?php print $content['derecha']; ?></div>
		</div>
	<?php endif; ?>
	<div class="clear-float"></div>
</div>
