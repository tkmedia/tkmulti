<?php
$flex_image_block_width = get_sub_field('flex_image_block_width');
$flex_image_mobile_cols = get_sub_field('flex_image_mobile');
$flex_image_order = get_sub_field('flex_image_order');
$flex_image_hide_mobile = get_sub_field('flex_image_hide_mobile');
$flex_image_break = get_sub_field('flex_image_break');
$flex_image_block_align = get_sub_field('flex_image_block_align');

$flex_image = get_sub_field('flex_image');

$flex_image_title = get_sub_field('flex_image_title');
$flex_image_title_size = get_sub_field('flex_image_title_size');
$flex_image_title_color = get_sub_field('flex_image_title_color');
$flex_image_title_align = get_sub_field('flex_image_title_align');
$flex_image_title_location = get_sub_field('flex_image_title_location');

$flex_image_style = get_sub_field('flex_image_style');
$flex_image_type = get_sub_field('flex_image_type');
$flex_image_align = get_sub_field('flex_image_align');
$flex_image_btn1 = get_sub_field('flex_image_btn1');
$flex_image_btn1_link = get_sub_field('flex_image_btn1_link');
$flex_image_btn2 = get_sub_field('flex_image_btn2');
$flex_image_btn2_link = get_sub_field('flex_image_btn2_link');
$flex_image_text = get_sub_field('flex_image_text');
$flex_image_text_align = get_sub_field('flex_image_text_align');
$flex_image_text_ver = get_sub_field('flex_image_text_ver');
$flex_image_text_color = get_sub_field('flex_image_text_color');
$flex_image_text_size = get_sub_field('flex_image_text_size');

$flex_image_links = get_sub_field('flex_image_links');
$flex_image_full_link = get_sub_field('flex_image_full_link');

$flex_image_logo = get_sub_field('flex_image_logo');
$logo_position = get_sub_field('flex_image_logo_position');
$flex_image_bg = get_sub_field('flex_image_bg');
$flex_image_height = get_sub_field('flex_image_height'); 
$flex_image_block_width = get_sub_field('flex_image_block_width');
$image_full_link_fancybox = get_sub_field('flex_image_full_link_fancybox');

$image_full_top_margin = get_sub_field('flex_image_full_top_margin');
$image_full_bottom_margin = get_sub_field('flex_full_bottom_margin');
$image_animation = get_sub_field('flex_image_animation');

