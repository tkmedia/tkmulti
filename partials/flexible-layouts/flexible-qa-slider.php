<?php 
$qa_slider_block_width = get_sub_field('flex_qa_slider_block_width');
$qa_slider_order = get_sub_field('flex_qa_slider_order');
$qa_slider_mobile = get_sub_field('flex_qa_slider_mobile');
$qa_slider_hide_mobile = get_sub_field('flex_qa_slider_hide_mobile');
$qa_slider_break = get_sub_field('flex_qa_slider_break');
$qa_slider_block_align = get_sub_field('flex_qa_slider_block_align');

$qa_slider_qa = get_sub_field('flex_qa_slider');
$qa_slider_title = get_sub_field('flex_qa_slider_title');
$qa_slider_subtitle = get_sub_field('flex_qa_slider_subtitle');
$qa_slider_page_btn = get_sub_field('flex_qa_slider_page_btn');
$qa_slider_page_link = get_sub_field('flex_qa_slider_page_link');
$qa_slider_form_btn = get_sub_field('flex_qa_slider_form_btn');
$qa_slider_form_link = get_sub_field('flex_qa_slider_form_link');
$qa_slider_form_btn_link = get_sub_field('flex_qa_slider_form_btn_link');
$qa_slider_animation = get_sub_field('flex_qa_slider_animation');

