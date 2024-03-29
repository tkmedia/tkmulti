<?php 
$client_slider_width = get_sub_field('flex_client_slider_block_width');
$client_slider_mobile_cols = get_sub_field('flex_client_slider_mobile');
$client_slider_hide_mobile = get_sub_field('flex_client_slider_hide_mobile');
$client_slider_order = get_sub_field('flex_client_slider_order');
$client_slider_animation = get_sub_field('flex_client_slider_animation');
$client_slider_break = get_sub_field('flex_client_slider_break');
$client_slider_block_align = get_sub_field('flex_client_slider_block_align');

$client_src = get_sub_field('flex_client_src');
$client_type = get_sub_field('flex_client_slider_image_type');
$client_slider_count = get_sub_field('flex_client_slider_count');
$client_slider_count_mobile = get_sub_field('flex_client_slider_count_mobile');
$client_slider_size = get_sub_field('flex_client_slider_size');

$client_slider_image_page = get_sub_field( 'flex_client_slider_image' );
$client_slider_image_effect = get_sub_field( 'flex_client_slider_image_effect' );
$client_slider_image = get_option( 'options_client_slider_image' );
$client_slider_image_options = get_field('client_slider_image','option');

$flex_client_title = get_sub_field('flex_client_title');
$flex_client_title_size = get_sub_field('flex_client_title_size');
$flex_client_title_color = get_sub_field('flex_client_title_color');
$flex_client_title_align = get_sub_field('flex_client_title_align');
$flex_client_subtitle = get_sub_field('flex_client_subtitle');
$flex_client_subtitle_size = get_sub_field('flex_client_subtitle_size');
$flex_client_subtitle_color = get_sub_field('flex_client_subtitle_color');

