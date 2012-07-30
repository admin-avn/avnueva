<div class="emision-matutina">
	<div class="reproductor reproductor-mediano">
		<div class="sm2_plst_cck-outer">
			<div>
				<ul class="playlist">
					<li>
						<a href="<?php print $fields['field_audio_fid']->content; ?>"></a>
					</li>
				</ul>
			</div>
		</div>
	</div>
	<div class="fecha"><?php print $fields['created']->content; ?></div>
</div>
<script>
	soundManager.onready(function() {
	});
</script>
