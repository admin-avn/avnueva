<?php
/**
 * @file views-view-fields.tpl.php
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>

<?php $url = explode("http", $fields['field_foto_fid']->content); ?>
<?php for($i = 1; $i < sizeof($url); $i++): ?>
	<?php $url[$i] = 'http' . $url[$i]; ?>
<?php endfor; ?>

<div id="fotografia-destacados-3" class="fotografia-destacados">
	<a href="<?php print "/avnueva/fotografia/" . $fields['nid']->content; ?>"><img src="<?php print $url[1]; ?>" /></a>
	<div class="descripcion">
		<div class="termino"><?php print $fields['name']->content; ?></div>
		<div class="titulo"><?php print $fields['title']->content; ?></div>
		<div class="cantidad"><?php print (sizeof($url) - 1) . "diapositivs"; ?></div>
	</div>
</div>
