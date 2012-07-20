<div class="contenedor-termino" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<?php if($content['arriba']): ?>
		<div class="arriba">
			<div class="inside"><?php print $content['arriba']; ?></div>
		</div>
	<?php endif; ?>
	<div class="medio">
        <?php if($content['medio_izquierda'] || $content['medio_derecha']): ?>
			<div class="medio-izquierda">
               	<div class="inside"><?php print $content['medio_izquierda']; ?></div>
			</div>
			<div class="medio-derecha">
               	<div class="inside"><?php print $content['medio_derecha']; ?></div>
			</div>
		<?php endif; ?>
		<div class="clear-float"></div>	
	</div>
	<?php if($content['abajo']): ?>
		<div class="abajo">
			<div class="inside"><?php print $content['abajo']; ?></div>
		</div>
	<?php endif; ?>
</div>
