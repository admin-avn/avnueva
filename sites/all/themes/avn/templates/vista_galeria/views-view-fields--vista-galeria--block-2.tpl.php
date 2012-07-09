<div class="galeria-listado">
        <a href="<?php print "/galeria/" . $fields['nid']->content; ?>"><img src="<?php print $fields['field_portada_fid']->content; ?>" /></a>
        <div class="descripcion">
                <div class="termino"><?php print $fields['name']->content; ?></div>
                <div class="titulo"><?php print $fields['title']->content; ?></div>
                <div class="cantidad"><?php print $fields['php']->content; ;?></div>
        </div>
</div>
