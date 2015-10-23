<?php

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly


// Enqueue custom assets
add_action( 'beans_uikit_enqueue_scripts', 'custom_enqueue_uikit_assets', 5 );

function custom_enqueue_uikit_assets() {

    beans_uikit_enqueue_components( array( 'sticky' ), 'add-ons' );

}

// Enqueue custom assets
add_action( 'beans_uikit_enqueue_scripts', 'custom_enqueue_uikit_assets', 5 );

function custom_enqueue_uikit_assets() {

	beans_uikit_enqueue_components( array( /* contrast */ ) );
    beans_uikit_enqueue_components( array( /* sticky */ ), 'add-ons' );

}


// Customize the child theme output
add_action( 'beans_before_load_document', 'custom_modify_child_theme' );

function custom_modify_child_theme() {

    beans_remove_markup( 'beans_site' );
    beans_add_attribute( 'beans_header', 'data-uk-sticky', 'top:0' );

}
