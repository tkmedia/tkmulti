<?php
/**
 * Login Logo
 *
 * @package      TKMulti
 * @author       Tal Katz TKMedia.co.il
 * @since        1.0.0
 * @license      GPL-2.0+
**/

/* ---------------------------------------------------------------------------
 * Set the content width based on the theme's design and stylesheet.
 * --------------------------------------------------------------------------- */
if ( ! isset( $content_width ) ) {
	$content_width = 1200;
}

/* ---------------------------------------------------------------------------
 * Hide Admin Bar on Frontend
 * --------------------------------------------------------------------------- */
//add_filter("show_admin_bar", "__return_false");

/* ---------------------------------------------------------------------------
 * Image Size | Add
 *
 * TIP: add_image_size ( string $name, int $width, int $height, bool|array $crop = false )
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'tkm_add_image_sizes' ) )
{
	function tkm_add_image_sizes() {

		// Backend --------------------------------------------

			// Featured Image
			set_post_thumbnail_size( 260, 146, false );
			// List Thumbnail for custom post formats
			add_image_size( '50x50', 50, 50, false );

		// Builder Items --------------------------------------

			// Clients | do NOT crop logos
			add_image_size( 'clients-slider', 150, 75, false );
			// Sticky Navigation | Blog, Portfolio & Shop
			add_image_size( 'blog-navi', 200, 200, true );


		// Content --------------------------------------------

			add_image_size( 'block-300', 300, 300, true );
			/* Archives Image */
			//add_image_size( 'archive-link', 370, 300, true );
			/* Responsive Cover Image */
			//add_image_size( 'hero', 1640, 700, true );
			//add_image_size( 'cover', 1500, 500, true );
			/* Responsive project Images */
			add_image_size( 'inside-post', 620, 425, true );
			add_image_size( 'inside-post-360', 360, 245, true );
			add_image_size( 'inside-post-320', 320, 220, true );
			add_image_size( 'gallery-800', 800, 420, true );
			add_image_size( 'article-400', 400, 220, true );
			add_image_size( 'product-500', 500, 500 );
			add_image_size( 'product-500c', 500, 500, true );
			/* Menu Image */
			add_image_size( 'menu-50', 50, 50, true );
			add_image_size( 'menu-100', 100, 100, true );

	}
}
add_action( 'after_setup_theme', 'tkm_add_image_sizes', 11 );

// Add custom image sizes to Media insertion dropdown menu
add_filter('image_size_names_choose', 'xmit_image_sizes');

function xmit_image_sizes($sizes) {
	$addsizes = array(
		"custom-300x300" => __( '300x300', THEME_NAME ),
		"inside-post" => __( '620x245', THEME_NAME ),
		"menu-50" => __( '50x50', THEME_NAME ),
		"menu-100" => __( '100x100', THEME_NAME ),
	);
	$newsizes = array_merge($sizes, $addsizes);
	return $newsizes;
}

/* ---------------------------------------------------------------------------
 * Schema for <body> tag.
 * --------------------------------------------------------------------------- */
if ( ! function_exists( 'tkmulti_schema_body' ) ) :

	/**
	 * Adds schema tags to the body classes.
	 * @since 1.0.0
	 */
	function tkmulti_schema_body() {

		// Check conditions.
		$is_blog = ( is_home() || is_archive() || is_attachment() || is_tax() || is_single() ) ? true : false;

		// Set up default itemtype.
		$itemtype = 'WebPage';

		// Get itemtype for the blog.
		$itemtype = ( $is_blog ) ? 'Blog' : $itemtype;

		// Get itemtype for search results.
		$itemtype = ( is_search() ) ? 'SearchResultsPage' : $itemtype;
		// Get the result.
		$result = apply_filters( 'astra_schema_body_itemtype', $itemtype );

		// Return our HTML.
		echo apply_filters( 'tkmulti_schema_body', "itemtype='https://schema.org/" . esc_attr( $result ) . "' itemscope='itemscope'" );
	}
endif;

