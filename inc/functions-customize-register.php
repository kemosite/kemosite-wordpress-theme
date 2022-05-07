<?php

/* [Customizations] */
function my_customize_register( $wp_customize ) {

	/* [DEFAULT THEME FONT] */
	$kemosite_wordpress_default_google_font = 'Roboto:wght@300';
	
	/*
	** [REMOVE UNNEEDED SECTIONS AND CONTROLS] **
	*/
	// $wp_customize->remove_control("header_image");
	// $wp_customize->remove_section("header_image");0
	$wp_customize->remove_control("background_image");
	$wp_customize->remove_section("background_image");
	$wp_customize->remove_control("background_color");
	$wp_customize->remove_section("colors");	

	$font_selection = array(
		'EB+Garamond' => 'EB Garamond, Regular 400',
		'Open+Sans:wght@300' => 'Open Sans, Light 300',
		'Roboto:wght@300' => 'Roboto, Light 300',
		'Roboto+Condensed' => 'Roboto Condensed, Regular 400',
		'Roboto+Condensed:wght@700' => 'Roboto Condensed, Bold 700',
		'Oswald:wght@300' => 'Oswald, Light 300',
		'Oswald:wght@600' => 'Oswald, Semi-Bold 600'
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

 	/* [SECTIONS] *
 	// https://developer.wordpress.org/themes/customize-api/customizer-objects/
 	**	Title				ID								Priority (Order)
	**	Site 				Title & Tagline	title_tagline	20
	**	Colors				colors							40
	**	Header Image		header_image					60
	**	Background Image	background_image				80
	**	Menus (Panel)		nav_menus						100
	**	Widgets (Panel)		widgets							110
	**	Static Front Page	static_front_page				120
	**	default												160
	**	Additional CSS		custom_css						200
	*/

	// Include Pantone COTY history
	require_once get_template_directory() . '/inc/customize-register/customize-register-coty.php'; // returns $pantone_coty_colours

	// Include Universal Colours
	require_once get_template_directory() . '/inc/customize-register/customize-register-universal-colours.php'; // returns $kemosite_wordpress_universal_colours

	/* [ADD GLOBAL COLOUR OPTIONS SECTIONS] */
	$wp_customize->add_section( 'kemosite_wordpress_global_colour_options' , array(
	  'title' => __( 'Global Colour Options', 'kemosite-wordpress-theme' ),
	  'description' => 'Publish base colour for the theme. Variations and accessibility contrast adjustments will be created after publishing in Colour Variations panel.',
	  'priority' => 40, // Same as Colour.
	  'capability' => 'edit_theme_options'
	) );
	require_once get_template_directory() . '/inc/customize-register/kemosite_wordpress_global_colour_options.php';



	
	// Present colour variations in a separate panel.
	/*
	$wp_customize->add_panel( 'kemosite_wordpress_colour_variations_options', array(
		'title' => __( 'Colour Variations (Publish Base Colour First)', 'kemosite-wordpress-theme' ),
		'capability'     => 'edit_theme_options',
		'description' => __( 'After "Base Colour Options" Published, variations will be created automatically', 'kemosite-wordpress-theme' ),
		'priority' => 41, // After Base Colour Options.
	) );
	require_once get_template_directory() . '/inc/customize-register/kemosite_wordpress_colour_variations_options.php';
	*/

	/* [ADD A HEADER OPTIONS SECTIONS] */
	$wp_customize->add_section( 'kemosite_wordpress_header' , array(
	  'title' => __( 'Header Options', 'kemosite-wordpress-theme' ),
	  'description' => 'Header options for the theme.',
	  'priority' => 90, // Before Menus.
	  'capability' => 'edit_theme_options'
	) );

		$wp_customize->add_setting( 'kemosite_wordpress_header_font', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => $font_selection[$kemosite_wordpress_default_google_font],
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
			'default' => $kemosite_wordpress_base_primary_colour,
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '' // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_header_bg_color', array(
			'priority' => 10, // Within the section.
			'label' => __( 'Header Background Colour', 'kemosite-wordpress-theme' ),
			'description' => 'Header text will automatically be black/white to maximize contrast with background colour.',
			'section' => 'kemosite_wordpress_header',
			'default' => $kemosite_wordpress_base_primary_colour
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

	    $wp_customize->add_setting( 'kemosite_wordpress_header_bg_image_presentation', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => '',
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '' // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_wordpress_header_bg_image_presentation', array(
			'type' => 'radio',
			'priority' => 10, // Within the section.
			'section' => 'kemosite_wordpress_header', // Required, core or custom.
			'label' => __( 'Header Background Image Presentation', 'kemosite-wordpress-theme' ),
			'description' => __( 'Should the header image be presented in full-colour, or duotone?' ),
			'choices' => array(
                'full-colour' => __( 'Full Colour' ),
                'duotone' => __( 'Duotone' ),
            ),
	    ) ) );



    /* [ADD A MAIN CONTENT OPTIONS SECTION] */
	$wp_customize->add_section( 'kemosite_wordpress_main_content' , array(
	  'title' => __( 'Main Content Options', 'kemosite-wordpress-theme' ),
	  'description' => 'Main content options for the theme.',
	  'priority' => 105, // Before Menus.
	  'capability' => 'edit_theme_options'
	) );

		$wp_customize->add_setting( 'kemosite_wordpress_main_content_bg_color_light_mode', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => '#efeff0',
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '' // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_main_content_bg_color_light_mode', array(
			'priority' => 10, // Within the section.
			'label' => __( 'Light Mode Main Content Background Colour', 'kemosite-wordpress-theme' ),
			'section' => 'kemosite_wordpress_main_content',
			'description' => __( 'Default: Cool white (not pure white, to improve cognative accessibility' ),
			'default' => '#efeff0',
		) ) );

		$wp_customize->add_setting( 'kemosite_wordpress_main_content_bg_color_dark_mode', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => '#242400',
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '' // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_main_content_bg_color_dark_mode', array(
			'priority' => 10, // Within the section.
			'label' => __( 'Dark Mode Main Content Background Colour', 'kemosite-wordpress-theme' ),
			'section' => 'kemosite_wordpress_main_content',
			'description' => __( 'Default: 100% black ink at 60 degrees (no blue light), ' ),
			'default' => '#242400',
		) ) );

	/* [ADD A FONT OPTIONS SECTIONS] */
	$wp_customize->add_section( 'kemosite_wordpress_fonts' , array(
	  'title' => __( 'Font Options', 'kemosite-wordpress-theme' ),
	  'description' => 'Font options for the theme.',
	  'priority' => 105, // Before Widgets.
	  'capability' => 'edit_theme_options'
	) );

		$wp_customize->add_setting( 'kemosite_wordpress_fonts_h1_h6', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => $font_selection[$kemosite_wordpress_default_google_font],
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '', // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_wordpress_fonts_h1_h6', array(
			'type' => 'select',
			'priority' => 10, // Within the section.
			'section' => 'kemosite_wordpress_main_content', // Required, core or custom.
			'label' => __( 'Header Font', 'kemosite-wordpress-theme' ),
			'description' => __( 'Font to use for H1-H6 tags.' ),
			'choices' => $font_selection
			// 'active_callback' => 'is_front_page',
		) ) );

		$wp_customize->add_setting( 'kemosite_wordpress_fonts_body', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => $font_selection[$kemosite_wordpress_default_google_font],
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '', // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_wordpress_fonts_body', array(
			'type' => 'select',
			'priority' => 10, // Within the section.
			'section' => 'kemosite_wordpress_main_content', // Required, core or custom.
			'label' => __( 'Body Copy Font', 'kemosite-wordpress-theme' ),
			'description' => __( 'Font to use for body copy.' ),
			'choices' => $font_selection
			// 'active_callback' => 'is_front_page',
		) ) );

	/* [ADD A FOOTER OPTIONS SECTION] */
	$wp_customize->add_section( 'kemosite_wordpress_footer' , array(
	  'title' => __( 'Footer Options', 'kemosite-wordpress-theme' ),
	  'description' => 'Footer options for the theme.',
	  'priority' => 130, // Before Menus.
	  'capability' => 'edit_theme_options'
	) );

		$kemosite_wordpress_base_primary_chroma = kemosite_lum_to_hex( kemosite_hex_to_chroma( $kemosite_wordpress_base_primary_colour ) );

		$wp_customize->add_setting( 'kemosite_wordpress_footer_bg_color', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => $kemosite_wordpress_base_primary_chroma,
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '' // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_footer_bg_color', array(
			'priority' => 10, // Within the section.
			'label' => __( 'Footer Background Colour', 'kemosite-wordpress-theme' ),
			'section' => 'kemosite_wordpress_footer',
			'default' => $kemosite_wordpress_base_primary_chroma,
		) ) );

		$wp_customize->add_setting( 'kemosite_wordpress_footer_font', array(
				'type' => 'theme_mod', // or 'option'
				'capability' => 'edit_theme_options',
				'theme_supports' => '', // Rarely needed.
				'default' => $font_selection[$kemosite_wordpress_default_google_font],
				'transport' => 'refresh', // or postMessage
				'sanitize_callback' => '',
				'sanitize_js_callback' => '' // Basically to_json.
			) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_wordpress_footer_font', array(
			'type' => 'select',
			'priority' => 10, // Within the section.
			'section' => 'kemosite_wordpress_footer', // Required, core or custom.
			'label' => __( 'Footer Font', 'kemosite-wordpress-theme' ),
			'description' => '',
			'choices' => $font_selection
			// 'active_callback' => 'is_front_page',
		) ) );

	/* [COMPONENT STYLE OPTIONS] */
	$wp_customize->add_section( 'kemosite_wordpress_component_styles' , array(
	  'title' => __( 'Component Styles', 'kemosite-wordpress-theme' ),
	  'description' => 'Hue and saturation targets, and font options for the theme components (buttons, callout boxes, alerts, etc.).'.
	  '<br><br>'.
	  'Luminance is subject to automatic adjustment to meet an accessibility contrast minimum of 3:1.<br><br>Colours for the header, main, and footer sections of the theme are <em>not</em> set here.',
	  'priority' => 121, // After Static Front Page Options.
	  'capability' => 'edit_theme_options'
	) );

		$wp_customize->add_setting( 'kemosite_wordpress_component_colour', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => $kemosite_wordpress_base_primary_colour,
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '' // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'kemosite_wordpress_component_colour', array(
			'priority' => 10, // Within the section.
			'label' => __( 'Component Colour', 'kemosite-wordpress-theme' ),
			'description' => 'The colour target for all components.',
			'section' => 'kemosite_wordpress_component_styles',
			'default' => $kemosite_wordpress_base_primary_colour
		) ) );

		$wp_customize->add_setting( 'kemosite_wordpress_component_font', array(
			'type' => 'theme_mod', // or 'option'
			'capability' => 'edit_theme_options',
			'theme_supports' => '', // Rarely needed.
			'default' => $kemosite_wordpress_default_google_font,
			'transport' => 'refresh', // or postMessage
			'sanitize_callback' => '',
			'sanitize_js_callback' => '', // Basically to_json.
		) );

		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'kemosite_wordpress_component_font', array(
			'type' => 'select',
			'priority' => 10, // Within the section.
			'section' => 'kemosite_wordpress_component_styles', // Required, core or custom.
			'label' => __( 'Components Font', 'kemosite-wordpress-theme' ),
			'description' => __( 'Font to use for components.' ),
			'choices' => $font_selection,
			'default' => $kemosite_wordpress_default_google_font,
			// 'active_callback' => 'is_front_page',
		) ) );

}

