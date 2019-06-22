<?php 
$paralax_block_width = get_sub_field('flex_paralax_block_width');
$paralax_order = get_sub_field('flex_paralax_order');
$paralax_mobile = get_sub_field('flex_paralax_mobile');
$paralax_hide_mobile = get_sub_field('flex_paralax_hide_mobile');

$paralax_style = get_sub_field('flex_paralax_style');
$paralax_bg = get_sub_field('flex_paralax_bg');
$paralax_h = get_sub_field('flex_paralax_h');
$paralax_content = get_sub_field('flex_paralax_content');
$paralax_animation = get_sub_field('flex_paralax_animation');

if ( $paralax_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $paralax_mobile;?> <?php echo $paralax_block_width;?>" <?php if( $paralax_order ){ ?>style="order:<?php echo $paralax_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $paralax_animation;?>">
		
		<div class="paralax_content flexible_page_element <?php echo $paralax_style; ?>" itemprop="text" style="height:<?php echo $paralax_h; ?>px;">
			<?php if( $paralax_style == 'parallax' ): ?>
			<style>.simpleParallax {height:<?php echo $paralax_h; ?>px;} </style>
			<div class="paralax_content_overlay">
				<img class="paralax_thumbnail" src="<?php echo $paralax_bg['url']; ?>" alt="image">
			<?php endif; ?>
			<?php if( $paralax_style == 'fixed' ): ?>
			<div class="paralax_content_overlay" style="background: url(<?php echo $paralax_bg['url']; ?>)">
			<?php endif; ?>
				<div class="paralax_content_wrap wrap">
					<div class="paralax_content_row row-flex center-xs middle-xs">
						<div class="paralax_content_col col-xs-10 col-sm-8 col-md-7">
							<div class="paralax_content_content"><?php echo $paralax_content; ?></div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</section>
</div>
<?php if( $paralax_style == 'parallax' ): ?>
	<?php if( $paralax_bg ){ ?>
	<script>
	jQuery(function($) {
		var image<?php echo $row;?> = $('.section-<?php echo $row;?>-<?php echo $count; ?> .paralax_thumbnail');
		new simpleParallax(image<?php echo $row;?>, {
			scale: 1.5,
			delay: .6,
			transition: 'cubic-bezier(0,0,0,1)',
			orientation: 'top',
		});
	});
	</script>
	<?php } ?>
<?php endif; ?>

<?php } ?>
