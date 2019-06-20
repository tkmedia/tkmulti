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

echo '<body id="body-' .  the_ID() . '" class="' . join( ' ', get_body_class( 'loading' ) ) . '"' . tkm_schema_body() . '>';
