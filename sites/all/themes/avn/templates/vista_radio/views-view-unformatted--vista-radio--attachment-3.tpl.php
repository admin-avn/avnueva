<script type="text/javascript">
	$(document).ready(function() {
		$('.en-contexto').change(function() {
			var titulo = $('.en-contexto option:selected').text();
			$("#en-contexto .titulo").html('<span>' + titulo + '</span>');
			var fecha = $('.en-contexto option:selected').attr("attr1");
			$("#en-contexto .fecha").html('<span>' + fecha + '</span>');
			var reproductor = $('.en-contexto option:selected').attr("attr2");
			$("#en-contexto .reproductor .playlist li").html('<a href=' + reproductor + '></a>');
		});
	});
</script>

<div class="en-contexto-listado">
	<form id="form-en-contexto">
		<span class="titulo">Programas anteriores:</span>
		<select class="en-contexto">
			<?php foreach ($rows as $id => $row): ?>
				<?php print $row; ?>
			<?php endforeach; ?>
		</select>
	</form>
</div>
