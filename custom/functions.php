<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


// Enqueue custom assets
add_action( 'beans_uikit_enqueue_scripts', 'tbr_child_theme_modifications_enqueue_uikit_assets', 5 );

function tbr_child_theme_modifications_enqueue_uikit_assets() {

	beans_uikit_enqueue_components( array( /* contrast */ ) );
	beans_uikit_enqueue_components( array( /* sticky */ ), 'add-ons' );

}


// Customize the child theme output
add_action( 'wp', 'tbr_child_theme_modifications_modify_child_theme' );

function tbr_child_theme_modifications_modify_child_theme() {

	beans_remove_markup( 'beans_site' );
	beans_add_attribute( 'beans_header', 'data-uk-sticky', 'top:0' );

}
