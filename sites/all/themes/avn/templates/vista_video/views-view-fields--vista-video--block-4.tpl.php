<?php
if(!file_exists($fields['field_video_fid']->content)) {
	$sw_youtube = substr_count($fields['field_video_fid']->content, "youtube");
	if($sw_youtube == 1) {
		$url_video = explode("%3D", $fields['field_video_fid']->content);
		$xml = file_get_contents("http://gdata.youtube.com/feeds/api/videos/$url_video[1]");
		preg_match("#<yt:duration seconds='([0-9]+)'/>#", $xml, $duracion);
		$tiempo = $duracion[1];
	} elseif(file_exists($fields['field_video_fid_1']->content)) {
		$filepath = $fields['field_video_fid_1']->content;
		$movie = new ffmpeg_movie($filepath, 0);
		$tiempo = $movie->getDuration();
	}
}
?>
<div class="listado-principal-derecho">
	<div class="imagen"><?php print $fields['field_video_miniatura_fid']->content; ?></div>
	<div class="titulo"><?php print $fields['title']->content; ?></div>
	<div class="tiempo"><?php printf("%d:%02d", floor($tiempo/60), ($tiempo % 60)); ?></div>
	<div class="contenido"><?php print $fields['body']->content; ?></div>
	<div class="clear-float"></div>
</div>
