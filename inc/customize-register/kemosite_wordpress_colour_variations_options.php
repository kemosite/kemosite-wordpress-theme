<?php

$kemosite_wordpress_base_white_rgb 					= '255,255,255';
$kemosite_wordpress_base_white_rgb_array		 	= explode(',', $kemosite_wordpress_base_white_rgb);
$kemosite_wordpress_base_white_rgb_lum				= kemosite_calc_lum( 
														$kemosite_wordpress_base_white_rgb_array[0],
														$kemosite_wordpress_base_white_rgb_array[1],
														$kemosite_wordpress_base_white_rgb_array[2]
													);

$kemosite_wordpress_base_white_3_neutral_hsl				= '0,0,58';
$kemosite_wordpress_base_white_45_neutral_hsl				= '0,0,46';
$kemosite_wordpress_base_white_7_neutral_hsl				= '0,0,35';
$kemosite_wordpress_base_white_3_neutral_hsl_array			= explode(',', $kemosite_wordpress_base_white_3_neutral_hsl);
$kemosite_wordpress_base_white_45_neutral_hsl_array			= explode(',', $kemosite_wordpress_base_white_45_neutral_hsl);
$kemosite_wordpress_base_white_7_neutral_hsl_array			= explode(',', $kemosite_wordpress_base_white_7_neutral_hsl);

$kemosite_wordpress_base_black_hex 					= get_theme_mod('kemosite_wordpress_base_black', kemosite_hsl_to_hex( '0,0,14' ) );
$kemosite_wordpress_base_black_rgb 					= kemosite_hex_to_rgb( $kemosite_wordpress_base_black_hex );
$kemosite_wordpress_base_black_rgb_array		 	= explode(',', $kemosite_wordpress_base_black_rgb);
$kemosite_wordpress_base_black_rgb_lum				= kemosite_calc_lum( 
														$kemosite_wordpress_base_black_rgb_array[0],
														$kemosite_wordpress_base_black_rgb_array[1],
														$kemosite_wordpress_base_black_rgb_array[2]
													);

$kemosite_wordpress_base_black_3_neutral_hsl				= '0,0,43';
$kemosite_wordpress_base_black_45_neutral_hsl				= '0,0,55';
$kemosite_wordpress_base_black_7_neutral_hsl				= '0,0,69';
$kemosite_wordpress_base_black_3_neutral_hsl_array			= explode(',', $kemosite_wordpress_base_black_3_neutral_hsl);
$kemosite_wordpress_base_black_45_neutral_hsl_array			= explode(',', $kemosite_wordpress_base_black_45_neutral_hsl);
$kemosite_wordpress_base_black_7_neutral_hsl_array			= explode(',', $kemosite_wordpress_base_black_7_neutral_hsl);

/*
** [RETRIEVE PRIMARY COLOUR AND DETAILS] **
*/
if (!isset($kemosite_wordpress_base_primary_colour)):
	$kemosite_wordpress_base_primary_colour = get_theme_mod('kemosite_wordpress_base_primary_colour', kemosite_rgb_to_hex( $pantone_coty_colour_this_year ) );
else:
	$kemosite_wordpress_base_primary_colour_rgb 			= kemosite_hex_to_rgb( $kemosite_wordpress_base_primary_colour );
	$kemosite_wordpress_base_primary_colour_rgb_array 		= explode(',', $kemosite_wordpress_base_primary_colour_rgb);
	$kemosite_wordpress_base_primary_colour_hsl 			= kemosite_hex_to_hsl( $kemosite_wordpress_base_primary_colour );
	$kemosite_wordpress_base_primary_colour_hsl_array 		= explode(',', $kemosite_wordpress_base_primary_colour_hsl);
	$kemosite_wordpress_base_primary_colour_lum 			= kemosite_calc_lum( 
																$kemosite_wordpress_base_primary_colour_rgb_array[0],
																$kemosite_wordpress_base_primary_colour_rgb_array[1],
																$kemosite_wordpress_base_primary_colour_rgb_array[2]
															);
	$kemosite_wordpress_base_primary_colour_white_contrast	= kemosite_calc_contrast( $kemosite_wordpress_base_primary_colour_lum, $kemosite_wordpress_base_white_rgb_lum);
	$kemosite_wordpress_base_primary_colour_black_contrast	= kemosite_calc_contrast( $kemosite_wordpress_base_primary_colour_lum, $kemosite_wordpress_base_black_rgb_lum);
endif;

/*
** [COLOUR SCHEMES] **
*/

// Greyscale

$kemosite_wordpress_base_primary_grey_lum = kemosite_rgb_to_lum( $kemosite_wordpress_base_primary_colour_rgb );
$kemosite_wordpress_base_primary_grey_chroma = kemosite_rgb_to_chroma( kemosite_hex_to_rgb( $kemosite_wordpress_base_primary_colour ) );
$kemosite_wordpress_base_primary_grey_value = kemosite_rgb_to_value( kemosite_hex_to_rgb( $kemosite_wordpress_base_primary_colour ) );
$kemosite_wordpress_base_primary_grey_lum_hex = kemosite_lum_to_hex( $kemosite_wordpress_base_primary_grey_lum );
$kemosite_wordpress_base_primary_grey_chroma_hex = kemosite_lum_to_hex( $kemosite_wordpress_base_primary_grey_chroma );
$kemosite_wordpress_base_primary_grey_value_hex = kemosite_lum_to_hex( $kemosite_wordpress_base_primary_grey_value );

$wp_customize->add_section( 'kemosite_wordpress_colour_greyscale_section' , array(
	'title' => __( 'Greyscale', 'kemosite-wordpress-theme' ),
	'panel' => 'kemosite_wordpress_colour_variations_options',
	'description' => '
		<p>Greyscale variation is based on the perceived variations of the base colour option.</p>
		<p style="font-weight: 700;">Publish Base Colour first, then Refresh.</p>
	',
	'priority' => 40, // Same as Colour.
	'capability' => 'edit_theme_options'
) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_greyscale_chroma_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_base_primary_grey_chroma_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_greyscale_chroma_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_greyscale_section', // Required, core or custom.
		'label' => __( 'Chroma', 'kemosite-wordpress-theme' ),
		'description' => 'Based on purity or intensity of color ('.round( $kemosite_wordpress_base_primary_grey_chroma * 100).'%).',
		'default' => $kemosite_wordpress_base_primary_grey_chroma_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_greyscale_luminance_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_base_primary_grey_lum_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_greyscale_luminance_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_greyscale_section', // Required, core or custom.
		'label' => __( 'Luminance', 'kemosite-wordpress-theme' ),
		'description' => 'Based on perceived relative brightness of colour ('.round($kemosite_wordpress_base_primary_grey_lum * 100).'%)',
		'default' => $kemosite_wordpress_base_primary_grey_lum_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_greyscale_value_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_base_primary_grey_value_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_greyscale_value_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_greyscale_section', // Required, core or custom.
		'label' => __( 'Value', 'kemosite-wordpress-theme' ),
		'description' => 'Colour with saturation removed, brightness retained ('.round($kemosite_wordpress_base_primary_grey_value * 100).'%)',
		'default' => $kemosite_wordpress_base_primary_grey_value_hex,
	) ) );

// Monochromatic - Variations on lightness, hue and saturation remain unchanged.

// Colours

// Colour Contrast 3:1, white background
$kemosite_wordpress_colour_monochromatic_white_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_base_primary_colour_hsl_array, // hsl array of base colour
																$kemosite_wordpress_base_primary_colour_white_contrast, // colour contrast on white background
																3, // target contrast
																$kemosite_wordpress_base_white_rgb_lum // white luminance
															) ); // Target = 90%
$kemosite_wordpress_colour_monochromatic_white_3_hex 	= kemosite_hsl_to_hex( $kemosite_wordpress_colour_monochromatic_white_3_hsl );

// Contrast 4.5:1, white background
$kemosite_wordpress_colour_monochromatic_white_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_base_primary_colour_hsl_array, // hsl array of base colour
																$kemosite_wordpress_base_primary_colour_white_contrast, // colour contrast on white background
																4.5, // target contrast
																$kemosite_wordpress_base_white_rgb_lum // white luminance
															) );
$kemosite_wordpress_colour_monochromatic_white_45_hex = kemosite_hsl_to_hex( $kemosite_wordpress_colour_monochromatic_white_45_hsl );

// Contrast 7:1, white background
$kemosite_wordpress_colour_monochromatic_white_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_base_primary_colour_hsl_array, // hsl array of base colour
																$kemosite_wordpress_base_primary_colour_white_contrast, // colour contrast on white background
																7, // target contrast,
																$kemosite_wordpress_base_white_rgb_lum // white luminance
															) );
