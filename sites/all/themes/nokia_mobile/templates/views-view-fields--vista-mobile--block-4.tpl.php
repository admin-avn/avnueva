<?php
$url = explode("http", $fields['field_imagen_fid_1']->content);
for($i = 1; $i < sizeof($url); $i++) {
        $url[$i] = 'http' . $url[$i];
        $cad = "\[foto$i\]";
        $cad_r = "<div class=" . "imagen$i" . "><img src=$url[$i] /></div>";
        $fields['body']->content = ereg_replace($cad, $cad_r, $fields['body']->content);
}
for($i = sizeof($url); $i < 10; $i++) {
        $fields['body']->content = ereg_replace("\[foto$i\]", "", $fields['body']->content);
}

?>

<div class="mobile-nodo">
	<div class="termino"><a href="<?php print "/mobile/taxonomy/term/" . $fields['tid']->content; ?>"><?php print $fields['tid_1']->content; ?></a></div>
	<div class="fecha"><p><?php print $fields['created']->content; ?></p></div>
	<div class="imagen"><?php print $fields['field_imagen_fid']->content; ?></div>
	<div class="titulo"><p><?php print $fields['title']->content; ?></p></div>
	<div class="sumario"><p><?php print $fields['field_sumario_value']->content; ?></p></div>
	<div class="contenido"><?php print $fields['body']->content; ?></div>
	<?php if(!empty($fields['field_vinculo1_nid']->content)): ?>
		<ul class="vinculos">
			<div class="list"><li class="vinculo-1"><?php print $fields['field_vinculo1_nid']->content; ?></li></div>
		<?php if(!empty($fields['field_vinculo2_nid']->content)): ?>
			<div class="list"><li class="vinculo-2"><?php print $fields['field_vinculo2_nid']->content; ?></li></div>
		<?php endif; ?>
		<?php if(!empty($fields['field_vinculo3_nid']->content)): ?>
			<div class="list"><li class="vinculo-3"><?php print $fields['field_vinculo3_nid']->content; ?></li></div>
		<?php endif; ?>
		<?php if(!empty($fields['field_enlace_externo_url']->content)): ?>
			<div class="list"><li class="vinculo-4"><?php print $fields['field_enlace_externo_url']->content; ?></li></div>
		<?php endif; ?>
	</ul>
	<?php endif; ?>
</div>
