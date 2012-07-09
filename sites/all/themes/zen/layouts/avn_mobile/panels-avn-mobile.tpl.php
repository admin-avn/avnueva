<!DOCTYPE html PUBLIC "-//WAPFORUM//DTD XHTML Mobile 1.2//EN" "http://www.openmobilealliance.org/tech/DTD/xhtml-mobile12.dtd">
<meta name="viewport" content="width=device-width; initial-scale=1.0; maximum-scale=1.0; user-scalable=0;" />

<div class="wrapper-mobile" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<?php if($content['middle']): ?>
		<div class="middle">
			<div class="inside"><?php print $content['middle']; ?></div>
			<div class="clear-float"></div>
		</div>
	<?php endif; ?>
</div>
