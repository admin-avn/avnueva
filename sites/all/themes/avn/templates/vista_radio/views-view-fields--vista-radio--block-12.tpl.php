<div id="en-contexto">
	<div class="cajon">
		<div class="termino"><a href="/radio/archivo?tid=102"><?php print $fields['name']->content; ?></a></div>
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
		<div class="titulo"><span><?php print $fields['title']->content; ?></span></div>
		<div class="fecha"><span><?php print $fields['created']->content; ?></span></div>
		<div class="clear-float"></div>
	</div>
</div>
