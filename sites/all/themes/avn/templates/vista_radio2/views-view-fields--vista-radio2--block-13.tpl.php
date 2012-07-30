<div class="cuatro-reproductores">
	<div class="reproductor reproductor-chico">
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
	<a class="inline-exclude" href="<?php print "download/file/fid/" . $fields['php']->content; ?>"><img src="/sites/all/themes/avn/images/radio2-cuatro-reproductores-download.png" />Descargar</a>
</div>
<script>
	soundManager.onready(function() {
	});
</script>