$kemosite_wordpress_colour_monochromatic_white_7_hex = kemosite_hsl_to_hex( $kemosite_wordpress_colour_monochromatic_white_7_hsl );

// Contrast 3:1, black background
$kemosite_wordpress_colour_monochromatic_black_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_base_primary_colour_hsl_array, // hsl array of base colour
																$kemosite_wordpress_base_primary_colour_black_contrast, // colour contrast on black background
																3, // target contrast,
																$kemosite_wordpress_base_black_rgb_lum // black luminance
															) );
$kemosite_wordpress_colour_monochromatic_black_3_hex = kemosite_hsl_to_hex( $kemosite_wordpress_colour_monochromatic_black_3_hsl );

// Contrast 4.5:1, black background
$kemosite_wordpress_colour_monochromatic_black_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_base_primary_colour_hsl_array, // hsl array of base colour
																$kemosite_wordpress_base_primary_colour_black_contrast, // colour contrast on black background
																4.5, // target contrast,
																$kemosite_wordpress_base_black_rgb_lum // black luminance
															) );
$kemosite_wordpress_colour_monochromatic_black_45_hex = kemosite_hsl_to_hex( $kemosite_wordpress_colour_monochromatic_black_45_hsl );

// Contrast 7:1, black background
$kemosite_wordpress_colour_monochromatic_black_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																$kemosite_wordpress_base_primary_colour_hsl_array, // hsl array of base colour
																$kemosite_wordpress_base_primary_colour_black_contrast, // colour contrast on black background
																7, // target contrast,
																$kemosite_wordpress_base_black_rgb_lum // black luminance
															) );
$kemosite_wordpress_colour_monochromatic_black_7_hex = kemosite_hsl_to_hex( $kemosite_wordpress_colour_monochromatic_black_7_hsl );

$wp_customize->add_section( 'kemosite_wordpress_colour_monochromatic_section' , array(
	'title' => __( 'Monochromatic', 'kemosite-wordpress-theme' ),
	'panel' => 'kemosite_wordpress_colour_variations_options',
	'description' => '
		<p>Monochromatic color schemes focus on a single hue, using variations of saturation and lightness.</p>
		<p style="font-weight: 700;">Publish Base Colour first, then Refresh.</p>
	',
	'priority' => 40, // Same as Colour.
	'capability' => 'edit_theme_options'
) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_monochromatic_white_3_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_monochromatic_white_3_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_monochromatic_white_3_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_monochromatic_section', // Required, core or custom.
		'label' => __( '3:1 hue on white', 'kemosite-wordpress-theme' ),
		'description' => '3:1 hue contrast target on white background',
		'default' => $kemosite_wordpress_colour_monochromatic_white_3_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_monochromatic_white_45_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_monochromatic_white_45_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_monochromatic_white_45_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_monochromatic_section', // Required, core or custom.
		'label' => __( '4.5:1 hue on white', 'kemosite-wordpress-theme' ),
		'description' => '4.5:1 hue contrast target on white background',
		'default' => $kemosite_wordpress_colour_monochromatic_white_45_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_monochromatic_white_7_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_monochromatic_white_7_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_monochromatic_white_7_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_monochromatic_section', // Required, core or custom.
		'label' => __( '7:1 hue on white', 'kemosite-wordpress-theme' ),
		'description' => '7:1 hue contrast target on white background',
		'default' => $kemosite_wordpress_colour_monochromatic_white_7_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_monochromatic_black_3_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_monochromatic_black_3_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_monochromatic_black_3_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_monochromatic_section', // Required, core or custom.
		'label' => __( '3:1 hue on black', 'kemosite-wordpress-theme' ),
		'description' => '3:1 hue contrast target on black ink background',
		'default' => $kemosite_wordpress_colour_monochromatic_black_3_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_monochromatic_black_45_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_monochromatic_black_45_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_monochromatic_black_45_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_monochromatic_section', // Required, core or custom.
		'label' => __( '4.5:1 hue on black', 'kemosite-wordpress-theme' ),
		'description' => '4.5:1 hue contrast target on black ink background',
		'default' => $kemosite_wordpress_colour_monochromatic_black_45_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_monochromatic_black_7_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_monochromatic_black_7_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_monochromatic_black_7_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_monochromatic_section', // Required, core or custom.
		'label' => __( '7:1 hue on black', 'kemosite-wordpress-theme' ),
		'description' => '7:1 hue contrast target on black ink background',
		'default' => $kemosite_wordpress_colour_monochromatic_black_7_hex,
	) ) );

	// Neutrals

	// Add lightness to compensate for adding chroma on black variations to maintain contrast.
	// It's okay to add contrast on white variations.

	// Neutral Contrast 3:1, white background
	$kemosite_wordpress_monochromatic_white_3_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_white_3_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_monochromatic_white_3_neutral_lightness = 	$kemosite_wordpress_base_white_3_neutral_hsl_array[2];
	$kemosite_wordpress_monochromatic_white_3_neutral_array	=	array( $kemosite_wordpress_base_primary_colour_hsl_array[0],
																	$kemosite_wordpress_monochromatic_white_3_neutral_saturation,
																	$kemosite_wordpress_monochromatic_white_3_neutral_lightness,
																);
	$kemosite_wordpress_monochromatic_white_3_neutral_hsl	=	implode( ",", $kemosite_wordpress_monochromatic_white_3_neutral_array );
	$kemosite_wordpress_monochromatic_white_3_neutral_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_white_3_neutral_hsl );

	// Neutral Contrast 4.5:1, white background
	$kemosite_wordpress_monochromatic_white_45_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_white_45_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_monochromatic_white_45_neutral_lightness = 	$kemosite_wordpress_base_white_45_neutral_hsl_array[2];
	$kemosite_wordpress_monochromatic_white_45_neutral_array =	array( $kemosite_wordpress_base_primary_colour_hsl_array[0],
																	$kemosite_wordpress_monochromatic_white_45_neutral_saturation,
																	$kemosite_wordpress_monochromatic_white_45_neutral_lightness,
																);
	$kemosite_wordpress_monochromatic_white_45_neutral_hsl	=	implode( ",", $kemosite_wordpress_monochromatic_white_45_neutral_array );
	$kemosite_wordpress_monochromatic_white_45_neutral_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_white_45_neutral_hsl );

	// Neutral Contrast 7:1, white background
	$kemosite_wordpress_monochromatic_white_7_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_white_7_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_monochromatic_white_7_neutral_lightness = 	$kemosite_wordpress_base_white_7_neutral_hsl_array[2];
	$kemosite_wordpress_monochromatic_white_7_neutral_array	=	array( $kemosite_wordpress_base_primary_colour_hsl_array[0],
																	$kemosite_wordpress_monochromatic_white_7_neutral_saturation,
																	$kemosite_wordpress_monochromatic_white_7_neutral_lightness,
																);
	$kemosite_wordpress_monochromatic_white_7_neutral_hsl	=	implode( ",", $kemosite_wordpress_monochromatic_white_7_neutral_array );
	$kemosite_wordpress_monochromatic_white_7_neutral_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_white_7_neutral_hsl );

	// Neutral Contrast 3:1, black background
	$kemosite_wordpress_monochromatic_black_3_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_black_3_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_monochromatic_black_3_neutral_lightness = 	$kemosite_wordpress_base_black_3_neutral_hsl_array[2] + 
																	round(	
																		$kemosite_wordpress_monochromatic_black_3_neutral_saturation *
																		($kemosite_wordpress_base_black_3_neutral_hsl_array[2] / 100)
																	);
	$kemosite_wordpress_monochromatic_black_3_neutral_array	=	array( $kemosite_wordpress_base_primary_colour_hsl_array[0],
																	$kemosite_wordpress_monochromatic_black_3_neutral_saturation,
																	$kemosite_wordpress_monochromatic_black_3_neutral_lightness,
																);
	$kemosite_wordpress_monochromatic_black_3_neutral_hsl	=	implode( ",", $kemosite_wordpress_monochromatic_black_3_neutral_array );
	$kemosite_wordpress_monochromatic_black_3_neutral_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_black_3_neutral_hsl );

	// Neutral Contrast 4.5:1, black background
	$kemosite_wordpress_monochromatic_black_45_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_black_45_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_monochromatic_black_45_neutral_lightness = 	$kemosite_wordpress_base_black_45_neutral_hsl_array[2] + 
																	round(	
																		$kemosite_wordpress_monochromatic_black_45_neutral_saturation *
																		($kemosite_wordpress_base_black_45_neutral_hsl_array[2] / 100)
																	);
	$kemosite_wordpress_monochromatic_black_45_neutral_array =	array( $kemosite_wordpress_base_primary_colour_hsl_array[0],
																	$kemosite_wordpress_monochromatic_black_45_neutral_saturation,
																	$kemosite_wordpress_monochromatic_black_45_neutral_lightness,
																);
	$kemosite_wordpress_monochromatic_black_45_neutral_hsl	=	implode( ",", $kemosite_wordpress_monochromatic_black_45_neutral_array );
	$kemosite_wordpress_monochromatic_black_45_neutral_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_black_45_neutral_hsl );

	// Neutral Contrast 7:1, black background
	$kemosite_wordpress_monochromatic_black_7_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_black_7_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_monochromatic_black_7_neutral_lightness = 	$kemosite_wordpress_base_black_7_neutral_hsl_array[2] + 
																	round(	
																		$kemosite_wordpress_monochromatic_black_7_neutral_saturation *
																		($kemosite_wordpress_base_black_7_neutral_hsl_array[2] / 100)
																	);
	$kemosite_wordpress_monochromatic_black_7_neutral_array	=	array( $kemosite_wordpress_base_primary_colour_hsl_array[0],
																	$kemosite_wordpress_monochromatic_black_7_neutral_saturation,
																	$kemosite_wordpress_monochromatic_black_7_neutral_lightness,
																);
	$kemosite_wordpress_monochromatic_black_7_neutral_hsl	=	implode( ",", $kemosite_wordpress_monochromatic_black_7_neutral_array );
	$kemosite_wordpress_monochromatic_black_7_neutral_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_monochromatic_black_7_neutral_hsl );

	$wp_customize->add_setting( 'kemosite_wordpress_monochromatic_white_3_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_monochromatic_white_3_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_monochromatic_white_3_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_monochromatic_section', // Required, core or custom.
		'label' => __( '3:1 neutral on white', 'kemosite-wordpress-theme' ),
		'description' => '3:1 neutral contrast target on white background',
		'default' => $kemosite_wordpress_monochromatic_white_3_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_monochromatic_white_45_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_monochromatic_white_45_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_monochromatic_white_45_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_monochromatic_section', // Required, core or custom.
		'label' => __( '4.5:1 neutral on white', 'kemosite-wordpress-theme' ),
		'description' => '4.5:1 neutral contrast target on white background',
		'default' => $kemosite_wordpress_monochromatic_white_45_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_monochromatic_white_7_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_monochromatic_white_7_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_monochromatic_white_7_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_monochromatic_section', // Required, core or custom.
		'label' => __( '7:1 neutral on white', 'kemosite-wordpress-theme' ),
		'description' => '7:1 neutral contrast target on white background',
		'default' => $kemosite_wordpress_monochromatic_white_7_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_monochromatic_black_3_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_monochromatic_black_3_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_monochromatic_black_3_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_monochromatic_section', // Required, core or custom.
		'label' => __( '3:1 neutral on black', 'kemosite-wordpress-theme' ),
		'description' => '3:1 neutral contrast target on black background',
		'default' => $kemosite_wordpress_monochromatic_black_3_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_monochromatic_black_45_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_monochromatic_black_45_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_monochromatic_black_45_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_monochromatic_section', // Required, core or custom.
		'label' => __( '4.5:1 neutral on black', 'kemosite-wordpress-theme' ),
		'description' => '4.5:1 neutral contrast target on black background',
		'default' => $kemosite_wordpress_monochromatic_black_45_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_monochromatic_black_7_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_monochromatic_black_7_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_monochromatic_black_7_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_monochromatic_section', // Required, core or custom.
		'label' => __( '7:1 neutral on black', 'kemosite-wordpress-theme' ),
		'description' => '7:1 neutral contrast target on black background',
		'default' => $kemosite_wordpress_monochromatic_black_7_neutral_hex,
	) ) );

