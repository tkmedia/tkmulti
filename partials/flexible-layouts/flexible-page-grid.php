<?php 
$article_grid_block_width = get_sub_field('flex_article_grid_block_width');
$article_grid_order = get_sub_field('flex_article_grid_order');
$article_grid_mobile = get_sub_field('flex_article_grid_mobile');
$article_grid_hide_mobile = get_sub_field('flex_article_grid_hide_mobile');
$article_grid_break = get_sub_field('flex_article_grid_break');
$article_grid_block_align = get_sub_field('flex_article_grid_block_align');

$article_grid_title_position = get_sub_field('flex_article_grid_title_position');
$artcile_grid_title_size = get_sub_field('flex_article_grid_title_size');
$artcile_grid_title_align = get_sub_field('flex_article_grid_title_align');
$artcile_grid_title_color = get_sub_field('flex_article_grid_title_color');
$article_grid_style = get_sub_field('flex_article_grid_style');

$flex_article_grid_paginate = get_sub_field('flex_article_grid_paginate');
$flex_article_grid_perpage = get_sub_field('flex_article_grid_perpage');
$grid_show_info = get_sub_field('flex_article_grid_show_info');
$grid_excerpt_length = get_sub_field('flex_article_grid_excerpt_length');
$flex_article_grid = get_sub_field('flex_article_grid');
$article_grid_count = get_sub_field('flex_article_grid_count');
$article_grid_img = get_sub_field('flex_article_grid_img');
$article_grid_animation = get_sub_field('flex_article_grid_animation');

if ( $article_grid_count == 1 ) : $ag_xs_cols = "12"; $ag_sm_cols = "12"; $ag_md_cols = "12"; 
elseif ( $article_grid_count == 2 ) : $ag_xs_cols = "12"; $ag_sm_cols = "6"; $ag_md_cols = "6"; 
elseif ( $article_grid_count == 3 ) : $ag_xs_cols = "12"; $ag_sm_cols = "4"; $ag_md_cols = "4"; 
elseif ( $article_grid_count == 4 ) : $ag_xs_cols = "12"; $ag_sm_cols = "3"; $ag_md_cols = "3";
elseif ( $article_grid_count == 5 ) : $ag_xs_cols = "12"; $ag_sm_cols = "3"; $ag_md_cols = "20"; 
endif; 

