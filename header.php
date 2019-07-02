<?php
/**
 * Site Header
 *
 * @package      TKMulti
 * @author       Tal Katz TKMedia.co.il
 * @since        1.0.0
 * @license      GPL-2.0+
**/
 ?>
 
<!DOCTYPE html>
<!--[if lt IE 9]>
<html id="unsupported" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 9]>
<html id="ie9" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 6) | !(IE 7) | !(IE 8) | !(IE 9)  ]>
<html <?php language_attributes(); ?>>
<![endif]-->
<html <?php language_attributes(); ?>>
<head>
	<?php 
	tha_head_top();
	wp_head();
	tha_head_bottom();
	?>
</head>

<?php
//ACF Theme option field
$header_phone = get_option( 'options_header_phone' );
$site_style = get_option( 'options_site_wrap_style' );
$header_style = get_option( 'options_header_style' );
$header_color = get_option( 'options_header_bg_color' );
$logo_side = get_option( 'options_header_logo_side' );
$nav_layout = get_option( 'options_menu_item_layout' );
$top_panel_show = get_option( 'options_header_top_panel_show' );
?>

<body <?php body_class( 'loading' ); ?> <?php tkmulti_schema_body(); ?> id="body-<?php the_ID(); ?>">
<?php if ( function_exists( 'wp_body_open' ) ) {
	wp_body_open();
}
tha_body_top();
?>

	<div id="page" class="site <?php echo $site_style; ?> <?php echo $header_style; ?> <?php echo $header_color; ?>">
		<a class="skip-link screen-reader-text" href="#main_content"><?php _e( 'Skip to content', 'tkmulti' ) ?></a>
		<?php tha_header_before(); ?>
		
		<?php if( $header_style !== 'header_logo_center_no_nav' || $header_style !== 'header_logo_r_no_nav' ) { ?>
		<?php get_template_part( 'partials/header/hamburger' ); ?>
		<?php } ?>
		<header id="header-container" class="header-bar animated clearfix fixedHeader sticky_header <?php if (is_front_page()) { ?>front_header_container<?php } elseif (is_tax( 'product_cat' ) || is_category() ) { ?>archive_header_container<?php } elseif ( is_singular() ) { ?>deafault_header_container<?php } else { ?>deafault_header_container<?php } ?> <?php echo $logo_side; ?>" itemscope="itemscope" itemtype="http://schema.org/WPHeader" role="banner">
			<div class="header_wrapper_bg">
				<?php tha_header_top(); ?>
				<?php if( $top_panel_show ) { ?>
				<div class="header_topbar_container top_panel">
					<div class="header_topbar_container_inner wrap">
						<?php get_template_part( 'partials/header/top-bar' ); ?>
					</div>
				</div>				
				<?php } ?>
				
				<div class="header_wrapper wrap">
					
					<div id="branding">
						<div class="branding_wrap">
							<?php get_template_part( 'partials/header/branding-customizer' ); ?>
						</div>
					</div>
					
					<?php if( $header_style == 'full_row_box normal_menu' || $header_style == 'split_row_box normal_menu' || $header_style == 'header_logo_center_nav normal_menu') { ?>
					<div class="header_menu_container <?php echo $nav_layout; ?>">
						<div class="header_menu_container_inner">
							<?php get_template_part( 'partials/header/nav' ); ?>
						</div>
					</div>				
					<?php } elseif( $header_style == 'full_site_hamburger') { ?>		
					<div class="header_menu_container">
						<div class="header_menu_container_inner">
							<?php get_template_part( 'partials/header/nav-side' ); ?>
						</div>
					</div>				
					<?php } ?>	
					
					<?php if( $header_style == 'header_logo_r_no_nav') { ?>
					<div class="header_topbar_container">
						<div class="header_topbar_container_inner">
							<?php get_template_part( 'partials/header/top-bar' ); ?>
						</div>
					</div>				
					<?php } ?>
					
				</div>
				<?php tha_header_bottom(); ?>
			</div>
		</header>
		<?php tha_header_after(); ?>
		<main id="main_content" role="main">
			<div class="site_overlay"></div>			
			