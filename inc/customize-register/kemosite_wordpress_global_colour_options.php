<?php

if (!isset($kemosite_wordpress_base_primary_colour)):
		
	$kemosite_wordpress_base_primary_colour		=	( get_theme_mod('kemosite_wordpress_colours_primary') ) ? 
													get_theme_mod('kemosite_wordpress_colours_primary') : 
													get_theme_mod('kemosite_wordpress_base_primary_colour', kemosite_rgb_to_hex( $pantone_coty_colour_this_year ) );

	set_theme_mod( 'kemosite_wordpress_base_primary_colour', $kemosite_wordpress_base_primary_colour );
	remove_theme_mod('kemosite_wordpress_colours_primary');
	remove_theme_mod('kemosite_wordpress_colours_bright_primary');
	remove_theme_mod('kemosite_wordpress_colours_dark_primary');

endif;

// Base Colour
$wp_customize->add_setting( 'kemosite_wordpress_base_primary_colour', array(
	'type' => 'theme_mod', // or 'option'
	'capability' => 'edit_theme_options',
	'theme_supports' => '', // Rarely needed.
	'default' => $kemosite_wordpress_base_primary_colour,
	'transport' => 'refresh', // or postMessage
	'sanitize_callback' => '',
	'sanitize_js_callback' => '' // Basically to_json.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_base_primary_colour', array(
	'priority' => 10, // Within the section.
	'label' => __( 'Base Colour', 'kemosite-wordpress-theme' ),
	'section' => 'kemosite_wordpress_global_colour_options',
	'description' => 'Also the Primary status colour',
	'default' => $kemosite_wordpress_base_primary_colour,
) ) );

// Calculate Analogous of Primary for default secondary
$kemosite_wordpress_default_secondary_colour_hsl_source = kemosite_hex_to_hsl( $kemosite_wordpress_base_primary_colour );
$kemosite_wordpress_default_secondary_colour_hsl_source_array = explode( ",", $kemosite_wordpress_default_secondary_colour_hsl_source);
$kemosite_wordpress_default_secondary_colour_hsl_array = 	array(
																$kemosite_wordpress_default_secondary_colour_hsl_source_array[0] - 30,
																$kemosite_wordpress_default_secondary_colour_hsl_source_array[1],
																$kemosite_wordpress_default_secondary_colour_hsl_source_array[2],
															);
$kemosite_wordpress_default_secondary_colour_hsl = implode(",", $kemosite_wordpress_default_secondary_colour_hsl_array);

if (!isset($kemosite_wordpress_default_secondary_colour)):
		
	$kemosite_wordpress_default_secondary_colour	=	( get_theme_mod('kemosite_wordpress_colours_invert_primary') ) ? 
														get_theme_mod('kemosite_wordpress_colours_invert_primary') : 
														kemosite_hsl_to_hex( $kemosite_wordpress_default_secondary_colour_hsl );

	set_theme_mod( 'kemosite_wordpress_secondary_colour', $kemosite_wordpress_default_secondary_colour );
	remove_theme_mod('kemosite_wordpress_colours_invert_primary');
	remove_theme_mod('kemosite_wordpress_colours_bright_invert');
	remove_theme_mod('kemosite_wordpress_colours_dark_invert');

endif;

$wp_customize->add_setting( 'kemosite_wordpress_secondary_colour', array(
	'type' => 'theme_mod', // or 'option'
	'capability' => 'edit_theme_options',
	'theme_supports' => '', // Rarely needed.
	'default' => $kemosite_wordpress_default_secondary_colour,
	'transport' => 'refresh', // or postMessage
	'sanitize_callback' => '',
	'sanitize_js_callback' => '' // Basically to_json.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_secondary_colour', array(
	'priority' => 10, // Within the section.
	'label' => __( 'Secondary Colour', 'kemosite-wordpress-theme' ),
	'section' => 'kemosite_wordpress_global_colour_options',
	'description' => 'Default: Primary -30 Degrees (Analogous). See the Colour Variations panel for ideas!',
	'default' => $kemosite_wordpress_default_secondary_colour,
) ) );

// Base Black

$kemosite_wordpress_base_black_default = kemosite_hsl_to_hex( '0,0,14' );

if (!isset($kemosite_wordpress_base_black)):

	$kemosite_wordpress_base_black	=	( get_theme_mod('kemosite_wordpress_colours_black') ) ? 
										get_theme_mod('kemosite_wordpress_colours_black') : 
										$kemosite_wordpress_base_black_default;

	set_theme_mod( 'kemosite_wordpress_base_black', $kemosite_wordpress_base_black );
	remove_theme_mod('kemosite_wordpress_colours_light_black');
	remove_theme_mod('kemosite_wordpress_colours_dark_black');
	remove_theme_mod('kemosite_wordpress_colours_black');
	
endif;

$wp_customize->add_setting( 'kemosite_wordpress_base_black', array(
	'type' => 'theme_mod', // or 'option'
	'capability' => 'edit_theme_options',
	'theme_supports' => '', // Rarely needed.
	'default' => $kemosite_wordpress_base_black_default,
	'transport' => 'refresh', // or postMessage
	'sanitize_callback' => '',
	'sanitize_js_callback' => '' // Basically to_json.
) );

$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_base_black', array(
	'priority' => 10, // Within the section.
	'label' => __( '100% Black Ink', 'kemosite-wordpress-theme' ),
	'section' => 'kemosite_wordpress_global_colour_options',
	'description' => 'Based on 100% black ink on white paper.',
	'default' => $kemosite_wordpress_base_black_default,
) ) );



?>