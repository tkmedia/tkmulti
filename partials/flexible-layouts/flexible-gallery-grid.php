<?php 
$gallery_grid_block_width = get_sub_field('flex_gallery_grid_block_width');
$gallery_grid_order = get_sub_field('flex_gallery_grid_order');
$gallery_grid_mobile = get_sub_field('flex_gallery_grid_mobile');
$gallery_grid_hide_mobile = get_sub_field('flex_gallery_grid_hide_mobile');
$gallery_grid_break = get_sub_field('flex_gallery_grid_break');
$gallery_grid_block_align = get_sub_field('flex_gallery_grid_block_align');

$content_gallery_grid = get_sub_field('flex_gallery_grid_img');
$content_gallery_grid_title = get_sub_field('flex_gallery_grid_title');
$content_gallery_grid_title_a = get_sub_field('flex_gallery_grid_title_a');
$content_gallery_grid_intro = get_sub_field('flex_gallery_grid_intro');
$content_gallery_grid_type = get_sub_field('flex_gallery_grid_type');
$gallery_cols = get_sub_field('flex_gallery_grid_col');
$gallery_cols_open = get_sub_field('flex_gallery_grid_open');
$show_more = get_sub_field('flex_gallery_grid_title_show_more');
$show_less = get_sub_field('flex_gallery_grid_title_show_less');
$size = 'product-500c'; // (thumbnail, medium, large, full or custom size)
$m_size = 'inside-post';
$gallery_grid_btn_color = get_sub_field('flex_gallery_grid_btn_color');
$gallery_grid_animation = get_sub_field('flex_gallery_grid_animation');

