<?php
// $Id: twocol.inc,v 1.1.2.3 2010/06/22 15:54:25 merlinofchaos Exp $

// Plugin definition
$plugin = array(
	'title' => t('Audio'),
	'category' => t('avn'),
	'icon' => 'avn_audio.png',
	'theme' => 'panels_avn_audio',
	'css' => 'avn_audio.css',
	'panels' => array(
		'horizontal1' => t('Avance Principal'),
		'horizontal2' => t('Avances 2 - 5'),
		'horizontal3' => t('Emisiones'),
		'horizontal4' => t('Regiones, Agenda, Sintesis'),
		'horizontal5' => t('Micros, Reportajes, En Contexto'),
		'derecha' => t('Avances')
	),
);
