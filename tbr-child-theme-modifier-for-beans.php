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


/**
 * Main Child_Theme_Modifications_For_Beans Class
 *
 * @class Child_Theme_Modifications_For_Beans
 * @version	1.0.0
 * @since 1.0.0
 * @package	Child_Theme_Modifications_For_Beans
 */
final class Child_Theme_Modifications_For_Beans {

	public function __construct () {


	}

	/**
	 * Setup all the things
	 */
	public function theme_customisations_setup() {

		add_action( 'beans_uikit_enqueue_scripts', array( $this, 'child_theme_modifications_for_beans_uikit' ) );

		require_once( 'custom/functions.php' );
	}

	/**
	 * Enqueue the UIkit Overrides
	 * @return void
	 */
	public function child_theme_modifications_for_beans_uikit() {

		beans_uikit_enqueue_theme( 'uikit', plugins_url( '/custom/uikit/', __FILE__  ) );
		beans_compiler_add_fragment( 'uikit', plugins_url( '/custom/custom.css', __FILE__ ), 'css' );
		beans_compiler_add_fragment( 'uikit', plugins_url( '/custom/custom.less', __FILE__ ), 'less' );
		beans_compiler_add_fragment( 'uikit', plugins_url( '/custom/custom.js', __FILE__ ), 'js' );

	}
}

/**
 * The 'main' function
 * @return void
 */
function __child_theme_modifications_for_beans_main() {

	new Child_Theme_Modifications_For_Beans();

}


/**
 * Initialise the plugin
 */
add_action( 'plugins_loaded', '__child_theme_modifications_for_beans_main' );
