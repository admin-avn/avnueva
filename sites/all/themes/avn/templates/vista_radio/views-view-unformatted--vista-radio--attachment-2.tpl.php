<script type="text/javascript">
	$(document).ready(function() {
		$('.reportajes').change(function() {
			var titulo = $('.reportajes option:selected').text();
			$("#reportajes .titulo").html('<span>' + titulo + '</span>');
			var fecha = $('.reportajes option:selected').attr("attr1");
			$("#reportajes .fecha").html('<span>' + fecha + '</span>');
			var reproductor = $('.reportajes option:selected').attr("attr2");
			$("#reportajes .reproductor .playlist li").html('<a href=' + reproductor + '></a>');
		});
	});
</script>

<div class="reportajes-listado">
	<form id="form-reportajes">
		<span class="titulo">Programas anteriores:</span>
		<select class="reportajes">
			<?php foreach ($rows as $id => $row): ?>
				<?php print $row; ?>
			<?php endforeach; ?>
		</select>
	</form>
</div>
