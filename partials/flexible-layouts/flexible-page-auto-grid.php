<?php 
$article_auto_grid_block_width = get_sub_field('flex_article_auto_grid_block_width');
$article_auto_grid_order = get_sub_field('flex_article_auto_grid_order');
$article_auto_grid_mobile = get_sub_field('flex_article_auto_grid_mobile');
$article_auto_grid_hide_mobile = get_sub_field('flex_article_auto_grid_hide_mobile');
$article_auto_grid_break = get_sub_field('flex_article_auto_grid_break');
$article_auto_grid_block_align = get_sub_field('flex_article_auto_grid_block_align');
$article_auto_grid_animation = get_sub_field('flex_article_auto_grid_animation');

$article_auto_grid_title_position = get_sub_field('flex_article_auto_grid_title_position');
$article_auto_grid_title_size = get_sub_field('flex_article_auto_grid_title_size');
$article_auto_grid_title_align = get_sub_field('flex_article_auto_grid_title_align');
$article_auto_grid_title_color = get_sub_field('flex_article_auto_grid_title_color');
$article_auto_grid_style = get_sub_field('flex_article_auto_grid_style');

$article_auto_grid_source = get_sub_field('flex_article_auto_grid_source');
$article_auto_grid_perpage = get_sub_field('flex_article_auto_grid_perpage');
$grid_show_info = get_sub_field('flex_article_auto_grid_show_info');
$grid_excerpt_length = get_sub_field('flex_article_auto_grid_excerpt_length');
$flex_article_auto_grid = get_sub_field('flex_article_auto_grid');
$article_auto_grid_count = get_sub_field('flex_article_auto_grid_count');
$article_auto_grid_img = get_sub_field('flex_article_auto_grid_img');
$article_auto_grid_img_effect = get_sub_field('flex_article_auto_grid_img_effect');
$article_auto_grid_img_size = get_sub_field('flex_article_auto_grid_img_size');


if ( $article_auto_grid_count == 1 ) : $ag_xs_cols = "12"; $ag_sm_cols = "12"; $ag_md_cols = "12"; 
elseif ( $article_auto_grid_count == 2 ) : $ag_xs_cols = "12"; $ag_sm_cols = "6"; $ag_md_cols = "6"; 
elseif ( $article_auto_grid_count == 3 ) : $ag_xs_cols = "12"; $ag_sm_cols = "4"; $ag_md_cols = "4"; 
elseif ( $article_auto_grid_count == 4 ) : $ag_xs_cols = "12"; $ag_sm_cols = "3"; $ag_md_cols = "3";
elseif ( $article_auto_grid_count == 5 ) : $ag_xs_cols = "12"; $ag_sm_cols = "3"; $ag_md_cols = "20"; 
endif; 