// Analogous

// +/- degrees to base primary colour, then convert contrast for new hue.

$wp_customize->add_section( 'kemosite_wordpress_colour_analogous_section' , array(
	'title' => __( 'Analogous', 'kemosite-wordpress-theme' ),
	'panel' => 'kemosite_wordpress_colour_variations_options',
	'description' => '
		<p>Analogous colors consist of a group of three colors that border each other within the color wheel, separated by +/- 30 degree increments.</p>
		<p>See Monochromatic section for variations of base colour.</p>
		<p style="font-weight: 700;">Publish Base Colour first, then Refresh.</p>
	',
	'priority' => 40, // Same as Colour.
	'capability' => 'edit_theme_options'
) );

	// +30 degrees

	$kemosite_wordpress_colour_analogous_p30_hue = ( 360 + ( $kemosite_wordpress_base_primary_colour_hsl_array[0] + 30 ) ) % 360;
	$kemosite_wordpress_colour_analogous_m30_hue = ( 360 + ( $kemosite_wordpress_base_primary_colour_hsl_array[0] - 30 ) ) % 360;

	$kemosite_wordpress_colour_analogous_p30_hsl_array		=	array( 
																	$kemosite_wordpress_colour_analogous_p30_hue,
																	$kemosite_wordpress_base_primary_colour_hsl_array[1],
																	$kemosite_wordpress_base_primary_colour_hsl_array[2]
																);
	$kemosite_wordpress_colour_analogous_p30_hsl 			= 	implode( ",", $kemosite_wordpress_colour_analogous_p30_hsl_array );
	$kemosite_wordpress_colour_analogous_p30_rgb 			=	kemosite_hsl_to_rgb( $kemosite_wordpress_colour_analogous_p30_hsl );
	$kemosite_wordpress_colour_analogous_p30_rgb_array 		=	explode( ",", $kemosite_wordpress_colour_analogous_p30_rgb );
	$kemosite_wordpress_colour_analogous_p30_lum			= 	kemosite_calc_lum( 
																	$kemosite_wordpress_colour_analogous_p30_rgb_array[0],
																	$kemosite_wordpress_colour_analogous_p30_rgb_array[1],
																	$kemosite_wordpress_colour_analogous_p30_rgb_array[2]
																);
	$kemosite_wordpress_colour_analogous_p30_white_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_colour_analogous_p30_lum, $kemosite_wordpress_base_white_rgb_lum);
	$kemosite_wordpress_colour_analogous_p30_black_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_colour_analogous_p30_lum, $kemosite_wordpress_base_black_rgb_lum);

	// -30 degrees
	$kemosite_wordpress_colour_analogous_m30_hsl_array		=	array( 
																	$kemosite_wordpress_colour_analogous_m30_hue,
																	$kemosite_wordpress_base_primary_colour_hsl_array[1],
																	$kemosite_wordpress_base_primary_colour_hsl_array[2]
																);
	$kemosite_wordpress_colour_analogous_m30_hsl 			= 	implode( ",", $kemosite_wordpress_colour_analogous_m30_hsl_array );
	$kemosite_wordpress_colour_analogous_m30_rgb 			=	kemosite_hsl_to_rgb( $kemosite_wordpress_colour_analogous_m30_hsl );
	$kemosite_wordpress_colour_analogous_m30_rgb_array 		=	explode( ",", $kemosite_wordpress_colour_analogous_m30_rgb );
	$kemosite_wordpress_colour_analogous_m30_lum			= 	kemosite_calc_lum( 
																	$kemosite_wordpress_colour_analogous_m30_rgb_array[0],
																	$kemosite_wordpress_colour_analogous_m30_rgb_array[1],
																	$kemosite_wordpress_colour_analogous_m30_rgb_array[2]
																);
	$kemosite_wordpress_colour_analogous_m30_white_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_colour_analogous_m30_lum, $kemosite_wordpress_base_white_rgb_lum);
	$kemosite_wordpress_colour_analogous_m30_black_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_colour_analogous_m30_lum, $kemosite_wordpress_base_black_rgb_lum);
	
	// +30 degrees, Colour Contrast 3:1, white background
	$kemosite_wordpress_colour_analogous_p30_white_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_analogous_p30_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_analogous_p30_white_contrast, // colour contrast on white background
																	3, // target contrast,
																	$kemosite_wordpress_base_white_rgb_lum // white luminance
																) );
	$kemosite_wordpress_colour_analogous_p30_white_3_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_analogous_p30_white_3_hsl );

	// +30 degrees, Colour Contrast 4.5:1, white background
	$kemosite_wordpress_colour_analogous_p30_white_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_analogous_p30_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_analogous_p30_white_contrast, // colour contrast on white background
																	4.5, // target contrast,
																	$kemosite_wordpress_base_white_rgb_lum // white luminance
																) );
	$kemosite_wordpress_colour_analogous_p30_white_45_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_analogous_p30_white_45_hsl );

	// +30 degrees, Colour Contrast 7:1, white background
	$kemosite_wordpress_colour_analogous_p30_white_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_analogous_p30_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_analogous_p30_white_contrast, // colour contrast on white background
																	7, // target contrast,
																	$kemosite_wordpress_base_white_rgb_lum // white luminance
																) );
	$kemosite_wordpress_colour_analogous_p30_white_7_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_analogous_p30_white_7_hsl );

	$wp_customize->add_setting( 'kemosite_wordpress_colour_analogous_p30_white_3_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_analogous_p30_white_3_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_analogous_p30_white_3_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '+30, 3:1 hue on white', 'kemosite-wordpress-theme' ),
		'description' => '+30 degrees, 3:1 hue contrast target on white background',
		'default' => $kemosite_wordpress_colour_analogous_p30_white_3_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_analogous_p30_white_45_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_analogous_p30_white_45_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_analogous_p30_white_45_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '+30, 4.5:1 hue on white', 'kemosite-wordpress-theme' ),
		'description' => '+30 degrees, 4.5:1 hue contrast target on white background',
		'default' => $kemosite_wordpress_colour_analogous_p30_white_45_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_analogous_p30_white_7_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_analogous_p30_white_7_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_analogous_p30_white_7_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '+30, 7:1 hue on white', 'kemosite-wordpress-theme' ),
		'description' => '+30 degrees, 7:1 hue contrast target on white background',
		'default' => $kemosite_wordpress_colour_analogous_p30_white_7_hex,
	) ) );

	// +30 degrees, Colour Contrast 3:1, black background
	$kemosite_wordpress_colour_analogous_p30_black_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_analogous_p30_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_analogous_p30_black_contrast, // colour contrast on white background
																	3, // target contrast,
																	$kemosite_wordpress_base_black_rgb_lum // white luminance
																) );
	$kemosite_wordpress_colour_analogous_p30_black_3_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_analogous_p30_black_3_hsl );

	// +30 degrees, Colour Contrast 4.5:1, black background
	$kemosite_wordpress_colour_analogous_p30_black_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_analogous_p30_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_analogous_p30_black_contrast, // colour contrast on white background
																	4.5, // target contrast,
																	$kemosite_wordpress_base_black_rgb_lum // white luminance
																) );
	$kemosite_wordpress_colour_analogous_p30_black_45_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_analogous_p30_black_45_hsl );

	// +30 degrees, Colour Contrast 7:1, black background
	$kemosite_wordpress_colour_analogous_p30_black_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_analogous_p30_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_analogous_p30_black_contrast, // colour contrast on white background
																	7, // target contrast,
																	$kemosite_wordpress_base_black_rgb_lum // white luminance
																) );
	$kemosite_wordpress_colour_analogous_p30_black_7_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_analogous_p30_black_7_hsl );

	$wp_customize->add_setting( 'kemosite_wordpress_colour_analogous_p30_black_3_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_analogous_p30_black_3_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_analogous_p30_black_3_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '+30, 3:1 hue on black', 'kemosite-wordpress-theme' ),
		'description' => '+30 degrees, 3:1 hue contrast target on black background',
		'default' => $kemosite_wordpress_colour_analogous_p30_black_3_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_analogous_p30_black_45_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_analogous_p30_black_45_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_analogous_p30_black_45_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '+30, 4.5:1 hue on black', 'kemosite-wordpress-theme' ),
		'description' => '+30 degrees, 4.5:1 hue contrast target on black background',
		'default' => $kemosite_wordpress_colour_analogous_p30_black_45_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_analogous_p30_black_7_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_analogous_p30_black_7_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_analogous_p30_black_7_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '+30, 7:1 hue on black', 'kemosite-wordpress-theme' ),
		'description' => '+30 degrees, 7:1 hue contrast target on black background',
		'default' => $kemosite_wordpress_colour_analogous_p30_black_7_hex,
	) ) );

	// +30 degrees, Neutral Contrast 3:1, white background
	$kemosite_wordpress_analogous_p30_white_3_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_white_3_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_analogous_p30_white_3_neutral_lightness = 	$kemosite_wordpress_base_white_3_neutral_hsl_array[2];
	$kemosite_wordpress_analogous_p30_white_3_neutral_array	=	array(
																	$kemosite_wordpress_colour_analogous_p30_hue,
																	$kemosite_wordpress_analogous_p30_white_3_neutral_saturation,
																	$kemosite_wordpress_analogous_p30_white_3_neutral_lightness,
																);
	$kemosite_wordpress_analogous_p30_white_3_neutral_hsl	=	implode( ",", $kemosite_wordpress_analogous_p30_white_3_neutral_array );
	$kemosite_wordpress_analogous_p30_white_3_neutral_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_p30_white_3_neutral_hsl );

	// +30 degrees, Neutral Contrast 4.5:1, white background
	$kemosite_wordpress_analogous_p30_white_45_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_white_45_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_analogous_p30_white_45_neutral_lightness = 	$kemosite_wordpress_base_white_45_neutral_hsl_array[2];
	$kemosite_wordpress_analogous_p30_white_45_neutral_array	 =	array(
																		$kemosite_wordpress_colour_analogous_p30_hue,
																		$kemosite_wordpress_analogous_p30_white_45_neutral_saturation,
																		$kemosite_wordpress_analogous_p30_white_45_neutral_lightness,
																	);
	$kemosite_wordpress_analogous_p30_white_45_neutral_hsl		=	implode( ",", $kemosite_wordpress_analogous_p30_white_45_neutral_array );
	$kemosite_wordpress_analogous_p30_white_45_neutral_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_p30_white_45_neutral_hsl );

	// +30 degrees, Neutral Contrast 7:1, white background
	$kemosite_wordpress_analogous_p30_white_7_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_white_7_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_analogous_p30_white_7_neutral_lightness = 	$kemosite_wordpress_base_white_7_neutral_hsl_array[2];
	$kemosite_wordpress_analogous_p30_white_7_neutral_array	 	=	array(
																		$kemosite_wordpress_colour_analogous_p30_hue,
																		$kemosite_wordpress_analogous_p30_white_7_neutral_saturation,
																		$kemosite_wordpress_analogous_p30_white_7_neutral_lightness,
																	);
	$kemosite_wordpress_analogous_p30_white_7_neutral_hsl		=	implode( ",", $kemosite_wordpress_analogous_p30_white_7_neutral_array );
	$kemosite_wordpress_analogous_p30_white_7_neutral_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_p30_white_7_neutral_hsl );

	$wp_customize->add_setting( 'kemosite_wordpress_analogous_p30_white_3_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_analogous_p30_white_3_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_analogous_p30_white_3_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '+30, 3:1 neutral on white', 'kemosite-wordpress-theme' ),
		'description' => '+30 degrees, 3:1 neutral contrast target on white background',
		'default' => $kemosite_wordpress_analogous_p30_white_3_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_analogous_p30_white_45_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_analogous_p30_white_45_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_analogous_p30_white_45_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '+30, 4.5:1 neutral on white', 'kemosite-wordpress-theme' ),
		'description' => '+30 degrees, 4.5:1 neutral contrast target on white background',
		'default' => $kemosite_wordpress_analogous_p30_white_45_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_analogous_p30_white_7_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_analogous_p30_white_7_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_analogous_p30_white_7_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '+30, 7:1 neutral on white', 'kemosite-wordpress-theme' ),
		'description' => '+30 degrees, 7:1 neutral contrast target on white background',
		'default' => $kemosite_wordpress_analogous_p30_white_7_neutral_hex,
	) ) );

	// +30 degrees, Neutral Contrast 3:1, black background
	$kemosite_wordpress_analogous_p30_black_3_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_black_3_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_analogous_p30_black_3_neutral_lightness = 	$kemosite_wordpress_base_black_3_neutral_hsl_array[2] + 
																	round(	
																		$kemosite_wordpress_analogous_p30_black_3_neutral_saturation *
																		($kemosite_wordpress_base_black_3_neutral_hsl_array[2] / 100)
																	);
	$kemosite_wordpress_analogous_p30_black_3_neutral_array	=	array(
																	$kemosite_wordpress_colour_analogous_p30_hue,
																	$kemosite_wordpress_analogous_p30_black_3_neutral_saturation,
																	$kemosite_wordpress_analogous_p30_black_3_neutral_lightness,
																);
	$kemosite_wordpress_analogous_p30_black_3_neutral_hsl	=	implode( ",", $kemosite_wordpress_analogous_p30_black_3_neutral_array );
	$kemosite_wordpress_analogous_p30_black_3_neutral_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_p30_black_3_neutral_hsl );

	// +30 degrees, Neutral Contrast 4.5:1, black background
	$kemosite_wordpress_analogous_p30_black_45_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_black_45_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_analogous_p30_black_45_neutral_lightness = 	$kemosite_wordpress_base_black_45_neutral_hsl_array[2] + 
																	round(	
																		$kemosite_wordpress_analogous_p30_black_45_neutral_saturation *
																		($kemosite_wordpress_base_black_45_neutral_hsl_array[2] / 100)
																	);
	$kemosite_wordpress_analogous_p30_black_45_neutral_array	 =	array(
																		$kemosite_wordpress_colour_analogous_p30_hue,
																		$kemosite_wordpress_analogous_p30_black_45_neutral_saturation,
																		$kemosite_wordpress_analogous_p30_black_45_neutral_lightness,
																	);
	$kemosite_wordpress_analogous_p30_black_45_neutral_hsl		=	implode( ",", $kemosite_wordpress_analogous_p30_black_45_neutral_array );
	$kemosite_wordpress_analogous_p30_black_45_neutral_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_p30_black_45_neutral_hsl );

	// +30 degrees, Neutral Contrast 7:1, black background
	$kemosite_wordpress_analogous_p30_black_7_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_black_7_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_analogous_p30_black_7_neutral_lightness = 	$kemosite_wordpress_base_black_7_neutral_hsl_array[2] + 
																	round(	
																		$kemosite_wordpress_analogous_p30_black_7_neutral_saturation *
																		($kemosite_wordpress_base_black_7_neutral_hsl_array[2] / 100)
																	);
	$kemosite_wordpress_analogous_p30_black_7_neutral_array	 	=	array(
																		$kemosite_wordpress_colour_analogous_p30_hue,
																		$kemosite_wordpress_analogous_p30_black_7_neutral_saturation,
																		$kemosite_wordpress_analogous_p30_black_7_neutral_lightness,
																	);
	$kemosite_wordpress_analogous_p30_black_7_neutral_hsl		=	implode( ",", $kemosite_wordpress_analogous_p30_black_7_neutral_array );
	$kemosite_wordpress_analogous_p30_black_7_neutral_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_p30_black_7_neutral_hsl );

	$wp_customize->add_setting( 'kemosite_wordpress_analogous_p30_black_3_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_analogous_p30_black_3_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_analogous_p30_black_3_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '+30, 3:1 neutral on black', 'kemosite-wordpress-theme' ),
		'description' => '+30 degrees, 3:1 neutral contrast target on black background',
		'default' => $kemosite_wordpress_analogous_p30_black_3_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_analogous_p30_black_45_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_analogous_p30_black_45_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_analogous_p30_black_45_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '+30, 4.5:1 neutral on black', 'kemosite-wordpress-theme' ),
		'description' => '+30 degrees, 4.5:1 neutral contrast target on black background',
		'default' => $kemosite_wordpress_analogous_p30_black_45_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_analogous_p30_black_7_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_analogous_p30_black_7_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_analogous_p30_black_7_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '+30, 7:1 neutral on black', 'kemosite-wordpress-theme' ),
		'description' => '+30 degrees, 7:1 neutral contrast target on black background',
		'default' => $kemosite_wordpress_analogous_p30_black_7_neutral_hex,
	) ) );

	// -30 degrees, Colour Contrast 3:1, white background
	$kemosite_wordpress_colour_analogous_m30_white_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_analogous_m30_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_analogous_m30_white_contrast, // colour contrast on white background
																	3, // target contrast,
																	$kemosite_wordpress_base_white_rgb_lum // white luminance
																) );
	$kemosite_wordpress_colour_analogous_m30_white_3_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_analogous_m30_white_3_hsl );

	// -30 degrees, Colour Contrast 4.5:1, white background
	$kemosite_wordpress_colour_analogous_m30_white_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_analogous_m30_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_analogous_m30_white_contrast, // colour contrast on white background
																	4.5, // target contrast,
																	$kemosite_wordpress_base_white_rgb_lum // white luminance
																) );
	$kemosite_wordpress_colour_analogous_m30_white_45_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_analogous_m30_white_45_hsl );

	// -30 degrees, Colour Contrast 7:1, white background
	$kemosite_wordpress_colour_analogous_m30_white_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_analogous_m30_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_analogous_m30_white_contrast, // colour contrast on white background
																	7, // target contrast,
																	$kemosite_wordpress_base_white_rgb_lum // white luminance
																) );
	$kemosite_wordpress_colour_analogous_m30_white_7_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_analogous_m30_white_7_hsl );

	$wp_customize->add_setting( 'kemosite_wordpress_colour_analogous_m30_white_3_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_analogous_m30_white_3_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_analogous_m30_white_3_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '-30, 3:1 hue on white', 'kemosite-wordpress-theme' ),
		'description' => '-30 degrees, 3:1 hue contrast target on white background',
		'default' => $kemosite_wordpress_colour_analogous_m30_white_3_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_analogous_m30_white_45_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_analogous_m30_white_45_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_analogous_m30_white_45_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '-30, 4.5:1 hue on white', 'kemosite-wordpress-theme' ),
		'description' => '-30 degrees, 4.5:1 hue contrast target on white background',
		'default' => $kemosite_wordpress_colour_analogous_m30_white_45_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_analogous_m30_white_7_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_analogous_m30_white_7_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_analogous_m30_white_7_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '-30, 7:1 hue on white', 'kemosite-wordpress-theme' ),
		'description' => '-30 degrees, 7:1 hue contrast target on white background',
		'default' => $kemosite_wordpress_colour_analogous_m30_white_7_hex,
	) ) );

	// -30 degrees, Colour Contrast 3:1, black background
	$kemosite_wordpress_colour_analogous_m30_black_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_analogous_m30_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_analogous_m30_black_contrast, // colour contrast on white background
																	3, // target contrast,
																	$kemosite_wordpress_base_black_rgb_lum // white luminance
																) );
	$kemosite_wordpress_colour_analogous_m30_black_3_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_analogous_m30_black_3_hsl );

	// -30 degrees, Colour Contrast 4.5:1, black background
	$kemosite_wordpress_colour_analogous_m30_black_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_analogous_m30_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_analogous_m30_black_contrast, // colour contrast on white background
																	4.5, // target contrast,
																	$kemosite_wordpress_base_black_rgb_lum // white luminance
																) );
	$kemosite_wordpress_colour_analogous_m30_black_45_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_analogous_m30_black_45_hsl );

	// -30 degrees, Colour Contrast 7:1, black background
	$kemosite_wordpress_colour_analogous_m30_black_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_analogous_m30_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_analogous_m30_black_contrast, // colour contrast on white background
																	7, // target contrast,
																	$kemosite_wordpress_base_black_rgb_lum // white luminance
																) );
	$kemosite_wordpress_colour_analogous_m30_black_7_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_analogous_m30_black_7_hsl );

	$wp_customize->add_setting( 'kemosite_wordpress_colour_analogous_m30_black_3_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_analogous_m30_black_3_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_analogous_m30_black_3_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '-30, 3:1 hue on black', 'kemosite-wordpress-theme' ),
		'description' => '-30 degrees, 3:1 hue contrast target on black background',
		'default' => $kemosite_wordpress_colour_analogous_m30_black_3_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_analogous_m30_black_45_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_analogous_m30_black_45_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_analogous_m30_black_45_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '-30, 4.5:1 hue on black', 'kemosite-wordpress-theme' ),
		'description' => '-30 degrees, 4.5:1 hue contrast target on black background',
		'default' => $kemosite_wordpress_colour_analogous_m30_black_45_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_analogous_m30_black_7_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_analogous_m30_black_7_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_analogous_m30_black_7_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '-30, 7:1 hue on black', 'kemosite-wordpress-theme' ),
		'description' => '-30 degrees, 7:1 hue contrast target on black background',
		'default' => $kemosite_wordpress_colour_analogous_m30_black_7_hex,
	) ) );

	// -30 degrees, Neutral Contrast 3:1, white background
	$kemosite_wordpress_analogous_m30_white_3_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_white_3_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_analogous_m30_white_3_neutral_lightness = 	$kemosite_wordpress_base_white_3_neutral_hsl_array[2];
	$kemosite_wordpress_analogous_m30_white_3_neutral_array	=	array(
																	$kemosite_wordpress_colour_analogous_m30_hue,
																	$kemosite_wordpress_analogous_m30_white_3_neutral_saturation,
																	$kemosite_wordpress_analogous_m30_white_3_neutral_lightness,
																);
	$kemosite_wordpress_analogous_m30_white_3_neutral_hsl	=	implode( ",", $kemosite_wordpress_analogous_m30_white_3_neutral_array );
	$kemosite_wordpress_analogous_m30_white_3_neutral_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_m30_white_3_neutral_hsl );

	// -30 degrees, Neutral Contrast 4.5:1, white background
	$kemosite_wordpress_analogous_m30_white_45_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_white_45_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_analogous_m30_white_45_neutral_lightness = 	$kemosite_wordpress_base_white_45_neutral_hsl_array[2];
	$kemosite_wordpress_analogous_m30_white_45_neutral_array	 =	array(
																		$kemosite_wordpress_colour_analogous_m30_hue,
																		$kemosite_wordpress_analogous_m30_white_45_neutral_saturation,
																		$kemosite_wordpress_analogous_m30_white_45_neutral_lightness,
																	);
	$kemosite_wordpress_analogous_m30_white_45_neutral_hsl		=	implode( ",", $kemosite_wordpress_analogous_m30_white_45_neutral_array );
	$kemosite_wordpress_analogous_m30_white_45_neutral_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_m30_white_45_neutral_hsl );

	// -30 degrees, Neutral Contrast 7:1, white background
	$kemosite_wordpress_analogous_m30_white_7_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_white_7_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_analogous_m30_white_7_neutral_lightness = 	$kemosite_wordpress_base_white_7_neutral_hsl_array[2];
	$kemosite_wordpress_analogous_m30_white_7_neutral_array	 	=	array(
																		$kemosite_wordpress_colour_analogous_m30_hue,
																		$kemosite_wordpress_analogous_m30_white_7_neutral_saturation,
																		$kemosite_wordpress_analogous_m30_white_7_neutral_lightness,
																	);
	$kemosite_wordpress_analogous_m30_white_7_neutral_hsl		=	implode( ",", $kemosite_wordpress_analogous_m30_white_7_neutral_array );
	$kemosite_wordpress_analogous_m30_white_7_neutral_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_m30_white_7_neutral_hsl );

	$wp_customize->add_setting( 'kemosite_wordpress_analogous_m30_white_3_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_analogous_m30_white_3_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_analogous_m30_white_3_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '-30, 3:1 neutral on white', 'kemosite-wordpress-theme' ),
		'description' => '-30 degrees, 3:1 neutral contrast target on white background',
		'default' => $kemosite_wordpress_analogous_m30_white_3_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_analogous_m30_white_45_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_analogous_m30_white_45_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_analogous_m30_white_45_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '-30, 4.5:1 neutral on white', 'kemosite-wordpress-theme' ),
		'description' => '-30 degrees, 4.5:1 neutral contrast target on white background',
		'default' => $kemosite_wordpress_analogous_m30_white_45_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_analogous_m30_white_7_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_analogous_m30_white_7_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_analogous_m30_white_7_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '-30, 7:1 neutral on white', 'kemosite-wordpress-theme' ),
		'description' => '-30 degrees, 7:1 neutral contrast target on white background',
		'default' => $kemosite_wordpress_analogous_m30_white_7_neutral_hex,
	) ) );

	// -30 degrees, Neutral Contrast 3:1, black background
	$kemosite_wordpress_analogous_m30_black_3_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_black_3_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_analogous_m30_black_3_neutral_lightness = 	$kemosite_wordpress_base_black_3_neutral_hsl_array[2] + 
																	round(	
																		$kemosite_wordpress_analogous_m30_black_3_neutral_saturation *
																		($kemosite_wordpress_base_black_3_neutral_hsl_array[2] / 100)
																	);
	$kemosite_wordpress_analogous_m30_black_3_neutral_array	=	array(
																	$kemosite_wordpress_colour_analogous_m30_hue,
																	$kemosite_wordpress_analogous_m30_black_3_neutral_saturation,
																	$kemosite_wordpress_analogous_m30_black_3_neutral_lightness,
																);
	$kemosite_wordpress_analogous_m30_black_3_neutral_hsl	=	implode( ",", $kemosite_wordpress_analogous_m30_black_3_neutral_array );
	$kemosite_wordpress_analogous_m30_black_3_neutral_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_m30_black_3_neutral_hsl );

	// -30 degrees, Neutral Contrast 4.5:1, black background
	$kemosite_wordpress_analogous_m30_black_45_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_black_45_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_analogous_m30_black_45_neutral_lightness = 	$kemosite_wordpress_base_black_45_neutral_hsl_array[2] + 
																	round(	
																		$kemosite_wordpress_analogous_m30_black_45_neutral_saturation *
																		($kemosite_wordpress_base_black_45_neutral_hsl_array[2] / 100)
																	);
	$kemosite_wordpress_analogous_m30_black_45_neutral_array	 =	array(
																		$kemosite_wordpress_colour_analogous_m30_hue,
																		$kemosite_wordpress_analogous_m30_black_45_neutral_saturation,
																		$kemosite_wordpress_analogous_m30_black_45_neutral_lightness,
																	);
	$kemosite_wordpress_analogous_m30_black_45_neutral_hsl		=	implode( ",", $kemosite_wordpress_analogous_m30_black_45_neutral_array );
	$kemosite_wordpress_analogous_m30_black_45_neutral_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_m30_black_45_neutral_hsl );

	// -30 degrees, Neutral Contrast 7:1, black background
	$kemosite_wordpress_analogous_m30_black_7_neutral_saturation = floor( 
		$kemosite_wordpress_base_primary_colour_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_black_7_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_analogous_m30_black_7_neutral_lightness = 	$kemosite_wordpress_base_black_7_neutral_hsl_array[2] + 
																	round(	
																		$kemosite_wordpress_analogous_m30_black_7_neutral_saturation *
																		($kemosite_wordpress_base_black_7_neutral_hsl_array[2] / 100)
																	);
	$kemosite_wordpress_analogous_m30_black_7_neutral_array	 	=	array(
																		$kemosite_wordpress_colour_analogous_m30_hue,
																		$kemosite_wordpress_analogous_m30_black_7_neutral_saturation,
																		$kemosite_wordpress_analogous_m30_black_7_neutral_lightness,
																	);
	$kemosite_wordpress_analogous_m30_black_7_neutral_hsl		=	implode( ",", $kemosite_wordpress_analogous_m30_black_7_neutral_array );
	$kemosite_wordpress_analogous_m30_black_7_neutral_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_analogous_m30_black_7_neutral_hsl );

	$wp_customize->add_setting( 'kemosite_wordpress_analogous_m30_black_3_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_analogous_m30_black_3_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_analogous_m30_black_3_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '-30, 3:1 neutral on black', 'kemosite-wordpress-theme' ),
		'description' => '-30 degrees, 3:1 neutral contrast target on black background',
		'default' => $kemosite_wordpress_analogous_m30_black_3_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_analogous_m30_black_45_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_analogous_m30_black_45_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_analogous_m30_black_45_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '-30, 4.5:1 neutral on black', 'kemosite-wordpress-theme' ),
		'description' => '-30 degrees, 4.5:1 neutral contrast target on black background',
		'default' => $kemosite_wordpress_analogous_m30_black_45_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_analogous_m30_black_7_neutral_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_analogous_m30_black_7_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_analogous_m30_black_7_neutral_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_analogous_section', // Required, core or custom.
		'label' => __( '-30, 7:1 neutral on black', 'kemosite-wordpress-theme' ),
		'description' => '-30 degrees, 7:1 neutral contrast target on black background',
		'default' => $kemosite_wordpress_analogous_m30_black_7_neutral_hex,
	) ) );

