<?php

/* [Customizations] */
function my_customize_register( $wp_customize ) {

	// Primary
	$primary = '#5F4B8B';  // Colour of the year, 2018

	/* [REMOVE UNNEEDED CONTROLS] */
	/*
	$wp_customize->remove_control("header_image");
	$wp_customize->remove_section("header_image");
	*/
	$wp_customize->remove_control("color");
	$wp_customize->remove_section("colors");
	

	// Calculate 70% black
	$black_70 = round(255 - (255 * .65));
	$black_70_hex = dechex($black_70);
	$black = '#'.$black_70_hex.$black_70_hex.$black_70_hex;

	$black_85 = round(255 - (255 * .85));
	$black_85_hex = dechex($black_85);
	$dark_black = '#'.$black_85_hex.$black_85_hex.$black_85_hex;

	$black_15 = round(255 - (255 * .35));
	$black_15_hex = dechex($black_15);
	$light_black = '#'.$black_15_hex.$black_15_hex.$black_15_hex;

	
	// Parse background colour for RGB value. Calculate luminousity. Determine black : white text.
	$primary_hex = (substr($primary, 0, 1) === "#") ? substr($primary, 1) : $primary;
	
	$primary_parse_r = intval(substr($primary_hex, 0, 2), 16);
	$primary_parse_g = intval(substr($primary_hex, 2, 2), 16);
	$primary_parse_b = intval(substr($primary_hex, 4, 2), 16);


	$yiq = round((($primary_parse_r*299)+($primary_parse_g*587)+($primary_parse_b*114))/1000);
	// $bright_threshold = 255 * .85;
	$brighten_raw_perc = (max(1, 255 - $yiq) / 255);
	$darken_raw_perc = (max(1, $yiq - 1) / 255);

	/*
	echo '<script>' . 
	'console.log(' . json_encode("YIQ: ".$yiq) . ');' . 
	'console.log(' . json_encode("Bright Threshold: ".$bright_threshold) . ');' . 
	'console.log(' . json_encode("Brighten Raw Perc: ".$brighten_raw_perc) . ');' . 
	'console.log(' . json_encode("Dark Threshold: ".$bright_threshold) . ');' . 
	'console.log(' . json_encode("Darken Raw Perc: ".$brighten_raw_perc) . ');' . 
	'</script>';
	*/

	$bright_primary_r_hex = dechex(min(255, round($primary_parse_r + ($primary_parse_r * $brighten_raw_perc))));
	$bright_primary_g_hex = dechex(min(255, round($primary_parse_g + ($primary_parse_g * $brighten_raw_perc))));
	$bright_primary_b_hex = dechex(min(255, round($primary_parse_b + ($primary_parse_b * $brighten_raw_perc))));
	$bright_primary = '#'.$bright_primary_r_hex.$bright_primary_g_hex.$bright_primary_b_hex;

	$dark_primary_r_hex = dechex(max(1, round($primary_parse_r - ($primary_parse_r * $darken_raw_perc))));
	$dark_primary_g_hex = dechex(max(1, round($primary_parse_g - ($primary_parse_g * $darken_raw_perc))));
	$dark_primary_b_hex = dechex(max(1, round($primary_parse_b - ($primary_parse_b * $darken_raw_perc))));
	$dark_primary = '#'.$dark_primary_r_hex.$dark_primary_g_hex.$dark_primary_b_hex;


	$invert_primary_r_hex = dechex(255 - intval(substr($primary_hex, 0, 2), 16));
	$invert_primary_g_hex = dechex(255 - intval(substr($primary_hex, 2, 2), 16));
	$invert_primary_b_hex = dechex(255 - intval(substr($primary_hex, 4, 2), 16));
	$invert_primary = '#'.$invert_primary_r_hex.$invert_primary_g_hex.$invert_primary_b_hex;

	/*
	$bright_invert_primary_r_hex = dechex(255 - intval(substr($primary_hex, 0, 2), 16));
	$bright_invert_primary_g_hex = dechex(255 - intval(substr($primary_hex, 2, 2), 16));
	$bright_invert_primary_b_hex = dechex(255 - intval(substr($primary_hex, 4, 2), 16));
	$bright_invert_primary = '#'.$bright_invert_primary_r_hex.$bright_invert_primary_g_hex.$bright_invert_primary_b_hex;
	*/

	// echo $black_hex;

	$colour_selection = array(
		'black' => $black,
		'dark_black' => $dark_black,
		'light_black' => $light_black,
		'primary' => $primary,
		'bright_primary' => $bright_primary,
		'dark_primary' => $dark_primary,
		'invert_primary' => $invert_primary,
		'bright_invert_primary' => $bright_invert_primary
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
	$wp_customize->add_section( 'kemosite_blank_colours' , array(
	  'title' => __( 'Body Colour Options', 'kemosite-blank-theme' ),
	  'description' => 'Body Colour options for the theme.',
	  'priority' => 50, // Before Widgets.
	  'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_setting( 'kemosite_blank_colours_black', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['black'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_blank_colours_black', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Black Tint', 'kemosite-blank-theme' ),
		'section' => 'kemosite_blank_colours',
		'default' => $colour_selection['black']
	) ) );

	$wp_customize->add_setting( 'kemosite_blank_colours_dark_black', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['dark_black'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_blank_colours_dark_black', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Dark Black Tint', 'kemosite-blank-theme' ),
		'section' => 'kemosite_blank_colours',
		'default' => $colour_selection['dark_black']
	) ) );

	$wp_customize->add_setting( 'kemosite_blank_colours_light_black', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['light_black'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_blank_colours_light_black', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Light Black Tint', 'kemosite-blank-theme' ),
		'section' => 'kemosite_blank_colours',
		'default' => $colour_selection['light_black']
	) ) );

	$wp_customize->add_setting( 'kemosite_blank_colours_primary', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['primary'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_blank_colours_primary', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Primary Colour', 'kemosite-blank-theme' ),
		'section' => 'kemosite_blank_colours',
		'default' => $colour_selection['primary']
	) ) );

	$wp_customize->add_setting( 'kemosite_blank_colours_bright_primary', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['bright_primary'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_blank_colours_bright_primary', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Bright Primary Colour', 'kemosite-blank-theme' ),
		'section' => 'kemosite_blank_colours',
		'default' => $colour_selection['bright_primary']
	) ) );

	$wp_customize->add_setting( 'kemosite_blank_colours_dark_primary', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['dark_primary'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_blank_colours_dark_primary', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Dark Primary Colour', 'kemosite-blank-theme' ),
		'section' => 'kemosite_blank_colours',
		'default' => $colour_selection['dark_primary']
	) ) );

	$wp_customize->add_setting( 'kemosite_blank_colours_invert_primary', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['invert_primary'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_blank_colours_invert_primary', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Invert Primary Colour', 'kemosite-blank-theme' ),
		'section' => 'kemosite_blank_colours',
		'default' => $colour_selection['invert_primary']
	) ) );

	/*
	$wp_customize->add_setting( 'kemosite_blank_colours_bright_invert_primary', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' =>  $colour_selection['bright_invert_primary'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_blank_colours_bright_invert_primary', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Bright Invert Primary Colour', 'kemosite-blank-theme' ),
		'section' => 'kemosite_blank_colours',
		'default' => $colour_selection['bright_invert_primary']
	) ) );
	*/


	/* [ADD A FONT OPTIONS SECTIONS] */
	$wp_customize->add_section( 'kemosite_blank_fonts' , array(
	  'title' => __( 'Body Font Options', 'kemosite-blank-theme' ),
	  'description' => 'Body copy font options for the theme.',
	  'priority' => 50, // Before Widgets.
	  'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_setting( 'kemosite_blank_fonts_h1_h6', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => '',
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_blank_fonts_h1_h6', array(
		'type' => 'select',
		'priority' => 10, // Within the section.
		'section' => 'kemosite_blank_fonts', // Required, core or custom.
		'label' => __( 'Header Font', 'kemosite-blank-theme' ),
		'description' => __( 'Font to use for H1-H6 tags.' ),
		'choices' => $font_selection
		// 'active_callback' => 'is_front_page',
	) ) );

	$wp_customize->add_setting( 'kemosite_blank_fonts_body', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => '',
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_blank_fonts_body', array(
		'type' => 'select',
		'priority' => 10, // Within the section.
		'section' => 'kemosite_blank_fonts', // Required, core or custom.
		'label' => __( 'Body Copy Font', 'kemosite-blank-theme' ),
		'description' => __( 'Font to use for body copy.' ),
		'choices' => $font_selection
		// 'active_callback' => 'is_front_page',
	) ) );

	$wp_customize->add_setting( 'kemosite_blank_fonts_buttons', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => '',
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '', // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_blank_fonts_buttons', array(
		'type' => 'select',
		'priority' => 10, // Within the section.
		'section' => 'kemosite_blank_fonts', // Required, core or custom.
		'label' => __( 'Buttons Font', 'kemosite-blank-theme' ),
		'description' => __( 'Font to use for buttons.' ),
		'choices' => $font_selection
		// 'active_callback' => 'is_front_page',
	) ) );



	/* [ADD A HEADER OPTIONS SECTIONS] */
	$wp_customize->add_section( 'kemosite_blank_header' , array(
	  'title' => __( 'Header Options', 'kemosite-blank-theme' ),
	  'description' => 'Header options for the theme.',
	  'priority' => 50, // Before Widgets.
	  'capability' => 'edit_theme_options'
	) );

	$wp_customize->add_setting( 'kemosite_blank_header_font', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => '',
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_blank_header_font', array(
		'type' => 'select',
		'priority' => 10, // Within the section.
		'section' => 'kemosite_blank_header', // Required, core or custom.
		'label' => __( 'Header Font', 'kemosite-blank-theme' ),
		'description' => '',
		'choices' => $font_selection
		// 'active_callback' => 'is_front_page',
	) ) );

	$wp_customize->add_setting( 'kemosite_blank_header_bg_color', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => $colour_selection['primary'],
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_blank_header_bg_color', array(
		'priority' => 10, // Within the section.
		'label' => __( 'Header Background Colour', 'kemosite-blank-theme' ),
		'section' => 'kemosite_blank_header',
		'default' => $colour_selection['primary']
	) ) );

	$wp_customize->add_setting( 'kemosite_blank_header_bg_image', array(
		'type' => 'theme_mod', // or 'option'
		'capability' => 'edit_theme_options',
		'theme_supports' => '', // Rarely needed.
		'default' => '',
		'transport' => 'refresh', // or postMessage
		'sanitize_callback' => '',
		'sanitize_js_callback' => '' // Basically to_json.
	) );

	$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, 'kemosite_blank_header_bg_image', array(
	   'priority' => 10, // Within the section.
	   'label'      => __( 'Header Background Image', 'kemosite-blank-theme' ),
	   'section'    => 'kemosite_blank_header'
    ) ) );

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