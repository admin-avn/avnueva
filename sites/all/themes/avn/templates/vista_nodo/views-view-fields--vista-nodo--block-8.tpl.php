<?php
if($fields['field_galeria_asociada_value']->content == 0) {
	$url = explode("http", $fields['field_imagen_fid']->content);
	$url_lb2 = explode("http", $fields['field_imagen_fid_1']->content);
	for($i = 2; $i < sizeof($url); $i++) {
		$url[$i] = 'http' . $url[$i];
		$url_lb2[$i] = 'http' . $url_lb2[$i];
		$cad = "[foto$i]";
		$cad_r = "<div class=" . "imagen$i" . "><a href=" . "$url_lb2[$i]" . " rel=" . "lightbox" . "><img src=$url[$i] /></a></div>";
		$fields['body']->content = str_replace($cad, $cad_r, $fields['body']->content);
	}
}
for($i = 1; $i < 100; $i++) {
	$fields['body']->content = str_replace("[foto$i]", "", $fields['body']->content);
}
$fields['body']->content = str_replace("[audio]", "", $fields['body']->content);
?>

<div class="nodo-contenido">
	<?php if(!empty($fields['field_audio_fid']->content)): ?>
		<div class="nodo-audio" style="float: left; padding: 0px 5px 5px 0px;">
			<div class="reproductor">
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
			<div class="escuchelo">Esc&uacute;chelo</div>
			<div class="radio">RADIO <span>AVN</span></div>
		</div>
	<?php endif; ?>
	<div class="cuerpo"><?php print $fields['body']->content; ?></div>
	<div class="detalles">
	<?php if(trim($fields['field_autor_value']->content) != 'AVN'): ?>
		<span class="autor"><a href="<?php print '/titulares/autor/' . $fields['field_autor_value']->content; ?> "><?php print $fields['field_autor_value']->content; ?></a></span>
			<span class="avn">AVN</span>
			<span class="fecha"><?php print ' ' . $fields['created']->content; ?></span>
		</div>
	<?php else: ?>
		<span class="autor">
			<span class="avn"><a href="<?php print '/titulares/autor/' . trim($fields['field_autor_value']->content); ?> "><?php print $fields['field_autor_value']->content; ?></a></span>
			<span class="fecha"><?php print ' ' . $fields['created']->content; ?></span>
		</div>
	<?php endif; ?>
	<div class="firma"><?php print $fields['field_firma_value']->content; ?></div>
	<table class="compartir">
		<tr>
			<td><?php print $fields['nid']->content; ?></td>
			<td><?php print $fields['nid_1']->content; ?></td>
			<td><?php print $fields['php']->content; ?></td>
			<td><?php print $fields['nid_2']->content; ?></td>
			<td><?php print $fields['nid_3']->content; ?></td>
			<td><?php print $fields['nid_4']->content; ?></td>
		</tr>
	</table>
<!--
	<div class="mensaje"><span>Por favor, deje su comentario</span></div>
	<div class="advertencia">Su comentario será moderado y no se publicaran aquellos que sean ofensivos, denigrantes, que afecten la dignidad de una persona o un grupo social, difamatorios e inciten a violar las leyes o a alterar el orden.</div>
-->
</div>

<script>
$(document).ready(function() {
	jQuery.get("http://avn.info.ve/scripts/contador.php", {nid: "<?php print arg(1);?>"});

});

</script>


