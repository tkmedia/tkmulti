<?php
/**
 * Theme Customizer settings.
 *
 * @package      TKMulti
 * @author       Tal Katz TKMedia.co.il
 * @since 1.7 
 */
/**
 * Theme customizer settings with real-time update
 * Very helpful: http://ottopress.com/2012/theme-customizer-part-deux-getting-rid-of-options-pages/
 *
 * @since 1.5
 */
function tkmulti_customizer( $wp_customize ) {
    // Footer Logo upload
    $wp_customize->add_section( 'tkmulti_logo_section' , array(
	    'title'       => __( 'Footer Logo', 'tkmulti' ),
	    'priority'    => 30,
	    'description' => __( 'Upload logo to footer - if theme support', 'tkmulti' ),
	) );

	$wp_customize->add_setting( 'tkmulti_logo', array(
		'sanitize_callback' => 'esc_url_raw',
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tkmulti_logo', array(
		'label'    => __( 'Footer Logo', 'tkmulti' ),
		'section'  => 'tkmulti_logo_section',
		'settings' => 'tkmulti_logo',
	) ) );



    $wp_customize->add_setting( 'tkmulti_mobile_logo', array(
        'default'        => '',
    ) );

    $wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'tkmulti_mobile_logo', array(
		'label'    => __( 'Mobile Logo', 'tkmulti' ),
        'section' => 'title_tagline',
        'settings'   => 'tkmulti_mobile_logo',
    ) ) );


	// Set site name and description to be previewed in real-time
	$wp_customize->get_setting('blogname')->transport='postMessage';
	$wp_customize->get_setting('blogdescription')->transport='postMessage';

	// Enqueue scripts for real-time preview
	wp_enqueue_script( 'tkmulti-customizer', get_template_directory_uri() . '/js/tkmulti-customizer.js', array( 'jquery' ) );

}
add_action('customize_register', 'tkmulti_customizer');