<?php

/**
 * Extend the view_plugin_style class to provide an RSS view style.
 */
class views_plugin_style_rss_fields extends views_plugin_style {

  /**
   * Attach this view to another display as a feed.
   */
  function attach_to($display_id, $path, $title) {
    $display = $this->view->display[$display_id]->handler;
    $url_options = array('absolute' => TRUE);
    $input = $this->view->get_exposed_input();
    if ($input) {
      $url_options['query'] = $input;
    }

    $url = url($this->view->get_url(NULL, $path), $url_options);
    if ($display->has_path() && !$this->options['feed_settings']['feed_in_links']) {
      if (empty($this->preview)) {
        drupal_add_feed($url, $title);
      }
    }
    else {
      if (empty($this->view->feed_icon)) {
        $this->view->feed_icon = '';
      }

      $this->view->feed_icon .= theme('feed_icon', $url, $title);
      drupal_add_link(array(
        'rel' => 'alternate',
        'type' => 'application/rss+xml',
        'title' => $title,
        'href' => $url,
      ));
    }
  }

  function option_definition() {
    $options = parent::option_definition();
    
    // Channel element defaults.
    $channel_elements = $this->xml_channel_elements();
    if (count($channel_elements)) {
      foreach (array_keys($channel_elements) as $element) {
        list($namespace, $element_name) = $this->extract_element_names($element, 'core');
        $options['channel'][$namespace][$element_name] = array('default' => '');
      }
    }

    // Item element defaults.
    $item_elements = $this->xml_item_elements();
    if (count($item_elements)) {
      foreach (array_keys($item_elements) as $element) {
        list($namespace, $element_name) = $this->extract_element_names($element, 'core');
        $options['item'][$namespace][$element_name] = array('default' => '');
      }
    }
    
    // Other feed settings defaults.
    $options['feed_settings']['feed_in_links'] = array('default' => '');

    return $options;
  }
  
  /**
   * Provide a form for setting options.
   *
   * @param array $form
   * @param array $form_state
   */
  function options_form(&$form, &$form_state) {
    parent::options_form($form, $form_state);

    $handlers = $this->display->handler->get_handlers('field');
    if (empty($handlers)) {
      $form['error_markup'] = array(
        '#value' => t('You need at least one field before you can configure your field settings'),
        '#prefix' => '<div class="error form-item description">',
        '#suffix' => '</div>',
      );
    }
    else {

      // Field chooser.
      $field_names = array('' => '--');
      foreach ($handlers as $field => $handler) {
        if ($label = $handler->label()) {
          $field_names[$field] = $label;
        }
        else {
          $field_names[$field] = $handler->ui_name();
        }
      }
      
      // Channel elements settings.
      $channel_elements = $this->xml_channel_elements();
      if (count($channel_elements)) {
        foreach ($channel_elements as $element => $definition) {
          if (!isset($definition['configurable']) || $definition['configurable']) {
            list($namespace, $element_name) = $this->extract_element_names($element, 'core');
            // Add fieldset for namespace if not yet added.
            if (!isset($form['channel'][$namespace])) {
              $form['channel'][$namespace] = array(
                '#type' => 'fieldset',
                '#title' => t('Channel elements : @namespace', array('@namespace' => $namespace)),
                '#description' => t('Select the fields that relevant data for each element of the "@namespace" namespace in <channel> element of this feed. See <a href="@guide_url">Views RSS configuration guide</a> for more information.', array(
                  '@namespace' => $namespace,
                  '@guide_url' => url('http://drupal.org/node/1344136'),
                )),
                '#collapsible' => TRUE,
                '#collapsed' => TRUE,
              );
            }
            if (isset($this->options['channel'][$namespace][$element_name])) {
              $default_value = $this->options['channel'][$namespace][$element_name];
            }
            elseif (isset($definition['default_value'])) {
              $default_value = $definition['default_value'];
            }
            else {
              $default_value = NULL;
            }
            $form['channel'][$namespace][$element_name] = array(
              '#title' => isset($definition['title']) ? $definition['title'] : $element,
              '#type' => isset($definition['type']) ? $definition['type'] : 'textfield',
              '#default_value' => $default_value,
              '#description' => isset($definition['description']) ? $definition['description'] : NULL,
              '#required' => isset($definition['required']) ? $definition['required'] : FALSE,
            );
            // Add help link if provided.
            if (isset($definition['help']) && $definition['help']) {
              $form['channel'][$namespace][$element_name]['#description'] .= ' ' . l('[?]', $definition['help'], array('attributes' => array('title' => t('Need more information?'))));
            }
          }
        }
      }
      
      // Namespace <item> elements settings.
      $item_elements = $this->xml_item_elements();
      if (count($item_elements)) {
        foreach ($item_elements as $element => $definition) {
          if (!isset($definition['configurable']) || $definition['configurable']) {
            list($namespace, $element_name) = $this->extract_element_names($element, 'core');
            // Add fieldset for namespace if not yet added.
            if (!isset($form['item'][$namespace])) {
              $form['item'][$namespace] = array(
                '#type' => 'fieldset',
                '#title' => t('Item elements : @namespace', array('@namespace' => $namespace)),
                '#description' => t('Select the fields that relevant data for each element of the "@namespace" namespace in this feed. See <a href="@guide_url">Views RSS configuration guide</a> for more information.', array(
                  '@namespace' => $namespace,
                  '@guide_url' => url('http://drupal.org/node/1344136'),
                )),
                '#collapsible' => TRUE,
                '#collapsed' => TRUE,
              );
            }
            $form['item'][$namespace][$element_name] = array(
              '#type' => 'select',
              '#title' => $definition['title'],
              '#description' => isset($definition['description']) ? $definition['description'] : '',
              '#options' => $field_names,
              '#default_value' => isset($this->options['item'][$namespace][$element_name]) ? $this->options['item'][$namespace][$element_name] : NULL,
            );
            // Add help link if provided.
            if (isset($definition['help']) && $definition['help']) {
              $form['item'][$namespace][$element_name]['#description'] .= ' ' . l('[?]', $definition['help'], array('attributes' => array('title' => t('Need more information?'))));
            }
          }
        }
      }

      // Other feed settings.
      $form['feed_settings'] = array(
        '#type' => 'fieldset',
        '#title' => t('Other feed settings'),
        '#collapsible' => TRUE,
        '#collapsed' => TRUE,
      );
      $form['feed_settings']['feed_in_links'] = array(
        '#type' => 'checkbox',
        '#default_value' => !empty($this->options['feed_settings']['feed_in_links']),
        '#title' => t('Display feed icon in the links attached to the view.'),
        '#weight' => 12,
      );

    }
  }

