<?php if(!empty($title)): ?>
	<h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="index3-articulos">
	<div class="titulo-articulo">Opinión</div>
	<div class="fila-0">
		<?php for($i=0; $i<=1; $i+=1): ?>
			<?php print $rows[$i]; ?>
		<?php endfor; ?>
		<div style="clear: both;"></div>
	</div>
	<div class="fila-1">
		<?php for($i=2; $i<=3; $i+=1): ?>
			<?php print $rows[$i]; ?>
		<?php endfor; ?>
		<div style="clear: both;"></div>
	</div>
</div>
