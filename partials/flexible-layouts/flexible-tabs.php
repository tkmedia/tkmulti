<?php 
$tabs_block_width = get_sub_field('flex_tabs_block_width');
$tabs_order = get_sub_field('flex_tabs_order');
$tabs_mobile = get_sub_field('flex_tabs_mobile');
$tabs_hide_mobile = get_sub_field('flex_tabs_hide_mobile');
$tabs_break = get_sub_field('flex_tabs_break');
$tabs_block_align = get_sub_field('flex_tabs_block_align');

$tabs_title = get_sub_field('flex_tabs_title');
$tabs_subtitle = get_sub_field('flex_tabs_subtitle');
$tabs_style = get_sub_field('flex_tabs_style');
$tabs_title_a = get_sub_field('flex_tabs_title_a');
$tabs_icon = get_sub_field('flex_tabs_icon');
$tabs = get_sub_field('flex_tabs');
$tabs_animation = get_sub_field('flex_tabs_animation');

if ( $tabs_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $tabs_mobile;?> <?php echo $tabs_block_width;?> <?php if( $tabs_break ){ ?><?php echo $tabs_block_align; ?><?php } ?>" <?php if( $tabs_order ){ ?>style="order:<?php echo $tabs_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $tabs_animation;?>">

		<div class="content_page_tabs flexible_page_element qa_icon_<?php echo $tabs_icon; ?>" itemprop="text">
			<div class="page_tabs_wrap style_arrow">
				<?php if( $tabs_title ) { ?>
				<h2 class="section_title section_flex_title title_<?php echo $tabs_title_a; ?>" style="text-align:<?php echo $tabs_title_a; ?> !important;"><?php echo $tabs_title; ?></h2>
				<?php } ?>				
				<?php if( $tabs_subtitle ) { ?>
				<div class="page_qa_subtitle title_<?php echo $tabs_title_a; ?>" style="text-align:<?php echo $tabs_title_a; ?> !important;"><p><?php echo $tabs_subtitle; ?></p></div>
				<?php } ?>				

				<?php if( $tabs_style == 'tabs-side' ) { ?>		

					<!-- Begin .qa_tabs -->
					<div class="VerticalTab fc_VerticalTab VerticalTab_1 tabs_ver_1 row-flex">
					<?php if( have_rows('flex_tabs') ): ?>
						<ul class="resp-tabs-list hor_1 col-sm-4 col-lg-3">
						<?php $i = 1; while( have_rows('flex_tabs') ): the_row(); 
							// vars
							$tabs_button_title = get_sub_field('flex_tabs_button_title');
							$tabs_button_title_color = get_sub_field('flex_tabs_button_title_color');
							$tabs_button_subtitle = get_sub_field('flex_tabs_button_subtitle');
							$tabs_button_subtitle_color = get_sub_field('flex_tabs_button_subtitle_color');
							?>								
							<li class="tabs-<?php echo $i; ?>">
								<span class="tabs-text">
								<div class="tabs_button_title"><?php echo $tabs_button_title; ?></div>
								<?php if( $tabs_button_subtitle ) { ?>	
								<div class="tabs_button_subtitle"><?php echo $tabs_button_subtitle; ?></div>
								<?php } ?>
								</span>
							</li>
						<?php $i++;endwhile; ?>
						</ul>
						<?php endif; ?>
						<?php if( have_rows('flex_tabs') ): ?>	
						<div class="resp-tabs-container hor_1 col-sm-8 col-lg-9">
						<?php $i = 1; while( have_rows('flex_tabs') ): the_row();
							// vars
							$tabs_content_bg = get_sub_field('flex_tabs_content_bg');
							$tabs_content_title = get_sub_field('flex_tabs_content_title');
							$tabs_content_color = get_sub_field('flex_tabs_content_color');
							$tabs_content = get_sub_field('flex_tabs_content');
							$tabs_content_btn = get_sub_field('flex_tabs_content_btn');
							$tabs_content_btn_link = get_sub_field('flex_tabs_content_btn_link');
							?>								
							<div class="tabcontent fc-tab-<?php echo $i; ?>">
								<div class="tabcontent_contanier">
									<?php if( $tabs_content_bg ) { ?>
									<div class="tabcontent_img">
									 <?php echo wp_get_attachment_image( $tabs_content_bg, 'gallery-800' ); ?>
									</div>
									<?php } ?>
									<div class="tabcontent_content">
										<?php if( $tabs_content_title ) { ?>
										<div class="tabcontent_content_title" style="color:<?php echo $tabs_content_color; ?>;"><?php echo $tabs_content_title; ?></div>
										<?php } ?>
										<?php if( $tabs_content ) { ?>
										<div class="tabcontent_content_text" style="color:<?php echo $tabs_content_color; ?>;"><?php echo $tabs_content; ?></div>
										<?php } ?>
										<?php if( $tabs_content_btn_link ) { ?>
										<a href="<?php echo $tabs_content_btn_link; ?>">
											<button class="section_readmore_link tab_btn">
											<?php echo $tabs_content_btn; ?>
											</button>
										</a>
										<?php } ?>
									</div>
								</div>
							</div>
							<?php $i++;endwhile; ?>								
						</div>
						<?php endif; ?>
					</div>
					<!-- End .qa_tabs -->
				<?php } ?>
				<?php if( $tabs_style == 'tabs-top' ) { ?>		

				<?php } ?>					
			</div>

		</div>
	</section>
	
	<script>					
	jQuery(function($) {

	}); 				
	</script>								
	
	
</div>	
<?php if( $tabs_break ){ ?><div class="break"></div><?php } ?>		
<?php } ?>	