<?php

/**
 * The plugin bootstrap file
 *
 * This file is read by WordPress to generate the plugin information in the plugin
 * admin area. This file also includes all of the dependencies used by the plugin,
 * registers the activation and deactivation functions, and defines a function
 * that starts the plugin.
 *
 * @link              https://windowspros.ru
 * @since             1.0.0
 * @package           Wpwpru_cpv
 *
 * @wordpress-plugin
 * Plugin Name:       Count Post Views
 * Plugin URI:        https://windowspros.ru
 * Description:       This is a short description of what the plugin does. It's displayed in the WordPress admin area.
 * Version:           1.0.0
 * Author:            Sam Tyurenkov
 * Author URI:        https://windowspros.ru
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       wpwpru_cpv
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}

/**
 * Currently plugin version.
 * Start at version 1.0.0 and use SemVer - https://semver.org
 * Rename this for your plugin and update it as you release new versions.
 */
define( 'WPWPRU_CPV_VERSION', '1.0.0' );

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-wpwpru_cpv-activator.php
 */
function activate_wpwpru_cpv() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpwpru_cpv-activator.php';
	Wpwpru_cpv_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-wpwpru_cpv-deactivator.php
 */
function deactivate_wpwpru_cpv() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-wpwpru_cpv-deactivator.php';
	Wpwpru_cpv_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_wpwpru_cpv' );
register_deactivation_hook( __FILE__, 'deactivate_wpwpru_cpv' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-wpwpru_cpv.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_wpwpru_cpv() {

	$plugin = new Wpwpru_cpv();
	$plugin->run();

}
run_wpwpru_cpv();

define('WPWPRU_CPV_PLUGIN_DIR_PATH',plugin_dir_path( __FILE__ ));

function wpwpru_cpv_get_template_part($slug, $name = null) {

  do_action("wpwpru_cpv_get_template_part_{$slug}", $slug, $name);

  $templates = array();
  if (isset($name))
      $templates[] = "{$slug}-{$name}.php";

  $templates[] = "{$slug}.php";

  wpwpru_cpv_get_template_path($templates, true, false);
}

/* Extend locate_template from WP Core 
* Define a location of your plugin file dir to a constant in this case = WPWPRU_CPV_PLUGIN_DIR_PATH 
* Note: WPWPRU_CPV_PLUGIN_DIR_PATH - can be any folder/subdirectory within your plugin files 
*/ 

function wpwpru_cpv_get_template_path($template_names, $load = false, $require_once = true ) {
    $located = ''; 
    foreach ( (array) $template_names as $template_name ) { 
      if ( !$template_name ) 
        continue; 

      /* search file within the WPWPRU_CPV_PLUGIN_DIR_PATH only */ 
      if ( file_exists(WPWPRU_CPV_PLUGIN_DIR_PATH . $template_name)) { 
        $located = WPWPRU_CPV_PLUGIN_DIR_PATH . $template_name; 
        break; 
      } 
    }

    if ( $load && '' != $located )
        load_template( $located, $require_once );

    return $located;
}
