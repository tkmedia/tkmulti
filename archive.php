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
   $classes[] = 'archive-page default_page';
   return $classes;
}

$term_id = get_queried_object()->term_id;
$post_id = 'category_'.$term_id;
$archive_main_img = get_field('archive_main_img', $post_id);
$default_masthead_bg =  get_field('default_main_masthead_bg', 'option');

$archive_article_display = get_field('archive_article_display', $post_id);
$archive_article_style = get_field('archive_article_style', $post_id);

/**
 * Archive Header
 *
 */
 ?> 
 
<?php get_header(); ?>

<div id="archive_main_content">
	<div class="page-container">	
		<div class="entry-content" itemprop="text">
			
			
			<div id="home_masthead" itemprop="text">	
				<div class="home_masthead intro-section masthead_clean">	
				<!-- Top Slider -->
					<div id="main-top-slider">
					
						<div class="top-slider-bg top-slider-bg-multiple">
						    <div id="top-slider" class="swiper-container style3 swiper-scale-effect" style="direction: ltr;height: 30vh !important;">
						        <?php if ($archive_main_img) { ?>
						        <div class="slides single-slider">
							        <div class="single-slider-img single-slider-item">
								        <div class="single-slider-img"><?php echo wp_get_attachment_image( $archive_main_img, 'full' ); ?></div>
							        </div>
						        <?php } elseif ($default_masthead_bg) { ?>
						        <div class="slides single-slider">
							        <div class="single-slider-img single-slider-item">
								        <div class="single-slider-img"><?php echo wp_get_attachment_image( $default_masthead_bg, 'full' ); ?></div>
							        </div>
						        <?php } ?>
						        </div>			        
						    </div>
			
							<div class="masthead_clean_content">
								<div class="masthead_content wrap row-flex bottom-xs between-xs center-xs">
									<div class="masthead_content_container col-xs-12 col-md">
										<div class="masthead_content_container_wrap">
											<?php								
											//function tkmulti_archive_header() {
												$title = $subtitle = $description = false;
												if( is_home() ) {
													$title = get_the_title( get_option( 'page_for_posts' ) );
												} elseif( is_search() ) {
													$title = 'Search Results for: <em>' . get_search_query() . '</em>';
												} elseif( is_archive() ) {
													$title = get_the_archive_title();
													$description = get_the_archive_description();
												} elseif( ! is_post_type_archive() ) {
													$title = single_cat_title();
												} else {
													$title = post_type_archive_title();
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
											//}
											//add_action( 'tha_content_while_before', 'tkmulti_archive_header' );
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
			//require get_template_directory() . '/index.php';
			 ?>
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
			 
			<?php
			if ( $archive_article_display == 1 ) : $cg_xs_cols = "12"; $cg_sm_cols = "12"; $cg_md_cols = "12"; 
			elseif ( $archive_article_display == 2 ) : $cg_xs_cols = "12"; $cg_sm_cols = "6"; $cg_md_cols = "6"; 
			elseif ( $archive_article_display == 3 ) : $cg_xs_cols = "12"; $cg_sm_cols = "4"; $cg_md_cols = "4"; 
			elseif ( $archive_article_display == 4 ) : $cg_xs_cols = "12"; $cg_sm_cols = "3"; $cg_md_cols = "3";
			elseif ( $archive_article_display == 5 ) : $cg_xs_cols = "12"; $cg_sm_cols = "3"; $cg_md_cols = "20"; 
			endif; 
			?>
			
			<div class="magazine_page_index wrap magazin_<?= $archive_article_style; ?>">
				<div class="magazine_page_grid row-flex articles_grid_item_row center-xs">
					
				    <?php if ( have_posts() ) : ?>
				    
				        <?php while ( have_posts() ) : the_post(); ?>
				        
							<div class="magazine_page_grid_item col-xs-<?= $cg_xs_cols; ?> col-sm-<?= $cg_sm_cols; ?> col-md-<?= $cg_md_cols; ?>">
								<div class="magazine_page_item_container">
									<div class="magazine_page_item_img">
										<a class="page-article-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'קישור לעמוד %s', 'tkmulti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
											<?php echo get_the_post_thumbnail($post->ID, 'block-300'); ?>
											<div class="magazine_page_item_inner">
												<div class="magazine_grid_item_text">	
													<h3 itemprop="name" class="magazine_grid_item_title"><?php the_title(); ?></h3>
												</div>
											</div>
										</a>
									</div>	
								</div>
							</div>
				            
				        <?php endwhile; ?>
				        
				</div>
				
				        <?php //theme_numeric_posts_nav(); ?>
				        
				    <?php else : ?>
				    
				        <?php get_template_part( 'no-results', 'index' ); ?>
				        
				    <?php endif; ?>
				    
			</div>		                        

			<?php //get_template_part('partials/full_thin_form'); ?>

		</div><!-- .entry-content -->
	</div><!-- .page-container -->
</div><!-- #post-## -->	

	
<?php get_footer(); ?>
			
			