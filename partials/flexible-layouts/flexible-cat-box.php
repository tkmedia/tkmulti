<?php 
$cat_box_grid_block_width = get_sub_field('flex_cat_box_grid_block_width');
$cat_box_grid_order = get_sub_field('flex_cat_box_grid_order');
$cat_box_grid_mobile = get_sub_field('flex_cat_box_grid_mobile');
$cat_box_grid_hide_mobile = get_sub_field('flex_cat_box_grid_hide_mobile');
$cat_box_grid_break = get_sub_field('flex_cat_box_grid_break');
$cat_box_grid_block_align = get_sub_field('flex_cat_box_grid_block_align');

$cat_box_grid = get_sub_field('flex_cat_box_grid');
$cat_box_grid_count = get_sub_field('flex_cat_box_grid_count');
$cat_box_grid_animation = get_sub_field('flex_cat_box_grid_animation');

if ( $cat_box_grid_count == 1 ) : $ag_xs_cols = "12"; $ag_sm_cols = "6"; $ag_md_cols = "6"; 
elseif ( $cat_box_grid_count == 2 ) : $ag_xs_cols = "12"; $ag_sm_cols = "6"; $ag_md_cols = "6"; 
elseif ( $cat_box_grid_count == 3 ) : $ag_xs_cols = "12"; $ag_sm_cols = "6"; $ag_md_cols = "4";
endif; 

if ( $cat_box_grid_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $cat_box_grid_mobile;?> <?php echo $cat_box_grid_block_width;?> <?php if( $cat_box_grid_break ){ ?><?php echo $cat_box_grid_block_align; ?><?php } ?>" <?php if( $cat_box_grid_order ){ ?>style="order:<?php echo $cat_box_grid_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $cat_box_grid_animation;?>">

		<div class="cat_box_grid flexible_page_element" itemprop="text">
			<div class="cat_box_grid_wrap">
				<div class="cat_box_grid_item_row page_grid row-flex">
				<?php foreach( $cat_box_grid as $post ): ?>
				<?php setup_postdata($post); ?>                     
			    
				    <div class="cat_box_grid_item col-xs-<?= $ag_xs_cols; ?> col-sm-<?= $ag_sm_cols; ?> col-md-<?= $ag_md_cols; ?>">
						<div class="cat_box_grid_item_wrap">
							<div class="cat_box_grid_item_wrap_inner">
								<div class="cat_box_grid_item_front">
									<div class="cat_box_grid_item_container">
										<div class="cat_box_grid_item_inner">
											<div class="cat_box_grid_item_top">
												<?php $page_main_icon = get_field('page_main_icon');
												if( $page_main_icon ) { ?>
												<div class="cat_page_main_icon">
													<?php echo wp_get_attachment_image( $page_main_icon, 'full' ); ?>
												</div>
												<?php } ?> 
												<div class="cat_box_grid_item_title_wrap">
													<h3 itemprop="name" class="cat_box_grid_item_item_title no-line">
														<?php the_title(); ?>
													</h3>
												</div>
											</div>
										</div>
									</div>
								</div>
								<div class="cat_box_grid_item_effect">
									<div class="cat_box_grid_item_container">
										<div class="cat_box_grid_item_inner">
											<div class="cat_box_grid_item_top">
												<div class="cat_box_grid_item_title_wrap">
													<div itemprop="name" class="cat_box_grid_item_item_title no-line">
														<?php the_title(); ?>
													</div>
												</div>
											</div>
											<div class="cat_box_grid_item_children">
												<div class="cat_children_row row-flex">
		
												<?php 												
												if ($post->post_parent) {
												        $ancestors=get_post_ancestors($post->ID);
												        $root=count($ancestors)-1;
												        $parent = $ancestors[$root];
												} else {
												        $parent = $post->ID;
												}
												 
												$children = get_pages('child_of='.$parent);
												$child_pages = array(1);
												 
												foreach($children as $child) {
												    array_push($child_pages,$child->ID);
												}
												$all_pages = implode(",",$child_pages);
												 
												if( count( $children ) != 0 ) {
													foreach( $children as $post ) { 
												        setup_postdata( $post ); ?>
														<div class="cat_children_item col-xs-12 col-sm-6 page-<?php the_ID(); ?>">
															<a class="page-article-link" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'קישור לעמוד %s', 'tkmulti' ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">
															<?php the_title(); ?>
															</a>
														</div>									
													<?php } 
												}?>
		
												</div>
											</div>
										</div>
									</div>
									
									
								</div>
							</div>
						</div>
				    </div>
			    <?php endforeach; ?>
			    <?php wp_reset_postdata(); ?>
				</div> 
				    				
			</div>
		</div>
			
	</section>
</div>
<?php if( $cat_box_grid_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>
