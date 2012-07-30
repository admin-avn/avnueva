<?php
$sw_youtube = substr_count($fields['field_video_fid']->content, "youtube");
if($sw_youtube == 1) {
	$url_video = explode("%3D", $fields['field_video_fid']->content);
	$url = 'http://www.youtube.com/v/' . $url_video[1];
}
?>
<div class="video3">
	<div class="video-player">
		<?php if($sw_youtube == 0): ?>
			<?php
			if(empty($fields['field_video_miniatura_fid']->content)) {
				$fields['field_video_miniatura_fid']->content = '/sites/all/themes/avn/images/default.png';
			}
			?>
	
			<a id="ipad" href="<?php print $fields['field_video_fid']->content; ?>" style="display: block; width: 655px; height: 488px;">
				<?php
				if (arg(2) != 'reproducir') {
					print '<img src="';
					print $fields['field_video_miniatura_fid']->content; 
					print '" style="width: 655px; height: 488px;">';
					print '<img class="playbutton2" src="/sites/all/themes/avn/images/playbutton.png">';
				}    
				?>
			</a>
			<script type="text/javascript" src="/sites/all/libraries/flowplayer3/example/flowplayer-3.2.6.min.js"></script> 
			<script src="/sites/all/libraries/flowplayer3/flowplayer.ipad-3.2.2.min.js"></script>  
			<script> 
				$f("ipad", "/sites/all/libraries/flowplayer3/flowplayer-3.2.7.swf",{
					clip: {
						autoPlay: true,
						autoBuffering: true
					},
					play: {
						replayLabel: 'Reproducir de nuevo'
					},
					plugins: {
						viral: {
							url: '/sites/all/libraries/flowplayer3/flowplayer.viralvideos-3.2.5.swf',
							share: {
								description: 'blah blah.'
							}
						}
					}
				}).ipad();
			</script> 
		<?php else: ?>
			<object width="655" height="488">
				<param name="movie" value="<?php print $url; ?>"</param>
				<param name="allowFullScreen" value="true"></param>
				<param name="allowScriptAccess" value="always"></param>
				<embed src="<?php print $url; ?>"
					type="application/x-shockwave-flash"
					allowfullscreen="true"
					allowscriptaccess="always"
					width="655" height="488">
				</embed>
			</object>
		<?php endif; ?>
	</div>
	<div class="descripcion-video">
		<div class="categoria"><?php print $fields['tid']->content; ?></div>
		<div class="titulo"><?php print $fields['title']->content; ?></div>
		<div class="contenido"><?php print $fields['body']->content; ?></div>
		<div class="clear-float"></div>
	</div>
	<div class="clear-float"></div>
</div>
