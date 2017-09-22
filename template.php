<?php
	$acb_wrapper_width = get_option( 'acb_wrapper_width', 'acb_options_group' );
	$acb_box_height = get_option( 'acb_box_height', 'acb_options_group' );
?>
<div class="acb-box-outer-wrapper">
	<div class="acb-box-wrapper" style="width: <?php echo $acb_wrapper_width;?>px;">
		<div class="acb-box" style="background-color: #<?php echo $color; ?>; height: <?php echo $acb_box_height;?>px;"></div>
		<div class="acb-text">
			<?php if( '' != $pre_text ) { ?>
				<div><?php echo $pre_text; ?></div>
			<?php } ;?>
			<?php if( 'y' == $hex ) { ?>
				<div>Hex: <?php echo '#' . $color; ?></div>
			<?php } ;?>
			<?php if( 'y' == $rgb ) { ?>
				<?php list($r, $g, $b) = sscanf('#'.$color, "#%02x%02x%02x"); ?>
				<div>RGB: <?php echo "$r $g $b";?></div>
			<?php } ;?>
			<?php if( 'y' == $pan ) { ?>
				<div>Pantone: <?php echo $pantone; ?></div>
			<?php } ;?>
		</div>
	</div>
	<?php if( '' != $post_text ) { ?>
		<div style="padding-left: 6px;"><?php echo $post_text; ?></div>
	<?php } ;?>
</div>