// Complementary

$wp_customize->add_section( 'kemosite_wordpress_colour_complementary_section' , array(
	'title' => __( 'Complementary', 'kemosite-wordpress-theme' ),
	'panel' => 'kemosite_wordpress_colour_variations_options',
	'description' => '
		<p>Complementary colors exist on opposite sides of the color wheel.</p>
		<p>Inverted colours are ignored due to similar outcomes as complementary, when adjusted for contrast.</p>
		<p style="font-weight: 700;">Publish Base Colour first, then Refresh.</p>
	',
	'priority' => 40, // Same as Colour.
	'capability' => 'edit_theme_options'
) );

	$kemosite_wordpress_colour_complementary_hue			=	( 360 + ( $kemosite_wordpress_base_primary_colour_hsl_array[0] + 180 ) ) % 360;
	$kemosite_wordpress_colour_complementary_hsl_array		=	array( 
																	$kemosite_wordpress_colour_complementary_hue,
																	$kemosite_wordpress_base_primary_colour_hsl_array[1],
																	$kemosite_wordpress_base_primary_colour_hsl_array[2]
																);
	$kemosite_wordpress_colour_complementary_hsl 			= 	implode( ",", $kemosite_wordpress_colour_complementary_hsl_array );
	$kemosite_wordpress_colour_complementary_rgb 			=	kemosite_hsl_to_rgb( $kemosite_wordpress_colour_complementary_hsl );
	$kemosite_wordpress_colour_complementary_rgb_array		=	explode( ",", $kemosite_wordpress_colour_complementary_rgb );
	$kemosite_wordpress_colour_complementary_lum			= 	kemosite_calc_lum( 
																	$kemosite_wordpress_colour_complementary_rgb_array[0],
																	$kemosite_wordpress_colour_complementary_rgb_array[1],
																	$kemosite_wordpress_colour_complementary_rgb_array[2]
																);
	$kemosite_wordpress_colour_complementary_white_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_colour_complementary_lum, $kemosite_wordpress_base_white_rgb_lum);
	$kemosite_wordpress_colour_complementary_black_contrast	= 	kemosite_calc_contrast( $kemosite_wordpress_colour_complementary_lum, $kemosite_wordpress_base_black_rgb_lum);

	// Colours, White Background

	// Colour Contrast 3:1, white background
	$kemosite_wordpress_colour_complementary_white_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_complementary_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_complementary_white_contrast, // colour contrast on white background
																	3, // target contrast
																	$kemosite_wordpress_base_white_rgb_lum // white luminance
																) );
	$kemosite_wordpress_colour_complementary_white_3_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_complementary_white_3_hsl );

	// Colour Contrast 4.5:1, white background
	$kemosite_wordpress_colour_complementary_white_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_complementary_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_complementary_white_contrast, // colour contrast on white background
																	4.5, // target contrast
																	$kemosite_wordpress_base_white_rgb_lum // white luminance
																) );
	$kemosite_wordpress_colour_complementary_white_45_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_complementary_white_45_hsl );

	// Colour Contrast 7:1, white background
	$kemosite_wordpress_colour_complementary_white_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_complementary_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_complementary_white_contrast, // colour contrast on white background
																	7, // target contrast
																	$kemosite_wordpress_base_white_rgb_lum // white luminance
																) );
	$kemosite_wordpress_colour_complementary_white_7_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_complementary_white_7_hsl );

	$wp_customize->add_setting( 'kemosite_wordpress_colour_complementary_white_3_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_complementary_white_3_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_complementary_white_3_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_complementary_section', // Required, core or custom.
		'label' => __( 'Complementary, 3:1 hue on white', 'kemosite-wordpress-theme' ),
		'description' => 'Complementary of Primary, 3:1 hue contrast target on white background',
		'default' => $kemosite_wordpress_colour_complementary_white_3_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_complementary_white_45_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_complementary_white_45_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_complementary_white_45_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_complementary_section', // Required, core or custom.
		'label' => __( 'Complementary, 4.5:1 hue on white', 'kemosite-wordpress-theme' ),
		'description' => 'Complementary of Primary, 4.5:1 hue contrast target on white background',
		'default' => $kemosite_wordpress_colour_complementary_white_45_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_complementary_white_7_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_complementary_white_7_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_complementary_white_7_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_complementary_section', // Required, core or custom.
		'label' => __( 'Complementary, 7:1 hue on white', 'kemosite-wordpress-theme' ),
		'description' => 'Complementary of Primary, 7:1 hue contrast target on white background',
		'default' => $kemosite_wordpress_colour_complementary_white_7_hex,
	) ) );

	// Colours, Black Background

	// Colour Contrast 3:1, black background
	$kemosite_wordpress_colour_complementary_black_3_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_complementary_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_complementary_black_contrast, // colour contrast on black background
																	3, // target contrast
																	$kemosite_wordpress_base_black_rgb_lum // black luminance
																) );
	$kemosite_wordpress_colour_complementary_black_3_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_complementary_black_3_hsl );

	// Colour Contrast 4.5:1, black background
	$kemosite_wordpress_colour_complementary_black_45_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_complementary_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_complementary_black_contrast, // colour contrast on black background
																	4.5, // target contrast
																	$kemosite_wordpress_base_black_rgb_lum // black luminance
																) );
	$kemosite_wordpress_colour_complementary_black_45_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_complementary_black_45_hsl );

	// Colour Contrast 7:1, black background
	$kemosite_wordpress_colour_complementary_black_7_hsl	=	( kemosite_adjust_hsl_l_contrast( 
																	$kemosite_wordpress_colour_complementary_hsl_array, // hsl array of base colour
																	$kemosite_wordpress_colour_complementary_black_contrast, // colour contrast on black background
																	7, // target contrast
																	$kemosite_wordpress_base_black_rgb_lum // black luminance
																) );
	$kemosite_wordpress_colour_complementary_black_7_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_colour_complementary_black_7_hsl );

	$wp_customize->add_setting( 'kemosite_wordpress_colour_complementary_black_3_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_complementary_black_3_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_complementary_black_3_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_complementary_section', // Required, core or custom.
		'label' => __( 'Complementary, 3:1 hue on black', 'kemosite-wordpress-theme' ),
		'description' => 'Complementary of Primary, 3:1 hue contrast target on black background',
		'default' => $kemosite_wordpress_colour_complementary_black_3_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_complementary_black_45_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_complementary_black_45_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_complementary_black_45_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_complementary_section', // Required, core or custom.
		'label' => __( 'Complementary, 4.5:1 hue on black', 'kemosite-wordpress-theme' ),
		'description' => 'Complementary of Primary, 4.5:1 hue contrast target on black background',
		'default' => $kemosite_wordpress_colour_complementary_black_45_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_complementary_black_7_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_colour_complementary_black_7_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colour_complementary_black_7_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_complementary_section', // Required, core or custom.
		'label' => __( 'Complementary, 7:1 hue on black', 'kemosite-wordpress-theme' ),
		'description' => 'Complementary of Primary, 7:1 hue contrast target on black background',
		'default' => $kemosite_wordpress_colour_complementary_black_7_hex,
	) ) );

	// Neutrals, White Background

	// Neutral Contrast 3:1, white background
	$kemosite_wordpress_complementary_white_3_neutral_saturation = floor( 
		$kemosite_wordpress_colour_complementary_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_white_3_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_complementary_white_3_neutral_lightness = 	$kemosite_wordpress_base_white_3_neutral_hsl_array[2];
	$kemosite_wordpress_complementary_white_3_neutral_array		=	array( $kemosite_wordpress_colour_complementary_hsl_array[0],
																		$kemosite_wordpress_complementary_white_3_neutral_saturation,
																		$kemosite_wordpress_complementary_white_3_neutral_lightness,
																	);
	$kemosite_wordpress_complementary_white_3_neutral_hsl		=	implode( ",", $kemosite_wordpress_complementary_white_3_neutral_array );
	$kemosite_wordpress_complementary_white_3_neutral_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_complementary_white_3_neutral_hsl );

	// Neutral Contrast 4.5:1, white background
	$kemosite_wordpress_complementary_white_45_neutral_saturation = floor( 
		$kemosite_wordpress_colour_complementary_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_white_45_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_complementary_white_45_neutral_lightness 	= 	$kemosite_wordpress_base_white_45_neutral_hsl_array[2];
	$kemosite_wordpress_complementary_white_45_neutral_array		=	array( $kemosite_wordpress_colour_complementary_hsl_array[0],
																	$kemosite_wordpress_complementary_white_45_neutral_saturation,
																	$kemosite_wordpress_complementary_white_45_neutral_lightness,
																);
	$kemosite_wordpress_complementary_white_45_neutral_hsl	=	implode( ",", $kemosite_wordpress_complementary_white_45_neutral_array );
	$kemosite_wordpress_complementary_white_45_neutral_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_complementary_white_45_neutral_hsl );

	// Neutral Contrast 7:1, white background
	$kemosite_wordpress_complementary_white_7_neutral_saturation = floor( 
		$kemosite_wordpress_colour_complementary_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_white_7_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_complementary_white_7_neutral_lightness 	= 	$kemosite_wordpress_base_white_7_neutral_hsl_array[2];
	$kemosite_wordpress_complementary_white_7_neutral_array		=	array( $kemosite_wordpress_colour_complementary_hsl_array[0],
																	$kemosite_wordpress_complementary_white_7_neutral_saturation,
																	$kemosite_wordpress_complementary_white_7_neutral_lightness,
																);
	$kemosite_wordpress_complementary_white_7_neutral_hsl	=	implode( ",", $kemosite_wordpress_complementary_white_7_neutral_array );
	$kemosite_wordpress_complementary_white_7_neutral_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_complementary_white_7_neutral_hsl );

	$wp_customize->add_setting( 'kemosite_wordpress_complementary_white_3_neutral_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_complementary_white_3_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_complementary_white_3_neutral_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_complementary_section', // Required, core or custom.
		'label' => __( 'Complementary, 3:1 neutral on white', 'kemosite-wordpress-theme' ),
		'description' => 'Complementary of Primary, 3:1 neutral contrast target on white background',
		'default' => $kemosite_wordpress_complementary_white_3_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_complementary_white_45_neutral_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_complementary_white_45_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_complementary_white_45_neutral_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_complementary_section', // Required, core or custom.
		'label' => __( 'Complementary, 4.5:1 neutral on white', 'kemosite-wordpress-theme' ),
		'description' => 'Complementary of Primary, 4.5:1 neutral contrast target on white background',
		'default' => $kemosite_wordpress_complementary_white_45_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_complementary_white_7_neutral_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_complementary_white_7_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_complementary_white_7_neutral_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_complementary_section', // Required, core or custom.
		'label' => __( 'Complementary, 7:1 neutral on white', 'kemosite-wordpress-theme' ),
		'description' => 'Complementary of Primary, 7:1 neutral contrast target on white background',
		'default' => $kemosite_wordpress_complementary_white_7_neutral_hex,
	) ) );

	// Neutrals, Black Background

	// Neutral Contrast 3:1, black background
	$kemosite_wordpress_complementary_black_3_neutral_saturation = floor( 
		$kemosite_wordpress_colour_complementary_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_black_3_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_complementary_black_3_neutral_lightness = 	$kemosite_wordpress_base_black_3_neutral_hsl_array[2];
	$kemosite_wordpress_complementary_black_3_neutral_array		=	array( $kemosite_wordpress_colour_complementary_hsl_array[0],
																		$kemosite_wordpress_complementary_black_3_neutral_saturation,
																		$kemosite_wordpress_complementary_black_3_neutral_lightness,
																	);
	$kemosite_wordpress_complementary_black_3_neutral_hsl		=	implode( ",", $kemosite_wordpress_complementary_black_3_neutral_array );
	$kemosite_wordpress_complementary_black_3_neutral_hex 		= 	kemosite_hsl_to_hex( $kemosite_wordpress_complementary_black_3_neutral_hsl );

	// Neutral Contrast 4.5:1, black background
	$kemosite_wordpress_complementary_black_45_neutral_saturation = floor( 
		$kemosite_wordpress_colour_complementary_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_black_45_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_complementary_black_45_neutral_lightness 	= 	$kemosite_wordpress_base_black_45_neutral_hsl_array[2];
	$kemosite_wordpress_complementary_black_45_neutral_array		=	array( $kemosite_wordpress_colour_complementary_hsl_array[0],
																	$kemosite_wordpress_complementary_black_45_neutral_saturation,
																	$kemosite_wordpress_complementary_black_45_neutral_lightness,
																);
	$kemosite_wordpress_complementary_black_45_neutral_hsl	=	implode( ",", $kemosite_wordpress_complementary_black_45_neutral_array );
	$kemosite_wordpress_complementary_black_45_neutral_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_complementary_black_45_neutral_hsl );

	// Neutral Contrast 7:1, black background
	$kemosite_wordpress_complementary_black_7_neutral_saturation = floor( 
		$kemosite_wordpress_colour_complementary_hsl_array[1] * 
		( ( 100 - $kemosite_wordpress_base_black_7_neutral_hsl_array[2] ) / 100 )
	);
	$kemosite_wordpress_complementary_black_7_neutral_lightness 	= 	$kemosite_wordpress_base_black_7_neutral_hsl_array[2];
	$kemosite_wordpress_complementary_black_7_neutral_array		=	array( $kemosite_wordpress_colour_complementary_hsl_array[0],
																	$kemosite_wordpress_complementary_black_7_neutral_saturation,
																	$kemosite_wordpress_complementary_black_7_neutral_lightness,
																);
	$kemosite_wordpress_complementary_black_7_neutral_hsl	=	implode( ",", $kemosite_wordpress_complementary_black_7_neutral_array );
	$kemosite_wordpress_complementary_black_7_neutral_hex 	= 	kemosite_hsl_to_hex( $kemosite_wordpress_complementary_black_7_neutral_hsl );

	$wp_customize->add_setting( 'kemosite_wordpress_complementary_black_3_neutral_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_complementary_black_3_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_complementary_black_3_neutral_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_complementary_section', // Required, core or custom.
		'label' => __( 'Complementary, 3:1 neutral on black', 'kemosite-wordpress-theme' ),
		'description' => 'Complementary of Primary, 3:1 neutral contrast target on black background',
		'default' => $kemosite_wordpress_complementary_black_3_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_complementary_black_45_neutral_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_complementary_black_45_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_complementary_black_45_neutral_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_complementary_section', // Required, core or custom.
		'label' => __( 'Complementary, 4.5:1 neutral on black', 'kemosite-wordpress-theme' ),
		'description' => 'Complementary of Primary, 4.5:1 neutral contrast target on black background',
		'default' => $kemosite_wordpress_complementary_black_45_neutral_hex,
	) ) );
	$wp_customize->add_setting( 'kemosite_wordpress_complementary_black_7_neutral_contrast_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $kemosite_wordpress_complementary_black_7_neutral_hex,
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_complementary_black_7_neutral_contrast_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_complementary_section', // Required, core or custom.
		'label' => __( 'Complementary, 7:1 neutral on black', 'kemosite-wordpress-theme' ),
		'description' => 'Complementary of Primary, 7:1 neutral contrast target on black background',
		'default' => $kemosite_wordpress_complementary_black_7_neutral_hex,
	) ) );