  /**
   * Returns an array of XML <channel> elements defined by other modules
   * through hook_views_rss_channel_elements_alter() implementations.
   */
  function xml_channel_elements() {
    $channel_elements = array();
    drupal_alter('views_rss_channel_elements', $channel_elements);
    return $channel_elements;
  }

  /**
   * Returns an array of XML <item> elements defined by other modules
   * through hook_views_rss_item_elements_alter() implementations.
   */
  function xml_item_elements() {
    $item_elements = array();
    drupal_alter('views_rss_item_elements', $item_elements);
    return $item_elements;
  }

  /**
   * Returns an array of XML namespaces defined by other modules
   * through hook_views_rss_item_elements_alter() implementations.
   */
  function xml_namespaces() {
    // Get namespaces provided by other modules.
    $namespaces = array();
    drupal_alter('views_rss_namespaces', $namespaces);
    // Add namespaces not provided by other modules, but defined by elements
    // and allow updating their URI references from view configuration.
    foreach (array_keys($this->xml_item_elements()) as $element) {
      list($namespace, $element_name) = $this->extract_element_names($element);
      if ($namespace) {
        $namespaces[$namespace] = isset($this->options['namespaces'][$namespace]) ? $this->options['namespaces'][$namespace] : $namespaces[$namespace];
      }
    }
    return $namespaces;
  }
  
  /**
   * Extracts and returns an array containing element namespace and name.
   */
  function extract_element_names($element, $core_namespace = '') {
    if (!strstr($element, ':')) {
      $element = $core_namespace . ':' . $element;
    }
    return explode(':', $element);
  }

  /**
   * Map views row result to an RSS item.
   */
  function map_rows($rows) {
    // Fields must be pre-rendered starting from version 2.3 of Views module.
    $rendered = array();
    $keys = array_keys($this->view->field);
    foreach ($rows as $count => $row) {
      foreach ($keys as $id) {
        $rendered[$count][$id] = $this->view->field[$id]->theme($row);
      }
    }
    // Rewrite view rows to XML item rows.
    $items = array();
    $item_elements = $this->xml_item_elements();
    foreach ($rendered as $id => $row) {
      $item = array();
      foreach (array_keys($item_elements) as $element) {
        list($namespace, $element_name) = $this->extract_element_names($element, 'core');
        // Assign values for all elements, not only those defined in view settings.
        // If element value is not defined in view settings, let's just assign NULL.
        // It will not be passed to final theme function anyway during processing
        // taking place in template_preprocess_views_view_views_rss_fields().
        $item[$element] = (isset($this->options['item'][$namespace][$element_name]) && isset($row[$this->options['item'][$namespace][$element_name]])) ? $row[$this->options['item'][$namespace][$element_name]] : NULL;
      }
      $items[] = $item;
    }
    return $items;
  }
  
}