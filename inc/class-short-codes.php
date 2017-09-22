<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class ACB_SHORTCODES {
	public function advanced_color_boxes_shortcode( $args )
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

	public function advanced_color_boxes_shortcode_clear_float() {
		ob_start();
		$output = ob_get_contents();
		$output .= "<div class='acb-clear-float'></div>";
		ob_end_clean();
		return $output;
	}
}
