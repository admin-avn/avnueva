<?php
// $Id: print.tpl.php,v 1.8.2.17 2010/08/18 00:33:34 jcnventura Exp $

/**
 * @file
 * Default print module template
 *
 * @ingroup print
 */
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" lang="<?php print $print['language']; ?>" xml:lang="<?php print $print['language']; ?>">
	<body>
		<h1 class="print-title"><?php print $print['title']; ?></h1>
		<div class="print-content"><?php print $print['content']; ?></div>
	</body>
</html>
