<?php
/**
 * Plugin Name: Child-Theme Modifications for Beans
 * Description: A simple plugin to keep your customizations separate from your Beans child-theme.
 * Version: 	1.0.0
 * Author: 		ThemeButler
 * Author URI: 	http://www.themebutler.com/
 * Credits:		Originally inspired by the Theme Customizations by WooThemes.
 * @package Child_Theme_Modifications_For_Beans
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


// Stop here if Beans is not available
if ( !file_exists( get_template_directory() . '/lib/api/init.php' ) )
	return;

// Include Beans
require_once( get_template_directory() . '/lib/api/init.php' );


/**
 * Initialise the plugin
 * @return void
 */
add_action( 'plugins_loaded', 'tbr_beans_customizer_init' );

function tbr_beans_customizer_init() {

	require_once( 'custom/functions.php' );

	add_action( 'beans_uikit_enqueue_scripts', 'tbr_child_theme_modifications_for_beans_uikit' );

}


/**
 * Enqueue the UIkit Overrides
 * @return void
 */
function tbr_beans_customizer_uikit() {

	beans_uikit_enqueue_theme( 'uikit', plugins_url( '/custom/uikit/', __FILE__  ) );
	beans_compiler_add_fragment( 'uikit', plugins_url( '/custom/custom.less', __FILE__ ), 'less' );
	beans_compiler_add_fragment( 'uikit', plugins_url( '/custom/custom.css', __FILE__ ), 'css' );
	beans_compiler_add_fragment( 'uikit', plugins_url( '/custom/custom.js', __FILE__ ), 'js' );

}
