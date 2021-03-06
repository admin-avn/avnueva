<?php

/**
 * @file
 * Settings administration UI.
 */


//----------------------------------------------------------------------------
// Form API callbacks.

/**
 * Form definition; general settings.
 */
function cdn_admin_general_settings_form(&$form_state) {
  $form = array();
  _cdn_settings_form_prepare($form, $form_state);

  // Check which CDN integration mechanism is being used.
  cdn_load_include('requirements');
  $integration_method = _cdn_requirements_get_integration_mechanism();
  switch ($integration_method) {
    case 'fallback':
      $desc = t('No core patch applied — falling back to theme layer to alter
                 file URLs.<br />
                 <u>Note:</u> this mechanism is unable to alter all file URLs.
                 <strong>If you want complete CDN coverage, you should either
                 apply the included Drupal core patch or switch to a
                 distribution that already includes the core patch, such as
                 <a href="http://pressflow.org/">Pressflow</a> or
                 <a href="http://drupal.cocomore.com/">Cocomore</a>.
                 </strong>');
      break;
    case 'pressflow':
      $desc = t("This is a Pressflow site — no core patch necessary.");
      break;
    case 'cocomore':
      $desc = t("This is a Cocomore site — no core patch necessary.");
      break;
    case 'core patch':
      $desc = t("Core patch applied!");
      break;
  }
  $form['integration_method'] = array(
    '#type' => 'item',
    '#title' => t('Integration method'),
    '#value' => $desc,
  );

  $perm_url = url('admin/user/permissions',
                  array('fragment' => 'module-cdn'));
  $form[CDN_STATUS_VARIABLE] = array(
    '#type' => 'radios',
    '#title' => t('Status'),
    '#description' => t(
      "If you don't want to use the CDN to serve files to your visitors yet,
      but you do want to see if it's working well for your site, then enable
      testing mode.<br />Users will only get the files from the CDN if they
      have the <a href=\"!perm-url\">%cdn-testing-mode-permission
      permission</a>.",
      array(
        '!perm-url' => $perm_url,
        '%cdn-testing-mode-permission' => 'access files on CDN when in testing mode',
      )
    ),
    '#required' => TRUE,
    '#options' => array(
      CDN_DISABLED => t('Disabled'),
      CDN_TESTING  => t('Testing mode'),
      CDN_ENABLED  => t('Enabled'),
    ),
    '#default_value' => variable_get(CDN_STATUS_VARIABLE, CDN_DISABLED),
  );

  $form[CDN_STATS_VARIABLE] = array(
    '#type' => 'checkbox',
    '#title' => t('Display statistics'),
    '#description' => t(
      'Shows the CDN integration statistics of the current page, to users with
      the <a href="!perm-url">%access-per-page-statistics permission</a>.',
      array(
        '!perm-url' => $perm_url,
        '%access-per-page-statistics' => 'access per-page statistics',
      )
    ),
    '#return_value'  => CDN_ENABLED,
    '#default_value' => variable_get(CDN_STATS_VARIABLE, CDN_DISABLED),
    '#process'       => array('ctools_dependent_process'),
    '#dependency'    => array('radio:' . CDN_STATUS_VARIABLE => array(CDN_TESTING, CDN_ENABLED)),
  );

  return system_settings_form($form);
}

/**
 * Form definition; details.
 */
function cdn_admin_details_form(&$form_state) {
  $form = array();
  _cdn_settings_form_prepare($form, $form_state);

  $form[CDN_MODE_VARIABLE] = array(
    '#type' => 'radios',
    '#title' => t('Mode'),
    '#description' => _cdn_help('admin-details-mode') . t('Choose a CDN integration mode.'),
    '#required' => TRUE,
    '#options'  => array(
      CDN_MODE_BASIC    => t('Origin Pull'),
      CDN_MODE_ADVANCED => t('File Conveyor'),
    ),
    '#default_value' => variable_get(CDN_MODE_VARIABLE, CDN_MODE_BASIC),
  );

  $form['settings'] = array(
    '#type' => 'fieldset',
    '#title' => t('Mode-specific settings'),
  );

  //
  // Origin Pull mode settings.
  //

  $form['settings'][CDN_BASIC_MAPPING_VARIABLE] = array(
    '#type'          => 'textarea',
    '#title'         => t('CDN mapping'),
    '#description'   => _cdn_help('admin-details-mode-pull-cdn-mapping') . t("Define which files are mapped to which CDN."),
    '#size'          => 35,
    '#default_value' => variable_get(CDN_BASIC_MAPPING_VARIABLE, ''),
    '#process'       => array('ctools_dependent_process'),
    '#dependency'    => array('radio:' . CDN_MODE_VARIABLE => array(CDN_MODE_BASIC)),
  );

  $form['settings'][CDN_BASIC_FARFUTURE_VARIABLE] = array(
    '#type' => 'checkbox',
    '#title' => t('Far Future expiration'),
    '#description' => _cdn_help('admin-details-mode-pull-far-future') .
      t('Mark all files served from the CDN to expire in the far future —
      improves client-side cacheability.<br><strong>Note:</strong> this
      requires the <a href="!preprocess-css-url">"Optimize CSS files"</a>
      performance setting to be enabled!', array(
        '!preprocess-css-url' => url('admin/settings/performance',
          array('fragment' => 'bw-optimizations')),
        )
      ),
    '#default_value' => variable_get(CDN_BASIC_FARFUTURE_VARIABLE, CDN_BASIC_FARFUTURE_DEFAULT),
    '#process'       => array('ctools_dependent_process'),
    '#dependency'    => array('radio:' . CDN_MODE_VARIABLE => array(CDN_MODE_BASIC)),
  );

  $format_variables = array(
    '@format-directory'                => '<' . t('directory') . '>',
    '@format-extensions'               => '<' . t('extensions') . '>',
    '@format-unique-identifier-method' => '<' . t('unique identifier method') . '>',
  );

  $methods = array();
  $ufi_info = module_invoke_all('cdn_unique_file_identifier_info');
  foreach ($ufi_info as $ufi_method => $ufi) {
    $methods[] = $ufi['label']
                 . ' (<code>' . $ufi_method . '</code>): '
                 . $ufi['description'];
  }
  $format_variables['!ufi-methods'] = theme('item_list', $methods);

  $form['settings'][CDN_BASIC_FARFUTURE_UNIQUE_IDENTIFIER_MAPPING_VARIABLE] = array(
    '#type'          => 'textarea',
    '#title'         => t('Unique file identifier generation'),
    '#description'   => _cdn_help('admin-details-mode-pull-ufi') . t('Define how unique file identifiers (UFIs) are generated.'),
    '#size'          => 35,
    '#default_value' => variable_get(CDN_BASIC_FARFUTURE_UNIQUE_IDENTIFIER_MAPPING_VARIABLE, CDN_BASIC_FARFUTURE_UNIQUE_IDENTIFIER_MAPPING_DEFAULT),
    '#process'       => array('ctools_dependent_process'),
    '#dependency'    => array('edit-cdn-farfuture-status' => array('1'),
                              'radio:' . CDN_MODE_VARIABLE => array(CDN_MODE_BASIC)),
    '#dependency_count' => 2,
  );

  $form['settings']['ufis'] = array(
    '#type'             => 'fieldset',
    '#collapsible'      => TRUE,
    '#collapsed'        => TRUE,
    '#title'            => t('Available UFI methods'),
    '#input'            => TRUE,
    '#id'               => 'ufi-fs-id',
    '#prefix'           => '<div id="ufi-fs-id-wrapper">',
    '#suffix'           => '</div>',
    '#process'          => array('ctools_dependent_process'),
    '#dependency_count' => 2,
    '#dependency'       => array(
      'radio:' . CDN_MODE_VARIABLE => array(CDN_MODE_BASIC),
      'edit-cdn-farfuture-status' => array('1')
    ),
  );

  $form['settings']['ufis']['content'] = array(
    '#value' => t('Available UFI methods: !ufi-methods', $format_variables) .
                '<p>' . t('Note that if no UFI method is specified for a file
                          (because no rule matches), the CDN module will fall
                          back to the mtime method.') . '</p>',
    '#prefix' => '<div>',
    '#suffix' => '</div>',
  );

  //
  // File Conveyor mode settings.
  //

  $form['settings'][CDN_ADVANCED_PID_FILE_VARIABLE] = array(
    '#type'          => 'textfield',
    '#title'         => t('PID file'),
    '#description'   => _cdn_help('admin-details-mode-fc-pid') . t('Full path to File Conveyor\'s PID file.'),
    '#size'          => 60,
    '#default_value' => variable_get(CDN_ADVANCED_PID_FILE_VARIABLE, ''),
    '#process'       => array('ctools_dependent_process'),
    '#dependency'    => array('radio:' . CDN_MODE_VARIABLE => array(CDN_MODE_ADVANCED)),
  );
  $form['settings'][CDN_ADVANCED_SYNCED_FILES_DB_VARIABLE] = array(
    '#type'          => 'textfield',
    '#title'         => t('Synced files database'),
    '#description'   => _cdn_help('admin-details-mode-fc-db') . t('Full path to File Conveyor\'s synced files database file.'),
    '#size'          => 60,
    '#default_value' => variable_get(CDN_ADVANCED_SYNCED_FILES_DB_VARIABLE, ''),
    '#process'       => array('ctools_dependent_process'),
    '#dependency'    => array('radio:' . CDN_MODE_VARIABLE => array(CDN_MODE_ADVANCED)),
  );

  return system_settings_form($form);
}

/**
 * Form definition; other settings.
 */
function cdn_admin_other_settings_form(&$form_state) {
  $form = array();
  _cdn_settings_form_prepare($form, $form_state);

  if (variable_get(CDN_MODE_VARIABLE, CDN_MODE_BASIC) == CDN_MODE_ADVANCED) {
    $form[CDN_DRUPAL_ROOT_VARIABLE] = array(
      '#type' => 'textfield',
      '#title' => t('Drupal root directory'),
      '#description' => t(
        'In 99% of the cases the default value is sufficient and correct. In
        some advanced setups that make use of symbolic links however, it is
        possible that the Drupal root directory is incorrectly detected. In
        those cases, you should enter it here.<br />
        <strong>This setting only affects the status report, it does not affect
        the CDN integration itself in any way.</strong>'
      ),
      '#required'      => TRUE,
      '#default_value' => variable_get(CDN_DRUPAL_ROOT_VARIABLE, realpath('.')),
    );
  }

  $form['https'] = array(
    '#type' => 'fieldset',
    '#title' => t('HTTPS'),
  );
  $form['https'][CDN_HTTPS_SUPPORT_VARIABLE] = array(
    '#type'          => 'checkbox',
    '#title'         => t('CDN supports HTTPS'),
    '#default_value' => variable_get(CDN_HTTPS_SUPPORT_VARIABLE, FALSE),
    '#description'   => _cdn_help('admin-other-https') . t('Enable if you use HTTPS and your CDN supports it too.'),
  );
  if (variable_get(CDN_MODE_VARIABLE, CDN_MODE_BASIC) == CDN_MODE_BASIC) {
    $form['https'][CDN_BASIC_MAPPING_HTTPS_VARIABLE] = array(
      '#type'          => 'textarea',
      '#title'         => t('CDN mapping for HTTPS'),
      '#description'   => t('If your CDN supports HTTPS, but requires you to
                            use different URLs, then you can define an
                            alternative CDN mapping here. This overrides the
                            "regular" CDN mapping completely, when using
                            HTTPS.'),
      '#size'          => 35,
      '#default_value' => variable_get(CDN_BASIC_MAPPING_HTTPS_VARIABLE, ''),
      '#process'       => array('ctools_dependent_process'),
      '#dependency'    => array('edit-cdn-https-support' => array('1')),
    );
  }

  $path_explanation = t(
    "Enter one file pattern per line. The '*' character is a wildcard.<br />
    Example file patterns are <code>*.js</code> for all JavaScript files and
    <code>mytheme/*.css</code> for all CSS files in the <code>mytheme</code>
    directory."
  );

  $form['exceptions'] = array(
    '#type' => 'fieldset',
    '#title' => t('Exceptions'),
    '#description' => _cdn_help('admin-other-exceptions') .
                      t('Which files should be served from a CDN is not as
                         simple as it seems: there are bound to be exceptions.
                         You can easily define those exceptions here, either
                         by file URL, Drupal path or by Drupal path for
                         authenticated users.'),
  );

  $form['exceptions']['file_path'] = array(
    '#type' => 'fieldset',
    '#title' => t('File URL'),
    '#description' => t("Files that are marked to not be served from the CDN
    because of a match in the blacklist, can be overridden to be served from
    the CDN after all, if they have a match in the whitelist."),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['exceptions']['file_path'][CDN_EXCEPTION_FILE_PATH_BLACKLIST_VARIABLE] = array(
    '#type' => 'textarea',
    '#title' => t('Blacklist'),
    '#default_value' => variable_get(CDN_EXCEPTION_FILE_PATH_BLACKLIST_VARIABLE, CDN_EXCEPTION_FILE_PATH_BLACKLIST_DEFAULT),
    '#description' => $path_explanation,
  );
  $blacklist_modules = module_implements('cdn_blacklist');
  $blacklist_modules = array_unique(array_merge($blacklist_modules, module_implements('cdn_blacklist_alter')));
  $blacklist_modules_string = '';
  for ($i = 0; $i < count($blacklist_modules); $i++) {
    $blacklist_modules_string .= '<code>' . $blacklist_modules[$i] . '</code>';
    if ($i < count($blacklist_modules) - 1) {
      $blacklist_modules_string .= ', ';
    }
  }
  $form['exceptions']['file_path']['cdn_hook_blacklist'] = array(
    '#type' => 'textarea',
    '#title' => t('Blacklist from modules'),
    '#default_value' => cdn_get_blacklist(TRUE),
    '#description' => t('Blacklist from <code>hook_cdn_blacklist()</code> and
                        <code>hook_cdn_blacklist_alter()</code>. Automatically
                        updated when cron runs. Generated from the following
                        modules: !module-list.',
                        array('!module-list' => $blacklist_modules_string)),
    '#disabled' => TRUE,
  );
  $form['exceptions']['file_path'][CDN_EXCEPTION_FILE_PATH_WHITELIST_VARIABLE] = array(
    '#type' => 'textarea',
    '#title' => t('Whitelist'),
    '#default_value' => variable_get(CDN_EXCEPTION_FILE_PATH_WHITELIST_VARIABLE, CDN_EXCEPTION_FILE_PATH_WHITELIST_DEFAULT),
    '#description' => $path_explanation,
  );

  $form['exceptions']['drupal_path'] = array(
    '#type' => 'fieldset',
    '#title' => t('Drupal path'),
    '#description' => t("Drupal paths entered in this blacklist will not serve
                         any files from the CDN. This blacklist is applied for
                         <em>all</em> users."),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['exceptions']['drupal_path'][CDN_EXCEPTION_DRUPAL_PATH_BLACKLIST_VARIABLE] = array(
    '#type' => 'textarea',
    '#title' => t('Blacklist'),
    '#default_value' => variable_get(CDN_EXCEPTION_DRUPAL_PATH_BLACKLIST_VARIABLE, CDN_EXCEPTION_DRUPAL_PATH_BLACKLIST_DEFAULT),
    '#description' => t(
      "Enter one page per line as Drupal paths. The '*' character is a
      wildcard. Example paths are %blog for the blog page and %blog-wildcard
      for every personal blog. %front is the front page.",
      array(
        '%blog'          => 'blog',
        '%blog-wildcard' => 'blog/*',
        '%front'         => '<front>',
      )
    ),
  );

  $form['exceptions']['auth_users'] = array(
    '#type' => 'fieldset',
    '#title' => t('Drupal path for authenticated users'),
    '#description' => t("Drupal paths entered in this blacklist will not serve
                         any files from the CDN. This blacklist is applied for
                         <em>authenticated users only</em>."),
    '#collapsible' => TRUE,
    '#collapsed' => TRUE,
  );
  $form['exceptions']['auth_users'][CDN_EXCEPTION_AUTH_USERS_BLACKLIST_VARIABLE] = array(
    '#type'          => 'textarea',
    '#title'         => t('Blacklist'),
    '#default_value' => variable_get(CDN_EXCEPTION_AUTH_USERS_BLACKLIST_VARIABLE, CDN_EXCEPTION_AUTH_USERS_BLACKLIST_DEFAULT),
    '#description'   => $path_explanation,
  );


  $form['cdn_pick_server'] = array(
    '#type' => 'fieldset',
    '#title' => 'cdn_pick_server()',
    '#description' => t('It is possible to achieve very advanced types of CDN
                         integration by implementing the
                         <code>cdn_pick_server()</code> function (consult the
                         included README for examples). However, to lower the
                         barrier to start using it, it has been made possible
                         to just enter the body of that function right here,
                         in the settings of the CDN module, so you would not
                         have to create a small module for it.'),
  );
  if (function_exists('cdn_pick_server')) {
    $form['cdn_pick_server']['defined_in_code'] = array(
      '#type' => 'item',
      '#title' => t('Defined in code'),
      '#value' => 'The <code>cdn_pick_server()</code> function is already defined in code.',
    );
  }
  else {
    $php_code = variable_get(CDN_PICK_SERVER_PHP_CODE_VARIABLE, '');
    $form['cdn_pick_server'][CDN_PICK_SERVER_PHP_CODE_VARIABLE] = array(
      '#type' => 'textarea',
      '#title' => t('PHP code for cdn_pick_server()'),
      '#description' => _cdn_help('admin-other-cdn-pick-server') . t('PHP code to select the most appropriate CDN server.'),
      '#cols' => 60,
      '#rows' => ($php_code != '') ? count(explode("\n", $php_code)) + 1 : 5,
      '#default_value' => $php_code,
    );
  }

  return system_settings_form($form);
}

/**
 * Default validate callback for the details form.
 */
function cdn_admin_details_form_validate($form, &$form_state) {
  // If ctools_dependent supported required dependent form items, this ugly
  // piece of code would not be necessary.
  if ($form_state['values'][CDN_MODE_VARIABLE] == CDN_MODE_BASIC) {
    if (empty($form_state['values'][CDN_BASIC_MAPPING_VARIABLE])) {
      form_error($form['settings'][CDN_BASIC_MAPPING_VARIABLE], t('!name field is required.', array('!name' => $form['settings'][CDN_BASIC_MAPPING_VARIABLE]['#title'])));
    }
  }
  else {
    if (empty($form_state['values'][CDN_ADVANCED_SYNCED_FILES_DB_VARIABLE])) {
      form_error($form['settings'][CDN_ADVANCED_SYNCED_FILES_DB_VARIABLE], t('!name field is required.', array('!name' => $form['settings'][CDN_ADVANCED_SYNCED_FILES_DB_VARIABLE]['#title'])));
    }
  }

  // When in advanced mode, validate the synced files DB.
  if ($form_state['values'][CDN_MODE_VARIABLE] == CDN_MODE_ADVANCED) {
    $synced_files_db = $form_state['values'][CDN_ADVANCED_SYNCED_FILES_DB_VARIABLE];
    _cdn_admin_validate_synced_files_db($synced_files_db, CDN_ADVANCED_SYNCED_FILES_DB_VARIABLE);
  }
}

/**
 * Default validate callback for the other settings form.
 */
function cdn_admin_other_settings_form_validate($form, &$form_state) {
  if ($form_state['values'][CDN_PICK_SERVER_PHP_CODE_VARIABLE] !== '') {
    $php_code = $form_state['values'][CDN_PICK_SERVER_PHP_CODE_VARIABLE];
    $servers = array();
    if (_cdn_eval_pick_server($php_code, $servers) === FALSE) {
      form_error($form['cdn_pick_server'][CDN_PICK_SERVER_PHP_CODE_VARIABLE], t('Your <code>cdn_pick_server()</code> cannot be evaluated. Please correct it or leave it empty.'));
    }
  }

  // Remove the non-variable.
  unset($form_state['values']['cdn_hook_blacklist']);
}

/**
 * Submit callback for all settings forms, that shows a warning whenever
 * settings have been changed: the caches might need to be cleared.
 */
function cdn_admin_settings_submit_show_cache_warning($form, &$form_state) {
  drupal_set_message(t('You have just changed some settings. This might affect
                        the file URLs that have been cached in nodes, views,
                        or elsewhere.<br />
                        You now may want to clear the cached data, to ensure
                        the new CDN file URLs are used immediately. This can
                        be done in the <a href="!link">"Clear cached data"
                        field set</a> in the "Performance" settings form.',
                        array(
                          '!link' => url('admin/settings/performance', array('fragment' => 'clear-cache'))
                        )
                      ),
                      'info'
  );
}


//----------------------------------------------------------------------------
// Private functions.

/**
 * Helper function to validate a possible synced files DB value.
 *
 * @param $synced_files_db
 *   A user-entered synced files DB value.
 * @param $name
 *   The name of the form item on which to set errors, if any.
 * @return
 *   FALSE if there were any errors, TRUE if there weren't any.
 */
function _cdn_admin_validate_synced_files_db($synced_files_db, $name) {
  // Validate the file name.
  if (strpos($synced_files_db, CDN_DAEMON_SYNCED_FILES_DB) === FALSE) {
    form_set_error($name, t('The synced files database should have the file name %name.', array('%name' => CDN_DAEMON_SYNCED_FILES_DB)));
    return FALSE;
  }

  // Validate the entered synced files database.
  if (!file_exists($synced_files_db)) {
    form_set_error($name, t('The synced files database does not exist.'));
    return FALSE;
  }
  else {
    if (!@fopen($synced_files_db, 'r')) {
      form_set_error($name, t('The synced files database could not be opened for reading.'));
      return FALSE;
    }
  }

  return TRUE;
}

/**
 * Helper function to check if the requirements of the CDN module have been
 * met. If any requirement errors exist, they are aggregated into a single
 * error message and are subsequently displayed.
 *
 * @return
 *   The number of requirement errors.
 */
function _cdn_admin_check_requirements() {
  // Check run-time requirements of the CDN integration module.
  module_load_install('cdn');
  $requirements = cdn_requirements('runtime');

  // Filter out the requirement errors and display these, with links back to
  // the admin/reports/status page.
  $errors = array();
  foreach ($requirements as $requirement => $details) {
    if ($details['severity'] == REQUIREMENT_ERROR) {
      $errors[] = l($details['title'], 'admin/reports/status') . '<br />' . $details['description'];
    }
  }
  if (!empty($errors)) {
    $args = array(
      '!error-list' => theme('item_list', $errors),
    );
    drupal_set_message(t('Please fix the following problems with the installation of the CDN integration module:<br />!error-list', $args), 'error');
  }

  return count($errors);
}

function _cdn_settings_form_prepare(&$form, $form_state) {
  // Do some checks, but prevent them from showing up twice.
  if (empty($form_state['post'])) {
    // Check requirements.
    cdn_load_include('requirements');
    _cdn_admin_check_requirements();

    // Advanced help.
    _cdn_check_advanced_help();
    $form['#attributes']['class'] = 'cdn-settings';
    drupal_add_css(drupal_get_path('module', 'cdn') . '/cdn.admin.css');
  }

  // Form.
  ctools_include('dependent');
  $form['#submit'] = array('cdn_admin_settings_submit_show_cache_warning');
}

function _cdn_check_advanced_help() {
  if (!module_exists('advanced_help')) {
    $filename = db_result(db_query("SELECT filename FROM {system} WHERE type = 'module' AND name = 'advanced_help'"));
    if ($filename && file_exists($filename)) {
      drupal_set_message(t('If you <a href="@modules">enable the advanced help module</a>, CDN will provide more and better help.', array('@modules' => url('admin/build/modules'))));
    }
    else {
      drupal_set_message(t('If you install the advanced help module from !href, CDN will provide more and better help.', array('!href' => l('http://drupal.org/project/advanced_help', 'http://drupal.org/project/advanced_help'))));
    }
  }
}

function _cdn_help($topic) {
  if (!module_exists('advanced_help')) {
    return '';
  }
  else {
    return theme('advanced_help_topic', 'cdn', $topic);
  }
}
