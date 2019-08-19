<?php
$header_phone = get_field('header_phone','option');
$header_main_email = get_field('header_main_email','option');
$header_email_icon = get_field('header_email_icon','option');
$social_links = get_field('header_top_nav_left','option');
$show_phone = get_field('header_top_panel_phone_show','option');
$show_nav = get_field('header_top_panel_nav_show','option');
$panel_bg_color = get_field('header_top_panel_bg_color','option');
$panel_font_color = get_field('header_top_panel_font_color','option');
$panel_text = get_field('header_top_panel_right','option');

if( have_rows('header_top_nav_left','option') || $header_phone || $show_nav ): ?>
<div id="header-info">
	<ul class="social-bar">

		<?php while ( have_rows('header_top_nav_left','option') ) : the_row();
			$social_links_icon = get_sub_field('header_top_nav_left_icon');
			$social_links_text = get_sub_field('header_top_nav_left_text');
			$social_links_link = get_sub_field('header_top_nav_left_link');
		?>

			<li class="social-item social_link" style="color:<?php echo $panel_font_color; ?>;">
				<a href="<?php echo $social_links_link; ?>" target="_blank" class="social_media">
					<?php echo $social_links_icon; ?>
				</a>
			</li>

	    <?php endwhile; ?>
	    <?php if( $show_phone && $header_phone ) { ?>
	    <li class="social-item site_phone" id="top_panel_phone">
		    <a href="tel:<?php echo $header_phone; ?>" style="color:<?php echo $panel_font_color; ?>;">
			    <span class="site_phone_pre"><?php echo $header_phone; ?></span>
			    <i class="fas fa-phone-volume" style="color:<?php echo $panel_font_color; ?>;"></i>
		    </a>
	    </li>
	    <?php } ?>
	</ul>
	
	<?php if( $panel_text ) { ?>
	<div id="panel_text" class="panel_text"><?php echo $panel_text; ?></div>
	<?php } ?>	
	
	<?php if( $show_nav ) { ?>
	<style>#menu-panel>li {color:<?php echo $panel_font_color; ?>!important;}</style>
	<div id="panel-nav" class="panel-nav" role="navigation">
		<?php wp_nav_menu(
			array(
				'theme_location' => 'panel-nav',
				'container'      => false,
				'menu_id'      => 'menu-panel',
				'menu_class'     => 'menu-panel',
				'depth'          => '1',
				'fallback_cb'    => false,
				'link_before'    => '<span class="nav-name-item" itemprop="name">',
				'link_after'     => '</span>',
		) ); ?>
	</div>
	<?php } ?>

</div>
<?php endif; ?>
<?php if ( class_exists( 'Sitepress', false ) ) { ?>
<div class="language_block">
    <?php
    //do_action('wpml_add_language_selector');
    echo tkm_starter_lang_switcher();
    //language_selector_flags();
    ?>
    <!-- <button class="language_cnt">ENGLISH</button> -->
</div>
<?php } ?>
