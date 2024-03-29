<?php 
$artcile_slider_block_width = get_sub_field('flex_artcile_slider_block_width');
$artcile_slider_mobile = get_sub_field('flex_artcile_slider_mobile');
$artcile_slider_hide_mobile = get_sub_field('flex_artcile_slider_hide_mobile');
$artcile_slider_order = get_sub_field('flex_artcile_slider_order');
$artcile_slider_break = get_sub_field('flex_artcile_slider_break');
$artcile_slider_block_align = get_sub_field('flex_artcile_slider_block_align');

$flex_article_slider_title = get_sub_field('flex_artcile_slider_title');
$flex_article_slider = get_sub_field('flex_article_slider');
$article_slider_count = get_sub_field('flex_article_slider_count');
$article_slider_style = get_sub_field('flex_article_slider_style');
$article_slider_img = get_sub_field('flex_article_slider_img');
$artcile_slider_show_excerpt = get_sub_field('flex_artcile_slider_show_excerpt');

$artcile_slider_title_align = get_sub_field('flex_artcile_slider_title_align');
$artcile_slider_title_color = get_sub_field('flex_artcile_slider_title_color');
$artcile_slider_title_size = get_sub_field('flex_artcile_slider_title_size');
$artcile_slider_button_color = get_sub_field('flex_artcile_slider_button_color');
$artcile_slider_title_icon = get_sub_field('flex_artcile_slider_title_icon');
$article_slider_title_position = get_sub_field('flex_article_slider_title_position');

$article_slider_source = get_sub_field('flex_article_slider_source');
$article_slider_latest = get_sub_field('flex_article_slider_latest');
$article_slider_animation = get_sub_field('flex_article_slider_animation');
$article_slider_img_size = get_sub_field('flex_article_slider_img_size');
$article_slider_hide_date = get_sub_field('flex_artcile_slider_hide_date');

