<?php
$nid = arg(1);
$query = "select term_data.tid, term_data.vid, name from term_data left join term_node on term_data.tid=term_node.tid where nid=$nid order by vid desc limit 1";
$result = db_query($query);
while($rows = db_fetch_object($result)) {
	$tid = $rows->tid;
	$name = $rows->name;
}
$path = drupal_lookup_path('alias', "taxonomy/term/$tid");
?>
<div class="nodo-encabezado">
	<div class="termino"><a href="<?php print "/$path"; ?>"><?php print "$name"; ?></a></div>
	<div class="antetitulo"><span><?php print $fields['field_ante_titulo_value']->content; ?></span></div>
	<div class="titulo"><span><?php print $fields['title']->content; ?></span></div>
	<?php if(!empty($fields['field_autor_value']->content)): ?>
		<?php if(trim($fields['field_autor_value']->content) != 'AVN'): ?>
			<div class="autor"><em><?php echo "por"; ?> </em><span><a href='/titulares/autor/<?php print trim($fields['field_autor_value']->content); ?>'><?php print trim($fields['field_autor_value']->content); ?></a></span></div>
		<?php endif; ?>
	<?php endif; ?>
	<?php if(!empty($fields['field_video_fid']->content)): ?>
		<div class="cajon-video">
			<div class="video">
				<?php
					list($width, $height) = getimagesize($fields['field_imagen_fid']->content);
					if ($height > 3*$width/4) {
						$imagen = theme('imagecache', 'nodo-imagen-principal-vertical', $fields['field_imagen_fid']->content);
					} else {
						if(!empty($fields['field_corte_imagen_value']->content)) {
							if($fields['field_corte_imagen_value']->content == 1) {
								$imagen = theme('imagecache', 'nodo-imagen-principal-arriba', $fields['field_imagen_fid']->content);
							} elseif($fields['field_corte_imagen_value']->content == 2) {
								$imagen = theme('imagecache', 'nodo-imagen-principal-centro', $fields['field_imagen_fid']->content);
							} elseif($fields['field_corte_imagen_value']->content == 3) {
								$imagen = theme('imagecache', 'nodo-imagen-principal-abajo', $fields['field_imagen_fid']->content);
							}
						}
					}
					print video($fields['field_video_fid']->content, arg(2), 630, 384, $imagen);
				?>
			</div>
		</div>
	<?php endif; ?>
	<?php
	if((!empty($fields['field_imagen_fid']->content)) && ($fields['field_galeria_asociada_value']->content == 0)) {
		list($width, $height) = getimagesize($fields['field_imagen_fid']->content);
		if ($height > 3*$width/4) {
			$imagen = theme('imagecache', 'nodo-imagen-principal-vertical', $fields['field_imagen_fid']->content);
		} else {
			if(!empty($fields['field_corte_imagen_value']->content)) {
				if($fields['field_corte_imagen_value']->content == 1) {
					$imagen = theme('imagecache', 'nodo-imagen-principal-arriba', $fields['field_imagen_fid']->content);
				} elseif($fields['field_corte_imagen_value']->content == 2) {
					$imagen = theme('imagecache', 'nodo-imagen-principal-centro', $fields['field_imagen_fid']->content);
				} elseif($fields['field_corte_imagen_value']->content == 3) {
					$imagen = theme('imagecache', 'nodo-imagen-principal-abajo', $fields['field_imagen_fid']->content);
				}
			}
		}
	}
	?>
	<?php if(empty($fields['field_video_fid']->content) && (!empty($fields['field_imagen_fid_1']->content))): ?>
		<div class="cajon-imagen">
			<div class="imagen"><a href="<?php print $fields['field_imagen_fid_1']->content; ?>" rel="lightbox" title="<?php print $fields['field_titulo_imagen_value']->content; ?>"><?php print $imagen; ?></a></div>
			<div class="imagen-datos">
				<div class="titulo-imagen"><span><?php print $fields['field_titulo_imagen_value']->content; ?></span></div>
			</div>
		</div>
	<?php endif; ?>

	<?php if((!empty($fields['field_imagen_fid']->content)) && ($fields['php']->content >= 2) && ($fields['field_galeria_asociada_value']->content == 1)): ?>
		<div id="galeria">
			<?php $url = explode("http", $fields['field_imagen_fid_2']->content); ?>
			<?php $url_org = explode("http", $fields['field_imagen_fid_3']->content); ?>
			<?php for($i = 1; $i < sizeof($url); $i++): ?>
				<?php $url[$i] = 'http' . $url[$i]; ?>
				<?php $url_org[$i] = 'http' . $url_org[$i]; ?>
				<a href="<?php print $url_org[$i]; ?>"><img src="<?php print $url[$i]; ?>" title="<?php // print $fields['title']->content; ?>" alt=""></a>
			<?php endfor; ?>
			<script>
				Galleria.loadTheme('/sites/all/libraries/galleria/themes/twelve/galleria.twelve.min.js');
				$("#galeria").galleria({
					autoplay: 8000,
					height: 340,
					width: 630
				});
			</script>
		</div>
	<?php endif; ?>
</div>

<?php print $scripts; ?>
<?php
if(empty($fields['field_imagen_fid']->content)) {
	$fields['field_imagen_fid']->content = '/sites/all/themes/avn/images/default.png';
}
?>

<?php /*-------------------------------------------------------------------------------------------------*/ ?>

<?php

function print_video_youtube($url, $width, $height) {
$video = <<<EOF
        <object width=$width height=$height>
        <param name="movie" value="$url"</param>
        <param name="allowFullScreen" value="true"></param>
        <param name="allowScriptAccess" value="always"></param>
        <embed src="$url" 
                type="application/x-shockwave-flash"
                allowfullscreen="true"
                allowscriptaccess="always"
                width=$width height=$height>
        </embed>
        </object>
EOF;
return $video;
}

function print_video_flowplayer($url, $play, $width, $height, $image) {

if(empty($image)) {
	$image = '<img src="/sites/all/themes/avn/images/default.png" />';
}

$playbutton = '<img class="playbutton" src="/sites/all/themes/avn/images/playbutton.png">';
if(empty($play)) {
        $autoplay = 'false';
} else {
        $autoplay = 'true';
}

$width = $width . "px";
$height = $height . "px";

$video = <<<EOF
<a id="ipad" href="$url" style="display: block; width: $width; height: $height">
        	$image
        	$playbutton
</a>
<script type="text/javascript" src="/sites/all/libraries/flowplayer3/example/flowplayer3/example/flowplayer-3.2.6.min.js"></script>
<script src="/sites/all/libraries/flowplayer3/example/flowplayer-3.2.6.min.js"></script>
<script src="/sites/all/libraries/flowplayer3/flowplayer.ipad-3.2.2.min.js"></script>
<script>
        flowplayer("ipad", "/sites/all/libraries/flowplayer3/flowplayer-3.2.7.swf", {
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
EOF;
return $video;
}

function video($url, $play, $width, $height, $image) {
	if(!empty($url)) {
		$is_youtube = substr_count($url, "youtube");
		if($is_youtube != 0) {
			$url_video_youtube = explode("%3D", $url);
			if($play == "reproducir") {
				$url_video = 'http://www.youtube.com/v/' . $url_video_youtube[1] . '&autoplay=1';
			} else {
				$url_video = 'http://www.youtube.com/v/' . $url_video_youtube[1];
			}
			return print_video_youtube($url_video, $width, $height);
		} else {
			return print_video_flowplayer($url, $play, $width, $height, $image);
		}
	}
}
?>