if ( $client_slider_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $client_slider_mobile_cols;?> <?php echo $client_slider_width;?> <?php if( $client_slider_break ){ ?><?php echo $client_slider_block_align; ?><?php } ?>" <?php if( $client_slider_order ){ ?>style="order:<?php echo $client_slider_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $client_slider_animation;?>">
		
		<div class="client_slider flexible_page_element" itemprop="text">
			
			<?php if( $flex_client_title || $flex_client_subtitle ) { ?>
			<div class="masonary_grid_link_title_wrap">
				<?php if( $flex_client_title ) { ?>
				<h2 class="section_title section_flex_title title_<?php echo $flex_client_title_align; ?>" style="text-align:<?php echo $flex_client_title_align; ?> !important;color:<?php echo $flex_client_subtitle_color; ?>;font-size:<?php echo $flex_client_title_size; ?>px;"><?php echo $flex_client_title; ?></h2>
				<?php } ?>
				<?php if( $flex_client_subtitle ) { ?>
				<div class="section_subtitle title_<?php echo $flex_client_title_align; ?>" itemprop="headline" style="text-align:<?php echo $flex_client_title_align; ?> !important;color:<?php echo $flex_client_subtitle_color; ?>;font-size:<?php echo $flex_client_subtitle_size; ?>px;"><?php echo $flex_client_subtitle; ?></div>
				<?php } ?>
			</div>
			<?php } ?>
			
			<div class="client_slider_wrap slider-<?php echo $count;?> type-<?php echo $client_src;?> <?php echo $client_slider_image_effect;?> client-<?php echo $client_type;?>">
				
			<?php if( $client_type == 'slider' ) : ?>				

				<?php if( $client_src == 'option' ) { ?>

				<div class="client_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">
						    <div class="swiper-container client-top-<?php echo $count;?>">
							    <div class="swiper-wrapper">
					            <?php foreach( $client_slider_image_options as $image ): ?>
					                <div class="client_slide_item swiper-slide">
						                <div class="client_slide_item_inner">
										<?php echo wp_get_attachment_image( $image['ID'], $client_slider_size); ?>
						                </div>
					                </div>
					            <?php endforeach; ?>
							    </div>
						    </div>

						    <!-- Add Arrows -->
						    <div id="js-pagevertical-s" class="swiper-pagination style1"></div>
						    <div id="js-next-s" class="swiper-button-next"></div>
						    <div id="js-prev-s" class="swiper-button-prev"></div>
						</div>
					</div>
				</div>
				
				<?php } elseif( $client_src == 'from-page' ) { ?>

				<div class="client_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">
						    <div class="swiper-container client-top-<?php echo $count;?>">
							    <div class="swiper-wrapper">
					            <?php foreach( $client_slider_image_page as $image ): ?>
					                <div class="client_slide_item swiper-slide">
						                <div class="client_slide_item_inner">
										<?php echo wp_get_attachment_image( $image['ID'], $client_slider_size); ?>
						                </div>
					                </div>
					            <?php endforeach; ?>
							    </div>
						    </div>

						    <!-- Add Arrows -->
						    <div class="swiper-pagination style1"></div>
						    <div class="swiper-button-next"></div>
						    <div class="swiper-button-prev"></div>
						</div>
					</div>
				</div>

				<?php } elseif( $client_src == 'from-page-repeater' ) { ?>

				<div class="client_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">
						    <div class="swiper-container client-top-<?php echo $count;?>">
							    <div class="swiper-wrapper">
								<?php $client_item = 1; while ( have_rows('flex_client_slider_repeater') ) : the_row();
								$client_img = get_sub_field('flex_client_slider_r_img');
								$client_title = get_sub_field('flex_client_slider_r_title');
								$client_title_color = get_sub_field('flex_client_slider_r_title_color');
								$client_subtitle = get_sub_field('flex_client_slider_r_subtitle');
								$client_link = get_sub_field('flex_client_slider_r_link');
								?>
									<div class="client_slide_item swiper-slide">
									<?php if( $client_link ){ ?><a href="<?php echo $client_link; ?>"><?php } ?>
										<div class="client_slide_item_inner">
											<div class="client_slide_item_img">
											 <?php echo wp_get_attachment_image( $client_img, $client_slider_size ); ?>
											</div>
											<?php if( $client_title ){ ?>
												<p class="client_title" style="color:<?php echo $client_title_color; ?>;"><?php echo $client_title; ?></p>
											<?php } ?>	
											<?php if( $client_subtitle ) { ?>
												<div class="client_subtitle" style="color:<?php echo $client_title_color; ?>;"><?php echo $client_subtitle; ?></div>
											<?php } ?>
										</div> 
									<?php if( $client_link ){ ?></a><?php } ?>
									</div>
								<?php $client_item++; endwhile; ?>
							    </div>
						    </div>

						    <!-- Add Arrows -->
						    <div class="swiper-pagination style1"></div>
						    <div class="swiper-button-next"></div>
						    <div class="swiper-button-prev"></div>
						</div>
					</div>
				</div>

				<?php } ?>
				
				
				<script>					
				jQuery(function($) {
					
				    let options<?php echo $count;?> = {};
				    
				    if ( $(".client-top-<?php echo $count;?> .swiper-slide").length > 1 ) {
				        options<?php echo $count;?> = {
				            //direction: 'horizontal',
				            loop: true,
				            slidesPerView : <?php echo $client_slider_count;?>,
				            autoplayDisableOnInteraction: false,
							pagination: {
								el: '.slider-<?php echo $count;?> .swiper-pagination',
								clickable: true,
							},
							navigation: {
								nextEl: '.slider-<?php echo $count;?> .swiper-button-next',
								prevEl: '.slider-<?php echo $count;?> .swiper-button-prev',
							},
				            paginationClickable: true,
				            fadeEffect: {
					            crossFade: true
				            },
							speed: 1000,
							grabCursor: true,
							watchSlidesProgress: true,
							mousewheelControl: true,
							keyboardControl: true,
							//effect: 'fade',  
							breakpoints: {
								768: {
									slidesPerView : <?php echo $client_slider_count_mobile;?>,
						        }
							}
							        
				        }
				        $('.slider-<?php echo $count;?> .swiper-button-next').show();
				        $('.slider-<?php echo $count;?> .swiper-button-prev').show();
				    } else {
				        options<?php echo $count;?> = {
				            loop: false,
				            slidesPerView : <?php echo $client_slider_count;?>,
				            autoplay: false,
				            watchOverflow: true,
				            navigation: false,
				        }
				    }
				    var topSlider<?php echo $count;?> = new Swiper('.client-top-<?php echo $count;?>', options<?php echo $count;?>);								
					
				}); 				
				</script>								
			
			<?php endif; ?>
			
			<?php 
			if( $client_type == 'grid' ) :				

			if ( $client_slider_count == 1 ) : $c_md_cols = "12";
			elseif ( $client_slider_count == 2 ) : $c_sm_cols = "6"; $c_md_cols = "6";
			elseif ( $client_slider_count == 3 ) : $c_sm_cols = "6"; $c_md_cols = "4";
			elseif ( $client_slider_count == 4 ) : $c_sm_cols = "6"; $c_md_cols = "3";
			elseif ( $client_slider_count == 5 ) : $c_sm_cols = "6"; $c_md_cols = "20"; 
			elseif ( $client_slider_count == 6 ) : $c_sm_cols = "6"; $c_md_cols = "2";
			elseif ( $client_slider_count == 7 ) : $c_sm_cols = "4"; $c_md_cols = "seven"; 
			elseif ( $client_slider_count == 8 ) : $c_sm_cols = "3"; $c_md_cols = "eight";  
			endif;
			if ( $client_slider_count_mobile == 1 ) : $c_xs_cols = "12";
			elseif ( $client_slider_count_mobile == 2 ) : $c_xs_cols = "6";
			elseif ( $client_slider_count_mobile == 3 ) : $c_xs_cols = "4";
			elseif ( $client_slider_count_mobile == 4 ) : $c_xs_cols = "3";
			endif;			
			 ?>

				<?php if( $client_src == 'option' ) { ?>

				<div class="client_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">
						    <div class="client-top-<?php echo $count;?> row-flex">
					            <?php foreach( $client_slider_image_options as $image ): ?>
					                <div class="client_slide_item col-xs-<?php echo $c_xs_cols; ?> col-sm-<?php echo $c_sm_cols; ?> col-md-<?php echo $c_md_cols; ?>">
						                <div class="client_slide_item_inner">
										<?php echo wp_get_attachment_image( $image['ID'], $client_slider_size); ?>
						                </div>
					                </div>
					            <?php endforeach; ?>
						    </div>
						</div>
					</div>
				</div>
				
				<?php } elseif( $client_src == 'from-page' ) { ?>

				<div class="client_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">
						    <div class="client-top-<?php echo $count;?> row-flex">
					            <?php foreach( $client_slider_image_page as $image ): ?>
					                <div class="client_slide_item col-xs-<?php echo $c_xs_cols; ?> col-sm-<?php echo $c_sm_cols; ?> col-md-<?php echo $c_md_cols; ?>">
						                <div class="client_slide_item_inner">
										<?php echo wp_get_attachment_image( $image['ID'], $client_slider_size); ?>
						                </div>
					                </div>
					            <?php endforeach; ?>
						    </div>
						</div>
					</div>
				</div>

				<?php } elseif( $client_src == 'from-page-repeater' ) { ?>

				<div class="client_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">
						    <div class="client-top-<?php echo $count;?> row-flex">
								<?php $client_item = 1; while ( have_rows('flex_client_slider_repeater') ) : the_row();
								$client_img = get_sub_field('flex_client_slider_r_img');
								$client_title = get_sub_field('flex_client_slider_r_title');
								$client_title_color = get_sub_field('flex_client_slider_r_title_color');
								$client_subtitle = get_sub_field('flex_client_slider_r_subtitle');
								$client_link = get_sub_field('flex_client_slider_r_link');
								?>
									<div class="client_slide_item col-xs-<?php echo $c_xs_cols; ?> col-sm-<?php echo $c_sm_cols; ?> col-md-<?php echo $c_md_cols; ?>">
									<?php if( $client_link ){ ?><a href="<?php echo $client_link; ?>"><?php } ?>
										<div class="client_slide_item_inner">
											<div class="client_slide_item_img">
											 <?php echo wp_get_attachment_image( $client_img, $client_slider_size ); ?>
											</div>
											<?php if( $client_title ){ ?>
												<p class="client_title" style="color:<?php echo $client_title_color; ?>;"><?php echo $client_title; ?></p>
											<?php } ?>	
											<?php if( $client_subtitle ) { ?>
												<div class="client_subtitle" style="color:<?php echo $client_title_color; ?>;"><?php echo $client_subtitle; ?></div>
											<?php } ?>
										</div> 
									<?php if( $client_link ){ ?></a><?php } ?>
									</div>
								<?php $client_item++; endwhile; ?>
						    </div>
						</div>
					</div>
				</div>

				<?php } ?>

			<?php endif; ?>
			
			</div>
		</div>
	</section>
</div>
<?php if( $client_slider_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>
