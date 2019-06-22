<?php 
$gallery_grid_block_width = get_sub_field('flex_gallery_grid_block_width');
$gallery_grid_order = get_sub_field('flex_gallery_grid_order');
$gallery_grid_mobile = get_sub_field('flex_gallery_grid_mobile');
$gallery_grid_hide_mobile = get_sub_field('flex_gallery_grid_hide_mobile');

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

if ( $gallery_grid_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $gallery_grid_mobile;?> <?php echo $gallery_grid_block_width;?>" <?php if( $gallery_grid_order ){ ?>style="order:<?php echo $gallery_grid_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>">

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
				    <div class="gallery_row masonry masonry--h">
				        <?php foreach( $content_gallery_grid as $image ): ?>
						    <div class="gallery_item masonry-brick masonry-brick--h">
					            <a data-fancybox="gallery" data-caption="<?php echo $s_image['alt']; ?>" href="<?php echo $image['url']; ?>">
					            	<div class="masonry-brick-hover"></div>
					            	<?php echo wp_get_attachment_image( $image['ID'], $m_size ); ?>
					            	<i class="far fa-search"></i>
					            </a>
				            </div>
				        <?php endforeach; ?>
				    </div>
				    <?php } else { ?>
					<?php 
					if ( $gallery_cols == 3 ) : $g_xs_cols = "6"; $g_sm_cols = "4"; $g_md_cols = "4";
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
				<div class="grid_gallery_btn row-flex center-xs <?php echo $gallery_grid_btn_color; ?>">
					<div class="grid_gallery_more col-xs-7 col-sm-3">
						<button class="section_readmore_link watch_btn hoverLink"><?php if ($show_more) { echo $show_more; } else { _e('Show more', 'tkmulti'); } ?> 
						</button>
					</div>
					<div class="grid_gallery_less col-xs-7 col-sm-3">
						<button class="section_readmore_link watch_btn hoverLink"><?php if ($show_less) { echo $show_less; } else {  _e('Show less', 'tkmulti'); } ?></button>
					</div>
				</div>
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
	});
	</script>							    
	
</div>
<?php } ?>
