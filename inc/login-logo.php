<?php
/**
 * Login Logo
 *
 * @package      TKMulti
 * @author       Tal Katz TKMedia.co.il
 * @since        1.0.0
 * @license      GPL-2.0+
**/
/**
 * Login Logo URL
 *
 */
function tkmulti_login_header_url( $url ) {
    return esc_url( home_url() );
}
add_filter( 'login_headerurl', 'tkmulti_login_header_url' );
add_filter( 'login_headertext', '__return_empty_string' );
/**
 * Login Logo
 *
 */
function tkmulti_login_logo() {
	$logo_path = '/assets/images/logo.png';
	if( ! file_exists( get_stylesheet_directory() . $logo_path ) )
		return;
	$logo = get_stylesheet_directory_uri() . $logo_path;
    ?>
    <style type="text/css">
    .login h1 a {
        background-image: url(<?php echo $logo;?>);
        background-size: contain;
        background-repeat: no-repeat;
		background-position: center center;
        display: block;
        overflow: hidden;
        text-indent: -9999em;
        width: 312px;
        height: 100px;
    }
    </style>
    <?php
}
add_action( 'login_head', 'tkmulti_login_logo' );
