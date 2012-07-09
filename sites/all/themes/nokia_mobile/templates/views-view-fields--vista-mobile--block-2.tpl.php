<div class="mobile-posicion-2-20">
	<div class="cajon">
		<div class="imagen"><?php print $fields['field_imagen_fid']->content; ?></div>
		<div class="titulo"><a href="<?php print "/mobile/node/" . $fields['nid']->content; ?>"><?php print $fields['title']->content; ?></a></div>
	</div>
	<ul class="vinculos">
		<?php if(!empty($fields['field_vinculo1_nid']->content)): ?>
			<div class="list"><li class="vinculo-1"><?php print $fields['field_vinculo1_nid']->content; ?></li></div>
		<?php endif; ?>
		<?php if(!empty($fields['field_vinculo2_nid']->content)): ?>
			<div class="list"><li class="vinculo-2"><?php print $fields['field_vinculo2_nid']->content; ?></li></div>
		<?php endif; ?>
		<?php if(!empty($fields['field_vinculo3_nid']->content)): ?>
			<div class="list"><li class="vinculo-3"><?php print $fields['field_vinculo3_nid']->content; ?></li></div>
		<?php endif; ?>
	</ul>
</div>
