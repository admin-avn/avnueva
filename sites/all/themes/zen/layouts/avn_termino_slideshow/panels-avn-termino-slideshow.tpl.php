<div class="contenedor-termino" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<?php if($content['arriba']): ?>
		<div class="arriba">
			<div class="inside"><?php print $content['arriba']; ?></div>
		</div>
	<?php endif; ?>
	<?php if($content['medio']): ?>
		<div class="medio">
			<div class="inside"><?php print $content['medio']; ?></div>
		</div>
	<?php endif; ?>
        <div class="abajo">
                <?php if($content['abajo_izquierda'] || $content['abajo_derecha']): ?>
                        <div class="abajo-izquierda">
                                <div class="inside"><?php print $content['abajo_izquierda']; ?></div>
                        </div>
                        <div class="abajo-derecha">
                                <div class="inside"><?php print $content['abajo_derecha']; ?></div>
                        </div>
                <?php endif; ?>
                <div class="clear-float"></div>
        </div>
	<?php if($content['abajo']): ?>
		<div class="abajo_abajo">
			<div class="inside"><?php print $content['abajo']; ?></div>
		</div>
	<?php endif; ?>
</div>
