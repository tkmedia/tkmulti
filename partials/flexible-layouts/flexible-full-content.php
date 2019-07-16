<?php 
$one_block_width = get_sub_field('flex_one_col_block_width');
$one_mobile_cols = get_sub_field('flex_one_col_mobile');
$one_hide_mobile = get_sub_field('flex_one_col_hide_mobile');
$one_col_order = get_sub_field('flex_one_col_order');
$one_col_break = get_sub_field('flex_one_col_break');
$one_col_block_align = get_sub_field('flex_one_col_block_align');
$one_col_animation = get_sub_field('flex_one_col_animation');

$one_column_title = get_sub_field('flex_one_col_title');
$one_column_subtitle = get_sub_field('flex_one_col_subtitle');
$one_column_title_size = get_sub_field('flex_one_col_title_size');
$one_column_subtitle_size = get_sub_field('flex_one_col_subtitle_size');
$one_column_width = get_sub_field('flex_one_col_width');
$one_column_title_a = get_sub_field('flex_one_col_title_a');
$one_column_text = get_sub_field('flex_one_col_text');

$one_title_color = get_sub_field('flex_one_col_title_color');
$one_subtitle_color = get_sub_field('flex_one_col_subtitle_color');
$one_text_color = get_sub_field('flex_one_col_text_color');
$one_col_btn_color = get_sub_field('flex_one_col_btn_color');
$one_col_bg_radius = get_sub_field('flex_one_col_bg_radius');
$one_col_ver_align = get_sub_field('flex_one_col_ver_align');

$one_col_link_type = get_sub_field('flex_one_col_link_type');
$one_col_page_link = get_sub_field('flex_one_col_page_link');
$one_column_btn = get_sub_field('flex_one_col_btn');
$one_column_link = get_sub_field('flex_one_col_link');
$one_col_form_link = get_sub_field('flex_one_col_form_link');
$one_col_bg_r = get_sub_field('flex_one_col_bg_r');
$one_col_bg_l = get_sub_field('flex_one_col_bg_l');
$one_col_bg_rotate = get_sub_field('flex_one_col_bg_rotate');

$Hex_color_r = $one_col_bg_r;
$RGB_color_r = hex2rgb($Hex_color_r);
$Final_Rgb_color_r = implode(", ", $RGB_color_r);
$Hex_color_l = $one_col_bg_l;
$RGB_color_l = hex2rgb($Hex_color_l);
$Final_Rgb_color_l = implode(", ", $RGB_color_l);			

