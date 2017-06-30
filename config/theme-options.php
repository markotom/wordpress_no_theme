<?php

if ( ! defined( 'ABSPATH' ) ) exit;

/**
 * -----------------------------------------------------------------------------
 * OptionTree Framework
 * -----------------------------------------------------------------------------
 *
 */

// Hide pages from admin menu
add_filter( 'ot_show_pages', '__return_false' );

// Avoid create a default layout
add_filter( 'ot_show_new_layout', '__return_false' );

// Turn on theme mode
add_filter( 'ot_theme_mode', '__return_true' );

// Load template
require get_template_directory() . '/option-tree/ot-loader.php';

/**
 * -----------------------------------------------------------------------------
 * Theme Options
 * -----------------------------------------------------------------------------
 *
 */

// Set custom theme options
add_action( 'admin_init', 'custom_theme_options', 1 );

function custom_theme_options() {

  // OptionTree is not loaded yet
  if ( ! function_exists( 'ot_settings_id' ) )
    return false;

  // Get saved settings
  $saved_settings = get_option( ot_settings_id(), array() );

  // Set custom settings
  $custom_settings = array(

    // Sections
    'sections' => array(
      array(
        'id' => 'app',
        'title' => __( 'App', 'no_theme' )
      )
    ),

    // Settings
    'settings' => array(

      // App Settings
      array(
        'id' => 'no_theme_app_url',
        'label' => __('App URL', 'no_theme'),
        'desc' => __('Añadir enlace de la aplicación a redirigir', 'no_theme'),
        'type' => 'text',
        'section' => 'app'
      )

    )

  );

  // Save custom settings if are not the same
  if ( $saved_settings !== $custom_settings ) {
    update_option( ot_settings_id(), $custom_settings );
  }

}

?>
