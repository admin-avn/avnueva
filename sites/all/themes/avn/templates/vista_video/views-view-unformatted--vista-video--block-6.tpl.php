<?php if (!empty($title)): ?>
	<h3><?php print $title; ?></h3>
<?php endif; ?>
<div id="videos">
	<ul>
		<?php foreach ($rows as $id => $row): ?>
			<?php print $row; ?>
		<?php endforeach; ?>
	</ul>
</div>