if ( $one_hide_mobile && wp_is_mobile() ) {
//HIDE ON MOBILE
} else { ?>

<div class="flex_content_cols <?php echo $one_mobile_cols;?> <?php echo $one_block_width;?> <?php if( $one_col_break ){ ?><?php echo $one_col_block_align; ?><?php } ?>" <?php if( $one_col_order ){ ?>style="order:<?php echo $one_col_order; ?>;"<?php } ?>>
	<section id="section-<?php echo $row;?>-<?php echo $count;?>" data-aos="<?php echo $one_col_animation;?>"  class="page_flexible page_flexible_content button_<?php echo $one_col_btn_color;?> section-<?php echo $row;?>-<?php echo $count;?> count_sections_<?php echo $count;?> <?php if( $one_col_ver_align ) { ?>one_col_ver_align<?php } ?>" style="width:<?php echo $one_column_width; ?>%;margin: auto;<?php if( $one_col_bg_radius ) { ?>border-radius:15px;<?php } ?><?php if( $one_col_bg_r || $one_col_bg_l) { ?>margin:0 auto;padding: 30px;background: <?php echo $one_col_bg_r; ?>;background: -moz-linear-gradient(right, rgba(<?php echo $Final_Rgb_color_r; ?>,1) 0%, rgba(<?php echo $Final_Rgb_color_l; ?>,1) 100%);background: -webkit-linear-gradient(<?php echo $one_col_bg_rotate; ?>deg, rgba(<?php echo $Final_Rgb_color_r; ?>,1) 0%, rgba(<?php echo $Final_Rgb_color_l; ?>,1) 100%);background: linear-gradient(right, rgba(<?php echo $Final_Rgb_color_r; ?>,1) 0%, rgba(<?php echo $Final_Rgb_color_l; ?>,1) 100%);<?php } ?>">

		<div class="content_one_column flexible_page_element" itemprop="text">
			<div class="content_one_column_wrap content_wrap">
				<?php if( $one_column_title || $one_column_subtitle ) { ?>
				<div class="content_one_column_title_wrap">
					<?php if( $one_column_title ) { ?>
					<h2 class="section_title section_flex_title title_<?php echo $one_column_title_a; ?>" style="text-align:<?php echo $one_column_title_a; ?> !important;color:<?php echo $one_title_color; ?>;font-size:<?php echo $one_column_title_size; ?>px;"><?php echo $one_column_title; ?></h2>
					<?php } ?>
					<?php if( $one_column_subtitle ) { ?>
					<div class="section_subtitle title_<?php echo $one_column_title_a; ?>" itemprop="headline" style="text-align:<?php echo $one_column_title_a; ?> !important;color:<?php echo $one_subtitle_color; ?>;font-size:<?php echo $one_column_subtitle_size; ?>px;"><?php echo $one_column_subtitle; ?></div>
					<?php } ?>
				</div>
				<?php } ?>
				<div class="section_content_wrap content_title_<?php echo $one_column_title_a; ?>">
					<div class="content_one_column_container flex_text" style="color:<?php echo $one_text_color; ?>;">
						<?php echo $one_column_text; ?>
					</div>
					<?php if( $one_column_btn ) { ?>
						<?php if( $one_col_link_type == 'page_link' ): ?>
						<a href="<?php echo $button_page_link; ?>" class="<?php echo $one_col_btn_color; ?>">
						<?php endif; ?>	
						<?php if( $one_col_link_type == 'free_link' ): ?>
						<a href="<?php echo $one_column_link; ?>" class="<?php echo $one_col_btn_color; ?>">
						<?php endif; ?>
						<?php if( $one_col_link_type == 'form_link' ): ?>					
						<a data-fancybox data-src="#popop-form-<?php echo $row;?>-<?php echo $count;?>" href="javascript:;">		
						<button class="section_readmore_link watch_btn hoverLink"><?php echo $one_column_btn; ?></button>
					</a>
					<?php } ?>
				</div>
			</div>
		</div>
		
		<?php if( $one_col_link_type == 'form_link' ): ?>
		<?php 
		$popup_contact_title = get_option( 'options_default_flex_form_title' );
		$popup_contact_subtext = get_option( 'options_default_flex_form_subtitle' );
		?>
		<div style="display: none;max-width: 700px;" id="popop-form-<?php echo $row;?>-<?php echo $count;?>" class="button-popop-form">
		
			<div class="button-popop-form-wrap">
				
				<div class="button-popop-form-row">
					<div class="button-popop-form-col form-image col-xs-12">
						<?php if( $popup_contact_title ) { ?>
						<div class="contact-title">
							<div class="popup_contact_title"><?php echo $popup_contact_title; ?></div>
						</div>
						<?php } ?>
						<?php if( $popup_contact_subtext ) { ?>
						<div class="contact-title">
							<div class="popup_contact_subtext"><?php echo $popup_contact_subtext; ?></div>
						</div>
						<?php } ?>
						<div class="contact-form-page">
							<div class="full_form_id">
								<div class="full_form_id_wrap">
									<?php echo do_shortcode( '[contact-form-7 id="'.$one_col_form_link.'" ]' ); ?>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		
		</div>
		<?php endif; ?>
		
	</section>
</div>
<?php if( $one_col_break ){ ?><div class="break"></div><?php } ?>

<?php } ?>	