/* ---------------------------------------------------------------------------
 * Head CleanUp
 * --------------------------------------------------------------------------- */
remove_action("wp_print_styles", "print_emoji_styles" );
remove_action("wp_head", "print_emoji_detection_script", 7 );
remove_action("wp_head", "feed_links", 2); //REMOVE GENERAL FEEDS
remove_action("wp_head", "feed_links_extra", 3); //REMOVE EXTRA FEEDS
remove_action("wp_head", "rsd_link"); //REMOVE RSD LINK
remove_action("wp_head", "wp_generator"); //REMOVE XHTML GENERATOR
remove_action("wp_head", "wlwmanifest_link"); //REMOVE WLW LINK
remove_action("wp_head", "wp_shortlink_wp_head", 10, 0); //REMOVE SHORTLINK


/* ---------------------------------------------------------------------------
 * New Walker Category for categories menu
 * --------------------------------------------------------------------------- */
 if( ! class_exists( 'New_Walker_Category' ) )
{

	 class dynamicWalkerNavMenu extends Walker_Nav_Menu
	{
		public $tree_type = array( 'post_type', 'taxonomy', 'custom' );

		public $db_fields = array( 'parent' => 'menu_item_parent', 'id' => 'db_id' );

		public function start_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "\n$indent<ul class=\"sub-menu\">\n";
		}

		public function end_lvl( &$output, $depth = 0, $args = array() ) {
			$indent = str_repeat("\t", $depth);
			$output .= "$indent</ul>\n";
		}

		public function start_el( &$output, $item, $depth = 0, $args = array(), $id = 0 ) {
			$indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';

			$classes = empty( $item->classes ) ? array() : (array) $item->classes;

			//BEGIN: IDENTIFY DYNAMIC LINK, CHECK IF SHOULD BE REPLACED & REPLACE
			if( in_array( 'dynamic_occasion', $classes ) ):

				$subjectObject = get_field( 'dynamic-occasion-selection', 'options' );
				$subjectObjectExpiry = get_field( 'dynamic-occasion-expiry', 'options' );

				if( $subjectObject && $subjectObjectExpiry && ( strtotime( $subjectObjectExpiry ) >= time() ) ):

					$item->title = $subjectObject->name;
					$item->url = get_term_link( $subjectObject );

				endif;

			endif;
			//END: IDENTIFY DYNAMIC LINK, CHECK IF SHOULD BE REPLACED & REPLACE

			$classes[] = 'menu-item-' . $item->ID;

			$args = apply_filters( 'nav_menu_item_args', $args, $item, $depth );

			$class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item, $args, $depth ) );
			$class_names = $class_names ? ' class="' . esc_attr( $class_names ) . '"' : '';

			$id = apply_filters( 'nav_menu_item_id', 'menu-item-'. $item->ID, $item, $args, $depth );
			$id = $id ? ' id="' . esc_attr( $id ) . '"' : '';

			$output .= $indent . '<li' . $id . $class_names .'>';

			$atts = array();
			$atts['title']  = ! empty( $item->attr_title ) ? $item->attr_title : '';
			$atts['target'] = ! empty( $item->target )     ? $item->target     : '';
			$atts['rel']    = ! empty( $item->xfn )        ? $item->xfn        : '';
			$atts['href']   = ! empty( $item->url )        ? $item->url        : '';

			$atts = apply_filters( 'nav_menu_link_attributes', $atts, $item, $args, $depth );

			$attributes = '';
			foreach ( $atts as $attr => $value ) {
				if ( ! empty( $value ) ) {
					$value = ( 'href' === $attr ) ? esc_url( $value ) : esc_attr( $value );
					$attributes .= ' ' . $attr . '="' . $value . '"';
				}
			}

			$title = apply_filters( 'the_title', $item->title, $item->ID );

			$title = apply_filters( 'nav_menu_item_title', $title, $item, $args, $depth );

			$item_output = $args->before;
			$item_output .= '<a'. $attributes .'>';
			$item_output .= $args->link_before . $title . $args->link_after;
			$item_output .= '</a>';
			$item_output .= $args->after;

			$output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
		}

		public function end_el( &$output, $item, $depth = 0, $args = array() ) {
			$output .= "</li>\n";
		}

	}

}

