<?php 
$bulletin_list_block_width = get_sub_field('bulletin_list_block_width');
$bulletin_list_mobile_cols = get_sub_field('flex_bulletin_list_mobile');
$bulletin_list_hide_mobile = get_sub_field('flex_bulletin_list_hide_mobile');
$bulletin_list_order = get_sub_field('flex_bulletin_list_order');
$bulletin_list_break = get_sub_field('flex_bulletin_list_break');
$bulletin_list_block_align = get_sub_field('flex_bulletin_list_block_align');
$bulletin_list_animation = get_sub_field('flex_bulletin_list_animation');

$bulletin_list_title = get_sub_field('flex_bulletin_list_title');
$bulletin_list_subtitle = get_sub_field('flex_bulletin_list_subtitle');
$bulletin_list_width = get_sub_field('flex_bulletin_list_width');
$bulletin_list = get_sub_field('flex_bulletin_list');
$bulletin_layout = get_sub_field('flex_bulletin_list_layout');
$bulletin_list_img_position = get_sub_field('bulletin_list_img_position');
$bulletin_list_img_align = get_sub_field('bulletin_list_img_align');
$bulletin_list_img_num = get_sub_field('bulletin_list_img_num');
$bulletin_list_img_mobile_num = get_sub_field('bulletin_list_img_mobile_num');
$bulletin_list_size = get_sub_field('flex_bulletin_list_size');
$bulletin_list_icon_size = get_sub_field('flex_bulletin_list_icon_size');
$bulletin_list_img_size = get_sub_field('flex_bulletin_list_img_size');

if ( $bulletin_list_img_mobile_num == 1 ) : $bl_xs_cols = "12"; $bl_sm_cols = "12";
elseif ( $bulletin_list_img_mobile_num == 2 ) : $bl_xs_cols = "6";
elseif ( $bulletin_list_img_mobile_num == 3 ) : $bl_xs_cols = "4";
endif;
if ( $bulletin_list_img_num == 1 ) : $bl_md_cols = "12"; 
elseif ( $bulletin_list_img_num == 2 ) : $bl_sm_cols = "6"; $bl_md_cols = "6"; 
elseif ( $bulletin_list_img_num == 3 ) : $bl_sm_cols = "4"; $bl_md_cols = "4"; 
elseif ( $bulletin_list_img_num == 4 ) : $bl_sm_cols = "3"; $bl_md_cols = "3";
elseif ( $bulletin_list_img_num == 5 ) : $bl_sm_cols = "3"; $bl_md_cols = "20"; 
elseif ( $bulletin_list_img_num == 6 ) : $bl_sm_cols = "3"; $bl_md_cols = "2"; 
endif; 

