<?php
/**
 * Registers required plugins.
 *
 * @see http://tgmpluginactivation.com/configuration/ for detailed documentation.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.5.2
 * @author     Thomas Griffin, Gary Jones, Juliette Reinders Folmer
 * @copyright  Copyright (c) 2011, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/TGMPA/TGM-Plugin-Activation
 */

// ** Include the TGM_Plugin_Activation class. ** //
require_once dirname( __FILE__ ) . '/vendor/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'sweet_child_register_required_plugins' );

function sweet_child_register_required_plugins() {

  $require_on_production = WP_ENV === 'production';

  // ** Plugins to recommend/require. ** //
  $plugins = array(

    // Some other useful plugins:
    // BackWPup:        backwpup
    // Sucuri Security: sucuri-scanner

    array(
      'name'               => 'Disallow Indexing',
      'slug'               => 'disallow-indexing',
      'source'             => 'disallow-indexing.zip',
      'required'           => !$require_on_production,
      'force_activation'   => !$require_on_production,
      'force_deactivation' => false,
    ),
    array(
      'name'               => 'GitHub Updater',
      'slug'               => 'github-updater',
      'source'             => 'https://github.com/afragen/github-updater/archive/5.3.4.zip',
      'required'           => false,
      "force_activation"   => false,
      "force_deactivation" => false,
    ),
    array(
      'name'               => 'WP Sync DB',
      'slug'               => 'wp-sync-db',
      'source'             => 'https://github.com/wp-sync-db/wp-sync-db/archive/1.5.zip',
      'required'           => false,
      "force_activation"   => false,
      "force_deactivation" => false,
    ),
    array(
      'name'               => 'WP Stage Switcher',
      'slug'               => 'wp-stage-switcher',
      'source'             => 'https://github.com/roots/wp-stage-switcher/archive/1.0.3.zip',
      'required'           => true,
      "force_activation"   => true,
      "force_deactivation" => false,
    ),
    array(
      'name'               => 'Google Analytics',
      'slug'               => 'google-analytics-for-wordpress',
      'version'            => '5.4.4',
      'required'           => $require_on_production,
      "force_activation"   => $require_on_production,
      "force_deactivation" => false,
    ),
    array(
      'name'               => 'Wordpress SEO',
      'slug'               => 'wordpress-seo',
      'version'            => '3.0.6',
      'required'           => $require_on_production,
      "force_activation"   => $require_on_production,
      "force_deactivation" => false,
    )
  );

  // ** Configuration settings. Amend each line as needed. ** //

  $config = array(
    'id'           => 'sweet-child',           // Unique ID for hashing notices for multiple instances of TGMPA.
    'default_path' => get_stylesheet_directory() . '/plugins/',  // Default absolute path to bundled plugins.
    'menu'         => 'tgmpa-install-plugins', // Menu slug.
    'parent_slug'  => 'plugins.php',           // Parent menu slug.
    'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page.
    'has_notices'  => true,                    // Show admin notices or not.
    'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
    'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
    'is_automatic' => false,                   // Automatically activate plugins after installation or not.
    'message'      => '',                      // Message to output right before the plugins table.
  );

  tgmpa( $plugins, $config );
}
