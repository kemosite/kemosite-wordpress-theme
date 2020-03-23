<?php

/* [Customizations] */
function my_customize_register( $wp_customize ) {

	// Primary
	$primary = '#004680';  // Colour of the year, 2020

	/* [REMOVE UNNEEDED CONTROLS] */
	/*
	$wp_customize->remove_control("header_image");
	$wp_customize->remove_section("header_image");
	*/
	$wp_customize->remove_control("color");
	$wp_customize->remove_section("colors");
	

	// Calculate 100% CMY Black
	$black_78 = round(255 - (255 * .78));
	$black_78_hex = dechex($black_78);
	$black = '#'.$black_78_hex.$black_78_hex.$black_78_hex;

	// Calculate 100% K Black
	$black_86 = round(255 - (255 * .86));
	$black_86_hex = dechex($black_86);
	$dark_black = '#'.$black_86_hex.$black_86_hex.$black_86_hex;

	// Minimum 7:1 Contrast For Accessibile Background with "Black"
	$light_black = '#C9C9C9';
	/*
	$black_17 = round(255 - (255 * .17));
	$black_17_hex = dechex($black_17);
	$light_black = '#'.$black_17_hex.$black_17_hex.$black_17_hex;
	*/

	/* [GET PRIMARY COLOURS] */
	$primary_color = get_theme_mod('kemosite_wordpress_colours_primary', $primary);
	$white_color = '#FFFFFF';
	
	// Parse background colour for RGB value. Calculate luminousity. Determine black : white text.
	$primary_hex = (substr($primary_color, 0, 1) === "#") ? substr($primary_color, 1) : $primary_color;
	$white_hex = (substr($white_color, 0, 1) === "#") ? substr($white_color, 1) : $white_color;
	
	$primary_parse_r = intval(substr($primary_hex, 0, 2), 16);
	$primary_parse_g = intval(substr($primary_hex, 2, 2), 16);
	$primary_parse_b = intval(substr($primary_hex, 4, 2), 16);

	$white_parse_r = intval(substr($white_hex, 0, 2), 16);
	$white_parse_g = intval(substr($white_hex, 2, 2), 16);
	$white_parse_b = intval(substr($white_hex, 4, 2), 16);

	function adjust_contrast($eval_contrast = "", $target_contrast = "", $r_input = "", $g_input = "", $b_input = "") {

		/*
		INTENT:
		Brightest should be no lighter than 4.5
		Darkest should be no lighter than 7
		*/

		/*
		- target
		- actual
		- difference
		- Apply correction to LUMINANCE
		*/

		// ($r * 0.2126) + ($g * 0.7152) + ($b * 0.0722)
		/*
		$brighten_primary_r_perc = $brighten_primary_contrast_perc * 0.2126;
		$brighten_primary_g_perc = $brighten_primary_contrast_perc * 0.7152;
		$brighten_primary_b_perc = $brighten_primary_contrast_perc * 0.0722;
		*/

		$luminance = calc_lum($r_input, $g_input, $b_input);
		$contrast_adjustment = ($target_contrast <= $eval_contrast) ? 1 + (1 - ($target_contrast / $eval_contrast)) : ($eval_contrast / $target_contrast);
		$adjust_primary_r_hex = str_pad(dechex(min(255, round($r_input * $contrast_adjustment))), 2, '0', STR_PAD_LEFT);
		$adjust_primary_g_hex = str_pad(dechex(min(255, round($g_input * $contrast_adjustment))), 2, '0', STR_PAD_LEFT);
		$adjust_primary_b_hex = str_pad(dechex(min(255, round($b_input * $contrast_adjustment))), 2, '0', STR_PAD_LEFT);

		echo '<script>' . 
		'console.log(' . json_encode("Luminance: ".$luminance) . ');' . 
		'console.log(' . json_encode("Evaluating Contrast: ".$eval_contrast) . ');' . 
		'console.log(' . json_encode("Target Contrast: ".$target_contrast) . ');' . 
		'console.log(' . json_encode("Contrast Adjustment: ".$contrast_adjustment) . ');' . 
		'console.log(' . json_encode("RR: ".$adjust_primary_r_hex) . ');' . 
		'console.log(' . json_encode("GG: ".$adjust_primary_g_hex) . ');' . 
		'console.log(' . json_encode("BB: ".$adjust_primary_b_hex) . ');' . 
		'</script>';

		return '#'.$adjust_primary_r_hex.$adjust_primary_g_hex.$adjust_primary_b_hex;
		

	}

	// $primary_lum = round(($primary_parse_r * 0.2126) + ($primary_parse_g * 0.7152) + ($primary_parse_b * 0.0722));
	$primary_lum = calc_lum($primary_parse_r, $primary_parse_g, $primary_parse_b);
	$white_lum = calc_lum($white_parse_r, $white_parse_g, $white_parse_b);
	$primary_lum_contrast = (max($white_lum,$primary_lum) + 5) / (min($primary_lum,$white_lum) + 5); // Minimum 4.5 / 7

	// Correct contrast to 4.5 and 7 for bright and dark variations
	$bright_primary = adjust_contrast($primary_lum_contrast, 4.5, $primary_parse_r, $primary_parse_g, $primary_parse_b);
	$dark_primary = adjust_contrast($primary_lum_contrast, max(7, $primary_lum_contrast + 2.5), $primary_parse_r, $primary_parse_g, $primary_parse_b);

	$invert_parse_r = (255 - $primary_parse_r);
	$invert_parse_g = (255 - $primary_parse_g);
	$invert_parse_b = (255 - $primary_parse_b);
	$invert_r_hex = dechex($invert_parse_r);
	$invert_g_hex = dechex($invert_parse_g);
	$invert_b_hex = dechex($invert_parse_b);
	$invert = '#'.$invert_r_hex.$invert_g_hex.$invert_b_hex;

	$invert_lum = calc_lum($invert_parse_r, $invert_parse_g, $invert_parse_b);
	$invert_lum_contrast = (max($white_lum,$invert_lum) + 5) / (min($invert_lum,$white_lum) + 5); // Minimum 4.5 / 7
	
	// Correct contrast to 4.5 and 7 for bright and dark variations
	$bright_invert = adjust_contrast($invert_lum_contrast, 4.5, $invert_parse_r, $invert_parse_g, $invert_parse_b);
	$dark_invert = adjust_contrast($invert_lum_contrast, max(7, $invert_lum_contrast + 2.5), $invert_parse_r, $invert_parse_g, $invert_parse_b);

	/*
	echo '<script>' . 
	'console.log(' . json_encode("Black 86%: ".$black_86) . ');' . 
	'console.log(' . json_encode("White Luminance: ".$white_lum) . ');' . 
	'console.log(' . json_encode("Primary Colour: ".$primary_color) . ');' . 
	'console.log(' . json_encode("Primary Luminance: ".$primary_lum) . ');' . 
	'console.log(' . json_encode("Primary Luminance Contrast: ".$primary_lum_contrast) . ');' . 
	'</script>';
	*/

	$colour_selection = array(
		'black' => $black,
		'dark_black' => $dark_black,
		'light_black' => $light_black,
		'primary' => $primary,
		'bright_primary' => $bright_primary,
		'dark_primary' => $dark_primary,
		'invert_primary' => $invert,
		'bright_invert' => $bright_invert,
		'dark_invert' => $dark_invert
	);

	$font_selection = array(
		'EB+Garamond:400' => 'EB Garamond, Regular 400',
		'Open+Sans:300' => 'Open Sans, Light 300',
		'Roboto+Condensed' => 'Roboto Condensed, Regular 400',
		'Roboto+Condensed:700' => 'Roboto Condensed, Bold 700'
	);

	$font_stretch = array(
		'normal' => 'Normal',
		'condensed' => 'Condensed',
		'ultra-condensed' => "Ultra Condensed",
		'extra-condensed' => 'Extra Condensed',
		'semi-condensed' => 'Semi Condensed',
		'expanded' => 'Expanded',
		'semi-expanded' => 'Semi Expanded,',
		'extra-expanded' => 'Extra Exapanded',
		'ultra-expanded' => 'Ultra Expanded'
	);

	$font_styles = array(
		'normal' => 'Normal',
		'italic' => 'Italic',
		'oblique' => 'Oblique'
	);

	$font_weights = array(
		'normal' => 'Normal',
		'bold' => 'Bold',
		'100' => '100,',
		'200' => '200',
		'300' => '300',
		'400' => '400',
		'500' => '500',
		'600' => '600',
		'700' => '700',
		'800' => '800',
		'900' => '900'
	);

  /*
  $wp_customize->add_panel();
  $wp_customize->get_panel();
  $wp_customize->remove_panel();
  */

 	/* [SECTIONS] *
 	**	Title				ID								Priority (Order)
	**	Site 				Title & Tagline	title_tagline	20
	**	Colors				colors							40
	**	Header Image		header_image					60
	**	Background Image	background_image				80
	**	Menus (Panel)		nav_menus						100
	**	Widgets (Panel)		widgets							110
	**	Static Front Page	static_front_page				120
	**						default							160
	**	Additional CSS		custom_css						200
	*/
 
	/*
	$wp_customize->add_section( 'custom_css', array(
		'title' => __( 'Custom Poops' ),
		'description' => __( 'Add custom CSS here' ),
		'panel' => '', // Not typically needed.
		'priority' => 160,
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
	) );

	*/

	/* [ADD A COLOUR OPTIONS SECTIONS] */
	$wp_customize->add_section( 'kemosite_wordpress_colours' , array(
	  'title' => __( 'Body Colour Options', 'kemosite-wordpress-theme' ),
	  'description' => 'Body Colour options for the theme.',
	  'priority' => 50, // Before Widgets.
	  'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_setting( 'kemosite_wordpress_colours_black', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['black'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colours_black', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Black Tint', 'kemosite-wordpress-theme' ),
		'section' => 'kemosite_wordpress_colours',
		'default' => $colour_selection['black']
	) ) );

	$wp_customize->add_setting( 'kemosite_wordpress_colours_dark_black', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['dark_black'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colours_dark_black', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Dark Black Tint', 'kemosite-wordpress-theme' ),
		'section' => 'kemosite_wordpress_colours',
		'default' => $colour_selection['dark_black']
	) ) );

	$wp_customize->add_setting( 'kemosite_wordpress_colours_light_black', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['light_black'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colours_light_black', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Light Black Tint', 'kemosite-wordpress-theme' ),
		'section' => 'kemosite_wordpress_colours',
		'default' => $colour_selection['light_black']
	) ) );

	$wp_customize->add_setting( 'kemosite_wordpress_colours_primary', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['primary'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colours_primary', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Primary Colour (Set This First)', 'kemosite-wordpress-theme' ),
		'section' => 'kemosite_wordpress_colours',
		'default' => $colour_selection['primary']
	) ) );

	$wp_customize->add_setting( 'kemosite_wordpress_colours_bright_primary', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['bright_primary'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colours_bright_primary', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Brightest Accessible Primary Colour', 'kemosite-wordpress-theme' ),
		'section' => 'kemosite_wordpress_colours',
		'default' => $colour_selection['bright_primary']
	) ) );

	$wp_customize->add_setting( 'kemosite_wordpress_colours_dark_primary', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['dark_primary'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colours_dark_primary', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Dark Primary Colour', 'kemosite-wordpress-theme' ),
		'section' => 'kemosite_wordpress_colours',
		'default' => $colour_selection['dark_primary']
	) ) );

	$wp_customize->add_setting( 'kemosite_wordpress_colours_invert_primary', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['invert_primary'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colours_invert_primary', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Invert Primary Colour', 'kemosite-wordpress-theme' ),
		'section' => 'kemosite_wordpress_colours',
		'default' => $colour_selection['invert_primary']
	) ) );

	$wp_customize->add_setting( 'kemosite_wordpress_colours_bright_invert', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['bright_invert'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colours_bright_invert', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Brightest Accessible Invert Colour', 'kemosite-wordpress-theme' ),
		'section' => 'kemosite_wordpress_colours',
		'default' => $colour_selection['bright_invert']
	) ) );

	$wp_customize->add_setting( 'kemosite_wordpress_colours_dark_invert', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['dark_invert'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_colours_dark_invert', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Dark Invert Colour', 'kemosite-wordpress-theme' ),
		'section' => 'kemosite_wordpress_colours',
		'default' => $colour_selection['dark_invert']
	) ) );


	/* [ADD A FONT OPTIONS SECTIONS] */
	$wp_customize->add_section( 'kemosite_wordpress_fonts' , array(
	  'title' => __( 'Body Font Options', 'kemosite-wordpress-theme' ),
	  'description' => 'Body copy font options for the theme.',
	  'priority' => 50, // Before Widgets.
	  'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_setting( 'kemosite_wordpress_fonts_h1_h6', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $font_selection['Roboto+Condensed'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_wordpress_fonts_h1_h6', array(
		'type' => 'select',
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_fonts', // Required, core or custom.
		'label' => __( 'Header Font', 'kemosite-wordpress-theme' ),
		'description' => __( 'Font to use for H1-H6 tags.' ),
		'choices' => $font_selection
		// 'active_callback' => 'is_front_page',
	) ) );

	$wp_customize->add_setting( 'kemosite_wordpress_fonts_body', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $font_selection['Open+Sans:300'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_wordpress_fonts_body', array(
		'type' => 'select',
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_fonts', // Required, core or custom.
		'label' => __( 'Body Copy Font', 'kemosite-wordpress-theme' ),
		'description' => __( 'Font to use for body copy.' ),
		'choices' => $font_selection
		// 'active_callback' => 'is_front_page',
	) ) );

	$wp_customize->add_setting( 'kemosite_wordpress_fonts_buttons', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $font_selection['Roboto+Condensed'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_wordpress_fonts_buttons', array(
		'type' => 'select',
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_fonts', // Required, core or custom.
		'label' => __( 'Buttons Font', 'kemosite-wordpress-theme' ),
		'description' => __( 'Font to use for buttons.' ),
		'choices' => $font_selection
		// 'active_callback' => 'is_front_page',
	) ) );



	/* [ADD A HEADER OPTIONS SECTIONS] */
	$wp_customize->add_section( 'kemosite_wordpress_header' , array(
	  'title' => __( 'Header Options', 'kemosite-wordpress-theme' ),
	  'description' => 'Header options for the theme.',
	  'priority' => 50, // Before Widgets.
	  'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_setting( 'kemosite_wordpress_header_font', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $font_selection['Roboto+Condensed:700'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_wordpress_header_font', array(
		'type' => 'select',
		'priority' => 10, // Within the section.
		'section' => 'kemosite_wordpress_header', // Required, core or custom.
		'label' => __( 'Header Font', 'kemosite-wordpress-theme' ),
		'description' => '',
		'choices' => $font_selection
		// 'active_callback' => 'is_front_page',
	) ) );

	$wp_customize->add_setting( 'kemosite_wordpress_header_bg_color', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $colour_selection['primary'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_header_bg_color', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Header Background Colour', 'kemosite-wordpress-theme' ),
		'section' => 'kemosite_wordpress_header',
		'default' => $colour_selection['primary']
	) ) );

	$wp_customize->add_setting( 'kemosite_wordpress_header_bg_image', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => '',
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kemosite_wordpress_header_bg_image', array(
	   'priority' => 10, // Within the section.
	   'label'      => __( 'Header Background Image', 'kemosite-wordpress-theme' ),
	   'section'    => 'kemosite_wordpress_header'
    ) ) );

    // $black_tint = get_theme_mod('kemosite_wordpress_colours_black', '#4d4d4d');

	/*
	$wp_customize->get_section();
	$wp_customize->remove_section();
	*/
  
	/*
	$wp_customize->get_setting();
	$wp_customize->remove_setting();
	*/

	/*
	The most important parameter when adding a control is its type — this determines what type of UI the Customizer will display. Core provides several built-in control types:

	<input> elements with any allowed type (see below)
	checkbox
	textarea
	radio (pass a keyed array of values => labels to the choices argument)
	select (pass a keyed array of values => labels to the choices argument)
	dropdown-pages (use the allow_addition argument to allow users to add new pages from the control)
	For any input type supported by the html input element, simply pass the type attribute value to the type parameter when adding the control. This allows support for control types such as text, hidden, number, range, url, tel, email, search, time, date, datetime, and week, pending browser support.
	*/

	

	/*
	$wp_customize->get_control();
	$wp_customize->remove_control();
*/

}

add_action('customize_register','my_customize_register');

/* [Output Theme Mod Options] */
function mytheme_output_mod_options_console() {
	echo '<script>' . 
	'console.log(' . json_encode(get_theme_mods()) . ');' . 
	// 'console.log(' . json_encode(get_theme_mod('header_image')) . ');' . 
	'</script>';
}
// add_action( 'after_setup_theme', 'mytheme_output_mod_options_console' );

?>