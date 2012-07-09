<div class="wrapper-galeria" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<?php if($content['middle']): ?>
		<div class="middle">
			<div class="inside"><?php print $content['middle']; ?></div>
			<div class="clear-float"></div>
		</div>
	<?php endif; ?>
	<?php if($content['middle_list']): ?>
		<div class="middle-list">
			<div class="inside"><?php print $content['middle_list']; ?></div>
			<div class="clear-float"></div>
		</div>
	<?php endif; ?>
</div>
