<?php if (!empty($title)): ?>
	<h3><?php print $title; ?></h3>
<?php endif; ?>
<?php $i = 1; ?>

<div class="nodo-lomasleido-1-5">
	<table>
		<?php foreach ($rows as $id => $row): ?>
			<tr class="<?php print "fila" . $i++; ?>">
				<?php print $row; ?>
			</tr>
		<?php endforeach; ?>
	</table>
</div>
