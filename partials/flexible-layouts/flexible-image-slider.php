<?php 
$gallery_slider_width = get_sub_field('flex_gallery_slider_block_width');
$gallery_slider_mobile_cols = get_sub_field('flex_gallery_slider_mobile');
$gallery_slider_hide_mobile = get_sub_field('flex_gallery_slider_hide_mobile');
$gallery_slider_order = get_sub_field('flex_gallery_slider_order');

$gallery_slider_title = get_sub_field('flex_gallery_slider_title');
$gallery_slider_subtitle = get_sub_field('flex_gallery_slider_subtitle');
$gallery_slider_title_a = get_sub_field('flex_gallery_slider_title_a');
$gallery_slider_text = get_sub_field('flex_gallery_slider_text');
$gallery_slider_image = get_sub_field('flex_gallery_slider_image');
$gallery_slider_count = get_sub_field('flex_gallery_slider_count');
$gallery_slider_count_mobile = get_sub_field('flex_gallery_slider_count_mobile');
$gallery_slider_size = get_sub_field('flex_gallery_slider_size');
$gallery_slider_thumbs = get_sub_field('flex_gallery_slider_thumbs');
$gallery_slider_fancybox = get_sub_field('flex_gallery_slider_fancybox');
$gallery_slider_animation = get_sub_field('flex_gallery_slider_animation');
$gallery_slider_thumb_count = get_sub_field('flex_gallery_slider_thumb_count');

