<?php 
$header_phone = get_option( 'options_header_phone' );
$footer_content_text = wpautop(get_option( 'options_footer_content_text' ));
$footer_content_text_left = wpautop(get_option( 'options_footer_content_text_left' ));

$footer_fixed_show = get_option( 'options_footer_bar_show' );
$footer_search_show = get_option( 'options_footer_search_show' );
$footer_link_show = get_option( 'options_footer_link_show' );
$footer_popup_show = get_option( 'options_footer_popup_show' );

$footer_fixed_link_btn = get_option( 'options_footer_fixed_link_btn' );
$footer_fixed_link_page = get_option( 'options_footer_fixed_link_page' );
$footer_fixed_link_icon = get_option( 'options_footer_fixed_link_icon' );

$footer_form_title = get_option( 'options_footer_form_title' );
$footer_form_subtitle = get_option( 'options_footer_form_subtitle' );
$footer_form_id = get_option( 'options_footer_form_id' );

//$footer_content_text = get_field('footer_content_text','option');
?>

<?php if( $footer_fixed_show ){ ?>
<div id="footer_mobile_fix" class="footer_mobile_fix">
	<div class="footer_mobile_fix_row row-flex middle-xs center-xs">

		<?php if( $footer_search_show ){ ?>
		<div class="footer_form_fix_col col-xs-4">
			<div class="mobile_footer_links">
				<a data-fancybox data-src="#footer_search" href="javascript:;">
					<i class="fal fa-search"></i>
					<p><?php _e('Search', 'tkmulti'); ?></p>
				</a>
			</div>
		</div>
		<?php } ?>
		<?php if( $footer_link_show ){ ?>
		<div class="footer_form_fix_col col-xs-4">
			<div class="mobile_footer_links">
				<a href="<?php echo $footer_fixed_link_page;?>">
					<?php echo $footer_fixed_link_icon;?>
					<p><?php echo $footer_full_contnet_block_width;?></p>
				</a>
			</div>
		</div>
		<?php } ?>
		<?php if( $footer_popup_show ){ ?>
		<div class="footer_form_fix_col col-xs-4">
			<div class="mobile_footer_links">
				<a data-fancybox data-src="#contact_form_popup" href="javascript:;">
					<i class="fal fa-envelope"></i>
					<p><?php _e('Contact', 'tkmulti'); ?></p>
				</a>
			</div>
		</div>
		<?php } ?>
	</div>
	
	<?php if( $footer_search_show ){ ?>
	<div id="footer_search" style="display: none;">
		<div id="popup-search">
			<div class="search_bar">
			<?php get_search_form(); ?>
			</div>
		</div>
	</div>
	<?php } ?>
	<?php if( $footer_popup_show && $footer_form_id ): ?>
	<div id="contact_form_popup" style="display: none;">
		<div id="popup-contact-form">
			<div class="popup-contact-form clearfix">
				<?php if( $footer_form_title ) { ?>
				<div class="contact-title">
					<div class="popup_contact_title"><?php echo $footer_form_title; ?></div>
				</div>
				<?php } ?>
				<?php if( $footer_form_subtitle ) { ?>
				<div class="contact-title">
					<div class="popup_contact_subtext"><?php echo $footer_form_subtitle; ?></div>
				</div>
				<?php } ?>
				<div class="full_form_id">
					<?php 
					foreach( $footer_form_id as $form ):
					$form_id= $form->ID; ?>
					<div class="full_form_id_wrap">
						<?php echo do_shortcode( '[contact-form-7 id="'.$form_id.'" ]' ); ?>
					</div>
					
					<?php endforeach; ?>
				</div>
			</div>
		</div>
	</div>
	<?php endif; ?>

</div>
<?php } ?>

