<?php
/**
 * Site Header
 *
 * @package      TKMulti
 * @author       Tal Katz TKMedia.co.il
 * @since        1.0.0
 * @license      GPL-2.0+
**/

echo '<!DOCTYPE html>';
echo '<!--[if lt IE 9]>';
echo '<html id="unsupported"'. get_language_attributes() . '>';
echo '<![endif]-->';
echo '<!--[if IE 9]>';
echo '<html id="ie9" <?php language_attributes(); ?>>';
echo '<![endif]-->';
echo '<!--[if !(IE 6) | !(IE 7) | !(IE 8) | !(IE 9)  ]>';
echo '<html ' . get_language_attributes() . '>';
echo '<![endif]-->';

tha_html_before();
echo '<html ' . get_language_attributes() . '>';

echo '<head>';
	tha_head_top();
	wp_head();
	tha_head_bottom();
echo '</head>';

//ACF Theme option field
$header_phone = get_option( 'options_header_phone' );
$site_style = get_option( 'options_site_wrap_style' );
$header_style = get_option( 'options_header_style' );
$header_color = get_option( 'options_header_bg_color' );
$logo_side = get_option( 'options_header_logo_side' );
$nav_layout = get_option( 'options_menu_item_layout' );
$top_panel_show = get_option( 'options_header_top_panel_show' );

echo '<body id="body-' . the_ID() . '" class="' . join( ' ', get_body_class( 'loading' ) ) . '"' . tkmulti_schema_body() . '>';
if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
tha_body_top();
echo '<div id="page" class="site ' . $site_style . ' ' . $header_style . ' ' . $header_color . '">';
	echo '<a class="skip-link screen-reader-text" href="#main-content">' . esc_html__( 'Skip to content', 'tkmulti' ) . '</a>';
	tha_header_before();
	echo '<header id="header-container" class="header-bar animated clearfix fixedHeader sticky_header ' . if (is_front_page()) { . 'front_header_container' . } elseif (is_tax( 'product_cat' ) || is_category() ) { . 'archive_header_container' . } elseif ( is_singular() ) { . 'deafault_header_container' . } else { . 'deafault_header_container' . } . ' ' . $logo_side . '" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">';
		echo '<div class="header_wrapper_bg">';

			if( $top_panel_show ) {
			echo '<div class="header_topbar_container top_panel">';
				echo '<div class="header_topbar_container_inner wrap">';
					get_template_part( 'partials/header/top-bar' );
				echo '</div>';
			echo '</div>';				
			}
			
			echo '<div class="header_wrapper wrap">';


			echo '</div>';
		echo '</div>';
	echo '</header>';
	
echo '<main id="main_content" role="main">';
	echo '<div class="site_overlay"></div>';