/**
 * WCAG 2.0 Attributes for Dropdown Menus
 *
 * Adjustments to menu attributes tot support WCAG 2.0 recommendations
 * for flyout and dropdown menus.
 *
 * @ref https://www.w3.org/WAI/tutorials/menus/flyout/
 */
function tkmulti_nav_menu_link_attributes( $atts, $item, $args, $depth ) {

	// Add [aria-haspopup] and [aria-expanded] to menu items that have children
	$item_has_children = in_array( 'menu-item-has-children', $item->classes );
	if ( $item_has_children ) {
		$atts['aria-haspopup'] = 'true';
		$atts['aria-expanded'] = 'false';
	}

	return $atts;
}
add_filter( 'nav_menu_link_attributes', 'tkmulti_nav_menu_link_attributes', 10, 4 );

/* ---------------------------------------------------------------------------
 * Add html5shiv script to <head> conditionally for IE8 and under
 * --------------------------------------------------------------------------- */
function tkmulti_html5shiv() { ?>
	<!--[if lt IE 9]>
	<script src="<?php echo get_template_directory_uri(); ?>/js/html5shiv.min.js"></script>
	<![endif]-->
<?php }
add_action('wp_head', 'tkmulti_html5shiv');

/* ---------------------------------------------------------------------------
 * Advanced Custom Fields - Custom Functions
 * --------------------------------------------------------------------------- */
// Speed up ACF backend loading time
// Source: https://www.advancedcustomfields.com/blog/acf-pro-5-5-13-update/
add_filter('acf/settings/remove_wp_meta_box', '__return_true');

// Advanced Custom Fields Options Page
if( function_exists('acf_add_options_page') ) {
	acf_add_options_page(array(
		'page_title' 	=> 'Theme General Settings',
		'menu_title'	=> 'Theme Settings',
		'menu_slug' 	=> 'theme-general-settings',
		'capability'	=> 'edit_posts',
		'redirect'		=> false
	));
}

// Advanced Custom Fields Add custom types
add_filter('acf/location/rule_types', 'acf_location_rules_types');
function acf_location_rules_types( $choices ) {
    $choices['Custom']['category'] = 'Category';
    // Append ACF Fields to Child Product Categories only
    $choices[ 'Post' ][ 'taxonomy_term_child' ] = 'Taxonomy Term Child';
    return $choices;
}

add_filter('acf/location/rule_values/category', 'acf_location_rules_values_category');
function acf_location_rules_values_category( $choices )
{
    $terms = get_categories('ranges');

    if( $terms ) {
        foreach( $terms as $term ) {
            $choices[ $term->term_id ] = $term->name;
        }
    }
    return $choices;
}

add_filter('acf/location/rule_match/category', 'acf_location_rules_match_category', 10, 3);
function acf_location_rules_match_category( $match, $rule, $options )
{
    if (!isset($_GET['tag_ID']) ||
            !isset($_GET['taxonomy']) ||
            $_GET['taxonomy'] != 'category') {
        // bail early
        return $match;
    }
    $term_id = $_GET['tag_ID'];
    $selected_term = (int) $rule['value'];
    if ($rule['operator'] == '==') {
        $match = ($selected_term == $term_id);
    } elseif ($rule['operator'] == '!=') {
        $match = ($selected_term != $term_id);
    }
    return $match;
}

// Append ACF Fields to Child Product Categories only
add_filter('acf/location/rule_values/taxonomy_term_child', 'acf_location_rules_values_taxonomy_term_child');
function acf_location_rules_values_taxonomy_term_child( $choices ) {
  if ( $taxonomies = get_taxonomies( array(), 'objects' ) ) {
    foreach( $taxonomies as $taxonomy ) {
      $choices[ $taxonomy->name ] = sprintf( '%s (%s)', $taxonomy->label, $taxonomy->name );
    }
  }

  return $choices;
}

