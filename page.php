<?php
   
//* Add custom body class to the head
add_filter( 'body_class', 'theme_add_body_class' );
function theme_add_body_class( $classes ) {
   $classes[] = 'default_page flex_page';
   return $classes;
}
 ?>

<?php get_header(); ?>
		
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

<article id="page-<?php the_ID(); ?>" <?php post_class(); ?> itemscope="itemscope" itemtype="http://schema.org/CreativeWork">
	<div class="page-container">	
		<div class="entry-content" itemprop="text">

			<?php 
			$masthead_on_mobile = get_post_meta( get_the_ID(), 'masthead_on_mobile', true );
			
			if ($masthead_on_mobile == 'same_desktop' ) {
				
				$page_top_slider_style = get_post_meta( get_the_ID(), 'page_top_slider_style', true );
					
				if( $page_top_slider_style == 'full_slider' ):
					get_template_part('partials/masthead-slider' );
				endif;
				if( $page_top_slider_style == 'no_image_top' ):
					get_template_part('partials/masthead-title' );
				endif;	
				if( $page_top_slider_style == 'manual_slider' ):
					get_template_part('partials/masthead-manual-slider' );
				endif;			
				if( $page_top_slider_style == 'clean_top' ):
					get_template_part('partials/masthead-clean');
				endif;

			} 
			
			if ($masthead_on_mobile == 'mobile_masthead' ) {
				
				if ( wp_is_mobile() ) {
					
					$mobile_page_top_slider_style = get_post_meta( get_the_ID(), 'mobile_page_top_slider_style', true );
					
					if( $mobile_page_top_slider_style == 'full_slider' ):
						get_template_part('partials/masthead-slider-mobile' );
					endif;
					if( $mobile_page_top_slider_style == 'no_image_top' ):
						get_template_part('partials/masthead-title-mobile' );
					endif;	
					if( $mobile_page_top_slider_style == 'manual_slider' ):
						get_template_part('partials/masthead-manual-slider-mobile' );
					endif;			
					if( $mobile_page_top_slider_style == 'clean_top' ):
						get_template_part('partials/masthead-clean-mobile');
					endif;
					
				} else {
					
					$page_top_slider_style = get_post_meta( get_the_ID(), 'page_top_slider_style', true );
					
					if( $page_top_slider_style == 'full_slider' ):
						get_template_part('partials/masthead-slider' );
					endif;
					if( $page_top_slider_style == 'no_image_top' ):
						get_template_part('partials/masthead-title' );
					endif;	
					if( $page_top_slider_style == 'manual_slider' ):
						get_template_part('partials/masthead-manual-slider' );
					endif;			
					if( $page_top_slider_style == 'clean_top' ):
						get_template_part('partials/masthead-clean');
					endif;
					
				}	
				
			}
			
			get_template_part('partials/flexible-content-blocks'); 
			
			$thecontent = get_the_content();
			if(!empty($thecontent)) { ?>
				<section id="the_content" itemprop="text" class="page_section">
					<div class="page_the_content">	
					<?php 
					the_content();
					wp_link_pages(
						array(
							'before' => '<div class="page-links">' . __( 'Pages:', 'tkmulti' ),
							'after'  => '</div>',
						)
					);
					?>
					</div>
				</section>
			<?php } ?> 

						
		</div><!-- .entry-content -->
	</div><!-- .page-container -->
</article><!-- #post-## -->	
	
<?php endwhile; ?><?php endif; ?>
<?php get_footer(); ?> 