if ( $article_auto_grid_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $article_auto_grid_mobile;?> <?php echo $article_auto_grid_block_width;?> <?php if( $article_auto_grid_break ){ ?><?php echo $article_auto_grid_block_align; ?><?php } ?>" <?php if( $article_auto_grid_order ){ ?>style="order:<?php echo $article_auto_grid_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $article_auto_grid_animation;?>">

		<div class="flexible_articles flexible_page_element" itemprop="text">
			<div class="page_link_grid_wrap grid_<?php echo $article_auto_grid_style;?> grid_title_<?php echo $article_auto_grid_title_align;?><?php if( $article_auto_grid_img_effect ) { ?> grid_bw<?php } ?> ">
								
				<div class="articles_grid_item_row page_grid row-flex">
				    <?php
				    if( $article_auto_grid_source == 'page' ) {
					$argsA = array(
							'post_type' => 'page',
							'order'          => 'ASC',
							'orderby'	=> 'rand',
							'posts_per_page' => $article_auto_grid_perpage,
							'depth' => 1,
							'post__not_in' => array( $post->ID ),
						);
				    } elseif( $article_auto_grid_source == 'child' ) {
						$argsA = array(
							'post_type' => 'page',
							'order'          => 'ASC',
							'orderby'        => 'menu_order',
							'posts_per_page' => $article_auto_grid_perpage,
							'depth' => 1,
							'post__not_in' => array( $post->ID ),
							'post_parent'    => $post->ID,
						);
				    } elseif( $article_auto_grid_source == 'sibling' ) {
						$argsA = array(
							//'post_type' => 'page',
							'order'          => 'ASC',
							'orderby'        => 'menu_order',
							'posts_per_page' => $article_auto_grid_perpage,
							'depth' => 1,
							'post__not_in' => array( $post->ID ),
							//'post_parent'    => $post->ID,
							'child_of' => $post->post_parent,
							'exclude' => $post->ID,
						);
				    } else {
						$argsA = array(
							'post_type' => 'post',
							'order'          => 'ASC',
							'orderby'	=> 'rand',
							'posts_per_page' => $article_auto_grid_perpage,
							'depth' => 1,
							'post__not_in' => array( $post->ID ),
						);
				    }
					$the_queryA = new WP_Query( $argsA );
					if ( $the_queryA->have_posts() ) : $item = 1;
				    ?>
					<?php while ( $the_queryA->have_posts() ) : $the_queryA->the_post(); ?>
					<?php setup_postdata($post); ?>
			    
				    <?php if( $article_auto_grid_style == 'style1' || $article_auto_grid_style == 'style2' ){ ?> 
				    <div class="page_link_grid_item articles_grid_item item-<?php echo $item;?> col-xs-<?= $ag_xs_cols; ?> col-sm-<?= $ag_sm_cols; ?> col-md-<?= $ag_md_cols; ?>">
					<?php } elseif( $article_auto_grid_style == 'style3' ) { ?>    
				    <div class="page_link_grid_item articles_grid_item item-<?php echo $item;?>">
					<?php } ?>    
					<?php if( $article_auto_grid_style == 'style1' ){ ?>    
						<div class="articles_grid_item_container title_<?php echo $article_auto_grid_title_position;?>">
							<div class="articles_grid_item_img box_effect">
								<a class="page-article-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( _e( 'Link to page %s', 'tkmulti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
									
								<?php if( $article_auto_grid_title_position == 'top' ): ?>
								<div class="page_link_grid_item_title_wrap">
									<h3 itemprop="name" class="page_link_grid_item_title no-line" style="font-size:<?php echo $article_auto_grid_title_size;?>px;color:<?php echo $article_auto_grid_title_color;?>;"><?php the_title(); ?></h3>
								</div>
								<?php endif; ?>
								
								<div class="page_link_grid_item_img">
									<?php if( $article_auto_grid_img == 'main_img' ): ?>
										<div class="page_img">
											<?php echo the_post_thumbnail($article_auto_grid_img_size); ?>
											<div class="page_img_border"></div>
										</div>
									<?php endif; ?>
									
									<?php if( $article_auto_grid_img == 'main_icon' ):
										$page_main_icon = get_field('page_main_icon');
										if( $page_main_icon ) { ?>
										<div class="page_img hover_img_mask" style="background:url(<?php echo wp_get_attachment_url( $page_main_icon, $article_auto_grid_img_size ); ?>) 50% 50% / cover no-repeat;">
											<?php echo the_post_thumbnail($article_auto_grid_img_size); ?>
										</div>
										<?php } else { ?> 
										<div class="page_img">
											<?php echo the_post_thumbnail($article_auto_grid_img_size); ?> 
										</div>		
										<?php }
									endif; ?>
									<?php if( $article_auto_grid_title_position == 'inside' ): ?>
									<div class="page_grid_inside">
										<h3 itemprop="name" class="page_link_grid_item_title no-line" style="font-size: <?php echo $article_auto_grid_title_size;?>px;color:<?php echo $article_auto_grid_title_color;?>;"><?php the_title(); ?></h3>
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
								<?php if( $article_auto_grid_title_position == 'bottom' ): ?>
								<div class="page_link_grid_item_title_wrap">
									<h3 itemprop="name" class="page_link_grid_item_title no-line" style="font-size: <?php echo $article_auto_grid_title_size;?>px;color:<?php echo $article_auto_grid_title_color;?>;"><?php the_title(); ?></h3>
								</div>
								<?php endif; ?>
								
								<?php
								if( $grid_show_info && $article_auto_grid_title_position == 'bottom' || $article_auto_grid_title_position == 'top' ) { 
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
					<?php } elseif( $article_auto_grid_style == 'style2' ){ ?>	
						<div class="articles_grid_item_container title_<?php echo $article_auto_grid_title_align;?>">
							<div class="articles_grid_item_container_wrap">
								<a class="page-article-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( _e( 'Link to page %s', 'tkmulti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
									<div class="articles_grid_item_row row-flex">
										<div class="articles_grid_item_img col-xs-12 col-sm-6 col-md-4 col-lg-3">
											<?php echo the_post_thumbnail($article_auto_grid_img_size); ?>
										</div>
										<div class="articles_grid_item_content col-xs-12 col-sm-6 col-md-8 col-lg-9">
											<div class="articles_grid_item_inside">
												<h3 itemprop="name" class="page_link_grid_item_title no-line" style="font-size: <?php echo $article_auto_grid_title_size;?>px;color:<?php echo $article_auto_grid_title_color;?>;"><?php the_title(); ?></h3>
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
												<?php } ?>
												
												<div class="articles_grid_item_readon">קרא עוד >></div>

											</div>
										</div>
									</div>
								</a>
							</div>	
						</div>
					<?php } elseif( $article_auto_grid_style == 'style3' ){ ?>		
						<div class="articles_grid_item_container title_inside">
							<div class="articles_grid_item_img box_effect">
								<a class="page-article-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( _e( 'Link to page %s', 'tkmulti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
									
								<div class="page_link_grid_item_img">
									<?php if( $article_auto_grid_img == 'main_img' ): ?>
										<div class="page_img">
											<?php echo the_post_thumbnail('gallery-800'); ?>
											<div class="page_img_border"></div>
										</div>
									<?php endif; ?>
									
									<?php if( $article_auto_grid_img == 'main_icon' ):
										$page_main_icon = get_field('page_main_icon');
										if( $page_main_icon ) { ?>
										<div class="page_img hover_img_mask" style="background:url(<?php echo wp_get_attachment_url( $page_main_icon, $article_auto_grid_img_size ); ?>) 50% 50% / cover no-repeat;">
											<?php echo the_post_thumbnail($article_auto_grid_img_size); ?>
										</div>
										<?php } else { ?> 
										<div class="page_img">
											<?php echo the_post_thumbnail($article_auto_grid_img_size); ?> 
										</div>		
										<?php }
									endif; ?>
									<div class="page_grid_inside">
										<h3 itemprop="name" class="page_link_grid_item_title no-line" style="font-size: <?php echo $article_auto_grid_title_size;?>px;color:<?php echo $article_auto_grid_title_color;?>;"><?php the_title(); ?></h3>
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
								</div>
								</a>
							</div>	
						</div>
					<?php } ?>	
				    </div>
				    <?php $item++;endwhile; ?>
				    <?php wp_reset_postdata(); ?> 				
					<?php endif; ?>
				</div> 
				    				
			</div>
		</div>

	</section>
</div>
<?php if( $article_auto_grid_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>
