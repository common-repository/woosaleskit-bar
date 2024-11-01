<?php

/**
 * The admin-specific functionality of the plugin.
 *
 * @link       woosaleskit.com
 * @since      1.0.0
 *
 * @package    Woosaleskit_bar
 * @subpackage Woosaleskit_bar/admin
 */

/**
 * The admin-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woosaleskit_bar
 * @subpackage Woosaleskit_bar/admin
 * @author     Woosaleskit <hello@woosaleskit.com>
 */
class Woosaleskit_bar_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $plugin_name    The ID of this plugin.
	 */
	private $plugin_name;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $plugin_name       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woosaleskit_bar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woosaleskit_bar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
		$page = $_GET['page'];
		if ($page == 'woosaleskit-bar')  {
		wp_enqueue_style( $this->plugin_name, WSKB_PLUGIN_URL . 'admin/css/woosaleskit_bar-admin.css', array(), $this->version, 'all' );

		wp_enqueue_style( 'font-awesome', WSKB_PLUGIN_URL . 'assets/css/font-awesome.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( 'fontawesome-iconpicker', WSKB_PLUGIN_URL . 'assets/css/fontawesome-iconpicker.css', array(), $this->version, 'all' );
		}


	}

	/**
	 * Register the JavaScript for the admin area.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Woosaleskit_bar_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Woosaleskit_bar_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */
$page = $_GET['page'];
		if ($page == 'woosaleskit-bar')  {
		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/woosaleskit_bar-admin.js', array( 'jquery' ), $this->version, false );

		 wp_register_script( 'fa-iconpicker-js', WSKB_PLUGIN_URL. 'assets/js/fontawesome-iconpicker.js', true, $this->version );
        wp_enqueue_script( 'fa-iconpicker-js' );
        wp_register_script( 'fa-popup', WSKB_PLUGIN_URL. 'assets/js/popup.js', true, $this->version );
        wp_enqueue_script( 'fa-popup' );
}
	}

}
