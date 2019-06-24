<?php

if( have_rows('flex_content_rows') ): $row = 1;?>
	
	<?php
	while( have_rows('flex_content_rows') ): the_row();

		$cols_mobile = get_sub_field('flex_content_cols_mobile');
		$flex_cols_bg = get_sub_field('flex_content_cols_bg');
		$flex_cols_overlay_r = get_sub_field('flex_content_cols_overlay_r');
		$flex_cols_overlay_opacity_r = get_sub_field('flex_content_cols_overlay_opacity_r');
		$flex_cols_overlay_l = get_sub_field('flex_content_cols_overlay_l');
		$flex_cols_overlay_opacity_l = get_sub_field('flex_content_cols_overlay_opacity_l');
			$Hex_color_r = $flex_cols_overlay_r;
			$RGB_color_r = hex2rgb($Hex_color_r);
			$Final_Rgb_color_r = implode(", ", $RGB_color_r);
			$Hex_color_l = $flex_cols_overlay_l;
			$RGB_color_l = hex2rgb($Hex_color_l);
			$Final_Rgb_color_l = implode(", ", $RGB_color_l);			
		$row_padding_top = get_sub_field('flex_content_cols_padding_top');
		$row_padding_bottom = get_sub_field('flex_content_cols_padding_bottom');
		$row_padding_right = get_sub_field('flex_content_cols_padding_right');
		$row_padding_left = get_sub_field('flex_content_cols_padding_left');
		$overlay_rotate = get_sub_field('flex_content_cols_overlay_rotate');
		
		$row_ver_align = get_sub_field('flex_content_row_ver_align');
		
		$row_wrap = get_sub_field('flex_content_row_wrap');
		$row_col_padding = get_sub_field('flex_content_row_col_padding');
		
		$top_divider_section = get_sub_field('flex_top_divider_section_type');
		$top_divider_section_color = get_sub_field('flex_top_divider_section_color');
		$top_divider_section_bg_color = get_sub_field('flex_top_divider_section_bg_color');
		$top_divider_section_height = get_sub_field('flex_top_divider_section_height');
		$top_divider_section_position = get_sub_field('flex_top_divider_section_position');
		$bottom_divider_section = get_sub_field('flex_bottom_divider_section_type');
		$bottom_divider_section_color = get_sub_field('flex_bottom_divider_section_color');
		$bottom_divider_section_bg_color = get_sub_field('flex_bottom_divider_section_bg_color');
		$bottom_divider_section_height = get_sub_field('flex_bottom_divider_section_height');
		$bottom_divider_section_position = get_sub_field('flex_bottom_divider_section_position');		

		$row_top_wrap_line = get_sub_field('row_top_wrap_line');
		$row_bottom_wrap_line = get_sub_field('row_bottom_wrap_line');
		$row_right_wrap_line = get_sub_field('row_right_wrap_line');
		$row_Left_wrap_line = get_sub_field('row_Left_wrap_line');
		$top_line_padd = get_sub_field('row_top_wrap_line_padd');
		$bottom_line_padd = get_sub_field('row_bottom_wrap_line_padd');		
		 ?>
		
		
		
	<div class="flex_content_rows container container_<?php echo $row;?>" style="background-image:url(<?php echo $flex_cols_bg['url']; ?>);padding-right:<?php echo $row_padding_right;?>px;padding-left:<?php echo $row_padding_left;?>px;padding-bottom: <?php echo $row_padding_bottom;?>px;padding-top: <?php echo $row_padding_top;?>px;" id="flex-row-<?php echo $row;?>">
		<?php if( $flex_cols_overlay_r || $flex_cols_overlay_l) { ?>
		<div class="flex_content_row_overlay" style="background: <?php echo $flex_cols_overlay_r; ?>;background: -moz-linear-gradient(right, rgba(<?php echo $Final_Rgb_color_r; ?>,<?php echo $flex_cols_overlay_opacity_r; ?>) 0%, rgba(<?php echo $Final_Rgb_color_l; ?>,<?php echo $flex_cols_overlay_opacity_l; ?>) 100%);background: -webkit-linear-gradient(<?php echo $overlay_rotate; ?>deg, rgba(<?php echo $Final_Rgb_color_r; ?>,<?php echo $flex_cols_overlay_opacity_r; ?>) 0%, rgba(<?php echo $Final_Rgb_color_l; ?>,<?php echo $flex_cols_overlay_opacity_l; ?>) 100%);background: linear-gradient(right, rgba(<?php echo $Final_Rgb_color_r; ?>,<?php echo $flex_cols_overlay_opacity_r; ?>) 0%, rgba(<?php echo $Final_Rgb_color_l; ?>,<?php echo $flex_cols_overlay_opacity_l; ?>) 100%);"></div>
		<?php } ?>
		
		<style>
		<?php if( $top_divider_section ) { ?>
			.container_<?php echo $row;?> .flex_content_row_divider_top path {fill:<?php echo $top_divider_section_color; ?>;}
			.container_<?php echo $row;?> .flex_content_row_divider_top svg	{height:<?php echo $top_divider_section_height; ?>px;background-color: <?php echo $top_divider_section_bg_color; ?>;}
		<?php } if( $bottom_divider_section ) { ?>
			.container_<?php echo $row;?> .flex_content_row_divider_bottom path {fill:<?php echo $bottom_divider_section_color; ?>;}
			.container_<?php echo $row;?> .flex_content_row_divider_bottom svg	{height:<?php echo $bottom_divider_section_height; ?>px;background-color: <?php echo $bottom_divider_section_bg_color; ?>;}	
		<?php } ?>
		</style>
		<?php
		set_query_var( 'flex_top_divider_section_type', $top_divider_section );
		set_query_var( 'flex_top_divider_section_color', $top_divider_section_color );
		set_query_var( 'flex_top_divider_section_height', $top_divider_section_height );
		set_query_var( 'flex_top_divider_section_position', $top_divider_section_position );
		set_query_var( 'flex_bottom_divider_section_type', $bottom_divider_section );
		set_query_var( 'flex_bottom_divider_section_color', $bottom_divider_section_color );
		set_query_var( 'flex_bottom_divider_section_height', $bottom_divider_section_height );
		set_query_var( 'flex_bottom_divider_section_position', $bottom_divider_section_position );		
		
		if( $top_divider_section ) {
			get_template_part('partials/row-divider-top' );
		} ?>
		
		<div class="container_wrap row-flex<?php if(!$row_wrap) { ?> wrap <?php } if($row_col_padding) { ?> col_nopadding <?php } if($row_ver_align) { ?> middle-xs <?php } if($row_top_wrap_line) { echo $row_top_wrap_line; } ?> <?php if($row_bottom_wrap_line) { echo $row_bottom_wrap_line; } ?> <?php if($row_right_wrap_line) { echo $row_right_wrap_line; } ?> <?php if($row_Left_wrap_line) { echo $row_Left_wrap_line; }?>">
		<!-- flex_content_cols -->
				
		<?php
		// ID of the current item in the WordPress Loop
		$id = get_the_ID();	
		// check if the flexible content field has rows of data
		if ( have_rows( 'flex_content', $id ) ) : $count = 1;
			// loop through the selected ACF layouts and display the matching partial
			while ( have_rows( 'flex_content', $id ) ) : the_row();
			
				set_query_var( 'row', $row );
				set_query_var( 'count', $count );
				get_template_part( 'partials/flexible-layouts/' . get_row_layout() );
				
			$count++; endwhile;
			
		elseif ( get_the_content() ) :
		// no layouts found
		endif; ?>
					
		<!-- flex_content_cols -->
			<?php if( $row_top_wrap_line ) { ?>
			<div class="container_wrap_line wrap_line_top" style="top:<?php echo $top_line_padd;?>px;"><div class="inner-container"></div></div>
			<?php } ?>
			<?php if( $row_right_wrap_line ) { ?>
			<div class="container_wrap_line wrap_line_right" style="top:<?php echo $top_line_padd;?>px;bottom:<?php echo $bottom_line_padd;?>px;"><div class="inner-container"></div></div>
			<?php } ?>
			<?php if( $row_bottom_wrap_line ) { ?>
			<div class="container_wrap_line wrap_line_bottom" style="bottom:<?php echo $bottom_line_padd;?>px;"><div class="inner-container"></div></div>
			<?php } ?>
			<?php if( $row_Left_wrap_line ) { ?>
			<div class="container_wrap_line wrap_line_left" style="top:<?php echo $top_line_padd;?>px;bottom:<?php echo $bottom_line_padd;?>px;"><div class="inner-container"></div></div>
			<?php } ?>
			<?php if( $row_top_wrap_line ) { ?>
			<div class="container_wrap_line wrap_line_top_left" style="top:<?php echo $top_line_padd;?>px;"><div class="inner-container"></div></div>
			<?php } ?>
			<?php if( $row_bottom_wrap_line ) { ?>
			<div class="container_wrap_line wrap_line_bottom_left"><div class="inner-container"></div></div>
			<?php } ?>
		</div>
		
		<?php 
		if( $bottom_divider_section ) {
			get_template_part('partials/row-divider-bottom' );
		} ?>

		<script>
		jQuery(function($) {
			$(window).load(function(){
				get_elemnt_width();
			    function get_elemnt_width(){
				    var first_elemnt = $('#flex-row-<?php echo $row;?> .container_wrap .flex_content_cols.col-xs-12.col-md-12:first-child .clean-title').outerWidth();
				    $('#flex-row-<?php echo $row;?> .container_wrap.top-middle-left .container_wrap_line.wrap_line_top').css('width', 'calc(45% - ' + first_elemnt + 'px / 2)');
				    $('#flex-row-<?php echo $row;?> .container_wrap.top-middle-right .container_wrap_line.wrap_line_top').css('width', 'calc(45% - ' + first_elemnt + 'px / 2)');
			    }
		    });	
		});
		</script>   
				
	</div>
	
	<?php $row++;endwhile; ?>
		
<?php endif; ?>