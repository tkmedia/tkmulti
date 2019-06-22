<!-- MastHead -->
<?php
$slider_height = get_post_meta( get_the_ID(), 'mobile_page_top_slider_height', true );
$slider_effect = get_post_meta( get_the_ID(), 'mobile_page_top_slider_effect', true );
$title_location = get_post_meta( get_the_ID(), 'mobile_page_masthead_title_location', true );
$title_hor = get_post_meta( get_the_ID(), 'mobile_page_masthead_title_hor', true );
$title_ver = get_post_meta( get_the_ID(), 'mobile_page_masthead_title_ver', true );

$btn_style = get_post_meta( get_the_ID(), 'mobile_page_masthead_btn_style', true );
$btn1_text = get_post_meta( get_the_ID(), 'mobile_page_masthead_btn1_text', true );
$btn1_link = get_post_meta( get_the_ID(), 'mobile_page_masthead_btn1_link', true );
$btn2_text = get_post_meta( get_the_ID(), 'mobile_page_masthead_btn2_text', true );
$btn2_link = get_post_meta( get_the_ID(), 'mobile_page_masthead_btn2_link', true );

$page_top_slider_content = get_post_meta( get_the_ID(), 'mobile_page_top_slider_content', true );
?>

<style>
	@media (min-width: 992px) {
		.top-video-container {height:<?php echo $slider_height; ?>vh !important;}
		#home_masthead #top-slider .single-slider-img, 
		#home_masthead #top-slider .slides {height:<?php echo $slider_height; ?>vh !important;}
	}
</style>

