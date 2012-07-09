<?php if(arg(0) == 'index3'): ?>
	<div class="index3-especiales">
		<?php foreach ($fields as $id => $field): ?>
			<?php if (!empty($field->separator)): ?>
				<?php print $field->separator; ?>
			<?php endif; ?>

			<?php print $field->wrapper_prefix; ?>
				<?php print $field->label_html; ?>
				<?php print $field->content; ?>
			<?php print $field->wrapper_suffix; ?>
		<?php endforeach; ?>
	</div>
<?php else: ?>
	<div class="especiales">
		<?php foreach ($fields as $id => $field): ?>
			<?php if (!empty($field->separator)): ?>
				<?php print $field->separator; ?>
			<?php endif; ?>

			<?php print $field->wrapper_prefix; ?>
				<?php print $field->label_html; ?>
				<?php print $field->content; ?>
			<?php print $field->wrapper_suffix; ?>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
