<?php
/**
 * @file
 * Contains the embed display plugin.
 */

/**
 * A plugin to handle defaults on a view.
 *
 * @ingroup views_display_plugins
 */

class views_php_array_plugin_display_php_array extends views_plugin_display {
  /**
   * Configure the setting for path, breadcrumb, pager, ajax, more link, etc.
   */
  // @todo: some of this need not be declared and can use the parent definition.

  function has_path() { return FALSE; }

  function uses_breadcrumb() { return FALSE; }

  function use_pager() { return TRUE; }

  function use_ajax() { return FALSE; }

  function use_more() { return FALSE; }

  function uses_exposed() { return FALSE; }

  function uses_fields() { return TRUE; }

  function uses_link_display() { return FALSE; }

  function accept_attachments() { return FALSE; }

  /**
   * This display has its own style type
   */
   function get_style_type() {
    // Return only the appropriate style plugin for outputting PHP Array
    return 'php';
   }

  /**
   * PHP Array option definitions.
   */
  function option_definition() {
    $options = parent::option_definition();

    // Overrides standard option definition
    $options['style_plugin']['default'] = 'php_array';
    $options['sitename_title']['default'] = FALSE;
    
    $options['defaults']['default']['style_plugin'] = FALSE;
    $options['defaults']['default']['style_options'] = FALSE;
    $options['defaults']['default']['row_plugin'] = FALSE;
    $options['defaults']['default']['row_options'] = FALSE;

    return $options;
  }

  /**
   * Determine if this display is the 'default' display which contains
   * fallback settings
   */
  function is_default_display() { return FALSE; }

  /**
   * Execution of this display
   */
  function execute() {
    // Prior to this being called, the $view should already be set to this
    // display, and arguments should be set on the view.

    $output = $this->view->render();
    if (empty($output)) {
      return drupal_not_found();
    }
    
    // @todo: erase, might not be needed.
    print $output;

    // return NULL for Drupal to believe that the page has been rendered.
    return NULL;
  }

  function render() {
    // Prior to this being called, the $this->view should already be executed
    // with appropriate options (args, fields, etc)
    
    // Delegate the rendering to the Style Plugin
    return $this->view->style_plugin->render($this->view->result);
  }

  function preview() {
    if (!empty($this->view->live_preview)) {
      // Pretty print the PHP Array in Live Preview    
      return vsm($this->view->render());
    }
    return $this->view->render();    
  }
}
