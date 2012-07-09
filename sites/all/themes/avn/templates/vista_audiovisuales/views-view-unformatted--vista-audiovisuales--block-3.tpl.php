<?php if (!empty($title)): ?>
	<h3><?php print $title; ?></h3>
<?php endif; ?>

<?php $i = 0; ?>

<div class="audiovisuales-radio">
	<?php foreach ($rows as $id => $row): ?>
		<tr class="titular titular-<?php print $i++; ?>">
			<?php print $row; ?>
		</tr>
	<?php endforeach; ?>
	<div class="vertodo-radio">
		<a href="/radio">Ver todo</a>
	</div>
</div>