add_filter('acf/location/rule_match/taxonomy_term_child', 'acf_location_rules_match_taxonomy_term_child', 10, 3);
function acf_location_rules_match_taxonomy_term_child( $match, $rule, $options ) {

  // Apply for taxonomies and only to single term edit screen
  if ( ! isset( $options[ 'taxonomy' ] ) || ! isset( $_GET[ 'tag_ID' ] ) ) {
    return $match;
  }

  // Ensure that taxonomy matches the rule
  if ( ( $rule[ 'operator' ] === "==" ) && ( $rule[ 'value' ] !== $options[ 'taxonomy' ] ) ) {
    return $match;
  }
  elseif ( ( $rule[ 'operator' ] === "!=" ) && ( $rule[ 'value' ] === $options[ 'taxonomy' ] ) ) {
    return $match;
  }

  // Get the term and ensure it's valid
  $term = get_term( $_GET[ 'tag_ID' ], $rule[ 'value' ] );
  if ( ! is_a( $term, 'WP_Term' ) ) {
    return $match;
  }

  // Apply for those that have parent only
  if ( $term->parent ) {
    $match = true;
  }
  else {
    $match = false;
  }

  return $match;
}

/* ---------------------------------------------------------------------------
 * Nav Menus
 * --------------------------------------------------------------------------- */
function add_classes_secondary_menu($classes, $item, $args) {
  $classes[] = 'col-nav';
  return $classes;
}
add_filter('nav_menu_css_class','add_classes_secondary_menu',1,3);


/* ---------------------------------------------------------------------------
 * Google Maps API
 * --------------------------------------------------------------------------- */
function my_acf_init() {
	acf_update_setting('google_api_key', 'AIzaSyD6FEYaLhW3OhWJhHovx0BK3MAxtkGSAMw');
}
add_action('acf/init', 'my_acf_init');

/* ---------------------------------------------------------------------------
 * Display navigation to next/previous pages when applicable
 * --------------------------------------------------------------------------- */
if ( ! function_exists( 'tkmulti_content_nav' ) ):
function tkmulti_content_nav( $nav_id ) {
	global $wp_query;

	// Don't print empty markup if there's only one page.
	if ( $wp_query->max_num_pages < 2 ) {
		return;
	}

	$nav_class = 'site-navigation paging-navigation';
	if ( is_single() )
		$nav_class = 'site-navigation post-navigation';

	?>
	<nav role="navigation" id="<?php echo $nav_id; ?>" class="<?php echo $nav_class; ?>">
		<h1 class="assistive-text"><?php _e( 'Post navigation', 'tkmulti' ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="nav-previous">%link</div>', '<span class="meta-nav">' . _x( '&larr;', 'עמוד הקודם', 'tkmulti' ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="nav-next">%link</div>', '%title <span class="meta-nav">' . _x( '&rarr;', 'עמוד הבא', 'tkmulti' ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="nav-previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> עמודים קודמים', 'tkmulti' ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="nav-next"><?php previous_posts_link( __( 'עמודים חדשים <span class="meta-nav">&rarr;</span>', 'tkmulti' ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>

	</nav><!-- #<?php echo $nav_id; ?> -->
	<?php
}
endif;


/* ---------------------------------------------------------------------------
 * Theme numeric posts nav
 * --------------------------------------------------------------------------- */
function theme_numeric_posts_nav() {

	if( is_singular() )
		return;

	global $wp_query;

	/** Stop execution if there's only 1 page */
	if( $wp_query->max_num_pages <= 1 )
		return;

	$paged = get_query_var( 'paged' ) ? absint( get_query_var( 'paged' ) ) : 1;
	$max   = intval( $wp_query->max_num_pages );

	/**	Add current page to the array */
	if ( $paged >= 1 )
		$links[] = $paged;

	/**	Add the pages around the current page to the array */
	if ( $paged >= 3 ) {
		$links[] = $paged - 1;
		$links[] = $paged - 2;
	}

	if ( ( $paged + 2 ) <= $max ) {
		$links[] = $paged + 2;
		$links[] = $paged + 1;
	}

	echo '<div class="archive-navigation"><ul>' . "\n";

	/**	Previous Post Link */
	if ( get_previous_posts_link() )
		printf( '<li>%s</li>' . "\n", get_previous_posts_link() );

	/**	Link to first page, plus ellipses if necessary */
	if ( ! in_array( 1, $links ) ) {
		$class = 1 == $paged ? ' class="active"' : '';

		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( 1 ) ), '1' );

		if ( ! in_array( 2, $links ) )
			echo '<li>…</li>';
	}

	/**	Link to current page, plus 2 pages in either direction if necessary */
	sort( $links );
	foreach ( (array) $links as $link ) {
		$class = $paged == $link ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $link ) ), $link );
	}

	/**	Link to last page, plus ellipses if necessary */
	if ( ! in_array( $max, $links ) ) {
		if ( ! in_array( $max - 1, $links ) )
			echo '<li>…</li>' . "\n";

		$class = $paged == $max ? ' class="active"' : '';
		printf( '<li%s><a href="%s">%s</a></li>' . "\n", $class, esc_url( get_pagenum_link( $max ) ), $max );
	}

	/**	Next Post Link */
	if ( get_next_posts_link() )
		printf( '<li>%s</li>' . "\n", get_next_posts_link() );

	echo '</ul></div>' . "\n";

}

