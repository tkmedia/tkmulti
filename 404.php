<?php
   	   
//* Add custom body class to the head
add_filter( 'body_class', 'theme_add_body_class' );
function theme_add_body_class( $classes ) {
   $classes[] = '404-page error-page';
   return $classes;
}
 ?>
<?php
$default_masthead_bg =  get_field('default_main_masthead_bg', 'option');
$default_masthead_bg_url = wp_get_attachment_image_src($default_masthead_bg, 'full');
$deafault_page_masthead_bg = get_field('deafault_page_masthead_bg');
$page_main_title = get_field('page_masthead_title');
$page_main_intro = get_field('page_masthead_text');
?>
 
<?php get_header(); ?>

<!-- MastHead -->
<div id="home_masthead" itemprop="text">	
	<div class="home_masthead intro-section masthead_clean <?php //echo($title_location); ?>">	
	<!-- Top Slider -->
		<div id="main-top-slider">
		
			<?php 
			$default_masthead_bg = get_option( 'options_default_main_masthead_bg' ); ?>
			<div class="top-slider-bg top-slider-bg-multiple">
			    <div id="top-slider" class="swiper-container style3 swiper-scale-effect" style="direction: ltr;">
			        <div class="slides single-slider">
				        <div class="single-slider-img single-slider-item">
					        <div class="single-slider-img"><?php echo wp_get_attachment_image( $default_masthead_bg, 'full' ); ?></div>
				        </div>
			        </div>			        
			    </div>

				<div class="masthead_clean_content">
					<div class="masthead_content wrap row-flex bottom-xs between-xs">
						<div class="masthead_content_container col-xs-12 col-md">
							<div class="masthead_content_container_wrap">
								<h1 class="entry-title masthead_content_title" itemprop="headline">404 עמוד לא נמצא</h1>
							</div>	
						</div>
						
						<div class="yoast_breadcrumb col-xs-12 col-md">
							<div class="yoast_breadcrumb_wrap wrap">
							<?php if ( function_exists('yoast_breadcrumb') ) {yoast_breadcrumb('<div id="breadcrumbs">','</div>');} ?>				
							</div>
						</div>
					</div>
				</div>

			</div>	
			
		</div>
	</div>
</div>


<article id="page-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
	<div class="page-container">	
		<div class="entry-content" itemprop="text">

			<section class="wide-txt-title wrap">
		        <div class="inner-wrap">		
		            <div class="content row-flex middle-xs">
			            
		                <div class="txt-box col-xs-12">
		                    <div class="inner-wrap">
		                        <div>הדף שאתה מחפש אינו קיים עוד. אולי אתה יכול לחזור חזרה לאתר <a style="text-decoration: underline;" href="<?php echo esc_url(home_url('/')); ?>">מעמוד הבית</a> ולראות אם אתה יכול למצוא את מה שאתה מחפש.</div>
		                        <div class="wide-btn">
		                            <a href="<?php echo esc_url(home_url('/')); ?>" class="black-link">חזרה לעמוד הבית</a>
		                        </div>
		                    </div>
		                </div>
		                
		            </div>
		        </div>
		    </section>

			<?php if( have_rows('error_brand_points_box', 'option') ):		
			$brand_points_title = get_field('error_brand_points_title', 'option');
			$brand_points_box = get_field('error_brand_points_box', 'option');
			?>
			<div class="brand_points flexible_page_element" itemprop="text">
				<div class="brand_points_bg">
					<div class="brand_points_wrap wrap">
						<?php if( $brand_points_title ) { ?>
						<h2 class="section_title_box no-line" itemprop="headline">
							<?php echo $brand_points_title; ?>
						</h2>
						<?php } ?>	
						
						<div class="brand_points_box">
							<div class="brand_points_box_row row-flex">
							<?php while( have_rows('error_brand_points_box', 'option') ): the_row(); 
								$brand_points_box_title = get_sub_field('error_brand_points_box_title');
								$brand_points_box_subtitle = get_sub_field('error_brand_points_box_subtitle');
								$brand_points_box_icon = get_sub_field('error_brand_points_box_icon');
								$brand_points_box_btn = get_sub_field('error_brand_points_box_btn');
								$brand_points_box_link = get_sub_field('error_brand_points_box_link');
							?>
								<div class="brand_points_box_col col-xs-6 col-sm-3">
								<a href="<?php echo $brand_points_box_link; ?>">
									<div class="brand_points_box_item">
										<div class="brand_points_box_icon"><figure><?php echo wp_get_attachment_image( $brand_points_box_icon, 'full' ); ?></figure></div>
										<?php if( $brand_points_box_title ) { ?>
										<div class="brand_points_box_title"><?php echo $brand_points_box_title; ?></div>
										<?php } ?>
										<?php if( $brand_points_box_subtitle ) { ?>
										<div class="brand_points_box_subtitle"><?php echo $brand_points_box_subtitle; ?></div>
										<?php } ?>
										<?php if( $brand_points_box_link || $brand_points_box_btn ) { ?>
										<div class="section_readmore_col">
											<button class="main_btn"><?php echo $brand_points_box_btn; ?></button>
										</div>										
										<?php } ?>
										
									</div>
								</a>
								</div>
							<?php endwhile; ?>
						</div>
					</div>
				</div>
			</div>		
			
			<?php endif; ?>

			
		</div><!-- .entry-content -->
	</div><!-- .page-container -->
</article><!-- #post-## -->	
	
<?php get_footer(); ?>