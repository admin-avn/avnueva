<?php
/**
 * @file
 * Contains the PHP Array style plugin.
 */

/**
 * Default style plugin to render an RSS feed.
 *
 * @ingroup views_style_plugins
 */

class views_php_array_plugin_style_php_array extends views_plugin_style {
  function render() {    
    // Group the rows according to the grouping field, if specified.
    $sets = $this->render_grouping($this->view->result, $this->options['grouping']);
    
    return $sets;
  }
  
  function render_grouping($records, $grouping_field = '') {
    // Make sure fields are rendered
    $this->render_fields($this->view->result);
    $sets = array();
        
    // Modify the $records to contain the rendered version of the field, not the raw
    $rendered = array();
    $keys = array_keys($this->view->field);
    foreach ($records as $index => $row) {
      foreach ($keys as $field => $value) {
        $rendered[$index][$value] = $this->get_field($index, $value);
      }
    }
    
    if ($grouping_field) {
      foreach ($rendered as $index => $row) {
        $grouping = '';
        // Group on the rendered version of the field, not the raw.  That way,
        // we can control any special formatting of the grouping field through
        // the admin or theme layer or anywhere else we'd like.
        if (isset($this->view->field[$grouping_field])) {
          $grouping = $this->get_field($index, $grouping_field);
          if ($this->view->field[$grouping_field]->options['label']) {
            $grouping = $this->view->field[$grouping_field]->options['label'] . ': ' . $grouping;
          }
        }
                
        $sets[$grouping][] = $row;
      }
    }
    else {
      // Create a single group with an empty grouping field.
      $sets[''] = $rendered;
    }
    
    return $sets;
  }
  
  function uses_fields() { return TRUE; }  
}
