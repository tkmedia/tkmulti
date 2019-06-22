<?php 
$product_slider_block_width = get_sub_field('flex_product_slider_block_width');
$product_slider_mobile = get_sub_field('flex_product_slider_mobile');
$product_slider_hide_mobile = get_sub_field('flex_product_slider_hide_mobile');
$product_slider_order = get_sub_field('flex_product_slider_order');

$product_slider_row = get_sub_field('flex_product_slider_row');
$product_slider_title = get_sub_field('flex_product_slider_title');
$product_slider_title_align = get_sub_field('flex_product_slider_title_align');
$product_slider_title_color = get_sub_field('flex_product_slider_title_color');
$product_slider_title_size = get_sub_field('flex_product_slider_title_size');
$product_slider_slider_count = get_sub_field('flex_product_slider_count');
$product_slider_style = get_sub_field('flex_product_slider_style');
$product_slider_animation = get_sub_field('flex_product_slider_animation');

if ( $product_slider_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $product_slider_mobile;?> <?php echo $product_slider_block_width;?>" <?php if( $product_slider_order ){ ?>style="order:<?php echo $product_slider_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $product_slider_animation;?>">

		<div class="flexible_articles flexible_page_element flex_product_slider articles_slider_<?php echo $product_slider_block_width; ?>" itemprop="text">
			<div class="page_link_slider_wrap product_slider_row related_products <?php if ($product_slider_style): echo implode(' ', $product_slider_style); endif; ?>">
				<?php if( $product_slider_title ) { ?>
				<div class="flex_style_title_container">
					<h2 class="section_title section_flex_title" style="text-align:<?php echo $product_slider_title_align; ?>;font-size:<?php echo $product_slider_title_size; ?>px;color:<?php echo $product_slider_title_color; ?>;"><?php echo $product_slider_title; ?></h2>
				</div>
				<?php } ?>
				<?php if( $product_slider_row ) { ?>
				<div class="flex_related_products_row product_slider">
				<?php //woocommerce_product_loop_start(); ?>
					<?php foreach( $product_slider_row as $post ): ?>
					<?php setup_postdata($post); ?>
				
						<?php wc_get_template_part( 'content', 'product-related' ); ?>
				
				    <?php endforeach; ?>
				    
				    <?php wp_reset_postdata(); ?> 
				<?php //woocommerce_product_loop_end(); ?>
				</div>
				<?php } ?>
			</div>
		</div>

	</section>
	<script>					
	jQuery(function($) {
		//* ## Page Link Slider */
		if ($('.section-<?php echo $row;?>-<?php echo $count;?> .product_slider .related_products_item').length > 1) {
			$(".section-<?php echo $row;?>-<?php echo $count;?> .product_slider").slick({
				slidesToShow: <?php echo $product_slider_slider_count; ?>,
				slidesToScroll: 1,
				dots: true,
				pauseOnHover: true,
				speed: 500,
				autoplay: false,
				autoplaySpeed: 6000,
				arrows: true,
				dots: false,
				responsive: [
			    {
			      breakpoint: 991,
			      settings: {
			        slidesToShow: 3,
			        dots: true
			      }
			    },
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
