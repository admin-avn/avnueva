<?php if (!empty($title)): ?>
	<h3><?php print $title; ?></h3>
<?php endif; ?>
<div class="index-titulo-radio"><a href="/radio">Radio</a></div>
<?php foreach ($rows as $id => $row): ?>
	<?php print $row; ?>
<?php endforeach; ?>
<div class="index-titulo-radio-pie"><a href="/radio">Más avances</a></div>