/* ---------------------------------------------------------------------------
 * Add itemprop Schema . org Markup to li Elements in wp_nav_menu
 * --------------------------------------------------------------------------- */
function add_menu_atts( $atts, $item, $args ) {
  $atts['itemprop'] = 'url';
  return $atts;
}
add_filter( 'nav_menu_link_attributes', 'add_menu_atts', 10, 3 );


/* ---------------------------------------------------------------------------
 * Excerpt | Lenght
 * --------------------------------------------------------------------------- */
function theme_slug_excerpt_length( $length ) {
        if ( is_admin() ) {
                return $length;
        }
        return 30;
}
add_filter( 'excerpt_length', 'theme_slug_excerpt_length', 999 );
/* ---------------------------------------------------------------------------
 * Custom Excerpts
 * --------------------------------------------------------------------------- */
// Custom Excerpt function for Advanced Custom Fields
function custom_field_excerpt() {
	global $post;
	$text = get_field('page_main_intro_text'); //Replace 'your_field_name'
	if ( '' != $text ) {
		$text = strip_shortcodes( $text );
		$text = apply_filters('the_content', $text);
		$text = str_replace(']]&gt;', ']]&gt;', $text);
		$excerpt_length = 20; // 20 words
		$excerpt_more = apply_filters('excerpt_more', ' ' . '...');
		$text = $text . "...";
		$text = wp_trim_words( $text, $excerpt_length, $excerpt_more );
	}
	else {
		/* translators: %s: Name of current post */
		the_excerpt( sprintf(
			__( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'tkmulti' ),
			the_title( '<span class="screen-reader-text">"', '"</span>', false )
		) );
	}

	return apply_filters('the_excerpt', $text);
}


/* ---------------------------------------------------------------------------
 * Excerpt | Wrap [...] into <span>
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'mfn_trim_excerpt' ) )
{
	function tkm_trim_excerpt( $text ) {
		return '<span class="excerpt-hellip"> […]</span>';
	}
}
add_filter( 'excerpt_more', 'tkm_trim_excerpt' );


/* ---------------------------------------------------------------------------
 * Excerpt | for Pages
 * --------------------------------------------------------------------------- */
if( ! function_exists( 'tkm_add_excerpts_to_pages' ) )
{
	function tkm_add_excerpts_to_pages() {
		add_post_type_support( 'page', 'excerpt' );
	}
}
add_action( 'init', 'tkm_add_excerpts_to_pages' );


/* ---------------------------------------------------------------------------
 * @param string $content
 * @param int - $char_count number of characters to return
 * @return string - formatted truncated content
 * --------------------------------------------------------------------------- */
