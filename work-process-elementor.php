<?php

/**
 * Plugin Name:       Work Process Addon
 * Description:       Work Process Addon for Elemenor is created by Zain Hassan.
 * Version:           1.0.0
 * Requires at least: 5.2
 * Requires PHP:      7.2
 * Author:            Zain Hassan
 * Author URI:        https://hassanzain.com
 * License:           GPL v2 or later
 * License URI:       https://www.gnu.org/licenses/gpl-2.0.html
 * Text Domain:       hz-widgets
*/

if(!defined('ABSPATH')){
exit;
}

if ( ! defined( 'WPA_PLUGIN_ASSETS_FILE' ) ) {
	define( 'WPA_PLUGIN_ASSETS_FILE', plugins_url( 'inc/assets/', __FILE__ ) );
}

if(!function_exists('hz_el_category')){
	function hz_el_category( $elements_manager ) {

		$elements_manager->add_category(
			'hz-el-widgets',
			[
				'title' => esc_html__( 'Custom Widgets', 'hz-widgets' ),
				'icon' => 'fa fa-plug',
			]
		);
	
	}
}

add_action( 'elementor/elements/categories_registered', 'hz_el_category' );


function register_hz_wpe_widget( $widgets_manager ) {
	require_once( __DIR__ . '/inc/wpe-cards.php' );
	$widgets_manager->register( new \hz_Wpe_Cards );
}
add_action( 'elementor/widgets/register', 'register_hz_wpe_widget' );

function hz_register_wpe_scripts() {

    // Check if Font Awesome is already loaded
    if( !wp_style_is( 'fontawesome', 'enqueued' ) ) {
        wp_enqueue_style( 'fontawesome', plugins_url( 'inc/assets/css/fontawesome.min.css', __FILE__ ));
    }

    // Check if Bootstrap CSS is already loaded
    if( !wp_style_is( 'bootstrap', 'enqueued' ) ) {
        wp_enqueue_style( 'bootstrap', plugins_url( 'inc/assets/css/bootstrap.min.css', __FILE__ ));
    }

	// Check if Webteck CSS is already loaded
	if( !wp_style_is( 'webteck-main-style', 'enqueued' ) ) {
		wp_enqueue_style( 'wpe', plugins_url( 'inc/assets/css/wpe.css', __FILE__ ));
	}

    // Check if Bootstrap JS is already loaded
    if( !wp_script_is( 'bootstrap', 'enqueued' ) ) {
        wp_enqueue_script( 'bootstrap', plugins_url( 'inc/assets/js/bootstrap.min.js', __FILE__ ), ['jquery'], '4.3.1', true); 
    } 

    wp_enqueue_script( 'dotlottie-player', '//unpkg.com/@dotlottie/player-component@latest/dist/dotlottie-player.js', [], '4.3.1', true); 
}
add_action( 'wp_enqueue_scripts', 'hz_register_wpe_scripts' );

function allow_custom_mime_types( $mimes ) {
    // Add JSON to the allowed file types
    $mimes['json'] = 'application/json';
    return $mimes;
}
add_filter( 'upload_mimes', 'allow_custom_mime_types' );



