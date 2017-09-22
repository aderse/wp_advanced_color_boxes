<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class ACB_ENQUEUES {
	public function advanced_color_boxes_enqueue_scripts()
	{
		wp_enqueue_style( 'advanced-color-boxes-style', plugins_url( '/css/advanced-color-boxes.css' , dirname( __FILE__ ) ) );
	}
}