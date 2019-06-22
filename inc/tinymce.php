<?php
/**
 * TinyMCE Customizations
 *
 * @package      TKMulti
 * @author       Tal Katz TKMedia.co.il
 * @since        1.0.0
 * @license      GPL-2.0+
**/

 /**
  * Add "Styles" drop-down to TinyMCE
  *
  * @since 1.0.0
  * @param array $buttons
  * @return array
  */
 function tkmulti_mce_editor_buttons( $buttons ) {
 	array_unshift( $buttons, 'styleselect' );
 	return $buttons;
 }
 add_filter( 'mce_buttons_2', 'tkmulti_mce_editor_buttons' );

 /**
  * Add styles/classes to the TinyMCE "Formats" drop-down
  *
  * @since 1.0.0
  * @param array $settings
  * @return array
  */
 function tkmulti_mce_before_init( $settings ) {

 	$style_formats = array(
 		array(
 			'title'    => 'Button',
 			'selector' => 'a',
 			'classes'  => 'button',
 		),
		array(
			'title'    => 'Large Paragraph',
			'selector' => 'p',
			'classes'  => 'large',
		),
		array(
			'title'    => 'Small Paragraph',
			'selector' => 'p',
			'classes'  => 'small',
		),
		array(
			'title'    => 'Extra Margin Paragraph',
			'selector' => 'p',
			'classes'  => 'extra-margin',
		)
 	);
 	$settings['style_formats'] = json_encode( $style_formats );
 	return $settings;
 }
 add_filter( 'tiny_mce_before_init', 'tkmulti_mce_before_init' );

/* ---------------------------------------------------------------------------
 * Add Font Size to Wordpress Visual Editor
 * --------------------------------------------------------------------------- */
function tkmulti_buttons( $buttons ) {

    array_unshift( $buttons, 'fontsizeselect' );
    return $buttons;
  }
add_filter( 'mce_buttons_2', 'tkmulti_buttons' );

function tkmulti_font_size( $initArray ){
    $initArray['fontsize_formats'] = "9px 10px 11px 12px 13px 14px 15px 16px 17px 18px 19px 20px 22px 24px 28px 30px 35px 40px 45px 50px";
    return $initArray;
  }
add_filter( 'tiny_mce_before_init', 'tkmulti_font_size' );
