<div class="wrapper-radio" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<div class="left-right">
		<div class="left">
			<?php if($content['panel_left']): ?>
				<div class="panel-left">
					<div class="inside"><?php print $content['panel_left']; ?></div>
				</div>
			<?php endif; ?>
		</div>
		<div class="right">
			<?php if($content['panel_right']): ?>
				<div class="panel-right">
					<div class="inside"><?php print $content['panel_right']; ?></div>
				</div>
			<?php endif; ?>
		</div>
		<div class="clear-float"></div>
	</div>
</div>
