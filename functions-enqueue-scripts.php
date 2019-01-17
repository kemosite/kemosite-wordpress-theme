<?php

/* [Load Parent Theme Styles] */

function my_theme_enqueue_styles() {

	/*
    wp_enqueue_style( KEMOSITE_BLANK_PARENT_STYLE, get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'kemosite-blank-theme',
        get_stylesheet_directory_uri() . '/style.css',
        array( KEMOSITE_BLANK_PARENT_STYLE ),
        wp_get_theme()->get('Version')
    );
    */
    
    wp_enqueue_style( 'kemosite-blank-theme', get_stylesheet_directory_uri() . '/style.css' );

    /* [Foundation Assets] */
    wp_enqueue_style( 'foundation', get_stylesheet_directory_uri() . '/foundation-6.4.2-custom/css/foundation.min.css' );

    /* [Foundation Icons v 3.0] */
    wp_enqueue_style( 'foundation-icons', get_stylesheet_directory_uri() . '/foundation-icons/foundation-icons.css' );
    
    /* [Blank Theme Fonts] */
    wp_enqueue_style( 'modern-pictograms', get_stylesheet_directory_uri() . '/modern-pictograms/stylesheet.css' );
	wp_enqueue_style( 'kemosite-theme-master-styles', get_stylesheet_directory_uri() . '/css/master.css' );

}
add_action( 'wp_enqueue_scripts', 'my_theme_enqueue_styles' );

/* [ Favicon] */
function ilc_favicon() { echo '<link rel="shortcut icon" href="' . get_stylesheet_directory_uri() . '/images/favicon.ico" />' . "\n"; }

/* [LESS Master Stylesheet] */
// function less_master_stylesheet() { echo '<link rel="stylesheet/less" type="text/css" href="' . get_stylesheet_directory_uri() . '/css/master.less" />' . "\n"; }

/* [RSS Thumbnail] */
function rss_post_thumbnail($content) {
    global $post;
    if( has_post_thumbnail($post->ID) )
        $content = '<p>' . get_the_post_thumbnail($post->ID, 'thumbnail') . '</p>' . $content;
    return $content;
}

/* [Load Scripts] */
function load_scripts_method() {
	
	// Favicon
	add_action('wp_head', 'ilc_favicon');

	// Foundation JS Files
	wp_deregister_script('foundation-jquery');
	wp_register_script('foundation-jquery', get_stylesheet_directory_uri().'/foundation-6.4.2-custom/js/vendor/jquery.js', '', '6.4.2', 'true');
	wp_enqueue_script('foundation-jquery');

	wp_deregister_script('foundation-what-input');
	wp_register_script('foundation-what-input', get_stylesheet_directory_uri().'/foundation-6.4.2-custom/js/vendor/what-input.js', '', '6.4.2', 'true');
	wp_enqueue_script('foundation-what-input');

	wp_deregister_script('foundation');
	wp_register_script('foundation', get_stylesheet_directory_uri().'/foundation-6.4.2-custom/js/vendor/foundation.min.js', '', '6.4.2', 'true');
	wp_enqueue_script('foundation');

	wp_deregister_script('foundation-app');
	wp_register_script('foundation-app', get_stylesheet_directory_uri().'/foundation-6.4.2-custom/js/app.js', '', '6.4.2', 'true');
	wp_enqueue_script('foundation-app');

	// Graph.js
	wp_deregister_script('graph-js');
	wp_register_script('graph-js', get_stylesheet_directory_uri().'/js/vendor/Chart.min.js', '', '2.7.2');
	wp_enqueue_script('graph-js');

	// LESS
	// add_action('wp_head', 'less_master_stylesheet');

	/*
	wp_deregister_script('less');
	wp_register_script('less', get_stylesheet_directory_uri().'/less-2.7.2/less.min.js', '', '2.7.2', 'true');
	wp_enqueue_script('less');
	*/

	// JQuery
	wp_deregister_script('my-jquery');
	wp_register_script('my-jquery', get_stylesheet_directory_uri().'/js/my-jquery.js', '', '4.8.1', 'true');
	wp_enqueue_script('my-jquery');

	// Mediaelement
	wp_deregister_script('mediaelement');
	wp_register_script('mediaelement', get_stylesheet_directory_uri().'/mediaelement-master/build/mediaelement-and-player.min.js', '', '4.2.9', 'true');
	wp_enqueue_script('mediaelement');
		
	// Add menus
	// add_action( 'init', 'register_my_menus' );	

	/* [REMOVE THE GENERATOR FROM THE HEAD OUTPUT] */
	remove_action('wp_head', 'wp_generator');
	
	/*
	function remove_version_info() {
	     return '';
	}
	add_filter('the_generator', 'remove_version_info');
	*/
	
	// Add image thumbnail to RSS feed.
	add_filter('the_content_feed', 'rss_post_thumbnail');

}

add_action('wp_enqueue_scripts', 'load_scripts_method');

?>