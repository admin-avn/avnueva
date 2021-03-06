<?php

/**
 * Implementation of hook_views_data_alter() from Views API
 *
 */
function viewsphpfilter_views_data_alter(&$data) {
  $data['node']['nid_php'] = array (
    'real field' => 'nid',
    'title' => t('Node ID PHP handler'),
    'title short' => t('PHP filter'),
    //'operator' => 'views_handler_operator_or',
    //'cacheable' => 'no',
    'help' => t('This filter allows nodes to be filtered by Node ID.  PHP code should return an array with node IDs.  ID lists should be separated by commas.'),
    'filter' => array(
      'field' => 'nid',
      'name table' => 'node',
      'handler' => 'views_handler_filter_node_nid_php',
    ),
  );
}

function viewsphpfilter_views_handlers() {
  return array(
    'handlers' => array(
      'views_handler_filter_node_nid_php' => array(
        'parent' => 'views_handler_filter',
      ),
    ),
  );
}
