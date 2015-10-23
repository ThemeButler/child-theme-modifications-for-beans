=== Theme Customisations ===

License: GPLv3 or later
License URI: http://www.gnu.org/licenses/gpl-3.0.html

A very simple plugin to house theme (or plugin) customisations. Think of this as an alternative to adding code snippets to the functions.php, or custom.css file in your parent theme. Why? It keeps all of your changes in one location, independent of the other components that make up your web site. That means you can safely perform theme / plugin updates without the worry of losing your modifications.

"But isn't that what child themes are for?" Well, kind of. Sure, you can put your modifications in a child theme, but there are many places (including woothemes.com and wordpress.org) to download and use child themes. If you decide to use a child theme built by a third party and still make modifications, you wont want to touch any of the files therein. Instead, use this plugin.

In fact, it's arguable that you're better off using this plugin regardless of whether you're using a child theme or a parent theme. Imagine you're using a parent theme, but then you notice a child theme released for it that you love and want to use. Well, you can't, because you already created a child theme for your modifications. Sad Panda. So yeah, keep your modifications in a plugin and your wildest dreams will come true.

== Usage ==

* Add any UIkit style overrides to the `custom/uikit/` folder.
* Add any LESS snippets to `custom/custom.less`.
* Add any CSS snippets to `custom/custom.css`.
* Add any PHP snippets to `custom/functions.php`.
* Activate the plugin.

Simple!

This is a fork of the WooThemes Theme Customizations plugin and has been updated to use Beans compiler to include the custom assets.

=======

## Please note:

This plugin is still in active development and should not be used for production sites.

## Snippets for your functions.php

### Enable support for UIkits components

Using the example function below, you can easily register any of the core and add-on components in UIkits library. Be sure to check the UIkit website for a full list of the available components.

<pre><code>// Enqueue custom assets
add_action( 'beans_uikit_enqueue_scripts', 'custom_enqueue_uikit_assets', 5 );

function custom_enqueue_uikit_assets() {

	beans_uikit_enqueue_components( array( 'contrast', 'flex', 'overlay' ) );
    beans_uikit_enqueue_components( array( 'sticky' ), 'add-ons' );

}<code></pre>

#### See the available components here:
-http://getuikit.com/docs/core.html
-http://getuikit.com/docs/components.html

The UIkit components are located in the /wp-content/themes/tm-beans/lib/api/uikit/src/less/ folder. All the core components are located in the 'core' folder and add-on components in the 'components' folder.

Make note of the above locations, as you'll reference them when overriding any of the UIkit LESS variables.

### Modifying your child-theme output

One of the best features of Beans, is the ability to easily modify your themes markup, without the need to override an entire file. This is especially useful when taking advantage of UIkit.

Below are a few examples of ways you can modify your markup using Beans.

<pre>// Customize the child theme output
add_action( 'beans_before_load_document', 'custom_modify_child_theme' );

function custom_modify_child_theme() {

	// Remove any HTML markup (registered with Beans) using the Markup ID
    beans_remove_markup( 'beans_site' );

	// Remove entire actions
	beans_remove_action( 'beans_breadcrumb' );

	// Add custom attributes to existing markup
    beans_add_attribute( 'beans_header', 'data-uk-sticky', 'top:0' );

	// For example custom classes (essential for easily implementing UIkit components)
	beans_add_attribute( 'beans_header', 'class', 'uk-contrast' );

	// Remove attributes just as easily. You can remove a specific attribute property
	beans_remove_attribute( 'beans_header', 'class', ' uk-block' );

	// Or the entire attribute, ie all classes
	beans_remove_attribute( 'beans_post', 'class' );

	// Don't want your content layout centered? Simply remove the wrapper center class
	beans_remove_attribute( 'beans_main_wrap', 'class', 'uk-container-center' );

	// Changing an actions priority lets you easily re-order elements on the page
	beans_modify_action_priority( 'beans_primary_menu', 0 );

	// Or move them around completely
	beans_modify_action_hook( 'beans_breadcrumb', 'beans_main_append_markup');

}<pre>