// Split-Complementary

$wp_customize->add_section( 'kemosite_wordpress_colour_split_complementary_section' , array(
	'title' => __( 'Split-Complementary', 'kemosite-wordpress-theme' ),
	'panel' => 'kemosite_wordpress_colour_variations_options',
	'description' => '
		<p>A split-complementary color scheme is one where a primary color is used with the two analogous colors to its complement.</p>
		<p style="font-weight: 700;">Publish Base Colour first, then Refresh.</p>
	',
	'priority' => 40, // Same as Colour.
	'capability' => 'edit_theme_options'
) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_split_complementary_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => 'Test',
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_wordpress_colour_split_complementary_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_split_complementary_section', // Required, core or custom.
		'label' => __( 'Test Split-Complementary Control', 'kemosite-wordpress-theme' ),
		'description' => 'Test Split-Complementary Control',
		'default' => 'Test',
		// 'active_callback' => 'is_front_page',
	) ) );

// Triadic

$wp_customize->add_section( 'kemosite_wordpress_colour_triadic_section' , array(
	'title' => __( 'Triadic', 'kemosite-wordpress-theme' ),
	'panel' => 'kemosite_wordpress_colour_variations_options',
	'description' => '
		<p>A triad consists of three colors that are placed 120 degrees from each other on the color wheel</p>
		<p style="font-weight: 700;">Publish Base Colour first, then Refresh.</p>
	',
	'priority' => 40, // Same as Colour.
	'capability' => 'edit_theme_options'
) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_triadic_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => 'Test',
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_wordpress_colour_triadic_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_triadic_section', // Required, core or custom.
		'label' => __( 'Test Triadic Control', 'kemosite-wordpress-theme' ),
		'description' => 'Test Triadic Control',
		'default' => 'Test',
		// 'active_callback' => 'is_front_page',
	) ) );

