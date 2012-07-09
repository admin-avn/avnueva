<?php
$path = explode("sites", $fields['field_foto_fid']->content);
for($i = 1; $i < sizeof($path); $i++) {
	$path[$i] = 'sites' . $path[$i];
	list($width, $height) = getimagesize($path[$i]);
	if($width > $height) {
		$imagecache[$i] = theme('imagecache', 'galeria-940x627', $path[$i], "", $fields['title']->content);
	} else {
		$imagecache[$i] = theme('imagecache', 'galeria-940x627-vertical', $path[$i], "", $fields['title']->content);
	}
}
?>

<div id="galeria">
	<?php
	for($i = 1; $i < sizeof($path); $i++) {
		print $imagecache[$i];
	}
	?>
</div>
<script>
	Galleria.loadTheme('/sites/all/libraries/galleria/themes/twelve/galleria.twelve.min.js');
	$("#galeria").galleria({
		_showTooltip: false,
		autoplay: 8000,
		height: 627,
		width: 940,
		preload: 1
	});
</script>
