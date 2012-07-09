<?php
/**
 * @file 
 * Declaration of Views PHP Display plugin and Style Plugin.
 */
/**
 * Implementation of hook_views_plugins
 */
function views_php_array_views_plugins() {
  return array(
    'display' => array(
      'php_array' => array(
        'title' => t('PHP Array'),
        'help' => t('Creates a display to output view result as PHP Array.'),
        'handler' => 'views_php_array_plugin_display_php_array',
        'theme' => 'views_view',
        'theme path' => drupal_get_path('module', 'views') . '/theme',
        'use ajax' => FALSE,
        'use pager' => TRUE,
        'use more' => FALSE,
        'accept attachments' => FALSE,
        'help topic' => 'display-php-array',
      ),
    ),
    
    'style' => array(
      'php_array' => array(
        'title' => t('PHP Array'),
        'help' => t('Generates a PHP Array from a view.'),
        'handler' => 'views_php_array_plugin_style_php_array',
        'uses field' => TRUE,
        'uses row plugin' => FALSE,
        'uses options' => TRUE,
        'type' => 'php',
        'help topic' => 'style-php-array',
      ),
    ),
  );
}