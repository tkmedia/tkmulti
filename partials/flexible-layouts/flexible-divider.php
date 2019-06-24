<?php 
$divider_block_width = get_sub_field('divider_block_width');
$divider_mobile_cols = get_sub_field('divider_mobile');
$divider_hide_mobile = get_sub_field('divider_hide_mobile');
$divider_order = get_sub_field('divider_order');
$divider_break = get_sub_field('divider_break');
$divider_block_align = get_sub_field('divider_block_align');

$divider_height = get_sub_field('divider_height');
$divider_line = get_sub_field('divider_line');
$divider_line_thick = get_sub_field('divider_line_thick');
$divider_line_ver = get_sub_field('divider_line_ver');
$divider_line_hor = get_sub_field('divider_line_hor');
$divider_line_color = get_sub_field('divider_line_color');
$divider_line_width = get_sub_field('divider_line_width');
$divider_animation = get_sub_field('divider_animation');

if ( $divider_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $divider_mobile_cols;?> <?php echo $divider_block_width;?> <?php if( $divider_break ){ ?><?php echo $divider_block_align; ?><?php } ?>" <?php if( $divider_order ){ ?>style="order:<?php echo $divider_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $divider_animation;?>">
		<div class="flex_divider flexible_page_element" itemprop="text">
			<div class="flex_divider_wrap content_wrap row-flex <?php echo $divider_line_ver; ?>-xs <?php echo $divider_line_hor; ?>-xs"  style="height:<?php echo $divider_height; ?>px;">
				<?php if( $divider_line ): ?>
				<div class="divider_line" style="width:<?php echo $divider_line_width; ?>%;border-top:<?php echo $divider_line_thick; ?>px solid <?php echo $divider_line_color; ?>;"></div>
				<?php endif; ?>
			</div>
		</div>
	</section>
</div>
<?php if( $divider_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>
