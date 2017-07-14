<?php
/**
 Plugin Name: 										Full Screen Background Images
 Plugin URI: 										http://www.multimediamonster.nl
 Description: 										Full Screen Background Images Plugin inspired by the plugin (<a href="http://wordpress.org/extend/plugins/full-screen-background-images/">see original</a>) of <a href="http://www.kouratoras.gr">Konstantinos Kouratoras</a> (kouratoras). The plugin creates an image slideshow as a background to your website. I made structural changes for future development and addes some setting options. My intention is to add a widget you can put anywhere on your website, expend the options for background (showing the title, adding text) and lots more.
 Version: 											1.1.5
 Author: 											MultiMediaMonster, Renske van der Heijden
 Author URI: 										http://www.multimediamonster.nl
 License: 											GPLv2 or later
*/

// ---------------------------------------------------------------------------------------------------------------------
// 	PRE DEFINED VARIABLES
// 	@since											MultiMediaMonster 1.1
// ---------------------------------------------------------------------------------------------------------------------
  
	define('MMM_FSBI_PLUGIN_CREATOR',				'MultiMediaMonster');
	define('MMM_FSBI_PLUGIN_CREATOR_AUTHOR',		'Renske van der Heijden');
	define('MMM_FSBI_PLUGIN_CREATOR_URL',			'www.multimediamonster.nl');
	define('MMM_FSBI_PLUGIN_CREATOR_EMAIL',			'renske@multimediamonster.nl');
	define('MMM_FSBI_PLUGIN_NAME', 					'Full Screen Background Images');
	define('MMM_FSBI_PLUGIN_ID_LONG', 				'full_screen_background_images');
	define('MMM_FSBI_PLUGIN_ID_LONG_MINUS', 		str_replace('_', '-', MMM_FSBI_PLUGIN_ID_LONG));
	define('MMM_FSBI_PLUGIN_ID_SHORT', 				'mmm_fsbi');
	define('MMM_FSBI_PLUGIN_ID_SHORT_MINUS',		str_replace('_', '-', MMM_FSBI_PLUGIN_ID_SHORT));
	define('MMM_FSBI_PLUGIN_PATH',					dirname( __FILE__ ));
	define('MMM_FSBI_PLUGIN_FOLDER',				basename(MMM_FSBI_PLUGIN_PATH));
	define('MMM_FSBI_PLUGIN_URL',					plugins_url().'/'.MMM_FSBI_PLUGIN_FOLDER);
	
	define('MMM_FSBI_PLUGIN_TRANSLATE',				MMM_FSBI_PLUGIN_ID_SHORT_MINUS.'-translated');
	define('MMM_FSBI_PLUGIN_TEXTDOMAIN',			MMM_FSBI_PLUGIN_FOLDER . '/languages/');

	// ---------------------------------------------------------------------------------------------------------------------
	// 	ADMIN & FRONTEND
	// ---------------------------------------------------------------------------------------------------------------------

		// includes
		include_once( 'classes/class-mmm-copyright.php' );
		include_once( 'classes/class-'.MMM_FSBI_PLUGIN_ID_SHORT_MINUS.'-settings.php' );
		include_once( 'classes/class-'.MMM_FSBI_PLUGIN_ID_SHORT_MINUS.'-register.php' );
		add_action( 'init', MMM_FSBI_PLUGIN_ID_SHORT.'_register::plugin_load_textdomain' );
		
		// ---------------------------------------------------------------------------------------------------------------------
		// 	ADMIN
		// ---------------------------------------------------------------------------------------------------------------------
		
			// includes
			include_once( 'classes/class-'.MMM_FSBI_PLUGIN_ID_SHORT_MINUS.'-admin-menu-items.php' );
			include_once( 'classes/class-'.MMM_FSBI_PLUGIN_ID_SHORT_MINUS.'-admin-pages.php' );
			include_once( 'classes/class-'.MMM_FSBI_PLUGIN_ID_SHORT_MINUS.'-admin-functions.php' );
			
			// registering
			register_activation_hook( __FILE__, array( MMM_FSBI_PLUGIN_ID_SHORT.'_register', 'activate' ) );
			register_deactivation_hook( __FILE__, array( MMM_FSBI_PLUGIN_ID_SHORT.'_register', 'deactivate' ) );
			register_uninstall_hook( __FILE__, array( MMM_FSBI_PLUGIN_ID_SHORT.'_register', 'uninstall' ) );
			
			// actions
			add_action( 'admin_init', MMM_FSBI_PLUGIN_ID_SHORT.'_register::load_this_plugin' );
			add_action( 'admin_init', MMM_FSBI_PLUGIN_ID_SHORT.'_settings::settings_fields_init' );
			add_action( 'admin_init', MMM_FSBI_PLUGIN_ID_SHORT.'_settings::settings_fields_update' );
			add_action( 'admin_init', MMM_FSBI_PLUGIN_ID_SHORT.'_register::admin_styles' );
			add_action( 'admin_init', MMM_FSBI_PLUGIN_ID_SHORT.'_register::admin_scripts' );
			add_action( 'admin_menu', MMM_FSBI_PLUGIN_ID_SHORT.'_admin_menu_items::add_admin_menu_subitems');
			add_action( 'init', MMM_FSBI_PLUGIN_ID_SHORT.'_admin_menu_items::add_admin_menu_items' );
			
			add_action( 'load-edit.php', MMM_FSBI_PLUGIN_ID_SHORT.'_copyright::add_copyright_screentab' );
			add_action( 'load-post.php', MMM_FSBI_PLUGIN_ID_SHORT.'_copyright::add_copyright_screentab' );
			add_action( 'load-post-new.php', MMM_FSBI_PLUGIN_ID_SHORT.'_copyright::add_copyright_screentab' );
			
			// filters
			add_filter( 'plugin_action_links', MMM_FSBI_PLUGIN_ID_SHORT.'_admin_menu_items::add_plugin_settings_link', 2, 2);

			
		// ---------------------------------------------------------------------------------------------------------------------
		// 	FRONTEND
		// ---------------------------------------------------------------------------------------------------------------------
		
			// includes
			include_once( 'classes/class-'.MMM_FSBI_PLUGIN_ID_SHORT_MINUS.'-frontend-functions.php' );
			include_once( 'classes/class-'.MMM_FSBI_PLUGIN_ID_SHORT_MINUS.'-frontend-widget.php' );
			
			// actions
			add_action('wp_enqueue_scripts', MMM_FSBI_PLUGIN_ID_SHORT.'_register::frontend_scripts'); // FIXME
			add_action('wp_enqueue_scripts', MMM_FSBI_PLUGIN_ID_SHORT.'_register::frontend_styles'); // FIXME
			add_action('wp_head', MMM_FSBI_PLUGIN_ID_SHORT.'_frontend_widget::frontend_init'); // FIXME
			add_action('wp_footer', MMM_FSBI_PLUGIN_ID_SHORT.'_frontend_widget::frontend_footer'); // FIXME

