<?php
/**
 * Header functions.
 *
 * @package      TKMulti
 * @author       Tal Katz TKMedia.co.il
 * @since        1.0.0
 * @license      GPL-2.0+
 * @link http://www.tkmedia.co.il
**/

/* ---------------------------------------------------------------------------
 * Theme support
 * --------------------------------------------------------------------------- */

if( ! function_exists( 'tkmulti_setup' ) )
{

	function tkmulti_setup() {
		
		if( false ) add_editor_style( '/css/style-login.css' );
		
		// Add default posts and comments RSS feed links to head
		add_theme_support( 'automatic-feed-links' );
		
		//add_theme_support( 'menus' );

		// Enable support for Post Formats.
		add_theme_support( 'post-formats', array( 'aside', 'image', 'video', 'quote', 'link', 'gallery', 'audio' ) );
		
		// Enable support for post thumbnails and featured images.
		add_theme_support( 'post-thumbnails' );

		/*
		 * Let WordPress manage the document title.
		 * By adding theme support, we declare that this theme does not use a
		 * hard-coded <title> tag in the document head, and expect WordPress to
		 * provide it for us.
		 */
		add_theme_support( 'title-tag' );
		
		// Enable support for wide Gutenberg images.
		add_theme_support( 'align-wide' );
		
		// Enable support for Gutenberg Backend Styles.
		add_theme_support('editor-styles');
		
		// Admin Bar Styling
		add_theme_support( 'admin-bar', array( 'callback' => '__return_false' ) );

		//Set the content width in pixels, based on the theme's design and stylesheet.
		$GLOBALS['content_width'] = apply_filters( 'tkmulti_content_width', 1200 );
	 		
		// Switch default core markup for search form, comment form, and comments
		// to output valid HTML5.
		add_theme_support( 'html5', array( 'comment-form', 'comment-list', 'gallery', 'caption' ) );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );
	
		// Body open hook
		add_theme_support( 'body-open' );
		
		// Add support for custom navigation menus.
		register_nav_menus( array(
		    'primary'   => __( 'Primary menu', 'tkmulti' ),
		    'footer-nav-1'    => __( 'Footer nav 1', 'tkmulti' ),
		    'footer-nav-2'    => __( 'Footer nav 2', 'tkmulti' ),
		    'footer-nav-3'    => __( 'Footer nav 3', 'tkmulti' ),
		    'panel-nav'    => __( 'Top panel nav', 'tkmulti' ),
		    'primary-split-right'    => __( 'Primary split right', 'tkmulti' ),
		    'primary-split-left'    => __( 'Primary split left', 'tkmulti' )
		) );
		
		add_theme_support('custom-logo');
		$defaults = array(
		    'height'      => 100,
		    'width'       => 400,
		    'flex-height' => true,
		    'flex-width'  => true,
		    'header-text' => array( 'site-title', 'site-description' ),
		);
		add_theme_support( 'custom-logo', $defaults );
		
		// Add support for background color and images
		add_theme_support( 'custom-background', array(
			'default-color' => 'fff',
		) );

		// Gutenberg
	
		// -- Responsive embeds
		add_theme_support( 'responsive-embeds' );
	
		// -- Wide Images
		add_theme_support( 'align-wide' );
	
		// -- Disable custom font sizes
		add_theme_support( 'disable-custom-font-sizes' );
	
		// -- Editor Font Styles
		add_theme_support( 'editor-font-sizes', array(
			array(
				'name'      => __( 'small', 'tkmulti' ),
				'shortName' => __( 'S', 'tkmulti' ),
				'size'      => 12,
				'slug'      => 'small'
			),
			array(
				'name'      => __( 'regular', 'tkmulti' ),
				'shortName' => __( 'M', 'tkmulti' ),
				'size'      => 16,
				'slug'      => 'regular'
			),
			array(
				'name'      => __( 'large', 'tkmulti' ),
				'shortName' => __( 'L', 'tkmulti' ),
				'size'      => 20,
				'slug'      => 'large'
			),
		) );

		// -- Disable Custom Colors
		add_theme_support( 'disable-custom-colors' );
	
		// -- Editor Color Palette
		add_theme_support( 'editor-color-palette', array(
			array(
				'name'  => __( 'Blue', 'tkmulti' ),
				'slug'  => 'blue',
				'color'	=> '#59BACC',
			),
			array(
				'name'  => __( 'Green', 'tkmulti' ),
				'slug'  => 'green',
				'color' => '#58AD69',
			),
			array(
				'name'  => __( 'Orange', 'tkmulti' ),
				'slug'  => 'orange',
				'color' => '#FFBC49',
			),
			array(
				'name'	=> __( 'Red', 'tkmulti' ),
				'slug'	=> 'red',
				'color'	=> '#E2574C',
			),
		) );
		      			
	}

}
add_action( 'after_setup_theme', 'tkmulti_setup' );

