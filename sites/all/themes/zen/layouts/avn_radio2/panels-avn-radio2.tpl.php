<div class="radio2" <?php if (!empty($css_id)) { print "id=\"$css_id\""; } ?>>
	<div class="contenedor">
		<div class="izquierda">
			<div class="panel-principal">
				<?php if($content['principal']): ?>
					<div class="inside"><?php print $content['principal']; ?></div>
				<?php endif; ?>
			</div>
			<div class="panel-cuatro-reproductores">
				<?php if($content['cuatro-reproductores']): ?>
					<div class="inside"><?php print $content['cuatro-reproductores']; ?></div>
				<?php endif; ?>
			</div>
			<div class="contenedor">
				<div class="panel-emisiones-y-reporte-regional">
					<?php if($content['emisiones-y-reporte-regional']): ?>
						<div class="inside"><?php print $content['emisiones-y-reporte-regional']; ?></div>
					<?php endif; ?>
				</div>
				<div class="panel-micros">
					<?php if($content['micros']): ?>
						<div class="inside"><?php print $content['micros']; ?></div>
					<?php endif; ?>
				</div>
				<div class="clear-float"></div>
			</div>
			<div class="panel-agenda-cultural-y-efemerides">
				<?php if($content['agenda-cultural-y-efemerides']): ?>
					<div class="inside"><?php print $content['agenda-cultural-y-efemerides']; ?></div>
				<?php endif; ?>
			</div>
		</div>
		<div class="derecha">
			<div class="panel-avances">
				<?php if($content['avances']): ?>
					<div class="inside"><?php print $content['avances']; ?></div>
				<?php endif; ?>
			</div>
			<div class="panel-antipodas">
				<?php if($content['antipodas']): ?>
					<div class="inside"><?php print $content['antipodas']; ?></div>
				<?php endif; ?>
			</div>
		</div>
		<div class="clear-float"></div>
	</div>
	<div class="panel-sintesis-informativa">
		<?php if($content['sintesis-informativa']): ?>
			<div class="inside"><?php print $content['sintesis-informativa']; ?></div>
		<?php endif; ?>
	</div>
	<div class="panel-entrevistas">
		<?php if($content['entrevistas']): ?>
			<div class="inside"><?php print $content['entrevistas']; ?></div>
		<?php endif; ?>
	</div>
</div>
