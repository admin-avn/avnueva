<div class="video-portada">
	<?php if(($fields['tid']->content == 20) || ($fields['tid']->content == 20)): ?>
		<div class="termino"><?php print $fields['name']->content; ?></div>
		<div class="imagen"><a href="<?php print "/video/" . $fields['nid']->content; ?>"><img src="<?php print $fields['field_video_miniatura_fid']->content; ?>" /></a></div>
		<div class="titulo"><a href="<?php print "/video/" . $fields['nid']->content; ?>"><?php print $fields['title']->content; ?></a></div>
		<div class="descripcion"><?php print $fields['body']->content; ?></div>
	<?php else: ?>
		<div class="termino"><?php print $fields['name']->content; ?></div>
		<div class="imagen"><a href="<?php print "/video/" . $fields['nid']->content; ?>"><img src="<?php print $fields['field_video_miniatura_fid']->content; ?>" /></a></div>
	<?php endif; ?>
</div>
