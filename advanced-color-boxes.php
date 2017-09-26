<?php

/*
Plugin Name:  Advanced Color Box
Plugin URI:   https://colorwerx.net/
Description:  Advanced Color Box
Version:      1.0.3
Author:       Andrew Derse
Author URI:   https://www.madcitycoders.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// SETUP
add_action( 'plugins_loaded', 'advanced_color_boxes_setup' );

function advanced_color_boxes_setup()
{
	add_action( 'init', 'advanced_color_boxes_init' );

	// BRING IN CUSTOM CSS AND JS
	include( 'inc/class-enqueues.php' );
	add_action( 'wp_enqueue_scripts', array( 'ACB_ENQUEUES', 'advanced_color_boxes_enqueue_scripts' ) );

	if( is_admin() ) {
		add_action( 'admin_head', array( 'ACB_ENQUEUES', 'advanced_color_boxes_enqueue_admin_scripts' ) );

		include( 'inc/class-admin.php' );
		add_action( 'admin_menu', array( 'ACB_ADMIN', 'acb_admin_menu' ) );
		add_action( 'admin_init', array( 'ACB_ADMIN', 'register_acb_settings' ) );
	}
}

// INIT
function advanced_color_boxes_init()
{
	// LOAD TEXT DOMAIN
	load_plugin_textdomain( 'advanced_color_boxes', false, dirname( plugin_basename( __FILE__ ) ) . '/languages/' );

	// SHORTCODES
	include( 'inc/class-shortcodes.php' );
	add_shortcode( 'ac_box', array('ACB_SHORTCODES','advanced_color_boxes_shortcode' ) );
	add_shortcode( 'ac_box_clear', array( 'ACB_SHORTCODES','advanced_color_boxes_shortcode_clear_float' ) );
}


function advanced_color_boxes( $color, $pre_text, $post_text, $hex, $rgb, $pan, $pantone )
{
	$color = trim( str_replace("#", "", $color)  );

	include( "template.php" );
}