<div id="home_masthead" itemprop="text">	
	<div class="home_masthead intro-section <?php echo($title_location); ?>">	
	<!-- Top Slider -->
		<div id="main-top-slider">

		<?php if( $page_top_slider_content == 'youtube_vid' ) { ?>
				
			<?php
			//second false skip ACF pre-processcing
			$youtube_vid_title_url = get_field('mobile_page_top_slider_youtube_vid', false, false);
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
		
			<div id="top-slider" class="top-video-container-wrap">
				<div id="top-video-container" class="top-video-container youtube">
		
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
				<div class="masthead_content wrap row-flex <?php echo($title_hor); ?>-xs <?php echo($title_ver); ?>-xs <?php echo($title_location); ?>">
					<div class="masthead_content_container col-xs-12">
						<div class="masthead_content_container_wrap">
							
						<?php 							
						if ($title_location == 'slider_content_bottom' ) {
							$title_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_title_color', true );
							$text_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_text_color', true );
							$btn_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_btn_color', true );
							$btn_bg_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_btn_bg_color', true );
							$page_masthead_title = get_post_meta( get_the_ID(), 'mobile_page_masthead_title', true );
							$page_masthead_text = get_post_meta( get_the_ID(), 'mobile_page_masthead_text', true );
							$masthead_title_hide = get_post_meta( get_the_ID(), 'mobile_page_masthead_title_hide', true );

							?>
							<?php if( !$masthead_title_hide ) { ?>
							<h1 class="entry-title masthead_content_title" itemprop="headline" style="color: <?php echo($title_color); ?>;">
								<?php if( $page_masthead_title ) { ?>
									<?php echo $page_masthead_title; ?>
								<?php } else { ?>
									<?php the_title(); ?>
								<?php } ?>
							</h1>
							<?php } ?>
							<?php if( $page_masthead_text ) { ?>
							<div class="home_masthead_text" style="color: <?php echo($text_color); ?>;"><?php echo $page_masthead_text; ?></div>
							<?php } ?>

							<?php if( $btn1_link ) { ?> 
							<div class="custom_icon_btn masthead_btn <?php echo $btn_style; ?>">
								<a href="<?php echo $btn1_link; ?>" class="masthead_btn_link">
									<button class="section_readmore_link watch_btn hoverLink" style="color:<?php echo $btn_color; ?>;background:<?php echo $btn_bg_color; ?>;"><?php echo $btn1_text; ?></button>
								</a>
							</div>
							<?php } ?>						
							<?php if( $btn2_link ) { ?> 
							<div class="custom_icon_btn masthead_btn <?php echo $btn_style; ?>">
								<a href="<?php echo $btn2_link; ?>" class="masthead_btn_link">
									<button class="section_readmore_link watch_btn hoverLink" style="color:<?php echo $btn_color; ?>;background:<?php echo $btn_bg_color; ?>;"><?php echo $btn2_text; ?></button>
								</a>
							</div>
							<?php } ?>						
						
						<?php } else { 
							$title_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_title_color', true );
							$text_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_text_color', true );
							$btn_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_btn_color', true );
							$btn_bg_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_btn_bg_color', true );
							$page_masthead_title = get_post_meta( get_the_ID(), 'mobile_page_masthead_title', true );
							$page_masthead_text = get_post_meta( get_the_ID(), 'mobile_page_masthead_text', true );
							$masthead_title_hide = get_post_meta( get_the_ID(), 'mobile_page_masthead_title_hide', true );
						?>
							<?php if( !$masthead_title_hide ) { ?>
							<h1 class="entry-title masthead_content_title" itemprop="headline">
								<?php if( $page_masthead_title ) { ?>
									<?php echo $page_masthead_title; ?>
								<?php } else { ?>
									<?php the_title(); ?>
								<?php } ?>
							</h1>
							<?php } ?>

							<?php if( $page_masthead_text ) { ?>
							<div class="home_masthead_text" style="color: <?php echo($text_color); ?>;"><?php echo $page_masthead_text; ?></div>
							<?php } ?>

							<?php if( $btn1_link ) { ?> 
							<div class="custom_icon_btn masthead_btn <?php echo $btn_style; ?>">
								<a href="<?php echo $btn1_link; ?>" class="masthead_btn_link">
									<button class="section_readmore_link watch_btn hoverLink"><?php echo $btn1_text; ?></button>
								</a>
							</div>
							<?php } ?>						
							<?php if( $btn2_link ) { ?> 
							<div class="custom_icon_btn masthead_btn <?php echo $btn_style; ?>">
								<a href="<?php echo $btn2_link; ?>" class="masthead_btn_link">
									<button class="section_readmore_link watch_btn hoverLink"><?php echo $btn2_text; ?></button>
								</a>
							</div>
							<?php } ?>						
						<?php } ?>	
						</div>													
					</div>	
				</div>
				
			</div>
		
		<script>
		jQuery(function($) {
			$(".youtube img").delay(3000).fadeOut('slow');
		});
		</script>
					    
		<?php } ?>
		
		<?php if( $page_top_slider_content == 'image_slider' ) { ?>

			
			<?php 
			$slider_images = get_field('mobile_page_main_top_slider');
			//$slider_images = get_post_meta( get_the_ID(), 'page_main_top_slider', true );
			$default_masthead_bg = get_option( 'options_default_main_masthead_bg' );
			?>
			<div class="top-slider-bg top-slider-bg-multiple">
			    <div id="top-slider" class="swiper-container <?php echo($slider_effect); ?> swiper-scale-effect" style="direction: ltr;">
				    <?php if( $slider_images ) { ?>
			        <div class="slides single-slider swiper-wrapper">
			            <?php foreach( $slider_images as $slider_image ): ?>
				        <div class="single-slider-img-item single-slider-item swiper-slide">
			                <div class="single-slider-img swiper-slide-cover">
				                <?php //echo wp_get_attachment_image( $slider_image['ID'], 'full' ); ?>
								<div class="slide-inner" style="background-image:url(<?php echo $slider_image['url']; ?>)"></div>
			                </div>
				        </div>
			            <?php endforeach; ?>
			        <?php } elseif ($default_masthead_bg) { ?>
			        <div class="slides single-slider">
				        <div class="single-slider-img single-slider-item">
					        <div class="single-slider-img"><?php echo wp_get_attachment_image( $default_masthead_bg, 'full' ); ?></div>
				        </div>
			        <?php } ?>
			        </div>
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

				<div class="masthead_content wrap row-flex <?php echo($title_hor); ?>-xs <?php echo($title_ver); ?>-xs <?php echo($title_location); ?>">
					<div class="masthead_content_container col-xs-12">
						<div class="masthead_content_container_wrap">
							
						<?php 							
						if ($title_location == 'slider_content_bottom' ) {
							$title_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_title_color', true );
							$text_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_text_color', true );
							$btn_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_btn_color', true );
							$btn_bg_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_btn_bg_color', true );
							$page_masthead_title = get_post_meta( get_the_ID(), 'mobile_page_masthead_title', true );
							$page_masthead_text = get_post_meta( get_the_ID(), 'mobile_page_masthead_text', true );
							$masthead_title_hide = get_post_meta( get_the_ID(), 'mobile_page_masthead_title_hide', true );
						?>
							<?php if( !$masthead_title_hide ) { ?>
							<h1 class="entry-title masthead_content_title" itemprop="headline" style="color: <?php echo($title_color); ?>;">
								<?php if( $page_masthead_title ) { ?>
									<?php echo $page_masthead_title; ?>
								<?php } else { ?>
									<?php the_title(); ?>
								<?php } ?>
							</h1>
							<?php } ?>
							<?php if( $page_masthead_text ) { ?>
							<div class="home_masthead_text" style="color: <?php echo($text_color); ?>;"><?php echo $page_masthead_text; ?></div>
							<?php } ?>

							<?php if( $btn1_link ) { ?> 
							<div class="custom_icon_btn masthead_btn <?php echo $btn_style; ?>">
								<a href="<?php echo $btn1_link; ?>" class="masthead_btn_link">
									<button class="section_readmore_link watch_btn hoverLink" style="color:<?php echo $btn_color; ?>;background:<?php echo $btn_bg_color; ?>;"><?php echo $btn1_text; ?></button>
								</a>
							</div>
							<?php } ?>						
							<?php if( $btn2_link ) { ?> 
							<div class="custom_icon_btn masthead_btn <?php echo $btn_style; ?>">
								<a href="<?php echo $btn2_link; ?>" class="masthead_btn_link">
									<button class="section_readmore_link watch_btn hoverLink" style="color:<?php echo $btn_color; ?>;background:<?php echo $btn_bg_color; ?>;"><?php echo $btn2_text; ?></button>
								</a>
							</div>
							<?php } ?>						
						
						<?php } else { 
							$title_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_title_color', true );
							$text_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_text_color', true );
							$btn_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_btn_color', true );
							$btn_bg_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_btn_bg_color', true );
							$page_masthead_title = get_post_meta( get_the_ID(), 'mobile_page_masthead_title', true );
							$page_masthead_text = get_post_meta( get_the_ID(), 'mobile_page_masthead_text', true );
							$masthead_title_hide = get_post_meta( get_the_ID(), 'mobile_page_masthead_title_hide', true );
						?>
							<?php if( !$masthead_title_hide ) { ?>
							<h1 class="entry-title masthead_content_title" itemprop="headline">
								<?php if( $page_masthead_title ) { ?>
									<?php echo $page_masthead_title; ?>
								<?php } else { ?>
									<?php the_title(); ?>
								<?php } ?>
							</h1>
							<?php } ?>

							<?php if( $page_masthead_text ) { ?>
							<div class="home_masthead_text" style="color: <?php echo($text_color); ?>;"><?php echo $page_masthead_text; ?></div>
							<?php } ?>

							<?php if( $btn1_link ) { ?> 
							<div class="custom_icon_btn masthead_btn <?php echo $btn_style; ?>">
								<a href="<?php echo $btn1_link; ?>" class="masthead_btn_link">
									<button class="section_readmore_link watch_btn hoverLink"><?php echo $btn1_text; ?></button>
								</a>
							</div>
							<?php } ?>						
							<?php if( $btn2_link ) { ?> 
							<div class="custom_icon_btn masthead_btn <?php echo $btn_style; ?>">
								<a href="<?php echo $btn2_link; ?>" class="masthead_btn_link">
									<button class="section_readmore_link watch_btn hoverLink"><?php echo $btn2_text; ?></button>
								</a>
							</div>
							<?php } ?>						
						<?php } ?>	
						</div>													
					</div>	
				</div>


				<?php if ( !is_front_page() ) { ?>
				<div class="yoast_breadcrumb">
					<div class="yoast_breadcrumb_wrap wrap">
					<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>
					<div class="animation-line one vertical"><div class="inner-container"></div></div>
		
					</div>
				</div>
				<?php } ?>

				
			</div>	
			
		<?php } ?>
						
		</div>
	</div>
</div>
<script>
jQuery(function($) {

	// Auto Padding content top
	$(window).load(function(){
		get_header_height();
	    //function to get current div height
	    function get_header_height(){
	        //var footer_height = $('#footer_container').height();
	        var header_height = $('.header_wrapper').outerHeight();
	        topSlider = $("#home_masthead #top-slider .slides");
	        topSliderImg = $("#home_masthead #top-slider .single-slider-img");
	        topSlider.css('height', "calc(100vh - " + header_height + "px)");
	        topSliderImg.css('height', "calc(100vh - " + header_height + "px)");
	    }
    });	

});
</script>   