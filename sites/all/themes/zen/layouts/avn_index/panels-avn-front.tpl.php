<div class="front-contenedor" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<div class="arriba">
		<?php if($content['arriba_izquierda'] || $content['arriba_derecha']): ?>
			<div class="arriba-izquierda">
				<div class="inside"><?php print $content['arriba_izquierda']; ?></div>
			</div>
			<div class="arriba-derecha">
				<div class="inside"><?php print $content['arriba_derecha']; ?></div>
			</div>
		<?php endif; ?>
		<div class="clear-float"></div>
	</div>
	<div class="centro">
		<?php if($content['medio_izquierda'] || $content['medio_derecha']): ?>
			<div class="centrol-especial">
				<div class="inside"><?php print $content['centro']; ?></div>
			</div>
		<?php endif; ?>
		<div class="clear-float"></div>
	</div>
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
		<?php if($content['medio_atravesado']): ?>
			<div class="medio-atravesado">
				<div class="inside"><?php print $content['medio_atravesado']; ?></div>
			</div>
		<?php endif; ?>
	</div>
	<?php if($content['medio_centro']): ?>
		<div class="medio-centro">
			<div class="inside"><?php print $content['medio_centro']; ?></div>
		</div>
	<?php endif; ?>
	<div class="abajo">
		<?php if($content['abajo_izquierda'] || $content['abajo_derecha']): ?>
			<div class="abajo-izquierda">
				<div class="inside"><?php print $content['abajo_izquierda']; ?></div>
			</div>
		<?php endif; ?>
		<?php if($content['abajo_derecha']): ?>
			<div class="abajo-derecha">
				<div class="inside"><?php print $content['abajo_derecha']; ?></div>
			</div>
		<?php endif; ?>
		<div class="clear-float"></div>
	</div>
</div>
