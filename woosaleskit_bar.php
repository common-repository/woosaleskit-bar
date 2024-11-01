<?php

/**
 * @link              woosaleskit.com
 * @since             1.0.0
 * @package           Woosaleskit_bar
 *
 * @wordpress-plugin
 * Plugin Name:       Woosaleskit Bar
 * Plugin URI:        woosaleskit.com/woosaleskit-bar
 * Description:      Adds a quick link menu to your site when viewed on mobile.
 * Version:           1.0.0
 * Author:            Woosaleskit
 * Author URI:        woosaleskit.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       woosaleskit_bar
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if ( ! defined( 'WPINC' ) ) {
	die;
}
define ( 'WOOSALESKIT_BAR', '1.1');
define ( 'WSKB_PLUGIN_FILE', __FILE__);
define ( 'WSKB_PLUGIN_DIR', dirname(__FILE__)); // Plugin Directory
define ( 'WSKB_PLUGIN_URL', plugin_dir_url(__FILE__)); // with forward slash (/).
/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-woosaleskit_bar-activator.php
 */
function activate_woosaleskit_bar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woosaleskit_bar-activator.php';

	Woosaleskit_bar_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-woosaleskit_bar-deactivator.php
 */
function deactivate_woosaleskit_bar() {
	require_once plugin_dir_path( __FILE__ ) . 'includes/class-woosaleskit_bar-deactivator.php';
	Woosaleskit_bar_Deactivator::deactivate();
}

register_activation_hook( __FILE__, 'activate_woosaleskit_bar' );
register_deactivation_hook( __FILE__, 'deactivate_woosaleskit_bar' );

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path( __FILE__ ) . 'includes/class-woosaleskit_bar.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_woosaleskit_bar() {

	$plugin = new Woosaleskit_bar();
	$plugin->run();

}
run_woosaleskit_bar();
