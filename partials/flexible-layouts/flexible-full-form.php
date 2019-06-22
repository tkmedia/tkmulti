<?php 
$full_form_block_width = get_sub_field('flex_full_form_block_width');
$full_form_mobile = get_sub_field('flex_full_form_mobile');
$full_form_hide_mobile = get_sub_field('flex_full_form_hide_mobile');
$full_form_order = get_sub_field('flex_full_form_order');

$default_flex_form_title =  get_field('default_flex_form_title', 'option');
$default_flex_form_subtitle =  get_field('default_flex_form_subtitle', 'option');

$full_form_title = get_sub_field('flex_full_form_title');
$full_form_subtitle = get_sub_field('flex_full_form_subtitle');
$full_form_id = get_sub_field('flex_full_form_id');
$full_form_color = get_sub_field('flex_full_form_color');
$full_form_layout = get_sub_field('flex_full_form_layout');
$full_form_hide_title = get_sub_field('flex_full_form_hide_title');
$full_form_animation = get_sub_field('flex_full_form_animation');

if ( $full_form_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $full_form_mobile;?> <?php echo $full_form_block_width;?>" <?php if( $full_form_order ){ ?>style="order:<?php echo $full_form_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" class="page_flexible page_flexible_content section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?>" data-aos="<?php echo $full_form_animation;?>">

		<div class="flex_form flexible_page_element" itemprop="text">
			<div class="flex_form_wrap content_wrap <?php echo $full_form_color; ?> <?php echo $full_form_layout; ?>">
				<div class="form_container">
					<?php if( $full_form_title || $default_flex_form_title || $full_form_subtitle || $default_flex_form_subtitle ) { ?>
						<?php if( !$full_form_hide_title ) { ?>
						<div class="page_thin_form_title">
							<?php if( $full_form_title ) { ?>
							<div class="full_form_title"><?php echo $full_form_title; ?></div>
							<?php } elseif( $default_flex_form_title ) { ?>
							<div class="full_form_title"><?php echo $default_flex_form_title; ?></div>
							<?php } ?>
							
							<?php if( $full_form_subtitle ) { ?>
							<div class="full_form_subtitle"><?php echo $full_form_subtitle; ?></div>
							<?php } elseif( $default_flex_form_subtitle ) { ?>
							<div class="full_form_subtitle"><?php echo $default_flex_form_subtitle; ?></div>
							<?php } ?>
						</div>
						<?php } ?>
					<?php } ?>
					<?php if( $full_form_id ): ?>
					<div class="full_form_id">
						<?php 
						foreach( $full_form_id as $form ):
						$form_id= $form->ID; ?>
						<div class="full_form_id_wrap">
							<?php echo do_shortcode( '[contact-form-7 id="'.$form_id.'" ]' ); ?>
							<?php //echo do_shortcode( '[contact-form-7 id="' . $form->id() . '" title="' . $form->title() . ']' ); ?>
						</div>
						
						<?php endforeach; ?>
					</div>
					<?php endif; ?>
						
				</div>
			</div>
		</div>			

	</section>
</div>
<?php } ?>
