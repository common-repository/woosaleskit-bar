<?php



require_once( 'titan-framework-embedder.php' );

add_action( 'tf_create_options', 'woosaleskit_bare_create_options' );
function woosaleskit_bare_create_options() {

require_once  'lib/class-option-icon.php';
// Initialize Titan with my special unique namespace
$titan = TitanFramework::getInstance( 'woosaleskit_bar' );
// Create my admin panel
$section = $titan->createAdminPanel( array(
'name' => 'Woosaleskit Bar',
'icon' => 'dashicons-tablet'
) );

if ( class_exists( 'WooCommerce' ) ) {
$selectoptions = array(
'woosaleskit_footer_bar_account_link' => 'Link to User account',
'woosaleskit_footer_bar_search' => 'Show Search',
'woosaleskit_footer_bar_cart_link' => 'Link to Cart',
'woosaleskit_footer_bar_custom_link' => 'Custom Link',
);
}else {

	$selectoptions = array(
'woosaleskit_footer_bar_custom_link' => 'Custom Link',
);
}
	$generalTab = $section->createTab( array(
	    'name' => __( 'Style', 'woosaleskit_bar' ),
	) );



	$generalTab->createOption( array(
	    'name' => __( 'Bar Background', 'woosaleskit_bar' ),
	    'id' => 'woosaleskit_bar_bg',
	    'type' => 'color',
	    'desc' => __( 'Set the Background of the bar', 'woosaleskit_bar' ),
	    'default' => '#000',

	) );
	$generalTab->createOption( array(
	    'name' => __( 'Bar Border', 'woosaleskit_bar' ),
	    'id' => 'woosaleskit_bar_border',
	    'type' => 'color',
	    'desc' => __( 'Set the set border color', 'woosaleskit_bar' ),
	    'default' => '#000',

	) );

		$generalTab->createOption( array(
	    'name' => __( 'Search Bar background', 'woosaleskit_bar' ),
	    'id' => 'woosaleskit_search_bar_bg',
	    'type' => 'color',
	    'desc' => __( 'Set the Background of the search bar', 'woosaleskit_bar' ),
	    'default' => '#404040',

	) );

	$generalTab->createOption( array(
	    'name' => __( 'Search Bar Button Background', 'woosaleskit_bar' ),
	    'id' => 'woosaleskit_search_bar_button_bg',
	    'type' => 'color',
	    'desc' => __( 'Set the Background of the search bar', 'woosaleskit_bar' ),
	    'default' => '#fff',

	) );

	$generalTab->createOption( array(
	    'name' => __( 'Search Bar Button text color', 'woosaleskit_bar' ),
	    'id' => 'woosaleskit_serach_bar_text',
	    'type' => 'color',
	    'desc' => __( 'Set the Background of the search bar', 'woosaleskit_bar' ),
	    'default' => '#000',

	) );



	$generalTab->createOption( array(
	    'name' => __( 'Icon Color', 'woosaleskit_bar' ),
	    'id' => 'woosaleskit_bar_icon_color',
	    'type' => 'color',
	    'desc' => __( 'Set the icon color', 'woosaleskit_bar' ),
	    'default' => '#fff',

	) );



	$generalTab->createOption( array(
	    'type' => 'save',
	) );

	$popupTab = $section->createTab( array(
	    'name' => __( 'Sections', 'woosaleskit_bar' ),
	) );

$popupTab->createOption( array(
'name' => 'First Icon action',
'type' => 'heading',
) );
$popupTab->createOption( array(
     'name' => __( 'Icon', 'woosaleskit_bar' ),
     'id' => 'icon_1',
     'type' => 'icon',
     'default'=>'fa-user',
 ) );

 $popupTab->createOption( array(
'name' => 'First Icon section',
'id' => 'icon_1_option',
'type' => 'select',
'desc' => 'Select the icon Action',
'options' => $selectoptions,
'default' => 'woosaleskit_footer_bar_account_link',
) );

$popupTab->createOption( array(
'name' => 'Custom Link',
'id' => 'icon_1_link',
'type' => 'text',
'desc' => 'Please add your custom link. If you want to add an email address use: mailto: in front of the email address.
Example: mailto:hello@woosalekit.com'
) );

$popupTab->createOption( array(
'name' => 'Second Icon section',
'type' => 'heading',
) );
 $popupTab->createOption( array(
     'name' => __( 'Icon', 'woosaleskit_bar' ),
     'id' => 'icon_2',
     'type' => 'icon',
     'default'=>'fa-search',
 ) );

$popupTab->createOption( array(
'name' => 'Second Icon Action',
'id' => 'icon_2_option',
'type' => 'select',
'desc' => 'Select the icon Action',
'options' => $selectoptions,
'default' => 'woosaleskit_footer_bar_search',
) );
$popupTab->createOption( array(
'name' => 'Custom Link',
'id' => 'icon_2_link',
'type' => 'text',
'desc' => 'Please add your custom link. If you want to add an email address use: mailto: in front of the email address.
Example: mailto:hello@woosalekit.com'
) );
$popupTab->createOption( array(
'name' => 'Third Icon section',
'type' => 'heading',
) );
$popupTab->createOption( array(
     'name' => __( 'Icon', 'woosaleskit_bar' ),
     'id' => 'icon_3',
     'type' => 'icon',
     'default'=>'fa-shopping-basket',
 ) );

$popupTab->createOption( array(
'name' => 'Third Icon Action',
'id' => 'icon_3_option',
'type' => 'select',
'desc' => 'Select the icon Action',
'options' => $selectoptions,
'default' => 'woosaleskit_footer_bar_cart_link',
) );
$popupTab->createOption( array(
'name' => 'Custom Link',
'id' => 'icon_3_link',
'type' => 'text',
'desc' => 'Please add your custom link. If you want to add an email address use: mailto: in front of the email address.
Example: mailto:hello@woosalekit.com'
) );



	$popupTab->createOption( array(
	    'type' => 'save',
	) );




}


	?>