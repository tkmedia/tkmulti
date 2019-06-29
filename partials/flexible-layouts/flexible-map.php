<?php 
$flex_map_block_width = get_sub_field('flex_map_block_width');
$flex_map_order = get_sub_field('flex_map_order');
$flex_map_mobile = get_sub_field('flex_map_mobile');
$flex_map_hide_mobile = get_sub_field('flex_map_hide_mobile');
$flex_map_break = get_sub_field('flex_map_break');
$flex_map_block_align = get_sub_field('flex_map_block_align');

$map = get_sub_field('flex_map');
$map_name = get_sub_field('flex_map_name');
$map_animation = get_sub_field('flex_map_animation');

if ( $flex_map_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $flex_map_mobile;?> <?php echo $flex_map_block_width;?> <?php if( $flex_map_break ){ ?><?php echo $flex_map_block_align; ?><?php } ?>" <?php if( $flex_map_order ){ ?>style="order:<?php echo $flex_map_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $map_animation;?>">

		<div class="flex_map_container flexible_page_element" itemprop="text">
		    <div class="split_map">
		        <div class="flex_map_row">
		            <div class="flex_map_col split_map_col">
		                <div class="flex_map_content_inner">
							<div class="map google-acfmap">										
								<div class="marker" data-lat="<?php echo $map[ 'lat' ]; ?>" data-lng="<?php echo $map[ 'lng' ]; ?>" data-icon="">
									<?php if( $map_name ) { ?><h4><?php echo $split_map_name; ?></h4><?php } ?>
									<div class="location-image"></div>
									<p><?php echo $map['address']; ?></p>
								</div>
							</div>
		                </div>
		            </div>						        
		        </div>        
		    </div>
		</div>
		
	</section>
</div>
<?php if( $flex_map_break ){ ?><div class="break"></div><?php } ?>
<?php } ?>
