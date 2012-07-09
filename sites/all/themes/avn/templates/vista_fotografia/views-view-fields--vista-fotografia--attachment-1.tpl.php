<?php $url = explode("http", $fields['field_foto_fid']->content); ?>
<?php $url_org = explode("http", $fields['field_foto_fid_1']->content); ?>
<?php for($i = 1; $i < sizeof($url); $i++): ?>
	<?php $url[$i] = 'http' . $url[$i]; ?>
	<?php $url_org[$i] = 'http' . $url_org[$i]; ?>
<?php endfor; ?>

<ul id="carrusel-fotografia" class="jcarousel-skin-fotografia">
	<?php for($i = 1; $i < sizeof($url); $i++): ?>
		<li><a href="<?php print $url_org[$i]; ?>" rel="lightbox[fotografia]"><img src="<?php print $url[$i]; ?>" /></a></li>
	<?php endfor; ?>
</ul>

<?php jcarousel_add('#carrusel-fotografia', array('vertical' => FALSE)); ?>