/* ---------------------------------------------------------------------------
 * Styles
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'tkmulti_styles' ) )
{
	function tkmulti_styles()
	{
		// wp_enqueue_style ------------------------------------------------------
		wp_enqueue_style( 'plugins', get_template_directory_uri() .'/assets/css/plugins.css', false );
		wp_enqueue_style( 'fa5-all', get_template_directory_uri() .'/assets/css/fa5-all.min.css', false );
		wp_enqueue_style( 'v4-shims', get_template_directory_uri() .'/assets/css/v4-shims.min.css', false );
		wp_enqueue_style( 'global', get_template_directory_uri() .'/assets/css/global.css', false );
		wp_enqueue_style( 'aos', get_template_directory_uri() .'/assets/css/aos.css', false );
		wp_enqueue_style( 'fancybox', get_template_directory_uri() .'/assets/css/jquery.fancybox.min.css', false );
		wp_enqueue_style( 'main-style', get_template_directory_uri() .'/assets/css/main.css', false );
	}
}
add_action( 'wp_enqueue_scripts', 'tkmulti_styles' );

//ENQUEUE BACKEND RESOURCES
function load_admin_style() {
	wp_enqueue_style( 'admin_css', get_template_directory_uri() . '/assets/css/style-login.css', false );
}
add_action( 'admin_enqueue_scripts', 'load_admin_style' );


/* ---------------------------------------------------------------------------
 * Scripts
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'tkmulti_scripts' ) )
{
	function tkmulti_scripts()
	{
		// Custom ----------------------------------
		wp_enqueue_script( 'plugins', get_template_directory_uri() .'/assets/js/plugins.js', array( 'jquery' ), true );
		wp_enqueue_script( 'gmapsapi', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyD6FEYaLhW3OhWJhHovx0BK3MAxtkGSAMw&language=he', array(), true );
		wp_enqueue_script( 'acfmaps', get_template_directory_uri() . '/assets/js/acfmaps.js', array( 'jquery' ), true );
		wp_enqueue_script( 'simpleParallax', get_template_directory_uri() . '/assets/js/simpleParallax.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'fancybox', get_template_directory_uri() . '/assets/js/jquery.fancybox.min.js', array( 'jquery' ), '', true );
		wp_enqueue_script( 'aos', get_template_directory_uri() . '/assets/js/aos.js', array( 'jquery' ), '', true );

		// Main config -----------------------------
		wp_enqueue_script( 'functionality', get_template_directory_uri() .'/assets/js/functionality.js', array( 'jquery' ), true );
		wp_enqueue_script( 'essentials', get_template_directory_uri() .'/assets/js/essentials.js', array( 'jquery' ), true );
		wp_enqueue_script( 'main', get_template_directory_uri() .'/assets/js/main.js', array( 'jquery' ), true );		
	}
}
add_action( 'wp_enqueue_scripts', 'tkmulti_scripts' );

function fontawesome_add_defer_attribute($tag, $handle) {
	if ( 'fontawesome' !== $handle )
	return $tag;
	return str_replace( ' src', ' defer src', $tag );
}
add_filter('script_loader_tag', 'fontawesome_add_defer_attribute', 10, 2);

/* ---------------------------------------------------------------------------
 * WooCommerce
 * --------------------------------------------------------------------------- */
 //unhook the WooCommerce wrappers:
remove_action( 'woocommerce_before_main_content', 'woocommerce_output_content_wrapper', 10);
remove_action( 'woocommerce_after_main_content', 'woocommerce_output_content_wrapper_end', 10);

//hook in your own functions to display the wrappers your theme requires:
add_action('woocommerce_before_main_content', 'my_theme_wrapper_start', 10);
add_action('woocommerce_after_main_content', 'my_theme_wrapper_end', 10);

function my_theme_wrapper_start() {
  echo '<section id="main_wc" class="main_wc clearfix">';
}

function my_theme_wrapper_end() {
  echo '</section>';
}

add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

/* ---------------------------------------------------------------------------
 * Template Hierarchy
 * --------------------------------------------------------------------------- */
function tkmulti_template_hierarchy( $template ) {

	if( is_home() || is_search() )
		$template = get_query_template( 'archive' );
	return $template;
}
add_filter( 'template_include', 'tkmulti_template_hierarchy' );
