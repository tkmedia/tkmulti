<?php 
$client_slider_width = get_sub_field('flex_client_slider_block_width');
$client_slider_mobile_cols = get_sub_field('flex_client_slider_mobile');
$client_slider_hide_mobile = get_sub_field('flex_client_slider_hide_mobile');
$client_slider_order = get_sub_field('flex_client_slider_order');
$client_slider_animation = get_sub_field('flex_client_slider_animation');
$client_slider_break = get_sub_field('flex_client_slider_break');
$client_slider_block_align = get_sub_field('flex_client_slider_block_align');

$client_src = get_sub_field('flex_client_src');
$client_slider_count = get_sub_field('flex_client_slider_count');
$client_slider_count_mobile = get_sub_field('flex_client_slider_count_mobile');
$client_slider_size = get_sub_field('flex_client_slider_size');

$client_slider_image = get_option( 'options_client_slider_image' );
$client_slider_image_options = get_field('client_slider_image','option');

if ( $client_slider_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $client_slider_mobile_cols;?> <?php echo $client_slider_width;?> <?php if( $client_slider_break ){ ?><?php echo $client_slider_block_align; ?><?php } ?>" <?php if( $client_slider_order ){ ?>style="order:<?php echo $client_slider_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $client_slider_animation;?>">
		
		<div class="client_slider flexible_page_element" itemprop="text">
			<div class="client_slider_wrap slider-<?php echo $count;?>">				

				<?php if( $client_src == 'option' ): ?>

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
				
				<?php elseif( $client_src == 'from-page' ): ?>

				<div class="client_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">
						    <div class="swiper-container client-top-<?php echo $count;?>">
							    <div class="swiper-wrapper">
					            <?php foreach( $client_slider_image as $image ): ?>
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

				<?php endif; ?>
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
				
			</div>
		</div>
	</section>
</div>
<?php if( $client_slider_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>
