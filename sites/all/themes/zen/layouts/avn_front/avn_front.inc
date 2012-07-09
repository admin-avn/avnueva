<?php
// $Id: twocol.inc,v 1.1.2.3 2010/06/22 15:54:25 merlinofchaos Exp $

// Plugin definition
$plugin = array(
	'title' => t('avn front'),
	'category' => t('avn'),
	'icon' => 'avn_front.png',
	'theme' => 'panels_avn_front',
	'css' => 'avn_front.css',
	'panels' => array(
		'arriba_izquierda' => t('Arriba izquierda'),
		'arriba_derecha' => t('Arriba derecha'),
		'centro' => t('Centro'),
		'medio_izquierda' => t('Medio izquierda'),
		'medio_derecha' => t('Medio derecha'),
		'medio_atravesado' => t('Medio atravesado'),
		'medio_centro' => t('Medio centro'),
		'abajo_izquierda' => t('Abajo izquierda'),
		'abajo_derecha' => t('Abajo derecha'),
	),
);
