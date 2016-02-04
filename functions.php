<?php
/**
 * Includes
 *
 * The $child_includes array determines the code library included in your theme.
 */
$child_includes = [
  'lib/tgm-require.php' // Require plugins
];

foreach ($child_includes as $file) {
  if (!$filepath = locate_template($file)) {
    trigger_error(sprintf(__('Error locating %s for inclusion', 'sweet-child'), $file), E_USER_ERROR);
  }

  require_once $filepath;
}
unset($file, $filepath);

// Include the parent stylesheet
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
  wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
}
