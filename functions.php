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
require get_template_directory() . '/inc/tha-theme-hooks.php';
require get_template_directory() . '/inc/wordpress-cleanup.php';
require get_template_directory() . '/inc/login-logo.php';
require get_template_directory() . '/inc/helper-functions.php';
require get_template_directory() . '/inc/navigation.php';
//require get_template_directory() . '/inc/sidebar-layouts.php';
//require get_template_directory() . '/inc/custom-logo.php';
require get_template_directory() . '/inc/loop.php';
require get_template_directory() . '/inc/tinymce.php';
require get_template_directory() . '/inc/disable-editor.php';
require get_template_directory() . '/inc/amp.php';
require get_template_directory() . '/inc/display-posts.php';
require get_template_directory() . '/inc/instantpage.php';
require get_template_directory() . '/inc/wpforms.php';
add_filter( 'get_comment_date', '__return_empty_string' );
add_filter( 'get_comment_time', '__return_empty_string' );
