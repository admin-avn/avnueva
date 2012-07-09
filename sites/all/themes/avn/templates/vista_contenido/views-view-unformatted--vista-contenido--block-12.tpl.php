<?php if(!empty($title)): ?>
	<h3><?php print $title; ?></h3>
<?php endif; ?>

<?php if(arg(0) == 'index3'): ?>
	<div class="fila-1">
		<?php for($i=0; $i<=2; $i+=1): ?>
			<div class="index3-6noticias index3-6noticias-<?php print $i; ?>">
				<?php print $rows[$i]; ?>
			</div>
		<?php endfor; ?>
		<div style="clear: both;"></div>
	</div>
	<div class="fila-2">
		<?php for($i=3; $i<=5; $i+=1): ?>
			<div class="index3-6noticias index3-6noticias-<?php print $i; ?>">
				<?php print $rows[$i]; ?>
			</div>
		<?php endfor; ?>
		<div style="clear: both;"></div>
	</div>
<?php else: ?>
	<div class="fila-1">
		<?php for($i=0; $i<=2; $i+=1): ?>
			<?php print $rows[$i]; ?>
		<?php endfor; ?>
		<div style="clear: both;"></div>
	</div>
	<div class="fila-2">
		<?php for($i=3; $i<=5; $i+=1): ?>
			<?php print $rows[$i]; ?>
		<?php endfor; ?>
		<div style="clear: both;"></div>
	</div>
<?php endif; ?>