function truncate_content($content, $char_count = 130) {
    // Remove all html markup
    $content = wp_strip_all_tags($content);
    // trim text to a certain number of characters, also remove spaces from the end of a string (space counts as a character)
    $truncate = substr($content, 0, $char_count);
    if (substr($truncate, -1, 1) != " ") {
        // remove the last word to make sure we display all words correctly
        $new_words_array = explode(' ', $truncate);
        array_pop($new_words_array);
        $truncate = implode(' ', $new_words_array);
    }
    // apply the content filter and return the formatted truncated content
    return apply_filters('the_content', $truncate.'...');
}


/* ---------------------------------------------------------------------------
 * WordPress Select Template in Custom Post Type
 * Hooks the WP cpt_post_types filter - Custom Post Template
 * --------------------------------------------------------------------------- */
/** http://www.inforest.com/wordpress-select-template-in-custom-post-type/
 * @param array $post_types An array of post type names that the templates be used by
 * @return array The array of post type names that the templates be used by
 **/


/* ---------------------------------------------------------------------------
 * Use HTML in Your Category Description
 * --------------------------------------------------------------------------- */
remove_filter('pre_term_description', 'wp_filter_kses');


/* ---------------------------------------------------------------------------
 * Edit Breadcrumb
 * --------------------------------------------------------------------------- */
/*
add_filter('wpseo_breadcrumb_single_link' ,'remove_breadcrumb_single_link', 10 ,2);
function remove_breadcrumb_single_link($link_output, $link ){

    if( $link['text'] == 'אטרקציות' ) {
        $link_output = '';
    }

    return $link_output;
}
*/


/* ---------------------------------------------------------------------------
 * Edit Backend Columns and Views
 * --------------------------------------------------------------------------- */
// function to display number of posts.
function getPostViews($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0 View";
    }
    return $count;
}

// function to count views.
function setPostViews($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count==''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    }else{
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}

// Add it to a column in WP-Admin
add_filter('manage_posts_columns', 'posts_column_views');
add_action('manage_posts_custom_column', 'posts_custom_column_views',5,2);
function posts_column_views($defaults){
    $defaults['post_views'] = __('Views');
    return $defaults;
}
function posts_custom_column_views($column_name, $id){
	if($column_name === 'post_views'){
        echo getPostViews(get_the_ID());
    }
}





/* ---------------------------------------------------------------------------
 * Include Custom post type in search
 * --------------------------------------------------------------------------- */
add_filter( 'pre_get_posts', 'acme_filter_search' );
function acme_filter_search( $query ) {
	if ( ! $query->is_search ) {
		return $query;
	}
	$query->set( 'post_type', array( 'post', 'page', 'testimonials') );
	return $query;
}


/* ---------------------------------------------------------------------------
 * convert Hex color code to RGB color Code
 * from: https://weblizar.com/convert-hex-code-to-rgb-code-php/
 * --------------------------------------------------------------------------- */
function hex2rgb($hex) {
$hex = str_replace("#", "", $hex);

if(strlen($hex) == 3) {
$r = hexdec(substr($hex,0,1).substr($hex,0,1));
$g = hexdec(substr($hex,1,1).substr($hex,1,1));
$b = hexdec(substr($hex,2,1).substr($hex,2,1));
} else {
$r = hexdec(substr($hex,0,2));
$g = hexdec(substr($hex,2,2));
$b = hexdec(substr($hex,4,2));
}
$rgb = array($r, $g, $b);

return $rgb; // returns an array with the rgb values
}


/* ---------------------------------------------------------------------------
 * Remove ridiculous inline width style from captions
 * Source: http://wordpress.stackexchange.com/questions/4281/how-to-customize-the-default-html-for-wordpress-attachments
 * --------------------------------------------------------------------------- */
