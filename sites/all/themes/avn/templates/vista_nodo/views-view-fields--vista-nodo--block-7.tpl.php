<div class="nodo-comentario">
	<div class="left-side">
		<div class="autor"><?php print strip_tags($fields['name']->content); ?></div>
		<div class="fecha"><?php print strip_tags($fields['timestamp']->content); ?></div>
	</div>
	<div class="right-side">
		<div class="comentario"><?php print strip_tags($fields['comment']->content); ?></div>
	</div>
	<div class="clear-float"></div>
</div>
