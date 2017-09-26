<?php
	$acb_wrapper_width = get_option( 'acb_wrapper_width', 'acb_options_group' );
	$acb_box_height = get_option( 'acb_box_height', 'acb_options_group' );
?>
<div class="acb-box-outer-wrapper">
	<div class="acb-box-wrapper" style="width: <?php echo $acb_wrapper_width;?>px;">
		<div class="acb-box" style="background-color: #<?php echo $color; ?>; height: <?php echo $acb_box_height;?>px;"></div>
		<div class="acb-text">
			<?php if( '' != $pre_text ) { ?>
				<div><strong><?php echo $pre_text; ?></strong></div>
			<?php } ;?>
			<?php if( $field1 ) { ?>
				<div><?php echo $field1; ?></div>
			<?php } ;?>
			<?php if( $field2 ) { ?>
				<div><?php echo $field2 ;?></div>
			<?php } ;?>
			<?php if( $field3 ) { ?>
				<div><?php echo $field3; ?></div>
			<?php } ;?>
			<?php if( $field4 ) { ?>
                <div><?php echo $field4; ?></div>
			<?php } ;?>
		</div>
	</div>
	<?php if( '' != $post_text ) { ?>
		<div style="padding-left: 6px;"><?php echo $post_text; ?></div>
	<?php } ;?>
</div>
