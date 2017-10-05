<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class ACB_ENQUEUES {
	public function advanced_color_boxes_enqueue_scripts()
	{
		wp_enqueue_style( 'advanced-color-boxes-style', plugins_url( '/css/advanced-color-boxes.css' , dirname( __FILE__ ) ) );
		wp_enqueue_script( 'advanced-color-boxes-script', plugins_url( '/js/auto-height.js' , dirname( __FILE__ ) ), array('jquery'), '1.0', true );
	}
	public function advanced_color_boxes_enqueue_admin_scripts() {
		wp_enqueue_style( 'advanced-color-boxes-style', plugins_url( '/css/advanced-color-boxes-admin.css' , dirname( __FILE__ ) ) );
	}
}