if ( $gallery_slider_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $gallery_slider_mobile_cols;?> <?php echo $gallery_slider_width;?>" <?php if( $gallery_slider_order ){ ?>style="order:<?php echo $gallery_slider_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $gallery_slider_animation;?>">
		
		<div class="gallery_slider flexible_page_element" itemprop="text">
			<div class="gallery_slider_wrap slider-<?php echo $count;?>">				
				<?php if( $gallery_slider_title ) { ?>
				<h2 class="section_title section_flex_title title_<?php echo $gallery_slider_title_a; ?>" style="text-align:<?php echo $gallery_slider_title_a; ?> !important;"><?php echo $gallery_slider_title; ?></h2>
				<?php } ?>				
				<?php if( $gallery_slider_subtitle ) { ?>
				<div class="gallery_slider_subtitle title_<?php echo $gallery_slider_title_a; ?>"><p><?php echo $gallery_slider_subtitle; ?></p></div>
				<?php } ?>
				
				<?php if( $gallery_slider_thumbs == 'slider_thumbs' && $gallery_slider_count == '1' ): ?>

				<div class="gallery_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">
							
							<div class="swiper-container gallery-big-<?php echo $count;?>">
								<div class="swiper-wrapper">
								<?php foreach( $gallery_slider_image as $s_image ): ?>
								
									<div class="gallery_slide_item swiper-slide">
										<div class="swiper-slide-cover">
											<div class="slide-inner">
												<?php if( $gallery_slider_fancybox ) { ?>
												<a class="image-zoom" data-fancybox="gallery" data-caption="<?php echo $s_image['alt']; ?>" href="<?php echo $s_image['url']; ?>">
												<div class="image-hover">
												<?php } ?>
												<?php echo wp_get_attachment_image( $s_image['ID'], $gallery_slider_size ); ?>
												<?php if( $gallery_slider_fancybox ) { ?>
												</div>
												<i class="fal fa-search-plus"></i>
												</a>
												<?php } ?>
											</div>
										</div>
									</div>
			
								<?php endforeach; ?>
								</div>
							</div>
							<div class="gallery-thumbs-wrap">
								<div class="gallery-thumbs-bg">
									<div class="swiper-container gallery-thumbs-<?php echo $count;?>">
										<div class="swiper-wrapper">
										<?php foreach( $gallery_slider_image as $s_thumb ): ?>
											<div class="swiper-slide">
												<div class="swiper-slide-cover">
													<div class="slide-inner">
														<?php echo wp_get_attachment_image( $s_thumb['ID'], 'article-400' ); ?>
													</div>
												</div>
											</div>
										<?php endforeach; ?>
										</div>
									</div>
								</div>
							</div>
						    <!-- Arrows -->
						    <div class="swiper-button-next"></div>
						    <div class="swiper-button-prev"></div>

						</div>
					</div>
				</div>
				
				<?php else: ?>

				<div class="gallery_slider_col gallery_slider_image">
					<div class="summary-gallery-new">
						<div class="full-nomargin">

							<?php if( $gallery_slider_fancybox ) { ?>
						    <div class="swiper-container gallery-top-<?php echo $count;?>">
							    <div class="swiper-wrapper">
					            <?php foreach( $gallery_slider_image as $image ): ?>
					                <div class="gallery_slide_item swiper-slide">
						                <?php if( $gallery_slider_fancybox ) { ?>
						                <a class="image-zoom" data-fancybox="gallery" href="<?php echo $image['url']; ?>" data-caption="<?php echo $s_image['alt']; ?>">
							                <div class="image-hover">
							                <?php } ?>
											<?php echo wp_get_attachment_image( $image['ID'], $gallery_slider_size); ?>
							                <?php if( $gallery_slider_fancybox ) { ?>
							                </div>
							                <i class="far fa-search"></i>
						                </a>
						                <?php } ?>
					                </div>
					            <?php endforeach; ?>
							    </div>
						    </div>
							<?php } else { ?>
						    <div class="swiper-container gallery-top-<?php echo $count;?>">
							    <div class="swiper-wrapper">
					            <?php foreach( $gallery_slider_image as $image ): ?>
					                <div class="gallery_slide_item swiper-slide">
										<?php echo wp_get_attachment_image( $image['ID'], $gallery_slider_size); ?>
										<?php //echo wp_get_attachment_image( $image, $gallery_slider_size ); ?>
					                </div>
					                <i class="fal fa-search-plus"></i>
					            <?php endforeach; ?>
							    </div>
						    </div>
						    <?php } ?>
						    <!-- Add Arrows -->
						    <div id="js-pagevertical-s" class="swiper-pagination style1"></div>
						    <div id="js-next-s" class="swiper-button-next"></div>
						    <div id="js-prev-s" class="swiper-button-prev"></div>

						</div>
					</div>
				</div>

				<?php endif; ?>
				<script>					
				jQuery(function($) {
					
				    let options<?php echo $count;?> = {};
				    
				    if ( $(".gallery-top-<?php echo $count;?> .swiper-slide").length > 1 ) {
				        options<?php echo $count;?> = {
				            //direction: 'horizontal',
				            loop: true,
				            slidesPerView : <?php echo $gallery_slider_count;?>,
				            autoplayDisableOnInteraction: false,
							pagination: {
								el: '#js-pagination1',
								clickable: true,
							},
							navigation: {
								nextEl: '.slider-<?php echo $count;?> #js-next-s',
								prevEl: '.slider-<?php echo $count;?> #js-prev-s',
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
									slidesPerView : <?php echo $gallery_slider_count_mobile;?>,
						        }
							}
							        
				        }
				        $('.slider-<?php echo $count;?> #js-next-s').show();
				        $('.slider-<?php echo $count;?> #js-prev-s').show();
				    } else {
				        options<?php echo $count;?> = {
				            loop: false,
				            slidesPerView : <?php echo $gallery_slider_count;?>,
				            autoplay: false,
				            watchOverflow: true,
				            navigation: false,
				        }
				    }
				    var topSlider<?php echo $count;?> = new Swiper('.gallery-top-<?php echo $count;?>', options<?php echo $count;?>);								
					var galleryThumbs = new Swiper('.gallery-thumbs-<?php echo $count;?>', {
						spaceBetween: 0,
						slidesPerView: <?php echo $gallery_slider_thumb_count;?>,
						loop: true,
						freeMode: true,
						loopedSlides: 5, //looped slides should be the same
						watchSlidesVisibility: true,
						watchSlidesProgress: true,
						breakpoints: {
							768: {
								slidesPerView : 3,
					        }
						}
				    });
				    var galleryTop = new Swiper('.gallery-big-<?php echo $count;?>', {
						spaceBetween: 0,
						loop:true,
						loopedSlides: 5, //looped slides should be the same
						navigation: {
						nextEl: '.swiper-button-next',
						prevEl: '.swiper-button-prev',
						},
						thumbs: {
							swiper: galleryThumbs,
						},
				    });
					
					
				}); 				
				</script>								
				
			</div>
		</div>

		
		
		
	</section>
</div>
<?php } ?>
