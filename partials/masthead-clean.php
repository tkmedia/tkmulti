<?php
$title_location = get_post_meta( get_the_ID(), 'page_masthead_title_location', true );
$title_hor = get_post_meta( get_the_ID(), 'page_masthead_title_hor', true );

$btn_style = get_post_meta( get_the_ID(), 'page_masthead_btn_style', true );
$btn1_text = get_post_meta( get_the_ID(), 'page_masthead_btn1_text', true );
$btn1_link = get_post_meta( get_the_ID(), 'page_masthead_btn1_link', true );
$btn2_text = get_post_meta( get_the_ID(), 'page_masthead_btn2_text', true );
$btn2_link = get_post_meta( get_the_ID(), 'page_masthead_btn2_link', true );

$page_masthead_title =  get_post_meta( get_the_ID(), 'page_masthead_title', true );
$page_masthead_text =  get_post_meta( get_the_ID(), 'page_masthead_text', true );

$title_color =  get_post_meta( get_the_ID(), 'page_masthead_title_color', true );
$text_color =  get_post_meta( get_the_ID(), 'page_masthead_text_color', true );
$btn_color =  get_post_meta( get_the_ID(), 'page_masthead_btn_color', true );
$btn_bg_color =  get_post_meta( get_the_ID(), 'page_masthead_btn_bg_color', true );
?>
<!-- MastHead -->
<div id="home_masthead" itemprop="text">	
	<div class="home_masthead intro-section masthead_clean <?php echo($title_location); ?>">	
	<!-- Top Slider -->
		<div id="main-top-slider">
		
			<?php 
			$slider_images = get_field('page_main_top_slider');
			$default_masthead_bg =  get_field('default_main_masthead_bg', 'option');?>
			<div class="top-slider-bg top-slider-bg-multiple">
			    <div id="top-slider" class="swiper-container style3 swiper-scale-effect" style="direction: ltr;">
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
			    </div>

				<?php 							
				if ($title_location == 'slider_content_inn' ) { ?>
				<div class="masthead_clean_content">
					<div class="masthead_content wrap row-flex bottom-xs between-xs <?php echo($title_hor); ?>-xs">
						<div class="masthead_content_container col-xs-12 col-md">
							<div class="masthead_content_container_wrap">
								<h1 class="entry-title masthead_content_title" itemprop="headline">
									<?php if( $page_masthead_title ) { ?>
										<?php echo $page_masthead_title; ?>
									<?php } else { ?>
										<?php the_title(); ?>
									<?php } ?>
								</h1>
							</div>	
						</div>
						
					</div>
				</div>
				<?php } ?>
			    <!-- Add Arrows -->
			    <div id="js-pagevertical1" class="swiper-pagination style1"></div>
			    <div id="js-next1" class="swiper-button-next"></div>
			    <div id="js-prev1" class="swiper-button-prev"></div>

			</div>	
			
		</div>
		<?php if ( !is_front_page() ) { ?>
		<div class="yoast_breadcrumb col-xs-12 col-md">
			<div class="yoast_breadcrumb_wrap wrap">
			<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>				
			</div>
		</div>
		<?php } ?>
		
	</div>
	
</div>


<?php 							
if ($title_location == 'slider_content_bottom' ) { ?>

<div class="masthead_clean_content content_<?php echo($title_location); ?>">
	<div class="masthead_content_wrap wrap row-flex bottom-xs between-xs <?php echo($title_hor); ?>-xs">
		<?php if ( !is_front_page() ) { ?>
		<div class="yoast_breadcrumb col-xs-12">
			<div class="yoast_breadcrumb_wrap">
			<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>				
			</div>
		</div>
		<?php } ?>
		
		<div class="masthead_content_col col-xs-12">
			<?php if ( !is_page_template( 'page_product.php' ) ) { ?>
				<div class="masthead_clean_title">
					<h1 class="entry-title masthead_content_title" itemprop="headline" style="color: <?php echo($title_color); ?>;">
						<?php if( $page_masthead_title ) { ?>
							<?php echo $page_masthead_title; ?>
						<?php } else { ?>
							<?php the_title(); ?>
						<?php } ?>
					</h1>
				</div>
												
				<?php if( $page_masthead_text ) { ?>
				<div class="masthead_clean_intro">
					<div class="home_masthead_text wrap" style="color: <?php echo($text_color); ?>;"><?php echo $page_masthead_text; ?></div>
				</div>
				<?php } ?>	
				
			<?php } ?>												
		</div>
	</div>
</div>
<?php } ?>

<?php if ($page_masthead_text && $title_location == 'slider_content_inn' ) { ?>
<div class="masthead_clean_intro">
	<div class="home_masthead_text wrap"><?php echo $page_masthead_text; ?></div>
</div>
<?php } ?>	


<script>
jQuery(function($) {

	// Auto Padding content top
	$(window).load(function(){
		get_header_height();
	    //function to get current div height
	    function get_header_height(){
	        //var footer_height = $('#footer_container').height();
	        var header_height = $('.block_header #header-container').outerHeight();
	        topSlider = $("#home_masthead #top-slider .slides");
	        topSliderImg = $("#home_masthead #top-slider .single-slider-img");
	        topSlider.css('height', "calc(100vh - " + header_height + "px)");
	        topSliderImg.css('height', "calc(100vh - " + header_height + "px)");
	    }
    });	

});
</script>   