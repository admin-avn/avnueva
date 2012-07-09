<div class="video-principal" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<?php if($content['horizontal1']): ?>
		<div class="horizontal1">
			<div class="inside"><?php print $content['horizontal1']; ?></div>
		</div>
	<?php endif ?>
	<?php if($content['horizontal2']): ?>
		<div class="horizontal2">
			<div class="inside"><?php print $content['horizontal2']; ?></div>
		</div>
	<?php endif ?>
</div>
