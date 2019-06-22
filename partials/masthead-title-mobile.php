<!-- MastHead -->
<div id="masthead" itemprop="text">	
	<div class="masthead intro-section masthead_clean_title">	
	<!-- Top Slider -->
		<div id="main-top">

			<?php 
			$title_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_title_color', true );
			$text_color = get_post_meta( get_the_ID(), 'mobile_page_masthead_text_color', true );
			$default_masthead_bg = get_option( 'options_default_main_masthead_bg' );
			?>

				<div class="masthead_clean_content">
					<div class="masthead_content_wrap wrap row-flex bottom-xs between-xs">
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
									<?php 			
									$page_masthead_title =  get_post_meta( get_the_ID(), 'mobile_page_masthead_title', true );
									$page_masthead_text =  get_post_meta( get_the_ID(), 'mobile_page_masthead_text', true );
									?>
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
	        var header_height = $('#header-container').outerHeight();
		        masthead = $("#masthead");
		        //$('#masthead').css('padding-top', header_height);
	    }
    });	

});
</script>   