<?php
if( isset( $_POST['acb_wrapper_width'] ) ) {
	update_option('acb_wrapper_width', $_POST['acb_wrapper_width'] );
	$acb_wrapper_width = $_POST['acb_wrapper_width'];
}
if( isset( $_POST['acb_box_height'] ) ) {
	update_option('acb_box_height', $_POST['acb_box_height'] );
	$acb_box_height = $_POST['acb_box_height'];
}
?>
<div class="wrap">
	<h1>Advanced Color Fields</h1>
	<table>
		<form method="post">
			<?php settings_fields( 'acb_options_group' ); ?>
			<?php do_settings_sections( 'acb_options_group' ); ?>
			<tr>
				<th style="text-align: left;">
					<label for="acb-wrapper-width">Wrapper Width:</label>
				</th>
				<td>
					<input type="text" name="acb_wrapper_width" id="acb_wrapper_width" value="<?php echo $acb_wrapper_width; ?>" /> px
				</td>
			</tr>
			<tr>
				<th style="text-align: left;">
					<label for="acb-wrapper-height">Box Height:</label>
				</th>
				<td>
					<input type="text" name="acb_box_height" id="acb_box_height" value="<?php echo $acb_box_height; ?>" /> px
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
