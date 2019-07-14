<!-- Manual Slider MastHead -->
<?php
$slider_height = get_post_meta( get_the_ID(), 'page_top_slider_height', true );
$slider_effect = get_post_meta( get_the_ID(), 'page_top_slider_effect', true );
?>
<style>
	@media (min-width: 992px) {
		.top-video-container {height:<?php echo $slider_height; ?>vh !important;}
		#home_masthead #top-slider .single-slider-img, 
		#home_masthead #top-slider .slides {height:<?php echo $slider_height; ?>vh !important;}
	}
</style>

<div id="home_masthead" itemprop="text">	
	<div class="home_masthead intro-section masthead_manual">	
		<div id="main-top-slider">
			<div class="top-slider-bg top-slider-bg-multiple">
				
			    <div id="top-slider" class="swiper-container <?php echo($slider_effect); ?> swiper-scale-effect" style="direction: ltr;">
				    <?php if( have_rows('page_top_slider_manual') ): ?>
				    <div class="slides single-slider swiper-wrapper">

						<?php 
						while( have_rows('page_top_slider_manual') ): the_row(); 
						$slider_manual_bg = get_sub_field('slider_manual_bg');
						$slider_manual_image = get_sub_field('slider_manual_image');
						$slider_manual_video = get_sub_field('slider_manual_video');
						
						$slider_manual_content = get_sub_field('slider_manual_content');
						$slider_manual_content_position = get_sub_field('slider_manual_content_position');
						$inner_manual_slider = get_sub_field('inner_manual_slider');
						?>
						
						<?php if( $slider_manual_bg == 'image_bg' ) { ?>
						<!-- Masthead Image slide -->
				        <div class="single-slider-img-item single-slider-item swiper-slide">
			                <div class="single-slider-img swiper-slide-cover">
				                
				                <?php //echo wp_get_attachment_image( $slider_image['ID'], 'full' );
				                $manual_image = wp_get_attachment_image_src($slider_manual_image, 'full');
				                 ?>
								<div class="slide-inner" style="background-image:url(<?php echo $manual_image[0]; ?>)">
									<div class="masthead_content wrap row-flex <?php echo($slider_manual_content_position); ?>">
										<div class="masthead_content_container col-xs-12">
											<div class="masthead_content_container_wrap">
												<?php echo $slider_manual_content; ?>
											</div>
											
											<?php if( have_rows('inner_manual_slider') ): ?>
											<div class="inner_manual_slider swiper-container">
												<div class="slides single-slider swiper-wrapper">
												<?php 
												while( have_rows('inner_manual_slider') ): the_row(); 
												$inner_manual_slider_image = get_sub_field('inner_manual_slider_image');
												$inner_manual_slider_title = get_sub_field('inner_manual_slider_title');
												$inner_manual_slider_text = get_sub_field('inner_manual_slider_text');
												$inner_manual_slider_link = get_sub_field('inner_manual_slider_link');
												?>
												<div class="inner_manual_slider_slide swiper-slide">
													<a href="<?php echo $inner_manual_slider_link; ?>" class="inner_manual_slider_link">
													<div class="inner_manual_slider_content">
														<div class="inner_manual_slider_image">
														<?php echo wp_get_attachment_image( $inner_manual_slider_image, 'full' ); ?>
														</div>
														<div class="inner_manual_slider_text">
															<div class="inner_manual_slider_title"><?php echo $inner_manual_slider_title; ?></div>
															<div class="inner_manual_slider_text_wrap"><?php echo $inner_manual_slider_text; ?></div>
														</div>
													</div>
													</a>
												</div>
												<?php endwhile; ?>
											    <!-- Add Arrows -->
											    <div class="swiper-pagination style1"></div>
												</div>
										    </div>
										    
											<script>					
											jQuery(function($) {
											    var innerSlider = new Swiper('.inner_manual_slider', {
											        pagination: '.inner_manual_slider .swiper-pagination',
											        paginationClickable: true,
											        direction: 'horizontal',
											        spaceBetween: 50,
											        nested: true
											    });											
											}); 
											</script>					
										    
											<?php endif; ?>										
										</div>
										
									</div>
								</div>
			                </div>
				        </div>
						<!-- END Masthead Image slide -->
						<?php } ?>
						
						<?php if( $slider_manual_bg == 'video_bg' ) { ?>
						<?php
						//second false skip ACF pre-processcing
						$youtube_vid_title_url = get_sub_field('slider_manual_video', false, false);
						//get wp_oEmed object, not a public method. new WP_oEmbed() would also be possible
						$oembed = _wp_oembed_get_object();
						//get provider
						$provider = $oembed->get_provider($youtube_vid_title_url);
						//fetch oembed data as an object
						$oembed_data = $oembed->fetch( $provider, $youtube_vid_title_url );
						$thumbnail = $oembed_data->thumbnail_url;
						$iframe = $oembed_data->html;
				
						//$v = parse_video_uri( $youtube_vid_title_url ); 
						//$vid = $v['id'];
			
						preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_vid_title_url, $match);
						$youtube_id = $match[1];
						?>
						<!-- Masthead Video slide -->
				        <div class="single-slider-img-item single-slider-item swiper-slide top-video-container-wrap">
			                <div class="single-slider-img swiper-slide-cover top-video-container youtube">
					
								<div id="player" class="desktop-only">
									<?php
									//$iframe = get_field('oembed');
									preg_match('/src="(.+?)"/', $iframe, $matches);
									$src = $matches[1];
									$params = array(
										'controls' => 1,
										//'id' => 'classs',
										'hd' => 1,
										'modestbranding' => 1,
										'autohide' => 1,
										'autoplay' => 1,
										'loop' => 1,
										'volume' => 0,
										'showinfo' => 0,
										'enablejsapi' => 1,
										'rel' => 0,
										'mute' => 1,
										'playlist' => $youtube_id,
										//'start' => 45
										
									);
									
									$new_src = add_query_arg($params, $src);
									$iframe = str_replace($src, $new_src, $iframe);
									// add extra attributes to iframe html
									$attributes = 'frameborder="0"';
									$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
									
									// echo $iframe
									echo $iframe;
									
									?>
								</div>
								
								<img src="https://img.youtube.com/vi/<?php echo $youtube_id; ?>/maxresdefault.jpg">
										
							</div>
							<div class="masthead_content wrap row-flex <?php echo($slider_manual_content_position); ?>">
								<div class="masthead_content_container col-xs-12">
									<div class="masthead_content_container_wrap">
										<?php echo $slider_manual_content; ?>
									</div>
								</div>
							</div>						
						<!-- END Masthead Video slide -->
						<?php } ?>
						
						<?php endwhile; ?>
				    </div>
					<?php endif; ?>
					
				    <!-- Add Pagination
				    <div id="js-pagination1" class="swiper-pagination"></div>
					 -->

				    <!-- Add Arrows -->
				    <div id="js-pagevertical1" class="swiper-pagination style1"></div>
				    <div id="js-next1" class="swiper-button-next"></div>
				    <div id="js-prev1" class="swiper-button-prev"></div>

					 
					<div id="scroll_down">
					  <div class="scroll_down">
						  <a href="#next"><span></span><span></span><span></span></a>
					  </div>
					</div>
			        
			    </div>


			</div>
		</div>
	</div>
</div>