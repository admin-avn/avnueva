<div class="avance-principal">
	<div class="reproductor">
		<div class="sm2_plst_cck-outer">
			<div>
				<ul class="playlist">
					<li>
						<a href="<?php print $fields['field_audio_fid']->content; ?>"><?php print $fields['title']->content; ?></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="titulo"><?php print $fields['title']->content; ?></div>
	<div class="fecha"><?php print $fields['created']->content; ?></div>
	<a class="inline-exclude" href="<?php print "download/file/fid/" . $fields['php']->content; ?>"><img src="/sites/all/themes/avn/images/radio2-avance-principal-download.png" /></a>
</div>
<script>
	soundManager.onready(function() {
	});
</script>
