<?php if (!empty($title)): ?>
	<h3><?php print $title; ?></h3>
<?php endif; ?>
<?php $i = 1; ?>

<?php if(arg(0) == 'index3'): ?>
	<div class="index3-lomasleido">
		<div class="titulo">Lo más leído</div>
		<table>
			<?php foreach ($rows as $id => $row): ?>
				<tr class="fila fila-<?php print $i++; ?>">
					<?php print $row; ?>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
<?php else: ?>
	<div class="lomasleido-1-5-nuevo">
		<div class="titulo">Lo más leído</div>
		<table>
			<?php foreach ($rows as $id => $row): ?>
				<tr class="<?php print "fila" . $i++; ?>">
					<?php print $row; ?>
				</tr>
			<?php endforeach; ?>
		</table>
	</div>
<?php endif; ?>
