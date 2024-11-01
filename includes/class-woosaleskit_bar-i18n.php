<?php

/**
 * Define the internationalization functionality
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @link       woosaleskit.com
 * @since      1.0.0
 *
 * @package    Woosaleskit_bar
 * @subpackage Woosaleskit_bar/includes
 */

/**
 * Define the internationalization functionality.
 *
 * Loads and defines the internationalization files for this plugin
 * so that it is ready for translation.
 *
 * @since      1.0.0
 * @package    Woosaleskit_bar
 * @subpackage Woosaleskit_bar/includes
 * @author     Woosaleskit <hello@woosaleskit.com>
 */
class Woosaleskit_bar_i18n {


	/**
	 * Load the plugin text domain for translation.
	 *
	 * @since    1.0.0
	 */
	public function load_plugin_textdomain() {

		load_plugin_textdomain(
			'woosaleskit_bar',
			false,
			dirname( dirname( plugin_basename( __FILE__ ) ) ) . '/languages/'
		);

	}



}