function tkmulti_remove_caption_width( $current_html, $attr, $content ) {
    extract( shortcode_atts( array(
        'id'    => '',
        'align' => 'alignnone',
        'width' => '',
        'caption' => '',
    ), $attr ) );
    if ( 1 > (int) $width || empty( $caption ) ) {
		return $content;
    }

    if ( $id ) {
		$id = 'id="' . esc_attr( $id ) . '" ';
    }

    return '<div ' . $id . 'class="wp-caption ' . esc_attr( $align ) . '" style="width: ' . (int) $width . 'px">'
. do_shortcode( $content ) . '<p class="wp-caption-text">' . $caption . '</p></div>';
}
add_filter( 'img_caption_shortcode', 'tkmulti_remove_caption_width', 10, 3 );


/* ---------------------------------------------------------------------------
 * WPML language switcher
 * Called only if WPML plugin is active: http://wpml.org
 * --------------------------------------------------------------------------- */
function tkmulti_lang_switcher() {
	define( 'ICL_DONT_LOAD_NAVIGATION_CSS', true );
	define( 'ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true );
	define( 'ICL_DONT_LOAD_LANGUAGES_JS', true );
	$lang = icl_get_languages( 'skip_missing=N' );
	if ( count( $lang ) > 1 ) {
		$html = '<div class="theme-lang-switcher">';
		foreach( $lang as $value ) {
			if ( 0 == $value[ 'active' ] ) {
				$html .= '<a class="theme-lang" href="' . esc_url( $value[ 'url' ] ) . '">' . esc_html( $value[ 'language_code' ] )  . '</a>';
			}
		}
		$html .= '</div><!-- end .theme-lang-switcher -->';
		return apply_filters( 'theme_lang_switcher_html', $html, $lang );
	}
}


/* ---------------------------------------------------------------------------
 * Display Author Bio Without The Use Of Plugin
 *
 * --------------------------------------------------------------------------- */

function wpb_author_info_box( $content ) {

global $post;

// Detect if it is a single post with a post author
if ( is_single() && isset( $post->post_author ) ) {

// Get author's display name
$display_name = get_the_author_meta( 'display_name', $post->post_author );

// If display name is not available then use nickname as display name
if ( empty( $display_name ) )
$display_name = get_the_author_meta( 'nickname', $post->post_author );

// Get author's biographical information or description
$user_description = get_the_author_meta( 'user_description', $post->post_author );

// Get author's website URL
$user_website = get_the_author_meta('url', $post->post_author);

// Get link to the author archive page
$user_posts = get_author_posts_url( get_the_author_meta( 'ID' , $post->post_author));

if ( ! empty( $display_name ) )

$author_details = '<p class="author_name">About ' . $display_name . '</p>';

if ( ! empty( $user_description ) )
// Author avatar and bio

$author_details .= '<p class="author_details">' . get_avatar( get_the_author_meta('user_email') , 90 ) . nl2br( $user_description ). '</p>';

$author_details .= '<p class="author_links"><a href="'. $user_posts .'">View all posts by ' . $display_name . '</a>';

// Check if author has a website in their profile
if ( ! empty( $user_website ) ) {

// Display author website link
$author_details .= ' | <a href="' . $user_website .'" target="_blank" rel="nofollow">Website</a></p>';

} else {
// if there is no author website then just close the paragraph
$author_details .= '</p>';
}

// Pass all this info to post content
$content = $content . '<footer class="author_bio_section" >' . $author_details . '</footer>';
}
return $content;
}

// Add our function to the post content filter
add_action( 'the_content', 'wpb_author_info_box' );

// Allow HTML in author bio section
remove_filter('pre_user_description', 'wp_filter_kses');

/**
 * Estimate time required to read the article
 *
 * @return string
 */
function bm_estimated_reading_time() {

    $post = get_post();

    $words = str_word_count( strip_tags( $post->post_content ) );
    $minutes = floor( $words / 120 );
    $seconds = floor( $words % 120 / ( 120 / 60 ) );

    if ( 1 < = $minutes ) {
        $estimated_time = $minutes . ' minute' . ($minutes == 1 ? '' : 's') . ', ' . $seconds . ' second' . ($seconds == 1 ? '' : 's');
    } else {
        $estimated_time = $seconds . ' second' . ($seconds == 1 ? '' : 's');
    }

    return $estimated_time;

}