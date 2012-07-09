<script type="text/javascript">
	$(document).ready(function() {
		$('.micros').change(function() {
			var titulo = $('.micros option:selected').text();
			$("#micros .titulo").html('<span>' + titulo + '</span>');
			var fecha = $('.micros option:selected').attr("attr1");
			$("#micros .fecha").html('<span>' + fecha + '</span>');
			var reproductor = $('.micros option:selected').attr("attr2");
			$("#micros .reproductor .playlist li").html('<a href=' + reproductor + '></a>');
		});
	});
</script>

<div class="micros-listado">
	<form id="form-micros">
		<span class="titulo">Programas anteriores:</span>
		<select class="micros">
			<?php foreach ($rows as $id => $row): ?>
				<?php print $row; ?>
			<?php endforeach; ?>
		</select>
	</form>
</div>
