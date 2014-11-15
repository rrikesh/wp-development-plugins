<?php

/*
  Plugin Name: WP Development Plugins
  Plugin URI: https://github.com/ItsPaperboat/wp-development-plugins
  Description: Helper plugin that allows developers to install frequently used plugins easily.
  Author: Rikesh Ramlochund
  Version: 0.2
  Author URI: http://paperboat.io
*/

/**
 * Do not call outside of WordPress
 */
function_exists( 'add_filter' ) || exit;

/**
 * Include the TGM_Plugin_Activation class.
 */
require_once __DIR__ . '/class-tgm-plugin-activation.php';

class RR_WP_Development_Plugins{

	public function __construct(){
		add_action( 'tgmpa_register', array( &$this, 'my_theme_register_required_plugins' ) );
	}

	/**
	 * Register the required plugins for this theme.
	 */
	public function my_theme_register_required_plugins() {

		/**
		 * Array of plugin arrays.
		 */
		$plugins = array(

			# Install Theme Check plugin - http://wordpress.org/plugins/theme-check/
			array(
				'name' 		=> 'Theme-Check',
				'slug' 		=> 'theme-check',
				'required' 	=> false
			),

			# Install Debug Bar plugin - http://wordpress.org/plugins/debug-bar/
			array(
				'name'     => 'Debug Bar',
				'slug'     => 'debug-bar',
				'required' => false
			),
			
			# Install Duplicate Post plugin - http://wordpress.org/plugins/duplicate-post/
			array(
				'name'     => 'Duplicate Post',
				'slug'     => 'duplicate-post',
				'required' => false
			),

			# Install Wordpress-importer - http://wordpress.org/plugins/wordpress-importer/
			array(
				'name' 		=> 'Wordpress importer',
				'slug' 		=> 'wordpress-importer',
				'required' 	=> false
			),

			# Install What Template File Am i Viewing - http://wordpress.org/plugins/what-template-file-am-i-viewing/
			array(
				'name' 		=> 'What Template File Am I Viewing?',
				'slug' 		=> 'what-template-file-am-i-viewing',
				'required' 	=> false
			),
			
			# Install Advanced Custom Fields - http://wordpress.org/plugins/advanced-custom-fields/
			array(
				'name' =>'Advanced Custom Fields',
				'slug' => 'advanced-custom-fields',
				'required' => false
				),


		
		);

		// Change this to your theme text domain, used for internationalising strings
		$theme_text_domain = 'tgmpa';

		/**
		 * Array of configuration settings. Amend each line as needed.
		 * If you want the default strings to be available under your own theme domain,
		 * leave the strings uncommented.
		 * Some of the strings are added into a sprintf, so see the comments at the
		 * end of each line for what each argument will be.
		 */
		$config = array(
			'domain'       		=> $theme_text_domain,         	// Text domain - likely want to be the same as your theme.
			'default_path' 		=> '',                         	// Default absolute path to pre-packaged plugins
			'parent_menu_slug' 	=> 'themes.php', 				// Default parent menu slug
			'parent_url_slug' 	=> 'themes.php', 				// Default parent URL slug
			'menu'         		=> 'install-required-plugins', 	// Menu slug
			'has_notices'      	=> true,                       	// Show admin notices or not
			'is_automatic'    	=> false,					   	// Automatically activate plugins after installation or not
			'message' 			=> '',							// Message to output right before the plugins table
			'strings'      		=> array(
				'page_title'                       			=> __( 'Install Required Plugins', $theme_text_domain ),
				'menu_title'                       			=> __( 'Install Plugins', $theme_text_domain ),
				'installing'                       			=> __( 'Installing Plugin: %s', $theme_text_domain ), // %1$s = plugin name
				'oops'                             			=> __( 'Something went wrong with the plugin API.', $theme_text_domain ),
				'notice_can_install_required'     			=> _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_install_recommended'			=> _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_install'  					=> _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.' ), // %1$s = plugin name(s)
				'notice_can_activate_required'    			=> _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_can_activate_recommended'			=> _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_activate' 					=> _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.' ), // %1$s = plugin name(s)
				'notice_ask_to_update' 						=> _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.' ), // %1$s = plugin name(s)
				'notice_cannot_update' 						=> _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.' ), // %1$s = plugin name(s)
				'install_link' 					  			=> _n_noop( 'Begin installing plugin', 'Begin installing plugins' ),
				'activate_link' 				  			=> _n_noop( 'Activate installed plugin', 'Activate installed plugins' ),
				'return'                           			=> __( 'Return to Required Plugins Installer', $theme_text_domain ),
				'plugin_activated'                 			=> __( 'Plugin activated successfully.', $theme_text_domain ),
				'complete' 									=> __( 'All plugins installed and activated successfully. %s', $theme_text_domain ), // %1$s = dashboard link
				'nag_type'									=> 'updated' // Determines admin notice type - can only be 'updated' or 'error'
			)
		);

		tgmpa( $plugins, $config );

	}
}

new RR_WP_Development_Plugins();
