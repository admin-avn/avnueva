<?php

/**
 * Template preprocessor for views-view-views-rss-fields.tpl.php.
 */
function template_preprocess_views_view_views_rss_fields(&$vars) {
  $view = $vars['view'];

  // Prepare <channel> elements.
  $vars['channel'] = '';
  foreach ($view->style_plugin->xml_channel_elements() as $element => $definition) {
    list($namespace, $element_name) = $view->style_plugin->extract_element_names($element, 'core');
    if (isset($view->style_plugin->options['channel'][$namespace][$element_name])) {
      $value = $view->style_plugin->options['channel'][$namespace][$element_name];
    }
    elseif (isset($definition['default_value'])) {
      $value = $definition['default_value'];
    }
    else {
      $value = NULL;
    }
    // Preprocess element value.
    if (isset($definition['preprocess functions']) && is_array($definition['preprocess functions'])) {
      foreach ($definition['preprocess functions'] as $preprocess_function) {
        if (function_exists($preprocess_function)) {
          $value = $preprocess_function(array(
            'element' => $element,
            'value' => $value,
            'item' => $view->style_plugin->options['channel'],
            'view' => $view,
          ));
        }
      }
    }
    // Make sure that $value is an array (in cases when Views' rendering,
    // CCK formatter or preprocessor returns simple value).
    if (!is_array($value)) {
      $value = array('value' => $value);
    }
    // If there is no value and no arguments (in case of self-closing elements)
    // already set for the element at this stage, it is not going to be set 
    // at any point further, so the element should not be added to the feed.
    if (
      (!isset($value['value']) || empty($value['value'])) 
      && (!isset($value['arguments']) || empty($value['arguments']))
    ) continue;
    // Theme channel element value.
    // If theme definition was provided by hook_views_rss_channel_elements_alter()
    // implementation, but theme value was set to FALSE, it means that such 
    // element should not be themed here.
    $theme_function = isset($definition['theme']) ? $definition['theme'] : 'views_rss_element';
    if ($theme_function) {
      $item_vars = array_merge(array(
        'element' => $element,
        'item' => $view->style_plugin->options['channel'],
        'view' => $view,
      ), $value);
      $value = theme($theme_function, $item_vars);
    }
    $vars['channel'] .= $value;
  }

  // Prepare <item> elements.
  $elements = array();
  $rows = '';
  $item_elements = $view->style_plugin->xml_item_elements();
  $items = $view->style_plugin->map_rows($vars['rows']);
  foreach($items as $item) {
    $row = '';
    // Preprocess whole item array before processing and theming separate elements.
    foreach (module_implements('views_rss_preprocess_item') as $module) {
      $function = $module .'_views_rss_preprocess_item';
      $item = $function(array(
        'item' => $item,
        'view' => $view,
      ));
    }
    foreach ($item as $element => $value) {
      // Preprocess element initial value if required.
      if (isset($item_elements[$element]['preprocess functions']) && is_array($item_elements[$element]['preprocess functions'])) {
        foreach ($item_elements[$element]['preprocess functions'] as $preprocess_function) {
          if (function_exists($preprocess_function)) {
            $item_vars = array(
              'element' => $element,
              'value'   => $value,
              'item'    => $item,
              'view'    => $view,
            );
            $value = $preprocess_function($item_vars);
          }
        }
      }
      // Make sure that $value is an array (in cases when Views' rendering,
      // CCK formatter or preprocessor returns simple value).
      if (!is_array($value)) {
        $value = array('value' => $value);
      }
      // If there is no value and no arguments (in case of self-closing elements)
      // already set for the element at this stage, it is not going to be set 
      // at any point further, so the element should not be added to the feed.
      if (
        (!isset($value['value']) || empty($value['value'])) 
        && (!isset($value['arguments']) || empty($value['arguments']))
      ) continue;
      // Theme item element value.
      // If theme definition was provided by hook_views_rss_item_elements_alter()
      // implementation, but theme value was set to FALSE, it means that such 
      // element should not be themed here (for example when it was already 
      // preformatted using CCK formatter - see <enclosure> element generated
      // either from 'image' or 'filefield' CCK field).
      $theme_function = isset($item_elements[$element]['theme']) ? $item_elements[$element]['theme'] : 'views_rss_element';
      if ($theme_function) {
        $item_vars = array_merge(array(
          'element' => $element,
          'item'    => $item,
          'view'    => $view,
        ), $value);
        $value = theme($theme_function, $item_vars);
      }
      $row .= is_array($value) ? $value['value'] : $value;
    }
    $rows .= theme('views_rss_fields_item', $row);
  }
  $vars['rows'] = $rows;
  
  // Prepare namespaces.
  $namespaces = array();
  foreach ($view->style_plugin->xml_namespaces() as $namespace => $predefined_uri_reference) {
    $uri_reference = (isset($view->style_plugin->options['namespaces'][$namespace])) ? $view->style_plugin->options['namespaces'][$namespace] : $predefined_uri_reference;
    $namespaces[] = "xmlns:$namespace=\"$uri_reference\"";
  }
  $vars['namespaces'] = implode(' ', array_unique($namespaces));

  // Set XML header.
  drupal_set_header('Content-Type: application/rss+xml; charset=utf-8');
}

/**
 * Default theme function for both <channel> and <item> elements.
 */
function theme_views_rss_element($vars) {
  $output = "<{$vars['element']}";
  // Process element arguments if provided.
  if (isset($vars['arguments']) && is_array($vars['arguments'])) {
    $arguments = '';
    foreach ($vars['arguments'] as $key => $value) {
      $arguments .= " $key=\"$value\"";
    }
    $output .= $arguments;
  }
  // Process element value if provided and close element.
  if (isset($vars['value'])) {
    $output .= ">{$vars['value']}</{$vars['element']}>\n";
  }
  // Otherwise make it a self-closing element.
  else {
    $output .= " />\n";
  }
  return $output;
}

/**
 * Theme function for feed icon.
 */
function theme_views_rss_feed_icon($url, $title, $icon) {
  if ($image = theme('image', $icon, t('Download RSS Feed'), $title)) {
    return '<a href="'. check_url($url) .'" class="feed-icon">'. $image .'</a>';
  }
}