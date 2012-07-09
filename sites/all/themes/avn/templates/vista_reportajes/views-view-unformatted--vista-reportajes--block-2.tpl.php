<?php if (!empty($title)): ?>
	<h3><?php print $title; ?></h3>
<?php endif; ?>

<div class="index3-reportajes">
	<div class="titulo-reportajes"><a href="/reportajes-1">Reportajes</a></div>
	<?php foreach ($rows as $id => $row): ?>
		<div class="<?php print $classes[$id]; ?>">
			<?php print $row; ?>
		</div>
	<?php endforeach; ?>
	<div style="clear: both;"></div>
</div>
