<?php
if( ! defined( 'ABSPATH' ) ){
	exit; // Exit if accessed directly
}

if( ! class_exists( 'TGM_Plugin_Activation' ) ){
	
	include_once 'class-tgm-plugin-activation.php';
	
	add_action( 'tgmpa_register', 'tkmulti_register_required_plugins' );

	/**
	 * Plugin installation and activation for WordPress themes.
	 */
	function tkmulti_register_required_plugins() {
		$plugins = array(
			array(
				'name'      => 'ACF Content Analysis for Yoast SEO',
				'slug'      => 'acf-content-analysis-for-yoast-seo',
				'required'  => true,
			),			
			array(
				'name'      => 'ACF Flexible Content Modal',
				'slug'      => 'acf-flexible-content-modal',
				'required'  => true,
			),			
			array(
				'name'      => 'Admin Menu Tree Page View',
				'slug'      => 'admin-menu-tree-page-view',
				'required'  => false,
			),
			array(
				'name'      => 'Advanced Custom Fields: Font Awesome',
				'slug'      => 'advanced-custom-fields-font-awesome',
				'required'  => false,
			),
			array(
				'name'      => 'Contact Form 7',
				'slug'      => 'contact-form-7',
				'required'  => false,
			),
			array(
				'name'      => 'Contact Form 7 Redirection',
				'slug'      => 'wpcf7-redirect',
				'required'  => false,
			),
			array(
				'name'      => 'Contact Form CFDB7',
				'slug'      => 'contact-form-cfdb7',
				'required'  => false,
			),
			array(
				'name'      => 'Debug Bar',
				'slug'      => 'debug-bar',
				'required'  => false,
			),
			array(
				'name'      => 'Loco Translate',
				'slug'      => 'loco-translate',
				'required'  => false,
			),
			array(
				'name'      => 'Debug Bar Console',
				'slug'      => 'debug-bar-console',
				'required'  => false,
			),
			array(
				'name'      => 'Duplicate Posts',
				'slug'      => 'duplicate-post',
				'required'  => false,
			),		
			array(
				'name'      => 'Yoast SEO',
				'slug'      => 'wordpress-seo',
				'required'  => false,
			),
			array(
				'name'      => 'Better Search Replace',
				'slug'      => 'better-search-replace',
				'required'  => false,
			),
			array(
				'name'      => 'Broken Link Checker',
				'slug'      => 'broken-link-checker',
				'required'  => false,
			),						
			array(
				'name'      => 'Default featured image',
				'slug'      => 'default-featured-image',
				'required'  => false,
			),
			array(
				'name'      => 'Query Monitor',
				'slug'      => 'query-monitor',
				'required'  => false,
			),
			array(
				'name'      => 'Rewrite Rules Inspecto',
				'slug'      => 'rewrite-rules-inspector',
				'required'  => false,
			),
			array(
				'name'      => 'Show Current Template',
				'slug'      => 'show-current-template',
				'required'  => false,
			),										
			array(
				'name'      => 'Simply Show IDs',
				'slug'      => 'simply-show-ids',
				'required'  => false,
			),
			array(
				'name'      => 'Theme Check',
				'slug'      => 'theme-check',
				'required'  => false,
			),
			array(
				'name'      => 'Reveal IDs',
				'slug'      => 'reveal-ids-for-wp-admin-25',
				'required'  => false,
			),
			array(
				'name'      => 'ACF Admin Flexible Content Collapse',
				'slug'      => 'acf-admin-flexible-content-collapse',
				'required'  => false,
			),
			array(
				'name'      => 'ShortPixel Image Optimizer',
				'slug'      => 'shortpixel-image-optimiser',
				'required'  => false,
			),
			array(
				'name'      => 'Classic Editor',
				'slug'      => 'classic-editor',
				'required'  => true,
			),
			array(
				'name'               => 'Advanced Custom Fields Pro',
				'slug'               => 'advanced-custom-fields-pro',
				'source'             => get_stylesheet_directory_uri() . '/lib/plugins/advanced-custom-fields-pro.zip',
				'required'           => true,
				'version'            => '',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
				'is_callable'        => '',
			),
			array(
				'name'               => 'WP Pusher',
				'slug'               => 'wppusher',
				'source'             => get_stylesheet_directory_uri() . '/lib/plugins/wppusher.zip',
				'required'           => true,
				'version'            => '',
				'force_activation'   => false,
				'force_deactivation' => false,
				'external_url'       => '',
				'is_callable'        => '',
			),
		);
	
		/*
		 * Array of configuration settings. Amend each line as needed.
		 *
		 * TGMPA will start providing localized text strings soon. If you already have translations of our standard
		 * strings available, please help us make TGMPA even better by giving us access to these translations or by
		 * sending in a pull-request with .po file(s) with the translations.
		 *
		 * Only uncomment the strings in the config array if you want to customize the strings.
		 */
		$config = array(
			'id'           => 'tkmulti',                 // Unique ID for hashing notices for multiple instances of TGMPA.
			'default_path' => '',                      // Default absolute path to bundled plugins.
			'menu'         => 'tgmpa-install-plugins', // Menu slug.
			'parent_slug'  => 'themes.php',            // Parent menu slug.
			'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
			'has_notices'  => true,                    // Show admin notices or not.
			'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
			'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
			'is_automatic' => false,                   // Automatically activate plugins after installation or not.
			'message'      => '',                      // Message to output right before the plugins table.
	
			'strings'      => array(
				'page_title'                      => __( 'התקן רכיבים נדרשים', 'tkmulti' ),
				'menu_title'                      => __( 'התקן רכיבים', 'tkmulti' ),
				'installing'                      => __( 'מתקין רכיב: %s', 'tkmulti' ),
				'updating'                        => __( 'מעדכן רכיב: %s', 'tkmulti' ),
				'oops'                            => __( 'משהו השתבש עם ממשק תכנות היישומים של הרכיב', 'tkmulti' ),
				'notice_can_install_required'     => _n_noop(
					'ערכת עיצוב זו דורשת את הרכיב הבא: %1$s.',
					'ערכת עיצוב זו דורשת את הרכיבים הבאים: %1$s.',
					'tkmulti'
				),
				'notice_can_install_recommended'  => _n_noop(
					'ערכת עיצוב זו ממליצה על הרכיב הבא: %1$s.',
					'ערכת עיצוב זו ממליצה על הרכיבים הבאים: %1$s.',
					'tkmulti'
				),
				'notice_ask_to_update'            => _n_noop(
					'הרכיב הבא נדרש לעדכן לגירסאתו העדכנית על מנת להבטיח תאימות מקסימלית עם ערכת עיצוב זו: %1$s.',
					'הרכיבים הבאים נדרשים לעדכן לגירסאותיהם העדכניות על מנת להבטיח תאימות מקסימלית עם ערכת עיצוב זו: %1$s.',
					'tkmulti'
				),
				'notice_ask_to_update_maybe'      => _n_noop(
					'ישנו עדכון עבור: %1$s.',
					'ישנם עדכונים זמינים עבור הרכיבים הבאים: %1$s.',
					'tkmulti'
				),
				'notice_can_activate_required'    => _n_noop(
					'הרכיב הנדרש הבא כבוי כעת: %1$s.',
					'הרכיבים הנדרשים הבאים כבויים כעת: %1$s.',
					'tkmulti'
				),
				'notice_can_activate_recommended' => _n_noop(
					'הרכיב המומלץ הבא כבוי כעת: %1$s.',
					'הרכיבים המומלצים הבאים כבויים כעת: %1$s.',
					'tkmulti'
				),
				'install_link'                    => _n_noop(
					'החל התקנת רכיב',
					'החל התקנת רכיבים',
					'tkmulti'
				),
				'update_link' 					  => _n_noop(
					'החל עדכון רכיב',
					'החל עדכון רכיבים',
					'tkmulti'
				),
				'activate_link'                   => _n_noop(
					'החל הפעלת רכיב',
					'החל הפעלת רכיבים',
					'tkmulti'
				),
				'return'                          => __( 'חזור למתקין הרכיבים הנדרשים', 'tkmulti' ),
				'plugin_activated'                => __( 'רכיב הופעל בהצלחה.', 'tkmulti' ),
				'activated_successfully'          => __( 'הרכיבים הבאים הופעלו בהצלחה:', 'tkmulti' ),
				'plugin_already_active'           => __( 'לא בוצעה פעולה. הרכיב %1$s הותקן בעבר.', 'tkmulti' ),
				'plugin_needs_higher_version'     => __( 'הרכיב לא הופעל. גירסא עדכנית יותר של %s נדרשת עבור ערכת עיצוב זו. נא לעדכן רכיב.', 'tkmulti' ),
				'complete'                        => __( 'כל הרכיבים הותקנו והופעלו בהצלחה. %1$s', 'tkmulti' ),
				'dismiss'                         => __( 'מחק הודעה זו', 'tkmulti' ),
				'notice_cannot_install_activate'  => __( 'ישנו רכיב אחד או יותר הנדרש או מומלץ להתקנה, הפעלה או עדכון.', 'tkmulti' ),
				'contact_admin'                   => __( 'נא ליצור קשר עם מנהל האתר לעזרה.', 'tkmulti' ),
				/* 
				'nag_type'                        => '', // Determines admin notice type - can only be one of the typical WP notice classes, such as 'updated', 'update-nag', 'notice-warning', 'notice-info' or 'error'. Some of which may not work as expected in older WP versions.
				*/
			),
			
		);
	
		tgmpa( $plugins, $config );
	}
			
}
