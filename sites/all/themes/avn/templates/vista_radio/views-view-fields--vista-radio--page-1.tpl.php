<div class="radio-archivo">
	<div class="fecha"><span><?php print $fields['created']->content; ?></span></div>
		<div class="player-radio">
			<div class="sm2_plst_cck-outer">
				<div>
					<ul class="playlist">
						<li>
							<?php if(!empty($fields['title']->content)): ?>
									  <a href="<?php print $fields['field_audio_fid']->content; ?>"><?php print $fields['title']->content; ?></a>
							<?php else: ?>
									  <a href="<?php print $fields['field_audio_fid']->content; ?>">Radio AVN</a>
							<?php endif; ?>
						</li>
					</ul>
				</div>
			</div>
		</div>
	</td>
</div>
