<?php
/**
 * Plugin Name: Child-Theme Modifications for Beans
 * Description: A simple plugin to keep your Beans child-theme customizations seperate from the theme.
 * Version: 	1.0.0
 * Author: 		ThemeButler
 * Author URI: 	http://www.themebutler.com/
 * Credits:		Based on Theme Customizations plugin, by WooThemes. Modified to use Beans compiler.
 * @package Child_Theme_Modifications_For_Beans
 */

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


// Stop here if Beans is not available.
if ( !file_exists( get_template_directory() . '/lib/api/init.php' ) )
	return;

	require_once( get_template_directory() . '/lib/init.php' );

add_action( 'plugins_loaded', 'tbr_child_theme_modifications_init' );

/**
 * Initialise the plugin
 * @return void
 */
function tbr_child_theme_modifications_init() {

	require_once( 'custom/functions.php' );

	add_action( 'beans_uikit_enqueue_scripts', 'tbr_child_theme_modifications_for_beans_uikit', 10 );
	add_action( 'wp_enqueue_scripts', 'tbr_child_theme_modifications_for_beans_custom', 10 );

}


/**
 * Enqueue the UIkit Overrides
 * @return void
 */
function tbr_child_theme_modifications_for_beans_uikit() {

	beans_uikit_enqueue_theme( 'uikit', plugins_url( '/custom/uikit/', __FILE__  ) );
	beans_compiler_add_fragment( 'uikit', plugins_url( '/custom/custom.less', __FILE__ ), 'less' );

}

/**
 * Enqueue the UIkit Overrides
 * @return void
 */
function tbr_child_theme_modifications_for_beans_custom() {

	wp_enqueue_script( 'custom', plugins_url( '/custom/custom.js', __FILE__ ), 'js' );
	wp_enqueue_style( 'custom', plugins_url( '/custom/custom.css', __FILE__ ), 'css' );

}