add_action('customize_register','my_customize_register');

/* [Output Theme Mod Options] */
function mytheme_output_mod_options_console() {

	remove_theme_mod('kemosite_wordpress_fonts_buttons');

	/*

	// Remove depricated colour variations
	
	remove_theme_mod('kemosite_wordpress_colours_dark_primary');
	remove_theme_mod('kemosite_wordpress_colours_invert_primary');
	remove_theme_mod('kemosite_wordpress_colours_bright_invert');
	remove_theme_mod('kemosite_wordpress_colours_dark_invert');

	*/

	$known_mod_array_keys = array(
		"custom_css_post_id",
		"custom_logo",
		"kemosite_wordpress_fonts_body",
		"kemosite_wordpress_fonts_buttons",
		"kemosite_wordpress_fonts_h1_h6",
		"kemosite_wordpress_header_bg_color",
		"kemosite_wordpress_header_bg_image",
		"kemosite_wordpress_header_font"
	);

	$theme_mod_diffs = array_diff( $known_mod_array_keys, array_keys( get_theme_mods() ) );

	if ( count( $theme_mod_diffs) > 0 ) :

		echo '<script>' . 
		'console.log("theme_mod_diffs: ");'.
		'console.log(' . json_encode( $theme_mod_diffs ) . ');' .
		'alert("Please review the console for [theme_mod_diffs]");'.
		'</script>';

	else:

		echo '<script>' . 
		'alert("Do not forget to comment out [after_setup_theme] in [functions-customize-register.php]");'.
		'</script>';

	endif;

}
// add_action( 'after_setup_theme', 'mytheme_output_mod_options_console' );

?>