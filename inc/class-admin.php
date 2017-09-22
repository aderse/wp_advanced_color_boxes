<?php

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

class ACB_ADMIN {
	public function register_acb_settings() {
		register_setting( 'acb_options_group', 'acb_wrapper_width' );
		register_setting( 'acb_options_group', 'acb_box_height' );
	}

	public function acb_admin_menu() {
		add_menu_page( 'Advanced Color Boxes', 'AC Boxes', 'manage_options', 'advanced-color-boxes/acb-admin-page.php',  'ACB_ADMIN::acb_admin_page', 'dashicons-tickets', 6  );
	}

	public function acb_admin_page() {
		if ( isset( $_POST['acb_wrapper_width'] ) ) {
			update_option( 'acb_wrapper_width', $_POST['acb_wrapper_width'] );
			$acb_wrapper_width = $_POST['acb_wrapper_width'];
		} else {
			$acb_wrapper_width = get_option( 'acb_wrapper_width', 'acb_options_group' );
        }

		if ( isset( $_POST['acb_box_height'] ) ) {
			update_option( 'acb_box_height', $_POST['acb_box_height'] );
			$acb_box_height = $_POST['acb_box_height'];
		} else {
			$acb_box_height = get_option( 'acb_box_height', 'acb_options_group' );
        }

		?>
		<div class="wrap">
			<h1>Advanced Color Fields</h1>
			<table class="acb-admin-form">
				<form method="post">
					<?php settings_fields( 'acb_options_group' ); ?>
					<?php do_settings_sections( 'acb_options_group' ); ?>
					<tr>
						<th>
							<label for="acb-wrapper-width">Wrapper Width:</label>
						</th>
						<td>
							<input type="text" name="acb_wrapper_width" id="acb_wrapper_width"
							       value="<?php echo $acb_wrapper_width; ?>"/> px
						</td>
					</tr>
					<tr>
						<th>
							<label for="acb-wrapper-height">Box Height:</label>
						</th>
						<td>
							<input type="text" name="acb_box_height" id="acb_box_height"
							       value="<?php echo $acb_box_height; ?>"/> px
						</td>
					</tr>
					<tr>
						<td colspan="2">
							<?php submit_button(); ?>
						</td>
					</tr>
				</form>
			</table>
		</div>
	<?php
	}
}