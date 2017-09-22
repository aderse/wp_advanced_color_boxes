<?php

/*
Plugin Name:  Advanced Color Box
Plugin URI:   https://colorwerx.com/
Description:  Advanced Color Box
Version:      1.0.2
Author:       Andrew Derse
Author URI:   https://www.madcitycoders.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 */

/**
 * Admin Page Section
 */
if( is_admin() ) {
	add_action( 'admin_menu', 'acb_admin_menu' );
	add_action( 'admin_init', 'register_acb_settings' );
}

function register_acb_settings() {
	register_setting( 'acb_options_group', 'acb_wrapper_width' );
	register_setting( 'acb_options_group', 'acb_box_height' );
}


function acb_admin_menu() {
	add_menu_page( 'Advanced Color Boxes', 'AC Boxes', 'manage_options', 'advanced-color-boxes/acb-admin-page.php', 'acb_admin_page', 'dashicons-tickets', 6  );
}

function acb_admin_page() {
    include( 'acb-admin-page.php' );
}



// SETUP
add_action( 'plugins_loaded', 'advanced_color_boxes_setup' );

function advanced_color_boxes_setup()
{
	add_action( 'init', 'advanced_color_boxes_init' );
	add_action( 'wp_enqueue_scripts', 'advanced_color_boxes_enqueue_scripts' );

}

// INIT
function advanced_color_boxes_init()
{
	// LOAD TEXT DOMAIN
	load_plugin_textdomain( 'advanced_color_boxes', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	include( 'inc/class-short-codes.php' );
	// SHORTCODE
	add_shortcode( 'ac_box', array('ACB_SHORTCODES','advanced_color_boxes_shortcode' ) );
	add_shortcode( 'ac_box_clear', array( 'ACB_SHORTCODES','advanced_color_boxes_shortcode_clear_float' ) );
}

// CSS
function advanced_color_boxes_enqueue_scripts()
{
	wp_enqueue_style( 'advanced-color-boxes-style', plugins_url('/advanced-color-boxes.css', __FILE__) );
}




function advanced_color_boxes( $color, $pre_text, $post_text, $hex, $rgb, $pan, $pantone )
{
	$color = trim( str_replace("#", "", $color)  );

	include( "template.php" );
}