if ( $qa_slider_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $qa_slider_mobile;?> <?php echo $qa_slider_block_width;?> <?php if( $qa_slider_break ){ ?><?php echo $qa_slider_block_align; ?><?php } ?>" <?php if( $qa_slider_order ){ ?>style="order:<?php echo $qa_slider_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $qa_slider_animation;?>">

		<div class="qa_slider flexible_page_element" itemprop="text">
			<div class="qa_slider_container">
				<div class="qa_slider_wrap">
					<div class="qa_slider_row">
						<span class="icon-quote qa-quote-top"></span>
						<div class="qa_slider_col">
		
							<?php if( $qa_slider_title ) { ?>
								<div class="qa_slider_title section_title section_title_small" itemprop="headline"><?php echo $qa_slider_title; ?></div>
							<?php } ?>	
							<?php if( $qa_slider_subtitle ) { ?>
								<div class="qa_slider_subtitle section_subtitle section_title_large" itemprop="headline"><?php echo $qa_slider_subtitle; ?></div>
							<?php } ?>
							
						    <div class="qa_slider_<?php echo $row;?>_<?php echo $count;?>">
								<div class="qa_slider_items home_qa_items swiper-container">
								<?php if( have_rows('flex_qa_slider') ): ?>
									<div class="qa_slider_item_wrap home_qa_item_wrap swiper-wrapper">
									<?php while( have_rows('flex_qa_slider') ): the_row(); 
										$qa_slider_question = get_sub_field('flex_qa_slider_question');
										$qa_slider_answer = get_sub_field('flex_qa_slider_answer');
										?>								
										<div class="qa_slider_item home_qa_item swiper-slide">
											<div class="qa_slider_question">
												<div class="question_pre qa_slider_pre">
													<span><?php _e('Question', 'tkmulti'); ?></span>
												</div>
												<div class="question"><?php echo $qa_slider_question; ?></div>
											</div>
											<div class="qa_slider_answer">
												<div class="answer_pre qa_slider_pre">
													<span><?php _e('Answer', 'tkmulti'); ?></span>
												</div>
												<div class="answer"><?php echo $qa_slider_answer; ?></div>
											</div>
										</div>
										
									<?php endwhile; ?>
									</div>
								<?php endif; ?>
								</div>
							</div>
						    <!-- Add Arrows -->
						    <!-- <div id="js-pagination-<?php echo $row;?>-<?php echo $count;?>" class="swiper-pagination style1"></div> -->
						    <div id="js-next-<?php echo $row;?>-<?php echo $count;?>" class="swiper-button-next"></div>
						    <div id="js-prev-<?php echo $row;?>-<?php echo $count;?>" class="swiper-button-prev"></div>
							
							<div class="qa_slider_btn_container">
								<div class="qa_slider_btn_row row-flex center-xs middle-xs">
									
									<?php if( $qa_slider_form_btn || $qa_slider_page_btn) { ?>
									<div class="qa_slider_btn_col col-xs-12 col-sm">
										<?php if( $qa_slider_form_btn_link ) { ?>
										<a data-fancybox data-src="#popop-form-<?php echo $row;?>-<?php echo $count;?>" href="javascript:;">
										<?php } ?>
											<button class="section_readmore_link watch_btn hoverLink style3">
												<span class="icon-pin-it"></span>
												<span><?php echo $qa_slider_form_btn; ?></span>
											</button>										
										<?php if( $qa_slider_form_btn_link ) { ?>	
										</a>
										<?php } ?>
										
										<?php if( $qa_slider_page_link ) { ?>
										<a class="page-article-link" href="<?php echo $qa_slider_page_link; ?>" rel="bookmark">
										<?php } ?>
											<button class="section_readmore_link watch_btn hoverLink style3">
												<span class="icon-eye"></span>
												<span><?php echo $qa_slider_page_btn; ?></span>
											</button>										
										<?php if( $qa_slider_page_link ) { ?>	
										</a>
										<?php } ?>
										
									<?php } ?>
									
								</div>
							</div>
												
						</div>
						<span class="icon-quote qa-quote-bottom"></span>
					</div>
				</div>
			</div>
		</div>

		<?php 
		$popup_contact_title = get_option( 'options_default_flex_form_title' );
		$popup_contact_subtext = get_option( 'options_default_flex_form_subtitle' );
		?>
		<div style="display: none;" id="popop-form-<?php echo $row;?>-<?php echo $count;?>" class="button-popop-form">
		
			<div class="button-popop-form-wrap">
				
				<div class="button-popop-form-row">
					<div class="button-popop-form-col form-image col-xs-12">
						<?php if( $popup_contact_title ) { ?>
						<div class="contact-title">
							<div class="popup_contact_title"><?php echo $popup_contact_title; ?></div>
						</div>
						<?php } ?>
						<?php if( $popup_contact_subtext ) { ?>
						<div class="contact-title">
							<div class="popup_contact_subtext"><?php echo $popup_contact_subtext; ?></div>
						</div>
						<?php } ?>
						<div class="contact-form-page">
							<div class="full_form_id">
								<div class="full_form_id_wrap">
									<?php echo do_shortcode( '[contact-form-7 id="'.$qa_slider_form_btn_link.'" ]' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		
		</div>
		

	<script>					
	jQuery(function($) {
		//* ## Page Link Slider */
	    let options<?php echo $row;?><?php echo $count;?> = {};
	    
	    if ( $("#section-<?php echo $row;?>-<?php echo $count;?> .swiper-slide").length > 1 ) {
	        options<?php echo $row;?><?php echo $count;?> = {
	            //direction: 'horizontal',
	            loop: true,
	            slidesPerView : 1,
	            autoplayDisableOnInteraction: false,
				pagination: {
					el: '#section-<?php echo $row;?>-<?php echo $count;?> .swiper-pagination',
					clickable: true,
				},
				navigation: {
					nextEl: '#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-next',
					prevEl: '#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-prev',
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
						navigation: false,
			        }
				}
				        
	        }
	        //$('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-next').show();
	        //$('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-prev').show();
	    } else {
	        options<?php echo $row;?><?php echo $count;?> = {
	            loop: false,
	            slidesPerView : 1,
	            autoplay: false,
	            watchOverflow: true,
	            navigation: false,
	        }
	    }
	    var qaSlider<?php echo $row;?><?php echo $count;?> = new Swiper('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-container ', options<?php echo $row;?><?php echo $count;?>);	
	    
	    if ( $("#section-<?php echo $row;?>-<?php echo $count;?> .swiper-slide:not(.swiper-slide-duplicate)").length > 1 ) {
	        $('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-next').show();
	        $('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-prev').show();		    
	    }							

	}); 
					
	</script>					
	</section>
</div>
<?php if( $qa_slider_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>