if ( $flex_image_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $flex_image_mobile_cols;?> <?php echo $flex_image_block_width;?> <?php if( $flex_image_break ){ ?><?php echo $flex_image_block_align; ?><?php } ?>" <?php if( $flex_image_order ){ ?>style="order:<?php echo $flex_image_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $image_animation;?>">
		<div class="flex_image_container flexible_page_element <?php echo $flex_image_title_location;?>">
		<div class="flex_image_row row-flex">	
			<?php if( $flex_image_title ) { ?>
			<div class="col-xs-12 section_title section_flex_title flex_image_title title_<?php echo $flex_image_title_align; ?>" style="text-align:<?php echo $flex_image_title_align; ?> !important;color:<?php echo $flex_image_title_color; ?>;font-size:<?php echo $flex_image_title_size; ?>px;"><?php echo $flex_image_title; ?></div>
			<?php } ?>
			
		    <div class="flex_image col-xs-12">
		    <?php if( $flex_image_links == 'img_link' ): ?>
				<?php if( $flex_image_full_link ) { ?>
					<?php if( $image_full_link_fancybox ) { ?>
					<a class="flex_image_full_link" data-fancybox href="<?php echo $flex_image_full_link; ?>">
					<?php } else { ?>
					<a href="<?php echo $flex_image_full_link; ?>" class="flex_image_full_link">
					<?php } ?> 
				<?php } ?>
			<?php endif; ?>    
		        <div class="flex_image_row col-xs-12 <?php if ($flex_image_style): echo implode(' ', $flex_image_style); endif; ?>">
		            <div class="flex_image_img image_<?php echo $flex_image_align; ?> img_<?php echo $flex_image_bg; ?>" <?php if( $flex_image_bg == 'cover' ): ?>style="height:<?php echo $flex_image_height; ?>px;margin-top:<?php echo $image_full_top_margin; ?>;margin-bottom:<?php echo $image_full_bottom_margin; ?>;"<?php endif; ?>>
			            <?php if( $flex_image_type == 'inside-post' ): ?>
			            <?php echo wp_get_attachment_image( $flex_image, 'inside-post' ); ?>
			            <?php endif; ?>
			            <?php if( $flex_image_type == 'block-300' ): ?>
			            <?php echo wp_get_attachment_image( $flex_image, 'block-300' ); ?>
			            <?php endif; ?>						            
			            <?php if( $flex_image_type == '500c' ): ?>
			            <?php echo wp_get_attachment_image( $flex_image, 'product-500c' ); ?>
			            <?php endif; ?>
			            <?php if( $flex_image_type == 'portrait' ): ?>
			            <?php echo wp_get_attachment_image( $flex_image, 'portrait' ); ?>
			            <?php endif; ?>
			            <?php if( $flex_image_type == 'full' ): ?>
			            <?php echo wp_get_attachment_image( $flex_image, 'full' ); ?>
			            <?php endif; ?>
			            <?php if( $flex_image_logo && in_array('inside_logo', $flex_image_style) ): ?>
			            <div class="flex_image_img_logo_position row-flex <?php echo $logo_position; ?>">
				            <div class="flex_image_img_logo">
					            <?php echo wp_get_attachment_image( $flex_image_logo, 'full' ); ?>
				            </div>
			            </div>
			            <?php endif; ?>
			            
			            <?php if( $flex_image_style && in_array('img_content', $flex_image_style) ): ?>
			            <div class="flex_image_img_content row-flex <?php echo $flex_image_text_align; ?> <?php echo $flex_image_text_ver; ?>">
				            <div class="img_content">
					            <?php if( $flex_image_text ) { ?>
					            <div class="img_content_text">
						            <p style="color:<?php echo $flex_image_text_color; ?>;font-size: <?php echo $flex_image_text_size; ?>px;"><?php echo $flex_image_text; ?></p>
					            </div>
					            <?php } ?>
					            
					            <?php if( $flex_image_links == 'btn_link' ): ?>
						            <?php if( $flex_image_btn1 ) { ?>
						            <div class="img_content_btn image_btn1">
							            <?php if( $flex_image_btn1_link ) { ?><a href="<?php echo $flex_image_btn1_link; ?>" class=""><?php } ?>
										<button class="section_readmore_link watch_btn hoverLink"><?php echo $flex_image_btn1; ?></button>
										<?php if( $flex_image_btn1_link ) { ?></a><?php } ?>
						            </div>
						            <?php } ?>
						            <?php if( $flex_image_btn2 ) { ?>
						            <div class="img_content_btn image_btn2">
										<?php if( $flex_image_btn2_link ) { ?><a href="<?php echo $flex_image_btn2_link; ?>" class=""><?php } ?>	
										<button class="section_readmore_link watch_btn hoverLink"><?php echo $flex_image_btn2; ?></button>
										<?php if( $flex_image_btn2_link ) { ?></a><?php } ?>
						            </div>
						            <?php } ?>
					            <?php endif; ?>
				            </div>
			            </div>
			            <?php endif; ?>
		            </div>						        
		        </div>
		    <?php if( $flex_image_links == 'img_link' ): ?>
				<?php if( $flex_image_full_link ) { ?></a><?php } ?> 
			<?php endif; ?>    
		    </div>
		</div>
		</div>
	</section>
</div>	
<?php if( $flex_image_break ){ ?><div class="break"></div><?php } ?>
			
<?php } ?>