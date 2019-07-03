<?php 
$timeline_block_width = get_sub_field('flex_timeline_block_width');
$timeline_mobile_cols = get_sub_field('flex_timeline_mobile');
$timeline_hide_mobile = get_sub_field('flex_timeline_hide_mobile');
$timeline_order = get_sub_field('flex_timeline_order');
$timeline_animation = get_sub_field('flex_timeline_animation');
$timeline_break = get_sub_field('flex_timeline_break');
$timeline_block_align = get_sub_field('flex_timeline_block_align');

if ( $timeline_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $timeline_mobile_cols;?> <?php echo $timeline_block_width;?> <?php if( $timeline_break ){ ?><?php echo $timeline_block_align; ?><?php } ?>" <?php if( $timeline_order ){ ?>style="order:<?php echo $timeline_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $timeline_animation;?>">
		
		<div class="timeline_block flexible_page_element" itemprop="text">
			<div class="timeline_block_wrap timeline-<?php echo $count;?>">				


				<div class="timeline_block_row">
						<div class="timeline_block_row_wrap">
							<div class="timeline_container_line_top"></div>
						    <div class="swiper-container timeline_container timeline_block_<?php echo $count;?>">
							    <div class="timeline_container_line"></div>
							    <div class="swiper-wrapper">
					            <?php //foreach( $client_slider_image as $image ): ?>
					                <div class="timeline_block_item swiper-slide">
						                <div class="timeline_block_item_inner">
										
											<div class="timeline_block_item_top">1994</div>
											<div class="timeline_block_item_bottom">
												בוגר הפקולטה למשפטים
בהצטיינות באוניברסיטה
העברית בירושליים L.L.B
											</div>
										
						                </div>
					                </div>
					                
					                <div class="timeline_block_item swiper-slide">
						                <div class="timeline_block_item_inner">
										
											<div class="timeline_block_item_top">
												בוגר הפקולטה למשפטים
בהצטיינות באוניברסיטה
העברית בירושליים L.L.B
											</div>
											<div class="timeline_block_item_bottom">1995
											</div>
										
						                </div>
					                </div>

					                <div class="timeline_block_item swiper-slide">
						                <div class="timeline_block_item_inner">
										
											<div class="timeline_block_item_top">												בוגר הפקולטה למשפטים
בהצטיינות באוניברסיטה
העברית בירושליים L.L.B
</div>
											<div class="timeline_block_item_bottom">1997
											</div>
										
						                </div>
					                </div>

					                <div class="timeline_block_item swiper-slide">
						                <div class="timeline_block_item_inner">
										
											<div class="timeline_block_item_top">2005</div>
											<div class="timeline_block_item_bottom">
												בוגר הפקולטה למשפטים
בהצטיינות באוניברסיטה
העברית בירושליים L.L.B
											</div>
										
						                </div>
					                </div>

					                <div class="timeline_block_item swiper-slide">
						                <div class="timeline_block_item_inner">
										
											<div class="timeline_block_item_top">												בוגר הפקולטה למשפטים
בהצטיינות באוניברסיטה
העברית בירושליים L.L.B
</div>
											<div class="timeline_block_item_bottom">2010
											</div>
										
						                </div>
					                </div>
					                
					            <?php //endforeach; ?>
							    </div>
						    </div>

						    <!-- Add Arrows -->
						    <div class="swiper-pagination style1"></div>
						    <div class="swiper-button-next"></div>
						    <div class="swiper-button-prev"></div>
						</div>
				</div>

				<script>					
				jQuery(function($) {
					
				    let options<?php echo $count;?> = {};
				    
				    if ( $(".timeline_block_<?php echo $count;?> .swiper-slide").length > 1 ) {
				        options<?php echo $count;?> = {
				            //direction: 'horizontal',
				            loop: true,
				            slidesPerView : 4,
				            autoplayDisableOnInteraction: false,
							pagination: {
								el: '.timeline-<?php echo $count;?> .swiper-pagination',
								clickable: true,
							},
							navigation: {
								nextEl: '.timeline-<?php echo $count;?> .swiper-button-next',
								prevEl: '.timeline-<?php echo $count;?> .swiper-button-prev',
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
									slidesPerView : 2,
						        }
							}
							        
				        }
				        $('.timeline-<?php echo $count;?> .swiper-button-next').show();
				        $('.timeline-<?php echo $count;?> .swiper-button-prev').show();
				    } else {
				        options<?php echo $count;?> = {
				            loop: false,
				            slidesPerView : 4,
				            autoplay: false,
				            watchOverflow: true,
				            navigation: false,
				        }
				    }
				    var topSlider<?php echo $count;?> = new Swiper('.timeline_block_<?php echo $count;?>', options<?php echo $count;?>);								
					
				}); 				
				</script>								
				
			</div>
		</div>
	</section>
</div>
<?php if( $timeline_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>