if ( $artcile_slider_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $artcile_slider_mobile;?> <?php echo $artcile_slider_block_width;?> <?php if( $artcile_slider_break ){ ?><?php echo $artcile_slider_block_align; ?><?php } ?>" <?php if( $artcile_slider_order ){ ?>style="order:<?php echo $artcile_slider_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $article_slider_animation;?>">

		<div class="flexible_articles flexible_page_element flex_articles_slider articles_slider_<?php echo $article_slider_style; ?> slider_title_<?php echo $artcile_slider_title_align;?>" itemprop="text">
			<div class="page_link_slider_wrap page_link_slider_<?php echo $count;?>">
				<div class="swiper-container articles_slider_<?php echo $count;?>">
					<div class="articles_slider_item_row page_slider swiper-wrapper">
						
					<?php if( $article_slider_source == 'manual' ): ?>
						
						<?php $item = 1; foreach( $flex_article_slider as $post ): ?>
						<?php setup_postdata($post); $item++;?>
					    <div class="page_link_slider_item articles_slider_item swiper-slide item-<?php echo $item;?>">
							<div class="articles_slider_item_container title_<?php echo $article_slider_title_position;?>">
								<div class="articles_slider_item_img box_effect">
									<a class="page-article-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( _e( 'Link to page %s', 'tkmulti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
										
									<?php if( $article_slider_style == 'style1' ){ ?>
									
										<div class="page_link_slider_animated">
											<div class="page_img_animated">
												<div class="page_img_animated_wrap">
													<div class="page_img_animated_container">
														<?php echo the_post_thumbnail($article_slider_img_size); ?>
													</div>
												</div>
											</div>
											<div class="page_content_animated">
												<h3 itemprop="name" class="page_link_slider_item_title no-line" style="font-size:<?php echo $artcile_slider_title_size;?>;"><?php the_title(); ?></h3>
												<?php 
												$excerpt = get_field('page_masthead_excerpt');
												if( $excerpt ) { ?>
												<div class="articles_grid_item_text">	
													<div class="page_links_item_intro">
														<?php 
														//echo custom_field_excerpt();
														//echo wp_trim_words($excerpt,7); 
														echo wp_html_excerpt( $excerpt, 50, '...' ); ?>
													</div>
												</div>
												<?php } ?> 
												<div class="articles_grid_item_indicator"></div>
											</div>
										</div>
										<script>
										jQuery(function($) {
											$(window).load(function(){
												get_text_height();
											    //function to get current div height
											    function get_text_height(){
											        //var footer_height = $('#footer_container').height();
											        var text_height = $('.section-<?php echo $row;?>-<?php echo $count;?> .item-<?php echo $item;?> .articles_grid_item_text').outerHeight();
											        $('.section-<?php echo $row;?>-<?php echo $count;?> .item-<?php echo $item;?> .articles_grid_item_text').css('margin-bottom', -text_height);
											    }
										    });	
										}); 
										</script>
									<?php } elseif( $article_slider_style == 'style2' ){ ?>	
									
										<?php if( $article_slider_title_position == 'top' ): ?>
										<div class="page_link_slider_item_title_wrap">
											<h3 itemprop="name" class="page_link_slider_item_title no-line" style="color:<?php echo $artcile_slider_title_color;?>;justify-content:<?php echo $artcile_slider_title_align;?>;font-size:<?php echo $artcile_slider_title_size;?>;"><?php the_title(); ?></h3>
										</div>
										<?php endif; ?>
									
										<div class="page_link_slider_item_img">
											<?php if( $article_slider_img == 'main_img' ): ?>
												<div class="page_img">
													<?php echo the_post_thumbnail($article_slider_img_size); ?>
													<div class="page_img_border"></div>
												</div>
											<?php endif; ?>
											
											<?php if( $article_slider_img == 'main_icon' ):
												$page_main_icon = get_field('page_main_icon');
												if( $page_main_icon ) { ?>
												<div class="page_img hover_img_mask" style="background:url(<?php echo wp_get_attachment_url( $page_main_icon, 'inside-post' ); ?>) 50% 50% / cover no-repeat;">
													<?php echo the_post_thumbnail($article_slider_img_size); ?>
												</div>
												<?php } else { ?> 
												<div class="page_img">
													<?php echo the_post_thumbnail($article_slider_img_size); ?> 
												</div>		
												<?php }
											endif; ?>
											
											<?php if( $article_slider_title_position == 'inside' ): ?>
											<div class="page_slider_inside">
												<h3 itemprop="name" class="page_link_slider_item_title no-line" style="color:<?php echo $artcile_slider_title_color;?>;justify-content:<?php echo $artcile_slider_title_align;?>;font-size:<?php echo $artcile_slider_title_size;?>;"><?php the_title(); ?></h3>
												<?php 
												$excerpt = get_field('page_masthead_excerpt');
												if( $excerpt ) { ?>
												<div class="articles_slider_item_text">	
													<div class="page_links_item_intro">
														<?php 
														//echo custom_field_excerpt();
														//echo wp_trim_words($excerpt,7); 
														echo wp_html_excerpt( $excerpt, 100, '...' ); ?>
													</div>
												</div>
												<script>
												jQuery(function($) {
													$(window).load(function(){
														get_text_height();
													    //function to get current div height
													    function get_text_height(){
													        //var footer_height = $('#footer_container').height();
													        var text_height = $('.section-<?php echo $row;?>-<?php echo $count;?> .item-<?php echo $item;?> .page_links_item_intro').outerHeight();
													        $('.section-<?php echo $row;?>-<?php echo $count;?> .item-<?php echo $item;?> .page_links_item_intro').css('margin-bottom', -text_height);
													    }
												    });	
												}); 
												</script>										
												<?php } ?> 
											</div>
											<?php endif; ?>	
											<?php if( $article_slider_title_position == 'bottom' ): ?>
											<div class="page_link_slider_item_title_wrap">
												<h3 itemprop="name" class="page_link_slider_item_title no-line" style="color:<?php echo $artcile_slider_title_color;?>;justify-content:<?php echo $artcile_slider_title_align;?>;font-size:<?php echo $artcile_slider_title_size;?>;"><?php the_title(); ?></h3>
											</div>
											<?php endif; ?>
										</div>

										<?php
										if( $article_slider_title_position == 'bottom' || $article_slider_title_position == 'top' ) { 
										$excerpt = get_field('page_masthead_excerpt');
										if( $excerpt ) { ?>
										<div class="articles_grid_item_text">	
											<div class="page_links_item_intro">
												<?php 
												//echo custom_field_excerpt();
												//echo wp_trim_words($excerpt,7); 
												echo wp_html_excerpt( $excerpt, 100, '...' ); ?>
											</div>
										</div>
										<?php 
											} 
										}
										?> 

									<?php } elseif( $article_slider_style == 'style3' ){ ?>

										<?php if( $article_slider_title_position == 'top' ): ?>
										<div class="page_link_slider_item_title_wrap">
											<h3 itemprop="name" class="page_link_slider_item_title no-line" style="color:<?php echo $artcile_slider_title_color;?>;justify-content:<?php echo $artcile_slider_title_align;?>;font-size:<?php echo $artcile_slider_title_size;?>;"><?php the_title(); ?></h3>
										</div>
										<?php endif; ?>

										<div class="page_link_slider_item_img">
											<?php if( $article_slider_img == 'main_img' ): ?>
											<div class="page_img">
												<?php echo the_post_thumbnail($article_slider_img_size); ?>
											</div>
											<?php endif; ?>
											
											<?php if( $article_slider_img == 'main_icon' ):
												$page_main_icon = get_field('page_main_icon');
												if( $page_main_icon ) { ?>
												<div class="page_img hover_img_mask" style="background:url(<?php echo wp_get_attachment_url( $page_main_icon, 'inside-post-360' ); ?>) 50% 50% / cover no-repeat;">
													<?php echo the_post_thumbnail($article_slider_img_size); ?>
												</div>
												<?php } else { ?> 
												<div class="page_img">
													<?php echo the_post_thumbnail($article_slider_img_size); ?> 
												</div>		
												<?php }
											endif; ?>
											<?php if( $article_slider_title_position == 'inside' ): ?>
											<div class="page_slider_inside">
												<h3 itemprop="name" class="page_link_slider_item_title no-line" style="color:<?php echo $artcile_slider_title_color;?>;justify-content:<?php echo $artcile_slider_title_align;?>;font-size:<?php echo $artcile_slider_title_size;?>;"><?php the_title(); ?></h3>
											</div>
											<?php endif; ?>	
										</div>
										
										<?php if( $article_slider_title_position == 'bottom' ): ?>
										<div class="page_link_slider_item_title_wrap">
											<h3 itemprop="name" class="page_link_slider_item_title no-line" style="color:<?php echo $artcile_slider_title_color;?>;justify-content:<?php echo $artcile_slider_title_align;?>;font-size:<?php echo $artcile_slider_title_size;?>;"><?php the_title(); ?></h3>
										</div>
										<?php endif; ?>
										<?php if( $artcile_slider_show_excerpt ) {
											$excerpt = get_field('page_masthead_excerpt');
											if( $excerpt ) { ?>
											<div class="articles_slider_item_text">	
												<div class="page_links_item_intro">
													<?php 
													//echo custom_field_excerpt();
													//echo wp_trim_words($excerpt,7); 
													echo wp_html_excerpt( $excerpt, 100, '...' ); ?>
												</div>
											</div>
											<?php } ?>
										<?php } ?>	
										<?php if( $article_slider_title_position == 'inside' ): ?>	
										<div class="pagination-button dark">
											<button class="page_link_slider_item_button section_readmore_link watch_btn hoverLink style3" style="color:<?php echo $artcile_slider_button_color;?>;font-size: ;">
											<?php _e('Read more', 'tkmulti'); ?></button>
										</div>
										<?php endif; ?>
										
									<?php } elseif( $article_slider_style == 'style4' ){ ?>	
										<div class="page_link_slider_item_img">
											<div class="page_img">
												<?php echo the_post_thumbnail($article_slider_img_size); ?>
											</div>
											<div class="page_link_slider_item_title_wrap">
												<div class="page_link_slider_item_title_inner">
													<h3 itemprop="name" class="page_link_slider_item_title no-line" style="color:<?php echo $artcile_slider_title_color;?>;font-size:<?php echo $artcile_slider_title_size;?>px;"><?php the_title(); ?></h3>
													<div class="slider_item_title_icon" style="color:<?php echo $artcile_slider_title_color;?>;">
														<?php if( $artcile_slider_title_icon ){ ?>
														<?php echo $artcile_slider_title_icon;?>
														<?php } else { ?>
														<span class="icon-cube"></span>
														<?php } ?>
													</div>
												</div>
											</div>
										</div>
									<?php } elseif( $article_slider_style == 'style5' ){ ?>	
										<div class="page_link_slider_item_img">
											<div class="page_img">
												<?php echo the_post_thumbnail($article_slider_img_size); ?>
												<div class="page_img_border"></div>
											</div>
										</div>
										<div class="page_link_slider_item_title_wrap">
											<h3 itemprop="name" class="page_link_slider_item_title no-line" style="color:<?php echo $artcile_slider_title_color;?>;justify-content:<?php echo $artcile_slider_title_align;?>;font-size:<?php echo $artcile_slider_title_size;?>px;"><?php the_title(); ?></h3>
											<?php if ( $article_slider_hide_date ){ ?>
											<?php } else { ?>
											<div class="entry-date"><?php echo get_the_date('d.m.y'); ?></div>
											<?php } ?>
										</div>
									<?php } ?> 
									</a>
								</div>	
							</div>
					    </div>
					    <?php endforeach; ?>
					    <?php wp_reset_postdata(); ?> 
					<?php endif; ?>    
				    <?php if( $article_slider_source == 'page' || $article_slider_source == 'post' || $article_slider_source == 'child' ):
					    if( $article_slider_source == 'page' ) {
						$argsA = array(
								'post_type' => 'page',
								'order'          => 'ASC',
								'orderby'	=> 'rand',
								'posts_per_page' => $article_slider_latest,
								'depth' => 1,
								'post__not_in' => array( $post->ID ),
							);
					    } elseif( $article_slider_source == 'child' ) {
							$argsA = array(
								'post_type' => 'page',
								'order'          => 'ASC',
								'orderby'        => 'menu_order',
								'posts_per_page' => $article_slider_latest,
								'depth' => 1,
								'post__not_in' => array( $post->ID ),
								'post_parent'    => $post->ID,
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
						if ( $the_queryA->have_posts() ) : $item = 1;
					    ?>
						<?php while ( $the_queryA->have_posts() ) : $the_queryA->the_post(); ?>
						<?php setup_postdata($post); ?>
						    <div class="page_link_slider_item articles_slider_item swiper-slide item-<?php echo $item;?>">
								<div class="articles_slider_item_container">
									<div class="articles_slider_item_img box_effect">
										<a class="page-article-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( _e( 'Link to page %s', 'tkmulti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
										
										<?php if( $article_slider_style == 'style1' ){ ?>
										
											<div class="page_link_slider_animated">
												<div class="page_img_animated">
													<div class="page_img_animated_wrap">
														<div class="page_img_animated_container">
															<?php echo the_post_thumbnail($article_slider_img_size); ?>
														</div>
													</div>
												</div>
												<div class="page_content_animated">
													<h3 itemprop="name" class="page_link_slider_item_title no-line" style="font-size:<?php echo $artcile_slider_title_size;?>;"><?php the_title(); ?></h3>
													<?php 
													$excerpt = get_field('page_masthead_excerpt');
													if( $excerpt ) { ?>
													<div class="articles_grid_item_text">	
														<div class="page_links_item_intro">
															<?php 
															//echo custom_field_excerpt();
															//echo wp_trim_words($excerpt,7); 
															echo wp_html_excerpt( $excerpt, 50, '...' ); ?>
														</div>
													</div>
													<?php } ?> 
													<div class="articles_grid_item_indicator"></div>
												</div>
											</div>
											<script>
											jQuery(function($) {
												$(window).load(function(){
													get_text_height();
												    //function to get current div height
												    function get_text_height(){
												        //var footer_height = $('#footer_container').height();
												        var text_height = $('.section-<?php echo $row;?>-<?php echo $count;?> .item-<?php echo $item;?> .articles_grid_item_text').outerHeight();
												        $('.section-<?php echo $row;?>-<?php echo $count;?> .item-<?php echo $item;?> .articles_grid_item_text').css('margin-bottom', -text_height);
												    }
											    });	
											}); 
											</script>
										<?php } elseif( $article_slider_style == 'style2' ){ ?>	
											<div class="page_link_slider_item_img">
												<div class="page_img">
													<?php echo the_post_thumbnail($article_slider_img_size); ?>
													<div class="page_img_border"></div>
												</div>
											</div>
											<div class="page_link_slider_item_title_wrap">
												<h3 itemprop="name" class="page_link_slider_item_title no-line" style="color:<?php echo $artcile_slider_title_color;?>;justify-content:<?php echo $artcile_slider_title_align;?>;font-size:<?php echo $artcile_slider_title_size;?>;"><?php the_title(); ?></h3>
												<?php 
												$excerpt = get_field('page_masthead_excerpt');
												if( $excerpt ) { ?>
												<div class="articles_grid_item_text">	
													<div class="page_links_item_intro">
														<?php 
														//echo custom_field_excerpt();
														echo wp_trim_words($excerpt,20); 
														//echo wp_html_excerpt( $excerpt, 30, '...' ); ?>
													</div>
												</div>
												<?php } ?> 
											</div>
										<?php } elseif( $article_slider_style == 'style3' ){ ?>	
											<div class="page_link_slider_item_img">
												<?php if( $article_slider_img == 'main_img' ): ?>
												<div class="page_img">
													<?php echo the_post_thumbnail($article_slider_img_size); ?>
												</div>
												<?php endif; ?>
												
												<?php if( $article_slider_img == 'main_icon' ):
													$page_main_icon = get_field('page_main_icon');
													if( $page_main_icon ) { ?>
													<div class="page_img hover_img_mask" style="background:url(<?php echo wp_get_attachment_url( $page_main_icon, 'inside-post-360' ); ?>) 50% 50% / cover no-repeat;">
														<?php echo the_post_thumbnail($article_slider_img_size); ?>
													</div>
													<?php } else { ?> 
													<div class="page_img">
														<?php echo the_post_thumbnail($article_slider_img_size); ?> 
													</div>		
													<?php }
												endif; ?>
													
												<div class="page_link_slider_item_title_wrap">
													<h3 itemprop="name" class="page_link_slider_item_title no-line" style="color:<?php echo $artcile_slider_title_color;?>;font-size:<?php echo $artcile_slider_title_size;?>;"><?php the_title(); ?></h3>
												</div>
											</div>
											<div class="pagination-button dark">
												<button class="page_link_slider_item_button section_readmore_link watch_btn hoverLink style3" style="color:<?php echo $artcile_slider_button_color;?>;font-size: ;">
												<?php _e('Read more', 'tkmulti'); ?></button>
											</div>
											
										<?php } elseif( $article_slider_style == 'style4' ){ ?>	
											<div class="page_link_slider_item_img">
												<div class="page_img">
													<?php echo the_post_thumbnail($article_slider_img_size); ?>
												</div>
												
												<div class="page_link_slider_item_title_wrap">
													<div class="page_link_slider_item_title_inner">
														<h3 itemprop="name" class="page_link_slider_item_title no-line" style="color:<?php echo $artcile_slider_title_color;?>;font-size:<?php echo $artcile_slider_title_size;?>px;"><?php the_title(); ?></h3>
														<div class="slider_item_title_icon" style="color:<?php echo $artcile_slider_title_color;?>;">
															<?php if( $artcile_slider_title_icon ){ ?>
															<?php echo $artcile_slider_title_icon;?>
															<?php } else { ?>
															<span class="icon-cube"></span>
															<?php } ?>
														</div>
													</div>
												</div>
											</div>
										<?php } elseif( $article_slider_style == 'style5' ){ ?>	
											<div class="page_link_slider_item_img">
												<div class="page_img">
													<?php echo the_post_thumbnail($article_slider_img_size); ?>
													<div class="page_img_border"></div>
												</div>
											</div>
											<div class="page_link_slider_item_title_wrap">
												<h3 itemprop="name" class="page_link_slider_item_title no-line" style="color:<?php echo $artcile_slider_title_color;?>;justify-content:<?php echo $artcile_slider_title_align;?>;font-size:<?php echo $artcile_slider_title_size;?>px;"><?php the_title(); ?></h3>
												
												<div class="entry-date"><?php echo get_the_date('d.m.y'); ?></div>
											</div>
										<?php } ?> 
										
										</a>
									</div>	
								</div>
						    </div>
						    <?php $item++;endwhile; ?>
						    <?php wp_reset_postdata(); ?> 				
						<?php endif; ?>
					<?php endif; ?>    				
					</div>
				</div>
			    <!-- Add Arrows -->
			    <div class="swiper-pagination"></div>
			    <div class="swiper-button-next"></div>
			    <div class="swiper-button-prev"></div>
				
			</div>
			
		</div>
						


	</section>
	<script>					
	jQuery(function($) {
		//* ## Page Link Slider */
	    let options<?php echo $row;?><?php echo $count;?> = {};
	    
	    if ( $("#section-<?php echo $row;?>-<?php echo $count;?> .swiper-slide").length > 1 ) {
	        options<?php echo $row;?><?php echo $count;?> = {
	            //direction: 'horizontal',
	            loop: true,
	            slidesPerView : <?php echo $article_slider_count;?>,
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
						slidesPerView : 2,
			        },
					520: {
						slidesPerView : 1,
			        }
				}
				        
	        }
	        //$('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-next').show();
	        //$('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-prev').show();
	    } else {
	        options<?php echo $row;?><?php echo $count;?> = {
	            loop: false,
	            slidesPerView : <?php echo $article_slider_count;?>,
	            autoplay: false,
	            watchOverflow: true,
	            navigation: false,
	        }
	    }
	    var topSlider<?php echo $row;?><?php echo $count;?> = new Swiper('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-container ', options<?php echo $row;?><?php echo $count;?>);	
	    
	    if ( $("#section-<?php echo $row;?>-<?php echo $count;?> .swiper-slide:not(.swiper-slide-duplicate)").length > <?php echo $article_slider_count;?> ) {
	        $('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-next').show();
	        $('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-button-prev').show();
	        $('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-pagination').show();		    
	    }
	    
	    if ($(window).width() < 991) {
		    if ( $("#section-<?php echo $row;?>-<?php echo $count;?> .swiper-slide:not(.swiper-slide-duplicate)").length > 1 ) {
				$('#section-<?php echo $row;?>-<?php echo $count;?> .swiper-pagination').show();
		    }
	    }							

	}); 
					
	</script>	
</div>
<?php if( $artcile_slider_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>
