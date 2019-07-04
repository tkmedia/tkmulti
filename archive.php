<?php
/**
 * Archive
 *
 * @package      TKMulti
 * @author       Tal Katz TKMedia.co.il
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/**
 * Body Class
 *
 */
add_filter( 'body_class', 'theme_add_body_class' );
function theme_add_body_class( $classes ) {
   $classes[] = 'archive-page';
   return $classes;
}

/**
 * Archive Header
 *
 */
 ?> 
<div id="home_masthead" itemprop="text">	
	<div class="home_masthead intro-section masthead_clean">	
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

				<div class="masthead_clean_content">
					<div class="masthead_content wrap row-flex bottom-xs between-xs <?php echo($title_hor); ?>-xs">
						<div class="masthead_content_container col-xs-12 col-md">
							<div class="masthead_content_container_wrap">
								<?php								
								function tkmulti_archive_header() {
									$title = $subtitle = $description = false;
									if( is_home() ) {
										$title = get_the_title( get_option( 'page_for_posts' ) );
									} elseif( is_search() ) {
										$title = 'Search Results for: <em>' . get_search_query() . '</em>';
									} elseif( is_archive() ) {
										$title = get_the_archive_title();
										$description = get_the_archive_description();
									}
									if( empty( $title ) && empty( $description ) )
										return;
									if( get_query_var( 'paged' ) ) {
										global $wp_query;
										$subtitle = 'Page ' . get_query_var( 'paged' ) . ' of ' . $wp_query->max_num_pages;
									}
									if( ! empty( $title ) )
										echo '<h1 class="entry-title masthead_content_title archive-title" itemprop="headline">' . $title . '</h1>';
									if( !empty( $subtitle ) )
										echo '<h4>' . $subtitle . '</h4>';
								}
								add_action( 'tha_content_while_before', 'tkmulti_archive_header' );
								?>								
							</div>	
						</div>
						
					</div>
				</div>

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
$description = get_the_archive_description();
if( ! empty( $description ) ) { ?>
<div class="masthead_clean_intro">
	<?php echo '<div class="home_masthead_text wrap archive-description">' . apply_filters( 'tkmulti_the_content', $description ) . '</div>'; ?>
</div>
<?php } ?>
<?php 
// Build the page
require get_template_directory() . '/index.php';
 ?>