if ( $article_grid_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $article_grid_mobile;?> <?php echo $article_grid_block_width;?> <?php if( $article_grid_break ){ ?><?php echo $article_grid_block_align; ?><?php } ?>" <?php if( $article_grid_order ){ ?>style="order:<?php echo $article_grid_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $article_grid_animation;?>">

		<div class="flexible_articles flexible_page_element" itemprop="text">
			<div class="page_link_grid_wrap grid_<?php echo $article_grid_style;?> grid_title_<?php echo $artcile_grid_title_align;?>">
				
				<?php if( $flex_article_grid_paginate == 'no-paginate' ) { ?>
				
				<div class="articles_grid_item_row page_grid row-flex">
				<?php $item = 1; foreach( $flex_article_grid as $post ): ?>
				<?php setup_postdata($post); $item++; ?>                     
			    
				    <div class="page_link_grid_item articles_grid_item item-<?php echo $item;?> col-xs-<?= $ag_xs_cols; ?> col-sm-<?= $ag_sm_cols; ?> col-md-<?= $ag_md_cols; ?>">
					    
					<?php if( $article_grid_style == 'style1' ){ ?>    
						<div class="articles_grid_item_container title_<?php echo $article_grid_title_position;?>">
							<div class="articles_grid_item_img box_effect">
								<a class="page-article-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'קישור לעמוד %s', 'tkmulti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
									
								<?php if( $article_grid_title_position == 'top' ): ?>
								<div class="page_link_grid_item_title_wrap">
									<h3 itemprop="name" class="page_link_grid_item_title no-line" style="font-size:<?php echo $artcile_grid_title_size;?>px;color:<?php echo $artcile_grid_title_color;?>;"><?php the_title(); ?></h3>
								</div>
								<?php endif; ?>
								
								<div class="page_link_grid_item_img">
									<?php if( $article_grid_img == 'main_img' ): ?>
										<div class="page_img">
											<?php echo the_post_thumbnail('inside-post'); ?>
											<div class="page_img_border"></div>
										</div>
									<?php endif; ?>
									
									<?php if( $article_grid_img == 'main_icon' ):
										$page_main_icon = get_field('page_main_icon');
										if( $page_main_icon ) { ?>
										<div class="page_img hover_img_mask" style="background:url(<?php echo wp_get_attachment_url( $page_main_icon, 'inside-post-360' ); ?>) 50% 50% / cover no-repeat;">
											<?php echo the_post_thumbnail('inside-post'); ?>
										</div>
										<?php } else { ?> 
										<div class="page_img">
											<?php echo the_post_thumbnail('inside-post'); ?> 
										</div>		
										<?php }
									endif; ?>
									<?php if( $article_grid_title_position == 'inside' ): ?>
									<div class="page_grid_inside">
										<h3 itemprop="name" class="page_link_grid_item_title no-line" style="font-size: <?php echo $artcile_grid_title_size;?>px;color:<?php echo $artcile_grid_title_color;?>;"><?php the_title(); ?></h3>
										<?php 
										$excerpt = get_field('page_masthead_excerpt');
										if( $excerpt ) { ?>
										<div class="articles_grid_item_text">	
											<div class="page_links_item_intro">
												<?php 
												//echo custom_field_excerpt();
												//echo wp_trim_words($excerpt,7); 
												echo wp_html_excerpt( $excerpt, $grid_excerpt_length, '...' ); ?>
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
								</div>
								<?php if( $article_grid_title_position == 'bottom' ): ?>
								<div class="page_link_grid_item_title_wrap">
									<h3 itemprop="name" class="page_link_grid_item_title no-line" style="font-size: <?php echo $artcile_grid_title_size;?>px;color:<?php echo $artcile_grid_title_color;?>;"><?php the_title(); ?></h3>
								</div>
								<?php endif; ?>
								
								<?php
								if( $grid_show_info && $article_grid_title_position == 'bottom' || $article_grid_title_position == 'top' ) { 
								$excerpt = get_field('page_masthead_excerpt');
								if( $excerpt ) { ?>
								<div class="articles_grid_item_text">	
									<div class="page_links_item_intro">
										<?php 
										//echo custom_field_excerpt();
										//echo wp_trim_words($excerpt,7); 
										echo wp_html_excerpt( $excerpt, $grid_excerpt_length, '...' ); ?>
									</div>
								</div>
								<?php 
									} 
								}
								?> 
								</a>
							</div>	
						</div>
					<?php } elseif( $article_grid_style == 'style2' ){ ?>	
					<?php } elseif( $article_grid_style == 'style3' ){ ?>		
					
					<?php } ?>	
				    </div>
			    <?php endforeach; ?>
			    <?php wp_reset_postdata(); ?>
				</div> 
				
				
				<?php } else { ?>
				<?php
				/*  Paginate Advanced Custom Field */
				if( get_query_var('page') ) {
				  $page = get_query_var( 'page' );
				} else {
				  $page = 1;
				}
				// Variables
				$grid_row              = 0;
				$article_per_page  = $flex_article_grid_perpage; // How many to display on each page
				$total            = count( $flex_article_grid );
				$pages            = ceil( $total / $article_per_page );
				$min              = ( ( $page * $article_per_page ) - $article_per_page ) + 1;
				$max              = ( $min + $article_per_page ) - 1;
				 ?>
								
				<div class="articles_grid_item_row page_grid row-flex">
				<?php $item = 1; foreach( $flex_article_grid as $post ): ?>
				<?php setup_postdata($post); $item++;
				    $grid_row++;
				    // Ignore this item if $row is lower than $min
				    if($grid_row < $min) { continue; }
				    // Stop loop completely if $row is higher than $max
				    if($grid_row > $max) { break; } ?>                     
			    
				    <div class="page_link_grid_item articles_grid_item item-<?php echo $item;?> col-xs-<?= $ag_xs_cols; ?> col-sm-<?= $ag_sm_cols; ?> col-md-<?= $ag_md_cols; ?>">
						<div class="articles_grid_item_container">
							<div class="articles_grid_item_img box_effect">
								<a class="page-article-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'קישור לעמוד %s', 'tkmulti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
									
								<?php if( $article_grid_title_position == 'top' ): ?>
								<div class="page_link_grid_item_title_wrap">
									<h3 itemprop="name" class="page_link_grid_item_title no-line" style="font-size: <?php echo $artcile_grid_title_size;?>px;color:<?php echo $artcile_grid_title_color;?>;"><?php the_title(); ?></h3>
								</div>
								<?php endif; ?>
								
								<div class="page_link_grid_item_img">
									<?php if( $article_grid_img == 'main_img' ): ?>
										<div class="page_img">
											<?php echo the_post_thumbnail('inside-post'); ?>
										</div>
									<?php endif; ?>
									
									<?php if( $article_grid_img == 'main_icon' ):
										$page_main_icon = get_field('page_main_icon');
										if( $page_main_icon ) { ?>
										<div class="page_img hover_img_mask" style="background:url(<?php echo wp_get_attachment_url( $page_main_icon, 'inside-post-360' ); ?>) 50% 50% / cover no-repeat;">
											<?php echo the_post_thumbnail('inside-post'); ?>
										</div>
										<?php } else { ?> 
										<div class="page_img">
											<?php echo the_post_thumbnail('inside-post'); ?> 
										</div>		
										<?php }
									endif; ?>
										
								</div>
								<?php if( $article_grid_title_position == 'bottom' ): ?>
								<div class="page_link_grid_item_title_wrap">
									<h3 itemprop="name" class="page_link_grid_item_title no-line" style="font-size: <?php echo $artcile_grid_title_size;?>px;color:<?php echo $artcile_grid_title_color;?>;"><?php the_title(); ?></h3>
								</div>
								<?php endif; ?>
								
								<?php
								if( $grid_show_info ) { 
								$excerpt = get_field('page_masthead_excerpt');
								if( $excerpt ) { ?>
								<div class="articles_grid_item_text">	
									<div class="page_links_item_intro">
										<?php 
										//echo custom_field_excerpt();
										//echo wp_trim_words($excerpt,7); 
										echo wp_html_excerpt( $excerpt, $grid_excerpt_length, '...' ); ?>
									</div>
								</div>
								<?php 
									} 
								}
								?> 
								</a>
							</div>	
						</div>
				    </div>
			    <?php endforeach; ?>
			    <?php wp_reset_postdata(); ?>
				</div> 
				<?php } ?>    
				    				
			</div>
		</div>

		<?php if( $flex_article_grid_paginate == 'new_page' ) { ?>
			<div class="articles_pagination">
			<?php 
			echo paginate_links( array(
				'base' => get_permalink() . '%#%' . '/',
				'format' => '?page=%#%',
				'current' => $page,
				'total' => $pages
			) );
			?>
			</div>
		<?php } ?>
		
		<?php if( $flex_article_grid_paginate == 'load_more' ) { ?>
			<script>
			jQuery(function($) {
				$('.section-<?php echo $row;?>-<?php echo $count;?> .page_grid').infiniteScroll({
					// options
					path: '.section-<?php echo $row;?>-<?php echo $count;?> .pagination__next',
					append: '.section-<?php echo $row;?>-<?php echo $count;?> .articles_grid_item',
					history: false,
					button: '.section-<?php echo $row;?>-<?php echo $count;?> .load-next-button',
					loadOnScroll: false,
					status: '.section-<?php echo $row;?>-<?php echo $count;?> .page-load-status',
					scrollThreshold: false,
					hideNav: '.section-<?php echo $row;?>-<?php echo $count;?> .pagination',
				});		
			});	
			</script>
				
			<div class="page-load-status">
				<div class="loader-ellips infinite-scroll-request">
					<span class="loader-ellips__dot"></span>
					<span class="loader-ellips__dot"></span>
					<span class="loader-ellips__dot"></span>
					<span class="loader-ellips__dot"></span>
				</div>
				<p class="infinite-scroll-last"><?php _e('End content', 'tkmulti'); ?></p>
				<p class="infinite-scroll-error"><?php _e('No more to load', 'tkmulti'); ?></p>
			</div>
			<div class="pagination-button dark">
			<button class="load-next-button section_readmore_link watch_btn hoverLink style3"><?php _e('Show more', 'tkmulti'); ?></button>
			</div>					
			<div class="pagination">
				<a class="pagination__next" href="<?php echo get_permalink() . '/2'?>"></a>
			</div>
			
		<?php } ?>

	</section>
</div>
<?php if( $article_grid_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>
