<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       woosaleskit.com
 * @since      1.0.0
 *
 * @package    Woosaleskit_bar
 * @subpackage Woosaleskit_bar/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the admin-specific stylesheet and JavaScript.
 *
 * @package    Woosaleskit_bar
 * @subpackage Woosaleskit_bar/public
 * @author     Woosaleskit <hello@woosaleskit.com>
 */
class Woosaleskit_bar_Public {

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
	 * @param      string    $plugin_name       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $plugin_name, $version ) {

		$this->plugin_name = $plugin_name;
		$this->version = $version;

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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
		 	wp_enqueue_style( 'wsk-font-awesome', WSKB_PLUGIN_URL . 'assets/css/font-awesome.min.css', array(), $this->version, 'all' );
		wp_enqueue_style( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'css/woosaleskit_bar-public.css', array(), $this->version, 'all' );

		$builder = TitanFramework::getInstance( 'woosaleskit_bar' );
		$woosaleskit_bar_bg = $builder->getOption( 'woosaleskit_bar_bg' );
		$woosaleskit_bar_border = $builder->getOption( 'woosaleskit_bar_border' );
		$woosaleskit_search_bar_bg = $builder->getOption( 'woosaleskit_search_bar_bg' );
		$woosaleskit_search_bar_button_bg = $builder->getOption( 'woosaleskit_search_bar_button_bg' );
		$woosaleskit_serach_bar_text = $builder->getOption( 'woosaleskit_serach_bar_text' );
		$woosaleskit_bar_icon_color = $builder->getOption( 'woosaleskit_bar_icon_color' );
		$custom_css = "
               .woosaleskit-footer-bar {
    background-color: $woosaleskit_bar_bg;
        border-top: 1px solid $woosaleskit_bar_border;}

        .woosaleskit-footer-bar ul li>a {
    border-right: 1px solid $woosaleskit_bar_border;
    background-color: $woosaleskit_bar_bg;
    color: $woosaleskit_bar_icon_color;}
    .woosaleskit-footer-bar ul li.search .site-search {    background-color: $woosaleskit_search_bar_bg;}
      .woosaleskit-footer-bar ul li.search .site-search  input[type='submit']{
	     background-color: $woosaleskit_search_bar_button_bg;
	     color: $woosaleskit_serach_bar_text
	      }

    "
    ;
		 wp_add_inline_style( $this->plugin_name, $custom_css );
	}

	/**
	 * Register the JavaScript for the public-facing side of the site.
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

		wp_enqueue_script( $this->plugin_name, plugin_dir_url( __FILE__ ) . 'js/woosaleskit_bar-public.js', array( 'jquery' ), $this->version, false );

	}

	/**
	 * The search callback function for the handheld footer bar
	 *
	 * @since 2.0.0
	 */
	public function woosaleskit_footer_bar_search($args) {
		echo '<li class="search"><a href="" class="search_popup"><i class="fa '.$args['icon'].'"></i></a>';
		$this->woosaleskit_product_search();
		echo '</li>';
	}

	/**
	 * The cart callback function for the handheld footer bar
	 *
	 * @since 2.0.0
	 */
	public function woosaleskit_footer_bar_cart_link($args) {
		?>
		<li class="cart">	<a class="footer-cart-contents" href="<?php echo esc_url( wc_get_cart_url() ); ?>" title="<?php esc_attr_e( 'View your shopping cart', 'woosaleskit' ); ?>"><i class="fa <?php echo $args['icon'] ?>"></i>
				<span class="count"><?php echo wp_kses_data( WC()->cart->get_cart_contents_count() );?></span>
			</a></li>
		<?php
}

	/**
	 * The account callback function for the handheld footer bar
	 *
	 * @since 2.0.0
	 */
	public function woosaleskit_footer_bar_account_link($args) {
		echo '<li class="my-account"><a href="' . esc_url( get_permalink( get_option( 'woocommerce_myaccount_page_id' ) ) ) . '"><i class="fa '.$args['icon'].'"></i></a></li>';
	}



	public function woosaleskit_footer_bar_custom_link($args) {
		echo '<li class="custom_link"><a href="' . esc_url( $args['link'] ) . '"><i class="fa '.$args['icon'].'"></i></a></li>';
	}


/**
	 * Display Product Search
	 *
	 * @since  1.0.0
	 * @uses  woosaleskit_is_woocommerce_activated() check if WooCommerce is activated
	 * @return void
	 */
	public function woosaleskit_product_search() {
		?>
			<div class="site-search">
				<?php the_widget( 'WC_Widget_Product_Search', 'title=' ); ?>
			</div>
		<?php

	}



	/**
	 * Display a menu intended for use on handheld devices
	 *
	 * @since 2.0.0
	 */
	function woosaleskit_footer_bar() {

		$links = apply_filters( 'woosaleskit_footer_bar_links', $links );

		$builder = TitanFramework::getInstance( 'woosaleskit_bar' );

	 	$icon_1 = $builder->getOption( 'icon_1' );
		$icon_1_option = $builder->getOption( 'icon_1_option' );
		$icon_1_link = $builder->getOption( 'icon_1_link' );
		$icon_2 = $builder->getOption( 'icon_2' );
		$icon_2_option = $builder->getOption( 'icon_2_option' );
		$icon_2_link = $builder->getOption( 'icon_2_link' );
		$icon_3 = $builder->getOption( 'icon_3' );
		$icon_3_option = $builder->getOption( 'icon_3_option' );
		$icon_3_link = $builder->getOption( 'icon_3_link' );
		$args1 = array();
		$args2 = array();
		$args3 = array();

		$args1['icon'] = $icon_1;
		$args1['link'] = $icon_1_link;
			$args2['icon'] = $icon_2;
		$args2['link'] = $icon_2_link;
	$args3['icon'] = $icon_3;
		$args3['link'] = $icon_3_link;



		?>
		<div class="woosaleskit-footer-bar">
			<ul class="columns-3">

						<?php

						call_user_func( array($this, $icon_1_option),$args1);
						call_user_func( array($this, $icon_2_option),$args2 );
						call_user_func( array($this, $icon_3_option),$args3 );

						?>

			</ul>
		</div>
		<?php
	}
}