// Square (tetradic)

$wp_customize->add_section( 'kemosite_wordpress_colour_square_section' , array(
	'title' => __( 'Square (Tetradic)', 'kemosite-wordpress-theme' ),
	'panel' => 'kemosite_wordpress_colour_variations_options',
	'description' => '
		<p>The square color scheme uses four colors equidistant from each other on the color wheel (90 degrees apart)</p>
		<p style="font-weight: 700;">Publish Base Colour first, then Refresh.</p>
	',
	'priority' => 40, // Same as Colour.
	'capability' => 'edit_theme_options'
) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_square_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => 'Test',
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_wordpress_colour_square_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_square_section', // Required, core or custom.
		'label' => __( 'Square Control', 'kemosite-wordpress-theme' ),
		'description' => 'Square Control',
		'default' => 'Test',
		// 'active_callback' => 'is_front_page',
	) ) );

// Rectangle (tetradic)

// Primary
// Primary + 30 degrees
// Primary + 30 degrees + 180 degrees
// Primary + 180 degrees

$wp_customize->add_section( 'kemosite_wordpress_colour_rectangle_section' , array(
	'title' => __( 'Rectangle (Tetradic)', 'kemosite-wordpress-theme' ),
	'panel' => 'kemosite_wordpress_colour_variations_options',
	'description' => '
		<p>The rectangle color scheme uses four colors organized into two complementary color pairs.</p>
		<p style="font-weight: 700;">Publish Base Colour first, then Refresh.</p>
	',
	'priority' => 40, // Same as Colour.
	'capability' => 'edit_theme_options'
) );
	$wp_customize->add_setting( 'kemosite_wordpress_colour_rectangle_setting', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => 'Test',
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );
	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_wordpress_colour_rectangle_setting', array(
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_colour_rectangle_section', // Required, core or custom.
		'label' => __( 'Rectangle Control', 'kemosite-wordpress-theme' ),
		'description' => 'Rectangle Control',
		'default' => 'Test',
		// 'active_callback' => 'is_front_page',
	) ) );

/*
** METHOD **
*/

// Refer to colour theory sites:
// https://blog.hubspot.com/marketing/color-theory-design
// https://www.g2.com/articles/color-schemes
// https://color.adobe.com/create/color-wheel

// Create additional sections for colour wheel selections, with contrast automatically adjusted for accessibility (3:1 -> 7:1?).
// Colours can be copied and pasted where appropriate.

?>