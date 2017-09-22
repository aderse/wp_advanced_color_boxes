<?php

/*
Plugin Name:  Advanced Color Box
Plugin URI:   https://colorwerx.com/
Description:  Advanced Color Box
Version:      1.1
Author:       Andrew Derse
Author URI:   https://www.madcitycoders.com/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
 */

// SETUP
add_action( 'plugins_loaded', 'advanced_color_boxes_setup' );

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

	// SHORTCODE
	add_shortcode( 'ac_box', 'advanced_color_boxes_shortcode' );
	add_shortcode( 'ac_box_clear', 'advanced_color_boxes_shortcode_clear_float' );
}

// CSS
function advanced_color_boxes_enqueue_scripts()
{
	wp_enqueue_style( 'advanced-color-boxes-style', plugins_url('/advanced-color-boxes.css', __FILE__) );
}


// SHORTCODE HELPER
function advanced_color_boxes_shortcode( $args )
{
	ob_start();
	isset( $args['color'] ) ? $color = $args['color'] : $color = '#FFFFFF';
	isset( $args['pre-text'] ) ? $pre_text = $args['pre-text'] : $pre_text = '' ;
	isset( $args['post-text'] ) ? $post_text = $args['post-text'] : $post_text = '' ;
	isset( $args['hex'] ) ? $hex = $args['hex'] : $hex = 'n' ;
	isset( $args['rgb'] ) ? $rgb = $args['rgb'] : $rgb = 'n' ;
	isset( $args['pan'] ) ? $pan = $args['pan'] : $pan = 'n' ;
	isset( $args['pantone'] ) ? $pantone = $args['pantone'] : $pantone = '' ;

	advanced_color_boxes( $color, $pre_text, $post_text, $hex, $rgb, $pan, $pantone );

	$output = ob_get_contents();
	ob_end_clean();
	return $output;
}

function advanced_color_boxes_shortcode_clear_float() {
	ob_start();
	$output = ob_get_contents();
	$output .= "<div class='acb-clear-float'></div>";
	ob_end_clean();
	return $output;
}

function advanced_color_boxes( $color, $pre_text, $post_text, $hex, $rgb, $pan, $pantone )
{
	$color = trim( str_replace("#", "", $color)  );

	include( "template.php" );
}

