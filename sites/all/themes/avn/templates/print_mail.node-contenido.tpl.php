<?php

$titulo = $node->title;
$contenido = $node->body;
$enlace = '<a href="www.avn.info.ve/node/' . $node->nid . '">' . $titulo . '</a>';

for($i = 1; $i < 10; $i++) {
        $contenido = str_replace("[foto$i]", "", $contenido);
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $print['language']; ?>" xml:lang="<?php print $print['language']; ?>">
	<body>
		<h1 class="titulo"><?php print $titulo; ?></h1>
		<div class="contenido"><?php print $contenido; ?></div>
		<div class="enlace"><?php print $enlace; ?></div>
	</body>
</html>
