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
load_theme_textdomain( THEME_NAME,  LANG_DIR );	// frontend
load_theme_textdomain( 'tkm-opts', LANG_DIR );	// backend

/* ----------------------------------------------------------------------------
 * Loads Theme Functions
 * ---------------------------------------------------------------------------- */

// Functions ------------------------------------------------------------------
require( LIBS_DIR .'/tha-theme-hooks.php' );
require( LIBS_DIR .'/wordpress-cleanup.php' );
require( LIBS_DIR .'/helper-functions.php' );

require_once( LIBS_DIR .'/theme-functions.php' );

// Header ---------------------------------------------------------------------
require_once( LIBS_DIR .'/theme-head.php' );

// ACF Fields -----------------------------------------------------------------
require_once( THEME_DIR .'/inc/acf-blocks-site.php' );

// Custom template tags for this theme ----------------------------------------
//require( LIBS_DIR .'/template-tags.php' );

// Custom functions that act independently of the theme templates -------------
//require( LIBS_DIR .'/tweaks.php' );

// Include our Theme Customizer code. -----------------------------------------
require( THEME_DIR .'/inc/customizer.php' );

// Functions Parts ------------------------------------------------------------
require( THEME_DIR .'/inc/login-logo.php' );
require( THEME_DIR .'/inc/navigation.php' );
require( THEME_DIR .'/inc/loop.php' );
require( THEME_DIR .'/inc/tinymce.php' );
require( THEME_DIR .'/inc/disable-editor.php' );
require( THEME_DIR .'/inc/amp.php' );
require( THEME_DIR .'/inc/display-posts.php' );
require( THEME_DIR .'/inc/instantpage.php' );

// WooCommerce ----------------------------------------------------------------
if ( class_exists( 'WooCommerce' ) ) {
	require_once( THEME_DIR . '/inc/woocommerce.php' );
}

add_filter( 'get_comment_date', '__return_empty_string' );
add_filter( 'get_comment_time', '__return_empty_string' );