<div id="footer_container" class="footer-main">
	<div id="footer">
		<div class="footer wrap">
			<div class="footer_flex_content row-flex">

			<?php 			
			// check if the flexible content field has rows of data
			if( have_rows('footer_flex_content','option') ): $fcount = 1;
			     // loop through the rows of data
			    while ( have_rows('footer_flex_content','option') ) : the_row(); ?>

					<?php if( get_row_layout() == 'footer_full_contnet' ):
							
					$footer_full_contnet_block_width = get_sub_field('footer_full_contnet_block_width');
					$footer_full_contnet_mobile = get_sub_field('footer_full_contnet_mobile');
					$footer_full_contnet_hide_mobile = get_sub_field('footer_full_contnet_hide_mobile');
					$footer_full_contnet_title = get_sub_field('footer_full_contnet_title');
					$footer_full_contnet_title_size = get_sub_field('footer_full_contnet_title_size');
					$footer_full_contnet_title_color = get_sub_field('footer_full_contnet_title_color');
					$footer_full_contnet_text = get_sub_field('footer_full_contnet_text');
	
					if ( $footer_full_contnet_hide_mobile && wp_is_mobile() ) {
					//HIDE ON MOBILE
					} else { ?>
					
					<div id="footer-section-<?php echo $fcount;?>" class="footer_full_contnet footer_content_cols <?php echo $footer_full_contnet_mobile;?> <?php echo $footer_full_contnet_block_width;?>">
						<div class="footer-block footer-section-<?php echo $fcount;?>">
							<div class="footer_block_inner">
								<?php if( $footer_full_contnet_title ){ ?>
								<div class="footer_full_contnet_title_wrap footer_title">
									<div class="footer_full_contnet_title" style="font-size:<?php echo $footer_full_contnet_title_size; ?>px;color:<?php echo $footer_full_contnet_title_color; ?>;"><?php echo $footer_full_contnet_title; ?></div>
								</div>
								<?php } ?>
								<?php if( $footer_full_contnet_text ){ ?>
								<div class="footer_full_contnet_text_wrap">
									<div class="footer_full_contnet_text"><?php echo $footer_full_contnet_text; ?></div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>	
					<?php } ?>
					<?php endif; ?>			
				
					<?php if( get_row_layout() == 'footer_nav' ):
							
					$footer_nav_block_width = get_sub_field('footer_nav_block_width');
					$footer_nav_mobile = get_sub_field('footer_nav_mobile');
					$footer_nav_hide_mobile = get_sub_field('footer_nav_hide_mobile');
					$footer_nav_title = get_sub_field('footer_nav_title');
					$footer_nav_title_size = get_sub_field('footer_nav_title_size');
					$footer_nav_title_color = get_sub_field('footer_nav_title_color');
					$footer_nav_choose = get_sub_field('footer_nav_choose');
	
					if ( $footer_nav_hide_mobile && wp_is_mobile() ) {
					//HIDE ON MOBILE
					} else { ?>
					
					<div id="footer-section-<?php echo $fcount;?>" class="footer_nav footer_content_cols <?php echo $footer_nav_mobile;?> <?php echo $footer_nav_block_width;?>">
						<div class="footer-block footer-section-<?php echo $fcount;?>">
							<div class="footer_block_inner">
								<?php if( $footer_nav_title ){ ?>
								<div class="footer_nav_title_wrap footer_title">
									<div class="footer_nav_title" style="font-size:<?php echo $footer_nav_title_size; ?>px;color:<?php echo $footer_nav_title_color; ?>;"><?php echo $footer_nav_title; ?></div>
								</div>
								<?php } ?>
								<?php if( $footer_nav_choose ){ ?>
								<div class="footer_nav_wrap">
									<div class="footer_nav" role="navigation">
									<?php if( $footer_nav_choose == 'footer-nav-1' ): ?>
									<?php wp_nav_menu(
										array(
											'theme_location' => 'footer-nav-1',
											'container'      => false,
											'menu_id'      => '',
											'menu_class'     => 'menu-footer',
											'depth'          => '1',
											'fallback_cb'    => false,
											'link_before'    => '<span class="nav-name-item" itemprop="name">',
											'link_after'     => '</span>',
									) ); ?>
									<?php elseif( $footer_nav_choose == 'footer-nav-2' ): ?>
									<?php wp_nav_menu(
										array(
											'theme_location' => 'footer-nav-2',
											'container'      => false,
											'menu_id'      => '',
											'menu_class'     => 'menu-footer',
											'depth'          => '1',
											'fallback_cb'    => false,
											'link_before'    => '<span class="nav-name-item" itemprop="name">',
											'link_after'     => '</span>',
									) ); ?>
									<?php elseif( $footer_nav_choose == 'footer-nav-3' ): ?>
									<?php wp_nav_menu(
										array(
											'theme_location' => 'footer-nav-3',
											'container'      => false,
											'menu_id'      => '',
											'menu_class'     => 'menu-footer',
											'depth'          => '1',
											'fallback_cb'    => false,
											'link_before'    => '<span class="nav-name-item" itemprop="name">',
											'link_after'     => '</span>',
									) ); ?>
									<?php endif; ?>
									</div>
								</div>
								<?php } ?>
							</div>
						</div>
					</div>	
					<?php } ?>
					<?php endif; ?>							
				
			    <?php $fcount++; endwhile; //  end of flexible_content
			else :
			    // no layouts found
			endif;
			
			?>
				
			</div>
			
		</div>
	</div>
		
</div><!-- /.fixedFooter -->