if ( $gallery_grid_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $gallery_grid_mobile;?> <?php echo $gallery_grid_block_width;?> <?php if( $gallery_grid_break ){ ?><?php echo $gallery_grid_block_align; ?><?php } ?>" <?php if( $gallery_grid_order ){ ?>style="order:<?php echo $gallery_grid_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $gallery_grid_animation;?>">

		<div class="grid_gallery flexible_page_element <?php echo $content_gallery_grid_type; ?>" itemprop="text">
			<div class="grid_gallery_wrap wrap">
				<?php if( $content_gallery_grid_title || $content_gallery_grid_intro) { ?>
				<div class="grid_gallery_top">
					<?php if( $content_gallery_grid_title ) { ?>
					<h2 class="section_title section_flex_title title_<?php echo $content_gallery_grid_title_a; ?>" style="text-align:<?php echo $content_gallery_grid_title_a; ?> !important;"><?php echo $content_gallery_grid_title; ?></h2>
					<?php } ?>				
					<?php if( $content_gallery_grid_intro ) { ?>
					<div class="content_gallery_grid_intro"><?php echo $content_gallery_grid_intro; ?></div>
					<?php } ?>
				</div>
				<?php } ?>
				<div class="grid_gallery_container">
					<?php if( $content_gallery_grid_type == 'grid_masonry' ) { ?>
					<?php 
					$countitem = 1; 
					$gallery_images = array(); // Set images array for current page
					$grid_row = 0;
					$items_per_page  = $gallery_cols_open; // How many items we should display on each page
					$total_items = count($content_gallery_grid); // How many items we have in total
					$total_pages = ceil($total_items / $items_per_page); // How many pages we have in total

					//Get current page
					if ( get_query_var( 'paged' ) ) {
						$current_page = get_query_var( 'paged' );
					}elseif ( get_query_var( 'page' ) ) {
						//this is just in case some odd rewrite, but paged should work instead of page here
						$current_page = get_query_var( 'page' );
					}else{
						$current_page = 1;
					}
					$starting_point = (($current_page-1)*$items_per_page); // Get starting point for current page
					$min = ( ( $current_page * $items_per_page ) - $items_per_page ) + 1;
					$max = ( $min + $items_per_page ) - 1;
					
					// Get elements for current page
					if($content_gallery_grid){
						$gallery_images = array_slice($content_gallery_grid,$starting_point,$items_per_page);
					}
					
					if(!empty($gallery_images)){ ?>
					<div class="masonry_row">
				        <?php 
				        foreach( $content_gallery_grid as $post ): 
					    setup_postdata($post);    
						    $grid_row++;
						    // Ignore this item if $row is lower than $min
						    if($grid_row < $min) { continue; }
						    // Stop loop completely if $row is higher than $max
						    if($grid_row > $max) { break; } ?>                     
						    <div class="masonry_item <?php if ($countitem % 4 == 1){ ?>alpha<?php }else if ($countitem % 4 == 0){ ?>omega<?php } ?>">
					            <a data-fancybox="gallery" data-caption="<?php echo $post['alt']; ?>" href="<?php echo $post['url']; ?>">
					            	<?php echo wp_get_attachment_image( $post['ID'], $m_size ); ?>
					            </a>
				            </div>
				        <?php $countitem++ ;endforeach; wp_reset_postdata();?>
					</div>
					<?php } ?>
				    
				    <?php } else { ?>
					<?php 
					if ( $gallery_cols == 1 ) : $g_xs_cols = "12"; $g_sm_cols = "12"; $g_md_cols = "12";
					elseif ( $gallery_cols == 2 ) : $g_xs_cols = "12"; $g_sm_cols = "6"; $g_md_cols = "6";
					elseif ( $gallery_cols == 3 ) : $g_xs_cols = "12"; $g_sm_cols = "4"; $g_md_cols = "4";
					elseif ( $gallery_cols == 4 ) : $g_xs_cols = "6"; $g_sm_cols = "4"; $g_md_cols = "3";
					elseif ( $gallery_cols == 5 ) : $g_xs_cols = "6"; $g_sm_cols = "3"; $g_md_cols = "20"; 
					elseif ( $gallery_cols == 6 ) : $g_xs_cols = "6"; $g_sm_cols = "3"; $g_md_cols = "2";
					elseif ( $gallery_cols == 7 ) : $g_xs_cols = "6"; $g_sm_cols = "3"; $g_md_cols = "seven"; 
					elseif ( $gallery_cols == 8 ) : $g_xs_cols = "6"; $g_sm_cols = "2"; $g_md_cols = "eight";  
					endif; ?>
					<div class="gallery_row row-flex">
				        <?php foreach( $content_gallery_grid as $image ): ?>
							<figure class="gallery_item col-xs-<?php echo $g_xs_cols; ?> col-sm-<?php echo $g_sm_cols; ?> col-md-<?php echo $g_md_cols; ?>" style="display: none;">
					            <a data-fancybox="gallery" data-caption="<?php echo $s_image['alt']; ?>" href="<?php echo $image['url']; ?>">
					            	<div class="image-hover"><?php echo wp_get_attachment_image( $image['ID'], $size ); ?></div>
					            	<i class="far fa-search"></i>
					            </a>
				            </figure>
				        <?php endforeach; ?>
				    </div>
				    
				    <?php } ?>
				    
				</div>
				
				<?php if( $content_gallery_grid_type == 'grid_masonry' ) { ?>
				
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
				<button class="load-next-button section_readmore_link watch_btn hoverLink"><?php if ($show_more) { echo $show_more; } else { _e('Show more', 'tkmulti'); } ?></button>
				</div>					
				<div class="pagination">
					<?php echo '<a class="pagination__next" href="'.get_permalink().'page/'.($current_page+1).'/">'.__('Load more','textdomain').'</a>'; ?>
				</div>
			
				<?php } else { ?>
				<div class="grid_gallery_btn row-flex center-xs <?php echo $gallery_grid_btn_color; ?>">
					<div class="grid_gallery_more col-xs-7 col-sm-3">
						<button class="section_readmore_link watch_btn hoverLink"><?php if ($show_more) { echo $show_more; } else { _e('Show more', 'tkmulti'); } ?> 
						</button>
					</div>
					<div class="grid_gallery_less col-xs-7 col-sm-3">
						<button class="section_readmore_link watch_btn hoverLink"><?php if ($show_less) { echo $show_less; } else {  _e('Show less', 'tkmulti'); } ?></button>
					</div>
				</div>
				<?php } ?>
				
			</div>
		</div>
		
	</section>
	<script>							    
	jQuery(function($) {
		// Grid Gallery
	    $('.section-<?php echo $row;?>-<?php echo $count;?> .gallery_item:lt(<?php echo $gallery_cols_open; ?>)').show();
	    $('.section-<?php echo $row;?>-<?php echo $count;?> .grid_gallery_less').hide();
	    var items =  100;
	    var shown =  <?php echo $gallery_cols_open; ?>;
	    var list = $('.section-<?php echo $row;?>-<?php echo $count;?> .gallery_row').children().size();
	    if(list <= <?php echo $gallery_cols_open; ?>){
		    $('.section-<?php echo $row;?>-<?php echo $count;?> .grid_gallery_more').hide();
	    }
	    $('.section-<?php echo $row;?>-<?php echo $count;?> .grid_gallery_more').click(function () {
	        $('.section-<?php echo $row;?>-<?php echo $count;?> .grid_gallery_less').show();
	        shown = $('.section-<?php echo $row;?>-<?php echo $count;?> .gallery_item:visible').size()+100;
	        if(shown< items) {$('.section-<?php echo $row;?>-<?php echo $count;?> .gallery_item:lt('+shown+')').show(300);
		        $('.section-<?php echo $row;?>-<?php echo $count;?> .grid_gallery_more').hide();
	        }
	        else {$('.section-<?php echo $row;?>-<?php echo $count;?> .gallery_item:lt('+items+')').show(300);
	             $('.section-<?php echo $row;?>-<?php echo $count;?> .grid_gallery_more').hide();
	             }
	    });
	    $('.section-<?php echo $row;?>-<?php echo $count;?> .grid_gallery_less').click(function () {
	        $('.section-<?php echo $row;?>-<?php echo $count;?> .gallery_item').not(':lt(<?php echo $gallery_cols_open; ?>)').hide(300);
	        $('.section-<?php echo $row;?>-<?php echo $count;?> .grid_gallery_more').show();
	        $('.section-<?php echo $row;?>-<?php echo $count;?> .grid_gallery_less').hide();
	    });
	    
		// init Masonry
		var $gridrow = $('.section-<?php echo $row;?>-<?php echo $count;?> .masonry_row').masonry({
			columnWidth: '.section-<?php echo $row;?>-<?php echo $count;?> .masonry_item.alpha',
			itemSelector: '.section-<?php echo $row;?>-<?php echo $count;?> .masonry_item',
			//isRTL: true,
			originLeft: false, 
			percentPosition: true,
			isOriginLeft: false,
			//gutter: 5
		});
		// layout Masonry after each image loads
		$gridrow.imagesLoaded().progress( function() {
			$gridrow.masonry();
		});		

		var msnry = $gridrow.data('masonry');
		$('.section-<?php echo $row;?>-<?php echo $count;?> .masonry_row').infiniteScroll({
			path: '.section-<?php echo $row;?>-<?php echo $count;?> .pagination__next',
			append: '.section-<?php echo $row;?>-<?php echo $count;?> .masonry_item',
			history: false,
			button: '.section-<?php echo $row;?>-<?php echo $count;?> .load-next-button',
			loadOnScroll: false,
			status: '.section-<?php echo $row;?>-<?php echo $count;?> .page-load-status',
			scrollThreshold: false,
			hideNav: '.section-<?php echo $row;?>-<?php echo $count;?> .pagination',
			outlayer: msnry,
		});
		   
	});
	</script>							    
	
</div>
<?php if( $gallery_grid_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>
