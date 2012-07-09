<div class="wrapper-contact" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<?php if($content['middle']): ?>
		<div class="middle">
			<div class="inside"><?php print $content['middle']; ?></div>
			<div class="clear-float"></div>
		</div>
	<?php endif; ?>
</div>
