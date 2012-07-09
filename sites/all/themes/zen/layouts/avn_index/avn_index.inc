<?php
// $Id: twocol.inc,v 1.1.2.3 2010/06/22 15:54:25 merlinofchaos Exp $

// Plugin definition
$plugin = array(
	'title' => t('avn index'),
	'category' => t('avn'),
	'icon' => 'avn_index.png',
	'theme' => 'panels_avn_index',
	'css' => 'avn_index.css',
	'panels' => array(
		'horizontal1' => t('Carrusel'),
		'horizontal2' => t('8 Noticias'),
		'horizontal3' => t('2 Noticias'),
		'horizontal4' => t('Videos'),
		'abajo_izquierda' => t('9 Noticias'),
		'abajo_derecha' => t('Notas Gráficas'),
	),
);
