<?php 
$video_block_width = get_sub_field('flex_video_block_width');
$video_break = get_sub_field('flex_video_break');
$video_block_align = get_sub_field('flex_video_block_align');
$video_order = get_sub_field('flex_video_order');
$video_mobile = get_sub_field('flex_video_mobile');
$video_hide_mobile = get_sub_field('flex_video_hide_mobile');
$video_animation = get_sub_field('flex_video_animation');

$video_open_style = get_sub_field('flex_video_open_style');
$video_image_type = get_sub_field('flex_video_image_type');
$video_image = get_sub_field('flex_video_image');
$video_link = get_sub_field('flex_video_link');

$video_display = get_sub_field('flex_video_display');

$video_title = get_sub_field('flex_video_title');
$video_subtitle = get_sub_field('flex_video_subtitle');
$video_title_size = get_sub_field('flex_video_title_size');
$video_subtitle_size = get_sub_field('flex_video_subtitle_size');
$video_color = get_sub_field('flex_video_title_color');
$video_subtitle_color = get_sub_field('flex_video_subtitle_color');
$video_title_a = get_sub_field('flex_video_title_a');


if ( $video_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $video_mobile;?> <?php echo $video_block_width;?> <?php if( $video_break ){ ?><?php echo $video_block_align; ?><?php } ?>" <?php if( $video_order ){ ?>style="order:<?php echo $video_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>"<?php if( $video_animation ){ ?> data-aos="<?php echo $video_animation;?>"<?php } ?>>
		
		<div class="content_youtube_vid flexible_page_element <?php echo $video_open_style;?> <?php echo $video_image_type;?>" itemprop="text">
			<div class="content_youtube_vid_wrap">
				
			<?php if( $video_title || $video_subtitle ) { ?>
			<div class="video_title_wrap">
				<?php if( $video_title ) { ?>
				<h2 class="section_title section_flex_title title_<?php echo $video_title_a; ?>" style="text-align:<?php echo $video_title_a; ?> !important;color:<?php echo $video_title_color; ?>;font-size:<?php echo $video_title_size; ?>px;"><?php echo $video_title; ?></h2>
				<?php } ?>
				<?php if( $video_subtitle ) { ?>
				<div class="section_subtitle title_<?php echo $video_title_a; ?>" itemprop="headline" style="text-align:<?php echo $video_title_a; ?> !important;color:<?php echo $video_subtitle_color; ?>;font-size:<?php echo $video_subtitle_size; ?>px;"><?php echo $video_subtitle; ?></div>
				<?php } ?>
			</div>
			<?php } ?>
				
			<?php if( $video_display == 'video-single' ):
			//second false skip ACF pre-processcing
			$youtube_vid_url = get_sub_field('flex_video_link', false, false);
			//get wp_oEmed object, not a public method. new WP_oEmbed() would also be possible
			$oembed = _wp_oembed_get_object();
			//get provider
			$provider = $oembed->get_provider($youtube_vid_url);
			//fetch oembed data as an object
			$oembed_data = $oembed->fetch( $provider, $youtube_vid_url );
			$thumbnail = $oembed_data->thumbnail_url;
			$iframe = $oembed_data->html;
			preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_vid_url, $match);
			$youtube_id = $match[1];
			
			 ?>									
				<?php if( $video_open_style == 'on-page' ): ?>
					<div class="content_youtube_vid_container">
						<?php
						//$iframe = get_field('oembed');
						preg_match('/src="(.+?)"/', $iframe, $matches);
						$src = $matches[1];
						$params = array(
							'controls' => 1,
							'hd' => 1,
							//'id' => 'classs',
							'hd' => 1,
							'modestbranding' => 1,
							'autohide' => 1,
							//'autoplay' => 0,
							'loop' => 1,
							'volume' => 0,
							'showinfo' => 0,
							'enablejsapi' => 1,
							'rel' => 0
						);
						
						$new_src = add_query_arg($params, $src);
						$iframe = str_replace($src, $new_src, $iframe);
						// add extra attributes to iframe html
						$attributes = 'frameborder="0"';
						$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
						
						// echo $iframe
						echo $iframe; ?>
					</div>
				<?php endif; ?>
		
				<?php if( $video_open_style == 'in-popup' ): ?>
				<div class="media_item_video">
					<a data-fancybox href="<?php echo $youtube_vid_url; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $youtube_id; ?>" class="">	
						<div class="video_grid_item_bg_1 video_item_bg img_youtube">
				            <?php if( $video_image_type == 'from-vid' ): ?>
				            <img src="https://img.youtube.com/vi/<?php echo $youtube_id; ?>/maxresdefault.jpg">
				            <?php endif; ?>
				            <?php if( $video_image_type == 'custom-img' ): ?>
				            <?php echo wp_get_attachment_image( $video_image, 'inside-post' ); ?>
				            <?php endif; ?>						            
							<div class="video_overlay"><i class="fab fa-youtube"></i></div>
						</div>
					</a>
				</div>	
				<?php endif; ?>
			
			<?php elseif( $video_display == 'video-slider' ): ?>
			
				<div class="swiper-container video_slider_container video_slider_<?php echo $count;?>">
					<div class="video_slider_item_row swiper-wrapper">
					<?php $vid_item = 1; while ( have_rows('flex_video_slider') ) : the_row();
					$video_slider_img = get_sub_field('flex_video_slider_img');
					$video_slider_title = get_sub_field('flex_video_slider_title');
					$video_slider_title_color = get_sub_field('flex_video_slider_title_color');
					$video_slider_link = get_sub_field('flex_video_slider_link');
					
					//second false skip ACF pre-processcing
					$youtube_vid_url = get_sub_field('flex_video_slider_link', false, false);
					//get wp_oEmed object, not a public method. new WP_oEmbed() would also be possible
					$oembed = _wp_oembed_get_object();
					//get provider
					$provider = $oembed->get_provider($youtube_vid_url);
					//fetch oembed data as an object
					$oembed_data = $oembed->fetch( $provider, $youtube_vid_url );
					$thumbnail = $oembed_data->thumbnail_url;
					$iframe = $oembed_data->html;
					preg_match('%(?:youtube(?:-nocookie)?\.com/(?:[^/]+/.+/|(?:v|e(?:mbed)?)/|.*[?&]v=)|youtu\.be/)([^"&?/ ]{11})%i', $youtube_vid_url, $match);
					$youtube_id = $match[1];
					?>
						<div class="video_slider_item swiper-slide item-<?php echo $vid_item;?>">
							<div class="video_slider_item_title">
								<div class="video_item_title" style="color:<?php echo $video_slider_title_color; ?>;"><?php echo $video_slider_title; ?></div>
							</div>
						<?php if( $video_open_style == 'on-page' ): ?>
							<div class="content_youtube_vid_container">
								<?php
								//$iframe = get_field('oembed');
								preg_match('/src="(.+?)"/', $iframe, $matches);
								$src = $matches[1];
								$params = array(
									'controls' => 1,
									'hd' => 1,
									//'id' => 'classs',
									'hd' => 1,
									'modestbranding' => 1,
									'autohide' => 1,
									//'autoplay' => 0,
									'loop' => 1,
									'volume' => 0,
									'showinfo' => 0,
									'enablejsapi' => 1,
									'rel' => 0
								);
								
								$new_src = add_query_arg($params, $src);
								$iframe = str_replace($src, $new_src, $iframe);
								// add extra attributes to iframe html
								$attributes = 'frameborder="0"';
								$iframe = str_replace('></iframe>', ' ' . $attributes . '></iframe>', $iframe);
								
								// echo $iframe
								echo $iframe; ?>
							</div>
						<?php endif; ?>
				
						<?php if( $video_open_style == 'in-popup' ): ?>
							<div class="media_item_video">
								<a data-fancybox href="<?php echo $youtube_vid_url; ?>&amp;autoplay=1&amp;rel=0&amp;controls=1&amp;loop=1&amp;playlist=<?php echo $youtube_id; ?>" class="">	
									<div class="video_grid_item_bg_1 video_item_bg img_youtube">
							            <?php if( $video_image_type == 'from-vid' ): ?>
							            <img src="https://img.youtube.com/vi/<?php echo $youtube_id; ?>/maxresdefault.jpg">
							            <?php endif; ?>
							            <?php if( $video_image_type == 'custom-img' ): ?>
							            <div class="video_item_custom_bg"><?php echo wp_get_attachment_image( $video_slider_img, 'inside-post' ); ?></div>
							            <?php endif; ?>						            
										<div class="video_overlay"><i class="fab fa-youtube"></i></div>
									</div>
								</a>
							</div>	
						<?php endif; ?>
						</div>

				    <?php $vid_item++; endwhile; ?>
					</div>
				</div>
			    <!-- Add Arrows -->
			    <div class="swiper-pagination"></div>
			    <div class="swiper-button-next"></div>
			    <div class="swiper-button-prev"></div>

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
						        },
								520: {
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
				    var topSlider<?php echo $row;?><?php echo $count;?> = new Swiper('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-container ', options<?php echo $row;?><?php echo $count;?>);	
				    			
				}); 
								
				</script>	
			
			<?php endif; ?>				
			</div>
		</div>
	</section>
</div>
<?php if( $video_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>