<?php
/**
 * Functions and Definitions
 *
 * @package      TKMulti
 * @author       Tal Katz TKMedia.co.il
 * @since        1.0.0
 * @license      GPL-2.0+
 * @link http://www.tkmedia.co.il
**/

define( 'THEME_DIR', get_template_directory() );
define( 'THEME_URI', get_template_directory_uri() );

define( 'THEME_NAME', 'tkmulti' );
define( 'THEME_VERSION', '1.0.1' );

define( 'LIBS_DIR', THEME_DIR. '/inc/functions' );
define( 'LIBS_URI', THEME_URI. '/inc/functions' );
define( 'LANG_DIR', THEME_DIR. '/languages' );

/* ----------------------------------------------------------------------------
 * Loads Theme Textdomain
 * ---------------------------------------------------------------------------- */
// Make theme available for translation.
// ranslations can be placed in the /languages/ directory.
load_theme_textdomain( 'tkmulti', get_template_directory() . '/languages' );
load_theme_textdomain( 'tkm-opts', LANG_DIR );	// backend

/* ----------------------------------------------------------------------------
 * Loads Theme Functions
 * ---------------------------------------------------------------------------- */

// Functions ------------------------------------------------------------------
require( get_template_directory() . '/inc/functions/tha-theme-hooks.php' );
require( get_template_directory() . '/inc/functions/wordpress-cleanup.php' );
require( get_template_directory() . '/inc/functions/helper-functions.php' );
require_once( get_template_directory() . '/inc/functions/theme-functions.php' );

// Header ---------------------------------------------------------------------
require_once( get_template_directory() . '/inc/functions/theme-head.php' );

// ACF Fields -----------------------------------------------------------------
require_once( get_template_directory() . '/inc/acf-blocks-site.php' );

// Custom template tags for this theme ----------------------------------------
//require( get_template_directory() . '/inc/functions/template-tags.php' );

// Custom functions that act independently of the theme templates -------------
//require( get_template_directory() . '/inc/functions/tweaks.php' );

// Include our Theme Customizer code. -----------------------------------------
require( get_template_directory() . '/inc/customizer.php' );

// Functions Parts ------------------------------------------------------------
require( get_template_directory() . '/inc/login-logo.php' );
//require( THEME_DIR .'/inc/navigation.php' );
require( get_template_directory() . '/inc/loop.php' );
require( get_template_directory() . '/inc/tinymce.php' );
require( get_template_directory() . '/inc/disable-editor.php' );
require( get_template_directory() . '/inc/amp.php' );
require( get_template_directory() . '/inc/display-posts.php' );
require( get_template_directory() . '/inc/instantpage.php' );

// TGM ------------------------------------------------------------------
if( is_admin() ){
	include_once get_template_directory() .'/inc/class-mfn-tgmpa.php';
}

// WooCommerce ----------------------------------------------------------------
if ( class_exists( 'WooCommerce' ) ) {
	require_once( get_template_directory() . '/inc/woocommerce.php' );
}

add_filter( 'get_comment_date', '__return_empty_string' );
add_filter( 'get_comment_time', '__return_empty_string' );
