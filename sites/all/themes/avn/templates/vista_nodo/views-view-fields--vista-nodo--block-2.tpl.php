<div class="nodo-vinculos">
	<?php if(!empty($fields['title']->content)): ?>
		<div class="relacionadas">
			<?php if($fields['php']->content != 60): ?>
				<?php print 'Relacionadas'; ?>
			<?php else: ?>
				<?php print 'Related News'; ?>
			<?php endif; ?>
		</div>
		<div class="vinculo-1">
			<div class="imagen"><?php print $fields['field_imagen_fid']->content; ?></div>
			<div class="titulo"><?php print $fields['title']->content; ?></div>
		</div>
		<?php if(!empty($fields['title_2']->content)): ?>
			<div class="vinculo-2">
				<div class="imagen"><?php print $fields['field_imagen_fid_1']->content; ?></div>
				<div class="titulo"><?php print $fields['title_1']->content; ?></div>
			</div>
		<?php endif; ?>
		<?php if(!empty($fields['title_3']->content)): ?>
			<div class="vinculo-3">
				<div class="imagen"><?php print $fields['field_imagen_fid_2']->content; ?></div>
				<div class="titulo"><?php print $fields['title_2']->content; ?></div>
			</div>
		<?php endif; ?>
	<?php endif; ?>
</div>
