<?php
$project_block_width = get_sub_field('flex_project_block_width');
$project_mobile_cols = get_sub_field('flex_project_mobile');
$project_order = get_sub_field('flex_project_order');
$project_hide_mobile = get_sub_field('flex_project_hide_mobile');

$project_title = get_sub_field('flex_project_title');
$project_title_color = get_sub_field('flex_project_title_color');
$project_title_size = get_sub_field('flex_project_title_size');
$project_title_type = get_sub_field('flex_project_title_type'); 
$project_title_position = get_sub_field('flex_project_title_position');
$project_title_side = get_sub_field('flex_project_title_side');
$project_pretitle = get_sub_field('flex_project_pretitle');
$project_pretitle_color = get_sub_field('flex_project_pretitle_color');
$project_pretitle_size = get_sub_field('flex_project_pretitle_size');

$project_button_first = get_sub_field('flex_project_button_first');
$project_button_second = get_sub_field('flex_project_button_second');
$project_button_first_link = get_sub_field('flex_project_button_first_link');
$project_button_second_link = get_sub_field('flex_project_button_second_link');
$project_image_size = get_sub_field('flex_project_image_size');
$project_image = get_sub_field('flex_project_image');

$project_animation = get_sub_field('flex_project_animation');

if ( $project_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $project_mobile_cols;?> <?php echo $project_block_width;?>" <?php if( $project_order ){ ?>style="order:<?php echo $project_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $project_animation;?>">
		<div class="flex_project_container flexible_page_element">
			<div class="flex_project">
				<div class="flex_project_row row-flex">
					<div class="flex_project_col project_title_col col-xs-12 <?php echo $project_title_position;?>">
						<div class="project_title_col_wrap" style="justify-content: flex-<?php echo $project_title_side; ?>;">
							<div class="project_pretitle" style="color:<?php echo $project_pretitle_color; ?>;font-size:<?php echo $project_pretitle_size; ?>px;">
								<?php echo $project_pretitle; ?>
							</div>
							<div class="project_title_wrap title_<?php echo $project_title_side; ?>" <?php if( $project_title_side == 'end' ): ?>style="order: -1;"<?php endif; ?>>
								<<?php echo $project_title_type;?> class="section_title section_flex_title project_title" style="color:<?php echo $project_title_color; ?>;font-size:<?php echo $project_title_size; ?>px;justify-content: flex-<?php echo $project_title_side; ?>;">
									<?php echo $project_title; ?><span></span>
								</<?php echo $project_title_type;?>>
								
								<div class="project_buttons">
									<?php if( $project_button_first_link ) { ?> 
									<div class="custom_icon_btn flex_project_btn project_button_first">
										<a href="<?php echo $project_button_first_link; ?>" class="masthead_btn_link">
											<button class="section_readmore_link watch_btn hoverLink">
												<?php if( $project_button_first ) { ?> 
												<?php echo $project_button_first; ?>
												<?php } else { ?>
												<?php _e('View Project', 'tkmulti'); ?>
												<?php } ?>
											</button>
										</a>
									</div>
									<?php } ?>						
									<?php if( $project_button_second_link ) { ?> 
									<div class="custom_icon_btn flex_project_btn project_button_second">
										<a href="<?php echo $project_button_second_link; ?>" class="masthead_btn_link">
											<button class="section_readmore_link watch_btn hoverLink">
												<?php if( $project_button_second ) { ?> 
												<?php echo $project_button_second; ?>
												<?php } else { ?>
												<?php _e('All Projects', 'tkmulti'); ?>
												<?php } ?>
											</button>
										</a>
									</div>
									<?php } ?>						
								</div>
							
							</div>
						</div>
					</div>
					<div class="flex_project_col project_image_col col-xs-12">
						<div class="project_image_col_container">
			            <?php if( $project_image_size == 'inside-post' ): ?>
			            <?php echo wp_get_attachment_image( $project_image, 'inside-post' ); ?>
			            <?php endif; ?>
			            <?php if( $project_image_size == 'full' ): ?>
			            <?php echo wp_get_attachment_image( $project_image, 'full' ); ?>
			            <?php endif; ?>
			            <?php if( $project_image_size == 'gallery-800' ): ?>
			            <?php echo wp_get_attachment_image( $project_image, 'gallery-800' ); ?>
			            <?php endif; ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>				
<?php } ?>