if ( $bulletin_list_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $bulletin_list_mobile_cols;?> <?php echo $bulletin_list_block_width;?> <?php if( $bulletin_list_break ){ ?><?php echo $bulletin_list_block_align; ?><?php } ?>" <?php if( $bulletin_list_order ){ ?>style="order:<?php echo $bulletin_list_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $bulletin_list_animation;?>">
		
		<div class="bulletin_list flexible_page_element" itemprop="text">
			<div class="bulletin_list_wrap">
				<?php if( $bulletin_list_title ) { ?>
				<h2 class="section_title section_flex_title"><?php echo $bulletin_list_title; ?></h2>
				<?php } ?>
				<?php if( $bulletin_list_subtitle ) { ?>
					<div class="flex_bulletin_list_subtitle" itemprop="headline"><?php echo $bulletin_list_subtitle; ?></div>
				<?php } ?>
				
				<?php if( have_rows('flex_bulletin_list') ): ?>
					<div class="flex_bulletin_list icons_<?php echo $bulletin_list_size; ?> <?php echo $bulletin_layout; ?>" style="width:<?php echo $bulletin_list_width; ?>%;">
					<?php while( have_rows('flex_bulletin_list') ): the_row(); 
						$bulletin_list_style = get_sub_field('flex_bulletin_list_style');
						$bulletin_list_icon = get_sub_field('bulletin_list_icon_font');
						$bulletin_list_img = get_sub_field('bulletin_list_icon_img');
						$bulletin_list_title = get_sub_field('bulletin_list_title');
						$bulletin_list_text = get_sub_field('bulletin_list_text');
						$bulletin_icon_font_color = get_sub_field('bulletin_list_icon_font_color');
						
						$bulletin_list_link = get_sub_field('bulletin_list_link');
						$bulletin_list_title_color = get_sub_field('bulletin_list_title_color');
						$bulletin_list_title_size = get_sub_field('bulletin_list_title_size');
						$bulletin_list_text = get_sub_field('bulletin_list_text');
						$bulletin_list_text_color = get_sub_field('bulletin_list_text_color');
						$bulletin_list_text_size = get_sub_field('bulletin_list_text_size');
						
					?>
						<?php if( $bulletin_layout == 'row-flex' ) { ?>
						<div class="flex_bulletin_list_item col-xs-<?= $bl_xs_cols; ?> col-sm-<?= $bl_sm_cols; ?> col-md-<?= $bl_md_cols; ?>">
						<?php } else { ?>
						<div class="flex_bulletin_list_item">
						<?php } ?>	
						<?php if( $bulletin_list_link ) { ?>	
						<a href="<?php echo $bulletin_list_link; ?>">
						<?php } ?>	
							<div class="flex_bulletin_list_item_wrap <?php echo $bulletin_list_img_position; ?> <?php if( $bulletin_layout == 'row-flex' ) { echo $bulletin_list_img_align; ?>-xs<?php } ?>">
								
								<?php if( $bulletin_list_img_position == 'img_block top_title' ): ?>
									<?php if( $bulletin_list_title ) { ?>
									<div class="flex_bulletin_list_title top_title" style="color:<?php echo $bulletin_list_title_color; ?>;font-size:<?php echo $bulletin_list_title_size; ?>px;">
										<?php echo $bulletin_list_title; ?>
									</div>
									<?php } ?>
								<?php endif; ?>	
								
								<?php if( $bulletin_list_icon || $bulletin_list_img ) { ?>	
									<?php if( $bulletin_list_style == 'bulletin_img' ): ?>
									<div class="flex_bulletin_list_icon bulletin_list_img">
										<div class="list_icon">
											<?php echo wp_get_attachment_image( $bulletin_list_img, $bulletin_list_img_size ); ?>
										</div>
									</div>
									<?php endif; ?>	
									<?php if( $bulletin_list_style == 'bulletin_font' ): ?>
									<div class="flex_bulletin_list_icon" style="font-size:<?php echo $bulletin_list_icon_size; ?>px;width:calc(<?php echo $bulletin_list_icon_size; ?>px + 40px);">
										<div class="flex_bulletin_list_icon_inner" style="color:<?php echo $bulletin_icon_font_color; ?>;"><?php echo $bulletin_list_icon; ?></div>
									</div>
									<?php endif; ?>	
								<?php } ?>
								
								<div class="flex_bulletin_list_content">
									<?php if( $bulletin_list_img_position !== 'img_block top_title' ): ?>
										<?php if( $bulletin_list_title ) { ?>
										<div class="flex_bulletin_list_title" style="color:<?php echo $bulletin_list_title_color; ?>;font-size:<?php echo $bulletin_list_title_size; ?>px;">
											<?php echo $bulletin_list_title; ?>
										</div>
										<?php } ?>
									<?php endif; ?>	
									<?php if( $bulletin_list_text ) { ?>
									<div class="flex_bulletin_list_text" style="color:<?php echo $bulletin_list_text_color; ?>;font-size:<?php echo $bulletin_list_text_size; ?>px;">
										<?php echo $bulletin_list_text; ?>
									</div>
									<?php } ?>
								</div>										
								
							</div>
						<?php if( $bulletin_list_link ) { ?>	
						</a>
						<?php } ?>	
						</div>
						<?php endwhile; ?>
					</div>
				<?php endif; ?>
							
			</div>
		</div>					

	</section>
</div>
<?php if( $bulletin_list_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>
