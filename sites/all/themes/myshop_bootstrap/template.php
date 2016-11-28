<?php

function myshop_bootstrap_preprocess_page(&$variables) {
// Get the entire main menu tree
  $main_menu_tree = menu_tree_all_data('main-menu');

// Add the rendered output to the $main_menu_expanded variable
  $variables['primary_nav'] = menu_tree_output($main_menu_tree);
}

function myshop_bootstrap_menu_tree__main_menu($variables) {
  return "<ul class='menu nav navbar-nav'>" . $variables['tree'] . "</ul>";
}

function myshop_bootstrap_menu_link(array $variables) {
  $element = $variables['element'];
  $sub_menu = '';
  $arrow_down = "";
  if ($element['#below']) {
    //$element['#below'][key($element['#below'])]['#attributes']['class'][] = 'my_sub_class';
    $element['#localized_options']['attributes']['data-toggle'] = 'dropdown';
    $element['#localized_options']['attributes']['class'][] = 'disabled';

    $sub_menu = drupal_render($element['#below']);
    $arrow_down = '<span class="caret"></span>';
  }
  $element['#localized_options']['html'] = TRUE;

  $output = l($element['#title'] . $arrow_down, $element['#href'], $element['#localized_options']);
// return '<li>' . $output . $sub_menu . "</li>\n";
  return '<li' . drupal_attributes($element['#attributes']) . '>' . $output . $sub_menu . "</li>\n";
}

function myshop_bootstrap_preprocess_search_result(&$vars) {

}

function myshop_bootstrap_page_alter(&$page) {
// kpr($page); //use this to find the item you want to remove - you need the devel running.
// Remove the search form from the search results page.
  if (arg(0) == 'search') {
    if (!empty($page['content']['system_main']['search_form'])) {
      hide($page['content']['system_main']['search_form']);
    }
  }
}

function myshop_bootstrap_preprocess_menu_link(array &$variables) {
  $element = &$variables['element'];
// Determine if the link should be shown as "active" based on the current
// active trail (set by core/contrib modules).
// @see https://www.drupal.org/node/2618828
// @see https://www.drupal.org/node/1896674
  if (in_array('active-trail', _bootstrap_get_classes($element)) || ($element['#href'] == '<front>' && drupal_is_front_page()) || ($element['#href'] == $_GET['q'])) {
    $element['#attributes']['class'][] = 'active';
  }
}
