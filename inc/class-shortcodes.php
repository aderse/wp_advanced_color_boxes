<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class ACB_SHORTCODES {
	public function advanced_color_boxes_shortcode( $args )
	{
		ob_start();
		isset( $args['color'] ) ? $color = $args['color'] : $color = '#FFFFFF';
		isset( $args['pre-text'] ) ? $pre_text = $args['pre-text'] : $pre_text = '' ;
		isset( $args['post-text'] ) ? $post_text = $args['post-text'] : $post_text = '' ;
		isset( $args['field1'] ) ? $field1 = $args['field1'] : $field1 = '' ;
		isset( $args['field2'] ) ? $field2 = $args['field2'] : $field2 = '' ;
		isset( $args['field3'] ) ? $field3 = $args['field3'] : $field3 = '' ;
		isset( $args['field4'] ) ? $field4 = $args['field4'] : $field4 = '' ;

		advanced_color_boxes( $color, $pre_text, $post_text, $field1, $field2, $field3, $field4 );

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

	public function advanced_color_boxes_shortcode_open() {
		ob_start();
		$output = ob_get_contents();
		$output .= "<div class='acb-outer-wrapper'>";
		ob_end_clean();
		return $output;
	}

	public function advanced_color_boxes_shortcode_close() {
		ob_start();
		$output = ob_get_contents();
		$output .= "</div>";
		ob_end_clean();
		return $output;
	}
}
