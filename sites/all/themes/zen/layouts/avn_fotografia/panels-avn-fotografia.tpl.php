	<?php if($content['header']): ?>
		<div class="header">
			<div class="inside"><?php print $content['header']; ?></div>
		</div>
	<?php endif ?>
<div class="wrapper-fotografia" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<div class="left-right">
		<div class="left">
			<?php if($content['panel_left']): ?>
				<div class="panel-left">
					<div class="inside"><?php print $content['panel_left']; ?></div>
				</div>
				<div class="clear-float"></div>
			<?php endif; ?>
		</div> <!-- end left -->
		<div class="right">
			<?php if($content['panel_right']): ?>
				<div class="panel-right">
					<div class="inside"><?php print $content['panel_right']; ?></div>
				</div>
				<div class="clear-float"></div>
			<?php endif; ?>
		</div> <!-- end right -->
		<div class="clear-float"></div>
	</div>
	<?php if($content['footer']): ?>
		<div class="footer">
			<div class="inside"><?php print $content['footer']; ?></div>
		</div>
	<?php endif; ?>
</div>
