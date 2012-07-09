<?php if (!empty($title)): ?>
	<h3><?php print $title; ?></h3>
<?php endif; ?>

<?php $i = 0; ?>

<table class="index3-titulares">
	<?php foreach ($rows as $id => $row): ?>
		<tr class="titular titular-<?php print $i++; ?>">
			<?php print $row; ?>
		</tr>
	<?php endforeach; ?>
	<tr class="vertodo-titulares">
		<td colspan="2">
			<div>
				<a href="/titulares">Ver todo</a>
			</div>
		</td>
	</tr>
</table>
