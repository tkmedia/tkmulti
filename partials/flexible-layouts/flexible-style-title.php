<?php 
$style_title_block_width = get_sub_field('flex_style_title_block_width');
$flex_style_title_mobile = get_sub_field('flex_style_title_mobile');
$title_hide_mobile = get_sub_field('flex_style_title_hide_mobile');
$title_order = get_sub_field('flex_style_title_order');
$title_break = get_sub_field('flex_style_title_break');
$title_block_align = get_sub_field('flex_style_title_block_align');

$title_type = get_sub_field('flex_style_title_type');
$title_header = get_sub_field('flex_style_title_header');
$title_size = get_sub_field('flex_style_title_size');
$title_align = get_sub_field('flex_style_title_align');
$title_color = get_sub_field('flex_style_title_color');
$subtitle_color = get_sub_field('flex_style_subtitle_color');
$title_first = get_sub_field('flex_style_title_first');
$title_last = get_sub_field('flex_style_title_last');
$title_bg_color = get_sub_field('flex_style_title_bg_color');
$subtitle_bg_color = get_sub_field('flex_style_subtitle_bg_color');
$style_title_animation = get_sub_field('flex_style_title_animation');
$title_intro = get_sub_field('flex_style_intro');

if ( $title_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $flex_style_title_mobile;?> <?php echo $style_title_block_width;?> <?php if( $title_break ){ ?><?php echo $title_block_align; ?><?php } ?>" <?php if( $title_order ){ ?>style="order:<?php echo $title_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $style_title_animation;?>">

		<div class="flex_style_title flexible_page_element" itemprop="text">
			<div class="flex_style_title_wrap">
				<div class="flex_style_title_container title_<?php echo $title_type; ?> title_align_<?php echo $title_align; ?>" style="text-align:<?php echo $title_align; ?>;justify-content:<?php echo $title_align; ?>;">
					
					<?php if( $title_type == 'clean' ): ?>
						<<?php echo $title_header; ?> class="clean-title"  style="text-align:<?php echo $title_align; ?>;font-size:<?php echo $title_size; ?>px;color:<?php echo $title_color; ?>;"><?php echo $title_first; ?>
						</<?php echo $title_header; ?>>
						
						<?php if( $title_last ){ ?><span class="title_last" style="color:<?php echo $title_color; ?>;"><?php echo $title_last; ?></span><?php } ?>						
					<?php endif; ?>

					<?php if( $title_type == 'clean-sideline' ): ?>
						<<?php echo $title_header; ?> class="clean-sideline-title" style="text-align:<?php echo $title_align; ?>;font-size:<?php echo $title_size; ?>px;color:<?php echo $title_color; ?>;"><?php echo $title_first; ?>
						</<?php echo $title_header; ?>>
						<?php if( $title_last ){ ?><span style="color:<?php echo $title_color; ?>;font-size: 1.4rem;"><?php echo $title_last; ?></span><?php } ?>
					<?php endif; ?>
					
					<?php if( $title_type == 'clean-underline' ): ?>
						<<?php echo $title_header; ?> class="clean-underline-title title-<?php echo $title_align; ?>" style="text-align:<?php echo $title_align; ?>;font-size:<?php echo $title_size; ?>px;color:<?php echo $title_color; ?>;"><?php echo $title_first; ?><?php if( $title_last ){ ?><span style="color:<?php echo $title_color; ?>;font-size: 1.4rem;"><?php echo $title_last; ?></span><?php } ?>
						</<?php echo $title_header; ?>>
						
					<?php endif; ?>	
																				
					<?php if( $title_type == 'box' ): ?>
						<div class="flex_style_title_box_wrap" style="background:<?php echo $title_bg_color; ?>;text-align:<?php echo $title_align; ?>;">
							<div class="flex_style_title_icon" style="color:<?php echo $title_color; ?>;"><i class="fal fa-angle-left"></i></div>
							<<?php echo $title_header; ?> class="box-title" style="font-size:<?php echo $title_size; ?>px;color:<?php echo $title_color; ?>;"><?php echo $title_first; ?>
								<?php if( $title_last ){ ?><span><?php echo $title_last; ?></span><?php } ?>
							</<?php echo $title_header; ?>>
						</div>
					<?php endif; ?>
					
					<?php if( $title_type == 'split' ): ?>
						<div class="flex_style_title_split_wrap" style="text-align:<?php echo $title_align; ?>">
						<<?php echo $title_header; ?> style="text-align:right;font-size:<?php echo $title_size; ?>px;display: inline-block;"><span class="title_first" style="background:<?php echo $title_bg_color; ?>;color:<?php echo $title_color; ?>;"><?php echo $title_first; ?></span>
							<?php if( $title_last ){ ?><span class="title_last" style="background:<?php echo $subtitle_bg_color; ?>;color:<?php echo $subtitle_color; ?>;"><?php echo $title_last; ?></span><?php } ?>
						</<?php echo $title_header; ?>>
						</div>
					<?php endif; ?>
					
				</div>
				
				<?php if( $title_intro ){ ?>
				<div class="flex_style_title_intro title_<?php echo $title_type; ?>" style="text-align:<?php echo $title_align; ?>;justify-content:<?php echo $title_align; ?>;">
					<div class="title_intro" style="color:<?php echo $title_color; ?>;">
						<?php echo $title_intro; ?>
					</div>
				</div>
				<?php } ?>
				
			</div>
		</div>
	</section>
</div>	
<?php if( $title_break ){ ?><div class="break"></div><?php } ?>		
<?php } ?>	