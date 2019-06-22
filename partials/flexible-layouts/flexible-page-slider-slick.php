<?php 
$artcile_slider_block_width = get_sub_field('flex_artcile_slider_block_width');
$artcile_slider_mobile = get_sub_field('flex_artcile_slider_mobile');
$artcile_slider_hide_mobile = get_sub_field('flex_artcile_slider_hide_mobile');
$artcile_slider_order = get_sub_field('flex_artcile_slider_order');

$flex_article_slider_title = get_sub_field('flex_artcile_slider_title');
$flex_article_slider = get_sub_field('flex_article_slider');
$article_slider_count = get_sub_field('flex_article_slider_count');
$article_slider_style = get_sub_field('flex_article_slider_style');
$article_slider_img = get_sub_field('flex_article_slider_img');
$artcile_slider_title_align = get_sub_field('flex_artcile_slider_title_align');
$artcile_slider_title_color = get_sub_field('flex_artcile_slider_title_color');
$artcile_slider_title_size = get_sub_field('flex_artcile_slider_title_size');
$article_slider_source = get_sub_field('flex_article_slider_source');
$article_slider_latest = get_sub_field('flex_article_slider_latest');

if ( $artcile_slider_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $artcile_slider_mobile;?> <?php echo $artcile_slider_block_width;?>" <?php if( $artcile_slider_order ){ ?>style="order:<?php echo $artcile_slider_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>">

		<div class="flexible_articles flexible_page_element flex_articles_slider articles_slider_<?php echo $article_slider_style; ?>" itemprop="text">
			<div class="page_link_slider_wrap">
				<?php if( $flex_article_slider_title ) { ?>
				<div class="flex_style_title_container">
					<h2 class="section_title section_flex_title" style="text-align:<?php echo $artcile_slider_title_align; ?>;font-size:<?php echo $artcile_slider_title_size; ?>px;color:<?php echo $artcile_slider_title_color; ?>;"><?php echo $flex_article_slider_title; ?></h2>
				</div>
				<?php } ?>
				<div class="articles_slider_item_row page_slider">
					
				<?php if( $article_slider_source == 'manual' ): ?>
					
					<?php foreach( $flex_article_slider as $post ): ?>
					<?php setup_postdata($post); ?>
				    <div class="page_link_slider_item articles_slider_item">
						<div class="articles_slider_item_container">
							<div class="articles_slider_item_img box_effect">
								<a class="page-article-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'קישור לעמוד %s', 'tkmulti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
								<div class="page_link_slider_item_img">
									<?php if( $article_slider_img == 'main_img' ): ?>
									<div class="page_img">
										<?php echo the_post_thumbnail('inside-post-360'); ?>
									</div>
									<?php endif; ?>
									<?php if( $article_slider_img == 'main_icon' ):
									$page_main_icon = get_field('page_main_icon');
									if( $page_main_icon ) { ?>
									<div class="page_img hover_img_mask" style="background:url(<?php echo wp_get_attachment_url( $page_main_icon, 'inside-post-360' ); ?>) 50% 50% / cover no-repeat;">
										<?php echo the_post_thumbnail('inside-post-360'); ?>
									</div>
									<?php } else { ?> 
									<div class="page_img">
										<?php echo the_post_thumbnail('inside-post-360'); ?> 
									</div>		
									<?php }
									endif; ?>
								</div>
								<div class="page_link_slider_item_title_wrap">
									<h3 itemprop="name" class="page_link_slider_item_title no-line"><?php the_title(); ?></h3>
									<?php 
									$excerpt = get_field('page_masthead_excerpt');
									if( $excerpt ) { ?>
									<div class="articles_grid_item_text">	
										<div class="page_links_item_intro">
											<?php 
											//echo custom_field_excerpt();
											//echo wp_trim_words($excerpt,7); 
											echo wp_html_excerpt( $excerpt, 30, '...' ); ?>
										</div>
									</div>
									<?php } ?> 
								</div>
								</a>
							</div>	
						</div>
				    </div>
				    <?php endforeach; ?>
				    <?php wp_reset_postdata(); ?> 
				<?php endif; ?>    
			    <?php if( $article_slider_source == 'page' || $article_slider_source == 'post' ):
				    if( $article_slider_source == 'page' ) {
					$argsA = array(
							'post_type' => 'page',
							'order'          => 'ASC',
							'orderby'	=> 'rand',
							'posts_per_page' => $article_slider_latest,
							'depth' => 1,
							'post__not_in' => array( $post->ID ),
						);
				    } else {
						$argsA = array(
							'post_type' => 'post',
							'order'          => 'ASC',
							'orderby'	=> 'rand',
							'posts_per_page' => $article_slider_latest,
							'depth' => 1,
							'post__not_in' => array( $post->ID ),
						);
				    }
					$the_queryA = new WP_Query( $argsA );
					if ( $the_queryA->have_posts() ) :
				    ?>
					<?php while ( $the_queryA->have_posts() ) : $the_queryA->the_post(); ?>
					<?php setup_postdata($post); ?>
					    <div class="page_link_slider_item articles_slider_item">
							<div class="articles_slider_item_container">
								<div class="articles_slider_item_img box_effect">
									<a class="page-article-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'קישור לעמוד %s', 'tkmulti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
									
									<div class="page_link_slider_item_img">
										<?php if( $article_slider_img == 'main_img' ): ?>
										<div class="page_img">
											<?php echo the_post_thumbnail('inside-post-360'); ?>
										</div>
										<?php endif; ?>
										<?php if( $article_slider_img == 'main_icon' ):
										$page_main_icon = get_field('page_main_icon');
										if( $page_main_icon ) { ?>
										<div class="page_img hover_img_mask" style="background:url(<?php echo wp_get_attachment_url( $page_main_icon, 'inside-post-360' ); ?>) 50% 50% / cover no-repeat;">
											<?php echo the_post_thumbnail('inside-post-360'); ?>
										</div>
										<?php } else { ?> 
										<div class="page_img">
											<?php echo the_post_thumbnail('inside-post-360'); ?> 
										</div>		
										<?php }
										endif; ?>
									</div>
									<div class="page_link_slider_item_title_wrap">
										<h3 itemprop="name" class="page_link_slider_item_title no-line"><?php the_title(); ?></h3>
										<?php 
										$excerpt = get_field('page_masthead_excerpt');
										if( $excerpt ) { ?>
										<div class="articles_grid_item_text">	
											<div class="page_links_item_intro">
												<?php 
												//echo custom_field_excerpt();
												//echo wp_trim_words($excerpt,7); 
												echo wp_html_excerpt( $excerpt, 30, '...' ); ?>
											</div>
										</div>
										<?php } ?> 
									</div>
									</a>
								</div>	
							</div>
					    </div>
					    <?php endwhile; ?>
					    <?php wp_reset_postdata(); ?> 				
					<?php endif; ?>
				<?php endif; ?>    				
				</div>
				
				<?php if( $latest_articles_readmore_link ) { ?>
				<div class="readmore btn_wrap">
					<a class="page-article-link" data-echo="על <?php echo $latest_articles_readmore_link; ?>" href="<?php echo $latest_articles_readmore_link; ?>">
						<button class="section_readmore_link watch_btn hoverLink style3"><?php echo $latest_articles_readmore; ?></button>
					</a>
				</div>
				<?php } ?>	
									
			</div>
		</div>
						


	</section>
	<script>					
	jQuery(function($) {
		//* ## Page Link Slider */
		if ($('.section-<?php echo $row;?>-<?php echo $count;?> .page_slider .articles_slider_item').length > 1) {
			$(".section-<?php echo $row;?>-<?php echo $count;?> .page_slider").slick({
				rtl: true,
				slidesToShow: <?php echo $article_slider_count; ?>,
				slidesToScroll: 1,
				dots: false,
				pauseOnHover: true,
				speed: 500,
				autoplay: false,
				autoplaySpeed: 6000,
				arrows: true,
				responsive: [
			    {
			      breakpoint: 768,
			      settings: {
			        slidesToShow: 2,
			        dots: true
			      }
			    },
			    {
			      breakpoint: 500,
			      settings: {
			        slidesToShow: 1,
			        dots: true
			      }
			    }
				]
			});
		}					
	}); 
					
	</script>	
</div>
<?php } ?>
