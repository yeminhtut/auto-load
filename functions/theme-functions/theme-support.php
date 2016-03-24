<?php
/**
* List of theme support functions
*/

// Check if the function exist
if ( function_exists( 'add_theme_support' ) ){

	// Add post thumbnail feature
	add_theme_support( 'post-thumbnails' );
	add_image_size('newmagz-featured-slider', 294, 379, true); // Featured slider images (Header)
	add_image_size('newmagz-featured-footer', 275, 157, true); // Featured footer images (Widget)
	add_image_size('newmagz-large-thumbnail-1', 393, 507, true); // Large thumbnail images one
	add_image_size('newmagz-large-thumbnail-2', 393, 230, true); // Large thumbnail images two
	add_image_size('newmagz-medium-thumbnail-1', 307, 175, true); // Medium thumbnail image one
	add_image_size('newmagz-medium-thumbnail-2', 262, 150, true); // Medium thumbnail image two
	add_image_size('newmagz-small-thumbnail-2', 80, 80, true); // Small thumbnail image two
	add_image_size('newmagz-single-thumbnail-large', 826, 532, true); // Single archive slider thumbnail large image
	add_image_size('newmagz-single-thumbnail', 192, 123, true); // Single archive slider thumbnail image

	// Add WordPress navigation menus
	add_theme_support('nav-menus');
	register_nav_menus( array(
		'main-menu' => esc_html__( 'Main Menu', 'newmagz' ),
		'top-menu' => esc_html__( 'Top Menu', 'newmagz' ),
		'footer-menu' => esc_html__( 'Footer Menu', 'newmagz' ),
	) );

	// Add WordPress post format
	add_theme_support( 'post-formats', array( 'video' )); 

	// Add default posts and comments RSS feed links to head
	add_theme_support( 'automatic-feed-links' );

	// Title Tag
	add_theme_support( 'title-tag' );

	// Add custom background feature 
	add_theme_support( 'custom-background' );
}

// Theme Localization
load_theme_textdomain( 'newmagz', get_template_directory().'/lang' );

// Set maximum image width displayed in a single post or page
if ( ! isset( $content_width ) ) {
	$content_width = 1180;
}