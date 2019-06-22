<?php 
$img_content_width = get_sub_field('flex_img_content_width');
$img_content_order = get_sub_field('flex_img_content_order');
$img_content_mobile = get_sub_field('flex_img_content_mobile');
$img_content_hide_mobile = get_sub_field('flex_img_content_hide_mobile');

$img_content_style = get_sub_field('flex_img_content_style');
$img_content_type = get_sub_field('flex_img_content_type');
$img_content_title = get_sub_field('flex_img_content_title');
$img_content_subtitle = get_sub_field('flex_img_content_subtitle');
$img_content_title_h = get_sub_field('flex_img_content_title_h');
$img_content_title_s = get_sub_field('flex_img_content_title_s');
$img_content_img = get_sub_field('flex_img_content_img');
$img_content_img_size = get_sub_field('flex_img_content_img_size');
$img_content_text_f = get_sub_field('flex_img_content_text_f');
$img_content_align = get_sub_field('flex_img_content_align');
$img_content_btn = get_sub_field('flex_img_content_btn');
$img_content_link = get_sub_field('flex_img_content_link');
$img_content_btn_color = get_sub_field('flex_img_content_btn_color');	
$img_content_img_layout = get_sub_field('flex_img_content_img_layout');
$img_content_img_bg = get_sub_field('flex_img_content_img_bg');	
$img_content_img_side = get_sub_field('flex_img_content_img_side');	
$img_col_layout = get_sub_field('flex_img_content_col_layout');
$img_content_text_color = get_sub_field('flex_img_content_text_color');					
$img_content_logo = get_sub_field('flex_img_content_logo');
$img_content_animation = get_sub_field('flex_img_content_animation');

if ( $img_content_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $img_content_mobile;?> <?php echo $img_content_width;?>" <?php if( $img_content_order ){ ?>style="order:<?php echo $img_content_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $img_content_animation;?>">

		<div class="flex_img_content flexible_page_element" itemprop="text">
			<div class="flex_img_content_wrap img_content_<?php echo $img_content_style; ?>">
				<div class="flex_img_content_container type_<?php echo $img_content_type; ?>">
					
					<?php if( $img_content_type == 'img_top' ): ?>
						<div class="img_content_item_row">
							<?php if( $img_content_img ){ ?>
							<div class="img_content_item_img">
								<?php echo wp_get_attachment_image( $img_content_img, $img_content_img_size ); ?>
							</div>
							<?php } ?>
							<div class="img_content_item_content content_<?php echo $img_content_align; ?>">
							<?php if( $img_content_title ){ ?>
								<<?php echo $img_content_title_h; ?> class="img_content_title" style="font-size:<?php echo $img_content_title_s; ?>px;">
									<?php echo $img_content_title; ?>
								</<?php echo $img_content_title_h; ?>>
							<?php } ?>	
							<?php if( $img_content_text_f ) { ?>
								<div class="img_content_item_text">
									<?php echo $img_content_text_f; ?>
									
								</div>
							<?php } ?>
							<?php if( $img_content_btn || $img_content_link ){ ?>
								<a href="<?php echo $img_content_link; ?>" class="<?php echo $img_content_btn_color; ?>">
								<button class="section_readmore_link watch_btn hoverLink"><?php echo $img_content_btn; ?></button>
								</a>
							<?php } ?>
							</div>
						</div>
					<?php endif; ?>
					
					<?php if( $img_content_type == 'title_top' ): ?>
						<div class="img_content_item_row">
							<?php if( $img_content_title ){ ?>
							<div class="img_content_title_top content_<?php echo $img_content_align; ?>">
								<<?php echo $img_content_title_h; ?> class="img_content_title" style="font-size:<?php echo $img_content_title_s; ?>px;">
									<?php echo $img_content_title; ?>
								</<?php echo $img_content_title_h; ?>>
							</div>
							<?php } ?>	
							<?php if( $img_content_img ){ ?>
							<div class="img_content_item_img">
								<?php echo wp_get_attachment_image( $img_content_img, $img_content_img_size ); ?>
							</div>
							<?php } ?>
							<div class="img_content_item_content content_<?php echo $img_content_align; ?>">
							<?php if( $img_content_text_f ) { ?>
								<div class="img_content_item_text">
									<?php echo $img_content_text_f; ?>
									
								</div>
							<?php } ?>
							<?php if( $img_content_btn || $img_content_link ){ ?>
								<a href="<?php echo $img_content_link; ?>" class="<?php echo $img_content_btn_color; ?>">
								<button class="section_readmore_link watch_btn hoverLink"><?php echo $img_content_btn; ?></button>
								</a>
							<?php } ?>
							</div>
						</div>
					<?php endif; ?>
					
					<?php if( $img_content_type == 'img_side' ): ?>
						<div class="img_content_item_row row-flex image_<?php echo $img_content_img_layout; ?> side-<?php echo $img_content_img_side; ?>" style="background:<?php echo $img_content_img_bg; ?>;">
							<div class="img_content_item_content Aligner col-xs-12 <?php echo $img_col_layout; ?> content_<?php echo $img_content_align; ?>">
							<?php if( $img_content_text_f || $img_content_title ) { ?>
								<div class="img_content_item_text" style="color:<?php echo $img_content_text_color; ?>;">
									<div class="img_content_item_text_inner">
										<div class="img_content_item_title">	
											<?php if( $img_content_title ){ ?>
												<<?php echo $img_content_title_h; ?> class="img_content_title" style="font-size:<?php echo $img_content_title_s; ?>px;">
													<?php echo $img_content_title; ?>
												</<?php echo $img_content_title_h; ?>>
											<?php } ?>	
											<?php if( $img_content_subtitle ){ ?>
												<p class="img_content_subtitle">
													<?php echo $img_content_subtitle; ?>
												</p>
											<?php } ?>	
										</div>
										<?php if( $img_content_text_f ){ ?>
										<div class="img_content_text_f"><?php echo $img_content_text_f; ?></div>
										<?php } ?>
										<?php if( $img_content_btn || $img_content_link ){ ?>
										<div class="img_content_item_button btn_<?php echo $img_content_btn_color; ?>">
											<a href="<?php echo $img_content_link; ?>" class="<?php echo $img_content_btn_color; ?>">
											<button class="section_readmore_link watch_btn hoverLink"><?php echo $img_content_btn; ?></button>
											</a>
										</div>
										<?php } ?>
									</div>
								</div>
							<?php } ?>
							</div>

							<?php if( $img_content_img ){ ?>
							<div class="img_content_item_img col-xs-12 <?php echo $img_col_layout; ?> <?php echo $img_content_img_side; ?>">
								<?php echo wp_get_attachment_image( $img_content_img, $img_content_img_size ); ?>
							</div>
							<?php } ?>
						</div>
							<?php if( $img_content_logo ){ ?>
							<div class="img_content_logo">
								<?php echo wp_get_attachment_image( $img_content_logo, 'full' ); ?>
							</div>
							<?php } ?>


					<?php endif; ?>
					
				</div>
			</div>
		</div>	
		
	</section>
	<script>
	jQuery(function($) {
		$(window).load(function(){
			get_content_height();
		    //function to get current div height
		    function get_content_height(){
		        //var footer_height = $('#footer_container').height();
		        var content_height = $('.section-<?php echo $row;?>-<?php echo $count;?> .flex_img_content_container.type_img_side .img_content_item_content').outerHeight();
		        $('.section-<?php echo $row;?>-<?php echo $count;?> .flex_img_content_container.type_img_side .img_content_item_img').css('height', content_height);
		    }
	    });	
	}); 
	</script>
	
</div>
<?php } ?>
