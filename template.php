<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * Complete documentation for this file is available online.
 * @see https://drupal.org/node/1728096
 */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
function vfa_preprocess_page(&$vars, $hook) {
  if (!user_is_logged_in()) {
    $vars['top_bar_sign_in_form'] = drupal_get_form("user_login");
  }
  // Hide popup if the user has hidden it.
  if (isset($_COOKIE['bottom_bar_state']) && $_COOKIE['bottom_bar_state'] == 'hidden') {
    $vars['bottom_bar_class'] = ' bottom-bar--is-closed';
  } else {
    $vars['bottom_bar_class'] = '';
  }
}

/**
 * Override or insert variables into the node templates.
 *
 * @param $vars
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
function vfa_preprocess_node(&$vars, $hook) {
  $node = $vars['node'];

  // Article Node
  if ($node->type == 'article') {
    $author = user_load($node->uid);

    // Fields to retrieve from user
    $fields = array('full_name');

    // Declare variables for each field (e.g. $author_full_name)
    foreach ($fields as $field) {
      $vars['author_' . $field] = _vfa_get_field('user', $author, 'field_' . $field);
    }

    // Declare variable $changed_date
    $vars['changed_date'] = _vfa_get_date($node, 'vfa_article');

    // Build the article-print link
    $links['article-print'] = array(
      'title' => l(t('Print'), '',
        array(
          'fragment' => 'print',
          'external' => TRUE,
          'attributes' => array(
            'title' => t('Print this article'),
            'onclick' => 'javascript:window.print(); return false;',
            'class' => array('icon', 'icon--print')
          )
        )),
      'html' => TRUE
    );

    // Add links to content links
    $vars['content']['links']['article'] = array(
      '#theme' => 'links__node__article',
      '#links' => $links,
      '#attributes' => array('class' => array('links', 'inline'))
    );

    if(!empty($node->field_category)) {
      // Insert article category as badge in first paragraph.
      $field_category = _vfa_get_field('node', $node, 'field_category');
      $badge = _vfa_get_badge($field_category['#options']['entity']);
      $body = _vfa_get_field('node', $node, 'body');
      $body = preg_replace('/<p ?.*?>/', $badge, $body['#markup'], 1);
      $vars['content']['body'][0]['#markup'] = $body;
    }

  }
}

/**
 * Get field value of user
 * @param  int    $uid   The uid of the user
 * @param  string $field The field to retrieve
 * @return mixed         The value of retrieved field otherwise false
 */
function _vfa_get_field($type, $obj, $field) {
  $field_items = field_get_items($type, $obj, $field);
  // Check if field items is set
  if(empty($field_items)) {
    return FALSE;
  }

  // Get the first field item
  $field_item  = reset($field_items);
  $field_value = field_view_value($type, $obj, $field, $field_item);
  return (!empty($field_value)) ? $field_value : FALSE;
}

/**
 * Get date by format and ISO 8601 compatible date
 * @param  obj    $node        The node to retrive date from
 * @param  string $format_name Name of format (e.g. small)
 * @return array               The formatted date and ISO 8601 compatible date
 */
function _vfa_get_date($node, $format_name) {
  $changed_timestamp = $node->changed;

  return array(
    'date' => format_date($changed_timestamp, $format_name), // Formatted date
    'date_iso' => date('c', $changed_timestamp) // ISO 8601 compatible date
  );
}

/**
 * Get the article category as a badge.
 * @param obj $category  The taxonomy_term object.
 */
function _vfa_get_badge($category) {
  if (!empty($category)) {
    $name = $category->name;
    $badge_field = field_get_items('taxonomy_term', $category, 'field_badge_type');
    if ($badge_field) {
      $badge = strtolower($badge_field[0]['safe_value']);
    } else {
      $badge = variable_get('vfa_badge_default', 'stable');
    }
    $badge_markup = '<p><span class="badge badge--' . $badge . '">' . $name . '</span>';
    return $badge_markup;
  }
  return NULL;
}

/**
 * Create custom user-login.tpl.php
 *
 */
function vfa_theme() {
  $items = array();
  $items['user_login'] = array(
    'render element' => 'form',
    'path' => drupal_get_path('theme', 'vfa') . '/templates/user',
    'template' => 'user-login',
    'preprocess functions' => array(
    'vfa_preprocess_user_login'
    ),
  );
  return $items;
}

/**
 * Hook Form Alter - User login form
 *
 */
function vfa_form_alter(&$form, $form_state, $form_id) {
  if ($form_id == 'user_login_block' || $form_id == 'user_login') {
    $form['name']['#title'] = t("Email"); // Custom Title
    $form['name']['#description'] = FALSE;
    $form['pass']['#description'] = FALSE;
    $form['actions']['submit']['#value'] = t("Sign in"); // Custom Title
    $form['actions']['submit']['#attributes']['class'][] = 'btn btn--default btn--energized'; // Add custom classes the the submit input
  }
}

/**
 * Hook Button - Add `.btn .btn--default` classes to all form buttons
 *
 */
function vfa_button($button) {
  $btn_classes = array('btn', 'btn--default');
  if (isset($button['element']['#attributes']['class'])) {
    $button['element']['#attributes']['class'] = array_merge($button['element']['#attributes']['class'], $btn_classes);
  }
  else {
    $button['element']['#attributes']['class'] = $btn_classes;
  }

  return theme_button($button);
}
