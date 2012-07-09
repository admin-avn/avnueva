<div class="avance-principal">
	<div class="cajon">
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
		<div class="controls-fake"></div>
		<div class="titulo"><span><?php print $fields['title']->content; ?><span></div>
		<div class="fecha"><span><?php print $fields['created']->content; ?></span></div>
		<a class="inline-exclude" href="<?php print "download/file/fid/" . $fields['php']->content; ?>"><img src="/sites/all/themes/avn/images/descargar.png" /></a>
	</div>
</div>
<script>
	soundManager.onready(function() {
	});
</script>
